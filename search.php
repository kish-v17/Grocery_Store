<?php include('header.php'); 
$search = $_GET['search'];

$search_query = " having product.Product_Id LIKE '%$search%' or product.Discount LIKE '%$search%' or product.Product_Name LIKE '%$search%' or category.Category_Name LIKE '%$search%' or  ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) LIKE '%$search%' or COALESCE(AVG(review.Rating), 0) LIKE '%$search%' or  COUNT(review.Review_Id) LIKE '%$search%' ";

$query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
FROM product_details_tbl AS product
LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
WHERE product.is_active = 1 
GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name,  product.Sale_Price $search_query
";
echo "<script>alert('$query')</script>";
$result = mysqli_query($con, $query);

?>
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
    <?php include "php/products-list.php"; ?>
    
</div>
<?php include('footer.php'); ?>
