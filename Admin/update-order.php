<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Update Order</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="order-management.php">Orders</a></li>
                        <li class="breadcrumb-item active">Update Order</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <form action="update_order_handler.php" method="POST">
                    <input type="hidden" name="orderId" value="12345">
                    
                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" name="userId" value="u7890" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="orderDate" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="orderDate" name="orderDate" value="2024-08-15" required>
                    </div>
                    
                    <div id="productContainer">
                        <div class="product-entry mb-3" id="productEntry1">
                            <h5>Product 1</h5>
                            <div class="row align-items-end">
                                <div class="col-md-5">
                                    <label for="productId1" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="productId1" name="products[0][productId]" value="p001" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="quantity1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity1" name="products[0][quantity]" min="1" value="2" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product-entry mb-3" id="productEntry2">
                            <h5>Product 2</h5>
                            <div class="row align-items-end">
                                <div class="col-md-5">
                                    <label for="productId2" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="productId2" name="products[1][productId]" value="p002" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="quantity2" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity2" name="products[1][quantity]" min="1" value="1" required>
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
                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3" required>123 Elm Street, Springfield, IL, 62704</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="billingAddress" class="form-label">Billing Address</label>
                        <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3" required>456 Oak Avenue, Springfield, IL, 62705</textarea>
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="orderStatus" required>
                            <option value="Pending" selected>Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function removeProduct(button) {
            const productEntry = button.closest('.product-entry');
            productEntry.remove();
        }
    </script>
<?php include("footer.php"); ?>
