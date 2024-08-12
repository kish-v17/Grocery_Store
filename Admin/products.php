<?php include("sidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                            <div>
                                <h1>Products</h1>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Products</li>
                                </ol>
                            </div>
                            <a class="btn btn-primary" href="add-product.php">Add Product</a>
                        </div>
                        <div class="card-body">
                            <table class="table border">
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
                                        <td>$25.00</td>
                                        <td>10%</td>
                                        <td>150</td>
                                        <td>50</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <a class="btn btn-success btn-sm" href="update-product.php">Update</a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Blueberry Muffin" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Blueberry Muffin</span>
                                        </td>
                                        <td>$15.00</td>
                                        <td>5%</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Chocolate Donut" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Chocolate Donut</span>
                                        </td>
                                        <td>$2.00</td>
                                        <td>0%</td>
                                        <td>300</td>
                                        <td>100</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Cookie Cake" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Cookie Cake</span>
                                        </td>
                                        <td>$25.00</td>
                                        <td>10%</td>
                                        <td>150</td>
                                        <td>50</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Blueberry Muffin" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Blueberry Muffin</span>
                                        </td>
                                        <td>$15.00</td>
                                        <td>5%</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Chocolate Donut" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Chocolate Donut</span>
                                        </td>
                                        <td>$2.00</td>
                                        <td>0%</td>
                                        <td>300</td>
                                        <td>100</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Cookie Cake" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Cookie Cake</span>
                                        </td>
                                        <td>$25.00</td>
                                        <td>10%</td>
                                        <td>150</td>
                                        <td>50</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Blueberry Muffin" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Blueberry Muffin</span>
                                        </td>
                                        <td>$15.00</td>
                                        <td>5%</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/cookiecake.webp" alt="Chocolate Donut" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">Chocolate Donut</span>
                                        </td>
                                        <td>$2.00</td>
                                        <td>0%</td>
                                        <td>300</td>
                                        <td>100</td>
                                        <td>Bakery</td> 
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
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
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="delete_product_handler.php" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php")?>