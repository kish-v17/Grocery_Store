<?php include("sidebar.php"); ?>
<!-- Amdmin Side Start --><div id="layoutSidenav_content">
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Statistics Cards Section -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Products</h5>
                            <h2>1,200</h2>
                        </div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-success text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Orders</h5>
                            <h2>3,450</h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Revenue</h5>
                            <h2>₹58,000</h2>
                        </div>
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Users</h5>
                            <h2>1,850</h2>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Recent Orders Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Orders</h4>
            <a href="orders.php" class="btn btn-secondary">See All Orders</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>2024-08-10</td>
                        <td>John Doe</td>
                        <td>₹150.00</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>2024-08-11</td>
                        <td>Jane Smith</td>
                        <td>₹85.00</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <td>1003</td>
                        <td>2024-08-12</td>
                        <td>Emily Johnson</td>
                        <td>₹45.00</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Products Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Products</h4>
            <a href="products.php" class="btn btn-secondary">See All Orders</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Sold Quantity</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="../img/items/products/cookiecake.webp" alt="Cookie Cake" style="width: 50px; height: 50px; object-fit: cover;">
                            <span class="ms-2">Cookie Cake</span>
                        </td>
                        <td>₹25.00</td>
                        <td>10%</td>
                        <td>150</td>
                        <td>50</td>
                        <td>Bakery</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="view_product.php">View</a>
                            <a class="btn btn-success btn-sm" href="update-product.php">Update</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
