<?php   
    include "../DB/connection.php";
    $review_id = $_POST["review_id"];
    $reply = $_POST["reply"];
    $user_id = $_SESSION["user_id"];
    $query = "INSERT INTO `review_details_tbl`( `Reply_To`, `User_Id`, `Review`, `Review_Date`) VALUES ($review_id,'$user_id','$reply',NOW())";
    mysqli_query($con,$query);
    echo "<script>
        alert('Reply added successfully!');
        history.back();
    </script>
    ";
    exit();
