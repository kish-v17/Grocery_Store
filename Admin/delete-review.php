<?php
    include "../DB/connection.php";
    $query = "delete from review_details_tbl where User_Id=" . $_GET["user_id"]." and Product_Id=" . $_GET["product_id"];
    if(mysqli_query($con,$query))
    {
        echo "<script>location.href='reviews.php';</script>";
    }
    else{
        echo mysqli_error($con);
    }