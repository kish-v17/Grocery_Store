<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <?php

                    if (isset($_GET['user_id'])) {
                        $userId = $_GET['user_id'];
                        $userQuery = "SELECT First_Name, Last_Name FROM user_details_tbl WHERE User_Id = $userId";
                        $userResult = mysqli_query($con, $userQuery);

                        if ($userResult && mysqli_num_rows($userResult) > 0) {
                            $userRow = mysqli_fetch_assoc($userResult);
                            $firstName = $userRow['First_Name'];
                            $lastName = $userRow['Last_Name'];
                            echo "<h1>Cart of $firstName $lastName</h1>";
                        }
                    }
                    ?>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>

                </div>
                <a class="btn btn-primary text-nowrap" href="add-cart.php?user_id=<?php echo $userId; ?>">Add Items</a>

            </div>
            <div class="card-body">
                <table class="table border text-nowrap align-middle">
                    <thead class="table-light">
                        <tr class="text-nowrap">
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cartQuery = "SELECT p.Product_Image, p.Product_Id, p.Product_Name, c.Quantity, p.Sale_Price-(p.Sale_Price*p.Discount/100) 'Price' 
                                      FROM cart_details_tbl c
                                      JOIN product_details_tbl p ON c.Product_Id = p.Product_Id
                                      WHERE c.User_Id = $userId";
                        $cartResult = mysqli_query($con, $cartQuery);

                        if ($cartResult && mysqli_num_rows($cartResult) > 0) {
                            while ($cartRow = mysqli_fetch_assoc($cartResult)) {
                                $productId = $cartRow['Product_Id'];
                                $productName = $cartRow['Product_Name'];
                                $quantity = $cartRow['Quantity'];
                                $price = $cartRow['Price'];
                                $total = $quantity * $price;
                                $product_image = $cartRow["Product_Image"];

                                echo "
                                    <tr>
                                        <td>
                                            <div class='d-flex align-items-center'>
                                                <img src='../img/items/products/$product_image' alt='$productName' style='width: 50px; height: 50px; object-fit: cover;' class='me-2'>
                                                <a href='view-product.php?product_id=$productId'>$productName</a>
                                            </div>
                                        </td>
                                        <td>$quantity</td>
                                        <td>₹$price</td>
                                        <td>₹$total</td>
                                        <td>
                                            <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$productId'>Remove</a>
                                        </td>
                                    </tr>

                                    <!-- Modal for each product -->
                                    <div class='modal fade' id='deleteModal$productId' tabindex='-1' aria-labelledby='deleteModalLabel$productId' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='deleteModalLabel$productId'>Confirm Removal</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    Are you sure you want to remove <strong>$productName</strong> from the cart? This action cannot be undone.
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                    <a href='remove-cart-item.php?product_id=$productId&user_id=$userId' class='btn btn-danger'>Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No items in the cart.</td></tr>";
                        }
                        ?>
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
<?php include("footer.php"); ?>
