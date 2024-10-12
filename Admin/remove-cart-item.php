<?php
    include "../DB/connection.php";
    $query = "delete from cart_details_tbl where Product_Id = ".$_GET['product_id']." and User_Id =". $_GET['user_id'];
    if(mysqli_query($con, $query)){
        echo "<script>
            alert('Item removed from cart successfully!');
            location.href='cart.php?user_id=".$_GET['user_id']."';
            </script>";
    }
    else{
        echo mysqli_error($con);
    }