<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Cart of John Doe</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                        <li class="breadcrumb-item active">cart</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap align-middle">
                    <thead class="table-light">
                        <tr class="text-nowrap">
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php display_cart_records(); ?>
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
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Removal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove this item from the cart? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>

<?php
    function display_cart_records(){
        for($i=1;$i<=10;$i++)
        {
            echo '
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="../img/items/chocolate.webp" alt="Product 1" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                            <a href="view-product.php?productId=1">Turmeric Powder</a>
                        </div>
                    </td>
                    <td>
                        2
                    </td>
                    <td>₹100</td>
                    <td>₹200</td>
                </tr>
            ';
        }
    }
?>