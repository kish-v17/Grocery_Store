<?php include("sidebar.php") ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Order Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-order.php">Add Order</a>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td><a href="user-profile.php?username=JohnDoe">John Doe</a></td>
                            <td>2024-08-10</td>
                            <td>2</td>
                            <td>₹50.00</td>
                            <td>Pending</td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <a href="view-order.php?id=1001" class="btn btn-info btn-sm me-1">View</a>
                                    <a class="btn btn-primary btn-sm me-1" href="update-order.php">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td><a href="user-profile.php?username=JaneSmith">Jane Smith</a></td>
                            <td>2024-08-11</td>
                            <td>3</td>
                            <td>₹75.00</td>
                            <td>Processing</td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <a href="view-order.php?id=1001" class="btn btn-info btn-sm me-1">View</a>
                                    <a class="btn btn-primary btn-sm me-1" href="update-order.php">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1003</td>
                            <td><a href="user-profile.php?username=EmilyJohnson">Emily Johnson</a></td>
                            <td>2024-08-12</td>
                            <td>1</td>
                            <td>₹25.00</td>
                            <td>Shipped</td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <a href="view-order.php?id=1001" class="btn btn-info btn-sm me-1">View</a>
                                    <a class="btn btn-primary btn-sm me-1" href="update-order.php">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1004</td>
                            <td><a href="user-profile.php?username=MichaelBrown">Michael Brown</a></td>
                            <td>2024-08-13</td>
                            <td>4</td>
                            <td>₹100.00</td>
                            <td>Delivered</td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <a href="view-order.php?id=1001" class="btn btn-info btn-sm me-1">View</a>
                                    <a class="btn btn-primary btn-sm me-1" href="update-order.php">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this order? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete_order-handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>
