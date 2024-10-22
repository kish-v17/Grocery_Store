<?php include 'header.php' ;
$user_id = $_SESSION['user_id'];
if (isset($_GET['product_id'])) 
{
    if (isset($_SESSION['user_id'])) 
    {
        $user_id = $_SESSION['user_id'];
    } 
    else 
    {
        echo "<script>location.href='login.php';</script>";
        exit;
    }
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;  
    if(record_exists($user_id, $product_id, $con))
    {
        $query = "update cart_details_tbl set quantity = quantity+1 where Product_Id = '$product_id' and User_Id = '$user_id'";
        mysqli_query($con,$query);
    }
    else
    {
        $query = "INSERT INTO cart_details_tbl(Product_Id, Quantity, User_Id) VALUES ('$product_id', '$quantity', '$user_id')"; 
        if (mysqli_query($con, $query)) {
            setcookie('success', "Product added to cart successfully!", time() + 5, "/");
            echo "<script>
            location.replace('cart.php');</script>";
            exit;
        } 
        else 
        {
            echo "Error: " . mysqli_error($con);
        }
    }


    
}
$query = "select p.Product_Name,c.Product_Id, p.Product_Image, round(p.Sale_Price-p.Sale_Price*p.Discount/100,2) as 'Price',round((p.Sale_Price-p.Sale_Price*p.Discount/100)*c.Quantity,2) as 'Subtotal',c.Quantity from cart_details_tbl as c left join product_details_tbl as p on c.Product_Id = p.Product_Id where User_Id = ".$user_id;
$result = mysqli_query($con,$query);

?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Cart</p>
        <?php
            $total = 0;
            if(mysqli_num_rows($result) > 0){
                
                ?>
                <table class="table cart-table  text-nowrap">
                    <tr class="heading">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                <?php
                while($product = mysqli_fetch_assoc($result)){
                    $total += $product['Subtotal'];
                    ?>
                        <tr>
                        <form action="php/update-cart.php" method="post">
                            <td>
                                <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="<?php echo $product["Product_Name"]; ?>" class="image-item d-inline-block">
                                <div class="d-inline-block"><?php echo $product["Product_Name"]; ?></div>
                            </td>
                            <td>₹<?php echo $product["Price"]; ?></td>
                            <td>
                                <div class="d-flex qty-mod">
                                    <button class="number-button qty-minus">-</button>
                                    <input type="number" name="quantity" id="" value="<?php echo $product["Quantity"]; ?>">
                                    <button class="number-button qty-plus">+</button>
                                    <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                                </div>
                            </td>
                            <td>₹<?php echo $product["Subtotal"]; ?></td>
                            <td>
                                <input type="submit" class="primary-btn update-btn" value="Update">
                                <a class="primary-btn delete-btn" href="php/remove-from-cart.php?product_id=<?php echo $product["Product_Id"]; ?>">Delete</a>
                            </td>
                        </form>
                        </tr>
                    <?php
                        }
            }
            else{
                echo "There is no record to display!";
            }
        ?>
        
            
            
        </table>
</div>
<?php
    $discount_content = "";
    //offer available for all
    $query = "SELECT `Discount`, `Minimum_Order` FROM `offer_details_tbl` WHERE `offer_type`=1 and `active_status`=1 order by Minimum_Order";
    $result = mysqli_query($con, $query);
    
    $discount=0;
    while($offer = mysqli_fetch_assoc($result))
    {
        if($offer['Minimum_Order'] < $total)
        {
            $discount = $offer['Discount'];
        }
    }
    $discount_content .= '<div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Discount:</div>
                    <div class="price">₹'. $total*$discount/100 .'</div>
                </div>';
    if(is_first_order($con)){
        $query = "SELECT `Discount` FROM `offer_details_tbl` WHERE `offer_type`=2 and `active_status`=1";
        $result = mysqli_query($con, $query);
        $array = mysqli_fetch_array($result);
        $first_order_discount = $array[0];
        if(mysqli_num_rows($result))
        {
            $discount_content .= '<div class="my-2 line"></div>
            <div class="d-flex align-items-center p-2">
                <div>First Order Discount:</div>
                <div class="price">₹'. $total*$first_order_discount/100 .'</div>
            </div>';
        }
        
    }
?>
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center cart-page mb-5">
        <a class="btn-msg px-sm-4 py-sm-2 px-2 py-1 mt-2" href="shop.php">Return to shop</a>
        <!-- <button class="btn-msg px-sm-4 py-sm-2 px-2 py-1 mt-2">Update Cart</button> -->
    </div>
    <div class="row justify-content-end">
        <div class="col-md-5 col-sm-7">
            <div class="bold-border p-4">
                <h5 class="mb-3">Cart Total</h5>
                <div class="d-flex align-items-center p-2">
                    <div>Subtotal:</div>
                    <div class="price">₹200.00</div>
                </div>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Shipping:</div>
                    <div class="price">₹100.00</div>
                </div>
                <?php echo $discount_content; ?>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Total:</div>
                    <div class="price">₹300.00</div>
                </div>
                <div class="d-flex justify-content-center w-100 mt-3">
                    <a class="btn-msg checkout-link text-nowrap" href="checkout.php">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); 

    function record_exists($user_id, $product_id, $con)
    {
        $query = "select * from cart_details_tbl where User_Id=$user_id and Product_Id=$product_id";
        $result = mysqli_query($con, $query);
        return mysqli_num_rows($result)>0;
    }
    function is_first_order($con)
    {
        $user_id = $_SESSION["user_id"];
        $query = "select count(*) from order_header_tbl where User_Id = $user_id";
        $result = mysqli_query($con, $query);
        $order_count_array = mysqli_fetch_array($result);
        $order_count = $order_count_array[0];
        return $order_count < 1;
    }
?>
