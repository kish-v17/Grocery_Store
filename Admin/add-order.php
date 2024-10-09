<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Add New Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="order-management.php">Orders</a></li>
                        <li class="breadcrumb-item active">Add Order</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <form action="orders.php" method="POST" onsubmit="return validateAddOrderForm()">
                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" name="userId">
                        <div id="userIdError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="orderDate" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="orderDate" name="orderDate">
                        <div id="orderDateError" class="error-message"></div>
                    </div>
                    <div id="productContainer">
                        <div class="product-entry mb-3">
                            <h5>Product 1</h5>
                            <div class="row align-items-end">
                                <div class="col-md-5">
                                    <label for="productId1" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="productId1" name="products[0][productId]">
                                    <div id="productId1Error" class="error-message"></div>
                                </div>
                                <div class="col-md-5">
                                    <label for="quantity1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity1" name="products[0][quantity]" min="1">
                                    <div id="quantity1Error" class="error-message"></div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addProductBtn">Add Another Product</button>
                    
                    <div class="mb-3 mt-4">
                        <label for="shippingAddress" class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3"></textarea>
                        <div id="shippingAddressError" class="error-message"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="billingAddress" class="form-label">Billing Address</label>
                        <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3"></textarea>
                        <div id="billingAddressError" class="error-message"></div>
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="orderStatus">
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <div id="orderStatusError" class="error-message"></div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="add-order">Submit Order</button>
                </form>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>
<?php
include '../DB/connection.php';

if (isset($_POST["add-order"])) {

    $userId = $_POST['userId'];
    $orderDate = $_POST['orderDate'];
    $shippingAddress = $_POST['shippingAddress'];
    $billingAddress = $_POST['billingAddress'];
    $orderStatus = $_POST['orderStatus'];
    
    $shippingCharge = 50; 
    $total = 0; 

    $insertOrderHeaderQuery = "
        INSERT INTO order_header_tbl (User_Id, Order_Date, Order_Status, Billing_Address_Id, Shipping_Address_Id, Shipping_Charge, Total)
        VALUES ('$userId', '$orderDate', '$orderStatus', '$billingAddress', '$shippingAddress', '$shippingCharge', '$total')
    ";

    if (mysqli_query($con, $insertOrderHeaderQuery)) {

        $orderId = mysqli_insert_id($con);

        $products = $_POST['products'];
        $orderTotal = 0; 
        foreach ($products as $product) {
            $productId = $product['productId'];
            $quantity = $product['quantity'];

            $productPriceQuery = "SELECT Price FROM products_tbl WHERE Product_Id = '$productId'";
            $productPriceResult = mysqli_query($con, $productPriceQuery);
            if ($productPriceResult && mysqli_num_rows($productPriceResult) > 0) {
                $productPriceRow = mysqli_fetch_assoc($productPriceResult);
                $price = $productPriceRow['Price'];

                $productTotal = $price * $quantity;

                $orderTotal += $productTotal;

                $insertOrderDetailsQuery = "
                    INSERT INTO order_details_tbl (Order_Id, Product_Id, Quantity, Price)
                    VALUES ('$orderId', '$productId', '$quantity', '$price')
                ";
                mysqli_query($con, $insertOrderDetailsQuery);
            }
        }

        $updateTotalQuery = "UPDATE order_header_tbl SET Total = '$orderTotal' WHERE Order_Id = '$orderId'";
        mysqli_query($con, $updateTotalQuery);

        echo "<script>alert('Order added successfully!');</script>";
        echo "<script>window.location.href = 'order-management.php';</script>";
    } else {
        echo "<script>alert('Error inserting order: " . mysqli_error($con) . "');</script>";
    }
}
?>
