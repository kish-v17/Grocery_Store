<?php include("sidebar.php"); 
$user_id = $_GET['user_id'];
if(isset($_POST['add-to-cart']))
{
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $checkQuery = "SELECT * FROM cart_details_tbl WHERE Product_Id = '$product_id' AND User_Id = '$user_id'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) 
    {
        echo "<script>alert('This product is already in this user's cart.');</script>";
    } 
    else 
    {
        $insertQuery = "INSERT INTO cart_details_tbl (Product_Id, Quantity, User_Id) VALUES ('$product_id', '$quantity', '$user_id')";
        if (mysqli_query($con, $insertQuery)) 
        {
            echo "<script>
                alert('Product added to cart successfully!');
                location.href='cart.php?user_id=$user_id'; </script>";
        } 
        else 
        {
            echo "<script>alert('Error adding product to cart: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product to Cart</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Product to Cart</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <?php
                    // Fetch product data from the database
                    $productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
                    $productResult = mysqli_query($con, $productQuery);
                    ?>

                    <form action="" method="POST" onsubmit="return validateAddToCartForm()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="product" class="form-label">Product</label>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <select class="form-select" id="product" name="product_id">
                                        <option value="" disabled selected>Select a product</option>
                                        <?php
                                        if (mysqli_num_rows($productResult) > 0) {
                                            while ($product = mysqli_fetch_assoc($productResult)) {
                                                echo '<option value="' . $product['Product_Id'] . '">' . $product['Product_Id'] . ' - ' . $product['Product_Name'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No active products available</option>';
                                        }
                                        ?>
                                    </select>
                                    <div id="productError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" >
                                    <div id="quantityError" class="error-message"></div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" name="add-to-cart" class="btn btn-secondary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>
