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
            $query = "select p.Product_Id, w.User_Id from product_details_tbl p left join wishlist_details_tbl w on p.Product_Id = w.Product_Id where User_Id=" . $_SESSION['User_Id'];
            include "php/products-list.php";
        ?>
    </div>
</div>
<?php include('footer.php'); ?>
