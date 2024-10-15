<?php
header('Content-Type: application/json');
include "../DB/connection.php";
$productQuery = "SELECT Product_Id, Product_Name FROM product_details_tbl WHERE is_active = 1";
$productResult = mysqli_query($con, $productQuery);

$products = [];
if (mysqli_num_rows($productResult) > 0) {
    while ($productRow = mysqli_fetch_assoc($productResult)) {
        $products[] = $productRow;
    }
}
echo json_encode($products);