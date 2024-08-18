<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Cart</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Cart</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="update_cart_handler.php" method="POST">
                        <div class="mb-3">
                            <label for="user" class="form-label">User</label>
                            <select class="form-select" id="user" name="user_id" required>
                                <option value="" disabled>Select a user</option>
                                <option value="1" selected>John Doe</option>
                                <option value="2">Jane Smith</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product" class="form-label">Product</label>
                            <select class="form-select" id="product" name="product_id" required>
                                <option value="" disabled>Select a product</option>
                                <option value="101" selected>Product A</option>
                                <option value="102">Product B</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="2" required>
                        </div>

                        <button type="submit" class="btn btn-secondary">Update Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>
