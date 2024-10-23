<?php include('header.php'); ?>
<div class="container ">
    <div class="row align-items-center sitemap">
        <div class="col-6">
            <p class="mt-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
        </div>
        <div class="col-6 justify-content-end d-flex">
            <button class="primary-btn js-filter-btn"><i class="fa-solid fa-filter pe-2"></i>Filter</button>
        </div>
    </div>
    <?php
    include "filter.php";
    ?>
    <div class="row justify-content-start">
        <?php
            $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count', category.Category_Id
            FROM product_details_tbl AS product
            LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
            LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
            WHERE product.is_active = 1
            GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name,  product.Sale_Price
            ";
            $result = mysqli_query($con, $query);
            $total_records = mysqli_num_rows($result);
            
            $records_per_page = 8;
            $total_pages = ceil($total_records / $records_per_page);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_from = ($page - 1) * $records_per_page;
            
            $query .= " LIMIT $start_from, $records_per_page ";
            $result = mysqli_query($con, $query);
            $query = "select p.Product_Id, w.User_Id from product_details_tbl p left join wishlist_details_tbl w on p.Product_Id = w.Product_Id where w.User_Id=" . $_SESSION['user_id'];
            // $wishlist_result = mysqli_query($con,$query);

            include "php/products-list.php";
            ?>
            <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."'>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."'>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 
        
    </div>
</div>
<?php include('footer.php'); ?>
