<?php
    include "../db/connection.php";
    $product_id = $_GET['product_id'];
    $query = "delete from product_details_tbl where Product_Id=$product_id";
    $sql = mysqli_query($con,$query);
    if($sql){
        ?>
        <script>
            location.href = "products.php";
        </script>
        <?php
    }