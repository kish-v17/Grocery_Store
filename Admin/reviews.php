<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Review Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Reviews</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table border">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Username</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="product_details.php">
                                    <img src="../img/items/products/product1.webp" alt="Product 1" style="width: 50px; height: 50px; object-fit: cover;">
                                    <span class="ms-2">Product 1</span>
                                </a>
                            </td>
                            <td><a href="user_profile.php">John Doe</a></td>
                            <td>
                                <span class="text-warning">
                                    &#9733; &#9733; &#9733; &#9733; &#9734;
                                </span>
                            </td>
                            <td>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product_details.php">
                                    <img src="../img/items/products/product2.webp" alt="Product 2" style="width: 50px; height: 50px; object-fit: cover;">
                                    <span class="ms-2">Product 2</span>
                                </a>
                            </td>
                            <td><a href="user_profile.php">Jane Smith</a></td>
                            <td>
                                <span class="text-warning">
                                    &#9733; &#9733; &#9733; &#9733; &#9733;
                                </span>
                            </td>
                            <td>
                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product_details.php">
                                    <img src="../img/items/products/product3.webp" alt="Product 3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <span class="ms-2">Product 3</span>
                                </a>
                            </td>
                            <td><a href="user_profile.php">Emily Johnson</a></td>
                            <td>
                                <span class="text-warning">
                                    &#9733; &#9733; &#9733; &#9734; &#9734;
                                </span>
                            </td>
                            <td>
                                Sed euismod nisi porta lorem mollis aliquam ut porttitor leo a diam sollicitudin tempor id eu nisl nunc.
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this review? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete_review_handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
