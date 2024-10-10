<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Edit Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="order-management.php">Orders</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <?php

                if (isset($_GET['order_id'])) {
                    $orderId = $_GET['order_id'];

                    $orderQuery = "SELECT * FROM order_header_tbl WHERE Order_Id = $orderId";
                    $orderResult = mysqli_query($con, $orderQuery);
                    $order = mysqli_fetch_assoc($orderResult);

                    $billingQuery = "SELECT * FROM address_details_tbl WHERE Address_Id = {$order['Billing_Address_Id']}";
                    $billingResult = mysqli_query($con, $billingQuery);
                    $billingAddress = mysqli_fetch_assoc($billingResult);

                    $shippingQuery = "SELECT * FROM address_details_tbl WHERE Address_Id = {$order['Shipping_Address_Id']}";
                    $shippingResult = mysqli_query($con, $shippingQuery);
                    $shippingAddress = mysqli_fetch_assoc($shippingResult);

                    $sameAsBilling = ($order['Billing_Address_Id'] == $order['Shipping_Address_Id']) ? true : false;

                    $productsQuery = "SELECT * FROM order_details_tbl WHERE Order_Id = $orderId";
                    $productsResult = mysqli_query($con, $productsQuery);
                    $products = [];
                    while ($row = mysqli_fetch_assoc($productsResult)) {
                        $products[] = $row;
                    }
                ?>
                <form action="edit-order.php?order_id=<?php echo $orderId; ?>" method="POST" onsubmit="return validateAddOrderForm()||event.preventDefault()">
                    <!-- Order Details -->
                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" name="userId" value="<?php echo $order['User_Id']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="orderDate" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="orderDate" name="orderDate" value="<?php echo isset($order['Order_Date']) ? date('Y-m-d', strtotime($order['Order_Date'])) : ''; ?>">
                    </div>

                    <!-- Products Section -->
                    <div id="productContainer">
                        <?php foreach ($products as $index => $product) { ?>
                            <div class="product-entry mb-3">
                                <h5>Product <?php echo $index + 1; ?></h5>
                                <div class="row align-items-end">
                                    <div class="col-md-5">
                                        <label for="productId<?php echo $index; ?>" class="form-label">Product ID</label>
                                        <input type="text" class="form-control" id="productId<?php echo $index; ?>" name="products[<?php echo $index; ?>][productId]" value="<?php echo $product['Product_Id']; ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="quantity<?php echo $index; ?>" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity<?php echo $index; ?>" name="products[<?php echo $index; ?>][quantity]" value="<?php echo $product['Quantity']; ?>" min="1">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Billing Details Section -->
                    <div class="mb-4 mt-4">
                        <h2>Billing Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="billingFirstName" class="form-label d-block">First Name</label>
                                        <input type="text" id="billingFirstName" name="billingFirstName" class="form-control" value="<?php echo explode(' ', $billingAddress['Full_Name'])[0]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingLastName" class="form-label d-block">Last Name</label>
                                        <input type="text" id="billingLastName" name="billingLastName" class="form-control" value="<?php echo explode(' ', $billingAddress['Full_Name'])[1]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="billingAddress" class="form-label d-block">Street Address</label>
                                        <textarea id="billingAddress" name="billingAddress" class="form-control" rows="2"><?php echo $billingAddress['Address']; ?></textarea>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingCity" class="form-label d-block">City</label>
                                        <input type="text" id="billingCity" name="billingCity" class="form-control" value="<?php echo $billingAddress['City']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingState" class="form-label d-block">State</label>
                                        <input type="text" id="billingState" name="billingState" class="form-control" value="<?php echo $billingAddress['State']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPinCode" class="form-label d-block">Pin Code</label>
                                        <input type="text" id="billingPinCode" name="billingPinCode" class="form-control" value="<?php echo $billingAddress['Pincode']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="billingPhone" class="form-label d-block">Phone</label>
                                        <input type="text" id="billingPhone" name="billingPhone" class="form-control" value="<?php echo $billingAddress['Phone']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Checkbox to control Shipping Details visibility -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="sameAsBilling" name="sameAsBilling" <?php echo $sameAsBilling ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sameAsBilling">
                            Shipping address same as billing address
                        </label>
                    </div>

                    <!-- Shipping Details Section -->
                    <div id="shippingDetailsSection" class="mb-4" <?php echo $sameAsBilling ? 'style="display: none;"' : ''; ?>>
                        <h2>Shipping Details</h2>
                        <div class="row g-5">
                            <div class="col-md-12">
                                <div class="row gx-2 gy-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingFirstName" class="form-label d-block">First Name</label>
                                        <input type="text" id="shippingFirstName" name="shippingFirstName" class="form-control" value="<?php echo $sameAsBilling ? '' : explode(' ', $shippingAddress['Full_Name'])[0]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingLastName" class="form-label d-block">Last Name</label>
                                        <input type="text" id="shippingLastName" name="shippingLastName" class="form-control" value="<?php echo $sameAsBilling ? '' : explode(' ', $shippingAddress['Full_Name'])[1]; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <label for="shippingAddress" class="form-label d-block">Street Address</label>
                                        <textarea id="shippingAddress" name="shippingAddress" class="form-control" rows="2"><?php echo $sameAsBilling ? '' : $shippingAddress['Address']; ?></textarea>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingCity" class="form-label d-block">City</label>
                                        <input type="text" id="shippingCity" name="shippingCity" class="form-control" value="<?php echo $sameAsBilling ? '' : $shippingAddress['City']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingState" class="form-label d-block">State</label>
                                        <input type="text" id="shippingState" name="shippingState" class="form-control" value="<?php echo $sameAsBilling ? '' : $shippingAddress['State']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPinCode" class="form-label d-block">Pin Code</label>
                                        <input type="text" id="shippingPinCode" name="shippingPinCode" class="form-control" value="<?php echo $sameAsBilling ? '' : $shippingAddress['Pincode']; ?>">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="shippingPhone" class="form-label d-block">Phone</label>
                                        <input type="text" id="shippingPhone" name="shippingPhone" class="form-control" value="<?php echo $sameAsBilling ? '' : $shippingAddress['Phone']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="orderStatus">
                            <option value="Pending" <?php echo ($order['Order_Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Processing" <?php echo ($order['Order_Status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                            <option value="Shipped" <?php echo ($order['Order_Status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                            <option value="Delivered" <?php echo ($order['Order_Status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            <option value="Cancelled" <?php echo ($order['Order_Status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                        <div id="orderStatusError" class="error-message"></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update Order</button>
                </form>
                <?php } else {
                    echo "<p>Invalid order ID.</p>";
                } ?>
            </div>
        </div>
    </main>

<script>
    // Toggle shipping details based on checkbox status
    document.getElementById("sameAsBilling").addEventListener("change", function() {
        var shippingSection = document.getElementById("shippingDetailsSection");
        shippingSection.style.display = this.checked ? "none" : "block";
    });
</script>

<?php include "footer.php"; ?>
