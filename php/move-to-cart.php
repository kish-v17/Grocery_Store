<?php
include("../DB/connection.php");
$product_id = $_GET["product_id"];
$user_id = $_SESSION["user_id"];

if (record_exists($user_id, $product_id, $con)) {
    echo "<script>location.replace('../cart.php');</script>";
    setcookie("success", "Item already in cart!", time() + 5, "/");
} else {
    $query = "INSERT INTO cart_details_tbl(Product_Id, Quantity, User_Id) VALUES ('$product_id',1, '$user_id')";
    if (mysqli_query($con, $query)) {
        $q = "delete from wishlist_details_tbl where Product_Id=$product_id and User_Id=$user_id";
        if (mysqli_query($con, $q)) {
            echo "<script>location.replace('../cart.php');</script>";
            setcookie("success", "Product moved to cart successfully!", time() + 5, "/");
        }
    } else {
        mysqli_error($con);
    }
}
function record_exists($user_id, $product_id, $con)
{
    $query = "select * from cart_details_tbl where User_Id=$user_id and Product_Id=$product_id";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}
