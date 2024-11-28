<?php include 'header.php';
$user_id = $_SESSION['user_id'];
if (isset($_GET['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo "<script>location.href='login.php';</script>";
        exit;
    }
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
    if (record_exists($user_id, $product_id, $con)) {
        $query = "update cart_details_tbl set quantity = quantity+1 where Product_Id = '$product_id' and User_Id = '$user_id'";
        mysqli_query($con, $query);
    } else {
        $query = "INSERT INTO cart_details_tbl(Product_Id, Quantity, User_Id) VALUES ('$product_id', '$quantity', '$user_id')";
        if (mysqli_query($con, $query)) {
            setcookie('success', "Product added to cart successfully!", time() + 5, "/");
            echo "<script>
            location.replace('cart.php');</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
$query = "select p.Product_Name,c.Product_Id, p.Product_Image, round(p.Sale_Price-p.Sale_Price*p.Discount/100,2) as 'Price',round((p.Sale_Price-p.Sale_Price*p.Discount/100)*c.Quantity,2) as 'Subtotal',c.Quantity from cart_details_tbl as c left join product_details_tbl as p on c.Product_Id = p.Product_Id where User_Id = " . $user_id;
$result = mysqli_query($con, $query);

?>
<div class="container sitemap cart-table">
    <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Cart</p>
    <?php
    $total = 0;
    if (mysqli_num_rows($result) > 0) {

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
            while ($product = mysqli_fetch_assoc($result)) {
                $total += $product['Subtotal'];
            ?>
                <tr>
                    <form action="php/update-cart.php" method="post">
                        <td class="text-start">
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
        } else {
            echo "There is no record to display!";
        }
        ?>



        </table>
</div>
<?php
$shipping_charge = 50;
$final_total = $total + $shipping_charge;
?>
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center cart-page mb-5">
        <a class="btn-msg px-sm-4 py-sm-2 px-2 py-1 mt-2" href="shop.php">Return to shop</a>
        <div class="flex flex-col">
            <div class="d-flex justify-content-end align-items-center not-hidden">
                <form class="d-flex justify-content-end" action="cart.php" method="post"">
                    <input class=" search-input" type="search" placeholder="Add offer code" size="25" name="offer_code" id="offerCodeText" value="<?php echo $_POST['offer_code']; ?>">
                    <button class="primary-btn" type="submit" name="apply">Apply</button>
                </form>
            </div>
            <div id="err"></div>
        </div>

        <!-- <button class="btn-msg px-sm-4 py-sm-2 px-2 py-1 mt-2">Update Cart</button> -->
    </div>
    <div class="row justify-content-end">
        <div class="col-md-5 col-sm-7">
            <div class="bold-border p-4">
                <h5 class="mb-3">Cart Total</h5>
                <div class="d-flex align-items-center p-2">
                    <div>Subtotal:</div>
                    <div class="price">₹<?php echo $total; ?></div>
                </div>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Shipping:</div>
                    <div class="price">₹<?php echo $shipping_charge; ?></div>
                </div>
                <div id="discount-section">

                </div>
                <div class="my-2 line"></div>
                <div class="d-flex align-items-center p-2">
                    <div>Total:</div>
                    <div class="price" id="total">₹<?php echo $final_total; ?></div>
                </div>
                <form action="" method="post">
                    <div class="d-flex justify-content-center w-100 mt-3">
                        <input type="submit" class="btn-msg checkout-link text-nowrap" name="checkout" value="Proceed to checkout" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');

function record_exists($user_id, $product_id, $con)
{
    $query = "select * from cart_details_tbl where User_Id=$user_id and Product_Id=$product_id";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
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

if (isset($_POST['apply'])) {

    $offer = strtoupper($_POST['offer_code']);
    $query = "SELECT `Offer_Id`, `Offer_Code`, `Offer_Description`, `Discount`, `Max_Discount`, `Minimum_Order`, `offer_type`, `active_status`, `Start_Date`, `End_Date` 
                  FROM `offer_details_tbl` 
                  WHERE Offer_Code='$offer' AND active_status=1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        date_default_timezone_set('Asia/Kolkata');
        $offer_data = mysqli_fetch_assoc($result);
        $discount_percentage = $offer_data['Discount'];
        $max_discount = $offer_data['Max_Discount'];
        $order_total = $offer_data['Minimum_Order'];
        $offer_type = $offer_data['offer_type'];
        $start_date = strtotime($offer_data['Start_Date']); // Convert to Unix timestamp
        $end_date = strtotime($offer_data['End_Date']);     // Convert to Unix timestamp
        $current_date = time();

        if (!($current_date > $start_date && $current_date < $end_date)) {
            // Offer not valid on the current date
?>
            <script>
                document.getElementById('err').style.color = "red";
                document.getElementById('err').innerHTML = "This offer is not available at the moment.";
            </script>
            <?php
        } else {
            if ($offer_type == 1) {
                // Regular discount calculation based on Minimum_Order
                if ($total >= $order_total) {
                    $discount_amount = ($total * $discount_percentage) / 100;
                    if ($discount_amount > $max_discount) {
                        $discount_amount = $max_discount;
                    }
                    $new_total = $total - $discount_amount;
            ?>
                    <script>
                        document.getElementById('discount-section').innerHTML = `
                            <div class="my-2 line"></div>
                            <div class="d-flex align-items-center p-2">
                                <div>Discount:</div>
                                <div class="price">-₹<?php echo $discount_amount; ?></div>
                            </div>`;
                        document.getElementById('total').innerHTML = `₹<?php echo $new_total + $shipping_charge; ?>`;
                        document.getElementById('err').style.color = "green";
                        document.getElementById('err').innerHTML = "Offer code applied successfully";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        document.getElementById('err').style.color = "red";
                        document.getElementById('err').innerHTML = "To avail this offer, the cart total must be greater than ₹<?php echo $order_total; ?>.";
                    </script>
                <?php
                }
            } elseif ($offer_type == 2) {
                // Apply discount directly
                $discount_amount = ($total * $discount_percentage) / 100;
                if ($discount_amount > $max_discount) {
                    $discount_amount = $max_discount;
                }
                $new_total = $total - $discount_amount;
                ?>
                <script>
                    document.getElementById('discount-section').innerHTML = `
                        <div class="my-2 line"></div>
                        <div class="d-flex align-items-center p-2">
                            <div>Discount:</div>
                            <div class="price">-₹<?php echo $discount_amount; ?></div>
                        </div>`;
                    document.getElementById('total').innerHTML = `₹<?php echo $new_total + $shipping_charge; ?>`;
                    document.getElementById('err').style.color = "green";
                    document.getElementById('err').innerHTML = "Offer code applied successfully";
                </script>
            <?php
            } elseif ($offer_type == 3) {
                // Apply shipping charge as discount
                $discount_amount = $shipping_charge;
                $new_total = $total - $discount_amount;
            ?>
                <script>
                    document.getElementById('discount-section').innerHTML = `
                        <div class="my-2 line"></div>
                        <div class="d-flex align-items-center p-2">
                            <div>Shipping Discount:</div>
                            <div class="price">-₹<?php echo $discount_amount; ?></div>
                        </div>`;
                    document.getElementById('total').innerHTML = `₹<?php echo $new_total + $shipping_charge - $discount_amount; ?>`;
                    document.getElementById('err').style.color = "green";
                    document.getElementById('err').innerHTML = "Offer code applied successfully";
                </script>
    <?php
            }
            $_SESSION["discount_amount"] = $discount_amount;
            $_SESSION["subtotal"] = $total;
            $_SESSION["total"] = $total + $shipping_charge - $discount_amount;
            $_SESSION["shipping_charge"] = $shipping_charge;
        }
    }
} else {
    // Offer code does not exist
    ?>
    <script>
        document.getElementById('err').style.color = "red";
        document.getElementById('err').innerHTML = "Invalid Code";
    </script>
<?php
}
if (isset($_POST['checkout'])) {
    $_SESSION["discount_amount"] = $discount_amount;
    $_SESSION["subtotal"] = $total;
    $_SESSION["total"] = $total + $shipping_charge - $discount_amount;
    $_SESSION["shipping_charge"] = $shipping_charge;
    echo "<script>
    location.href='checkout.php';</script>";
}
