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
                <a class="btn btn-primary text-nowrap" href="add-product.php">Add Product</a>
            </div>
            <?php
                if(get_products_count($con)){?>
            <div class="card-body">
                <table class="table border text-nowrap">
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
                        <?php display_products($con); ?>
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
                <?php
                }
                else{
                    echo "<h3 class='text-center'>There is no product to display!</h3>";
                }
            ?>

        </div>
    </main>
<?php include("footer.php");
    function get_products_count($con){
        $query = "select count(*) from product_details_tbl";
        $result = mysqli_query($con,$query);
        $product_count = mysqli_fetch_array($result);
        return $product_count[0];
    }
    function display_products($con)
    {
        $query = "SELECT product.Discount,product.Product_Name,product.Product_Id,product.Product_Image,category.Category_Name,product.Sale_Price, product.stock,count(o.Order_Id) as Sold_Quantity FROM category_details_tbl as category right join `product_details_tbl` as product on category.Category_Id = product.category_Id left join order_details_tbl as o on product.Product_Id = o.Product_Id group by Product_Id;";
        $result = mysqli_query($con, $query);

        while($product = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <img src="../img/items/products/<?php echo $product['Product_Image']; ?>" alt="<?php echo $product['Product_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                    <span class="ms-2"><?php echo $product['Product_Name']; ?></span>
                </td>
                <td>₹<?php echo $product['Sale_Price']; ?></td>
                <td><?php echo $product['Discount']; ?>%</td>
                <td><?php echo $product['Sold_Quantity']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><?php echo $product['Category_Name']; ?></td>
                <td>
                    <div class="d-flex flex-nowrap">
                        <a class="btn btn-info btn-sm me-1" href="view-product.php?product_id=<?php echo $product['Product_Id']; ?>">View</a>
                        <a class="btn btn-success btn-sm me-1" href="update-product.php?product_id=<?php echo $product['Product_Id']; ?>">Update</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $product['Product_Id']; ?>" data-id="<?php echo $product['Product_Id']; ?>">Delete</button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal<?php echo $product['Product_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                            <a href="delete-product.php?product_id=<?php echo $product['Product_Id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>
