<?php
include('../DB/connection.php');

$email = $_POST['admin_email'];

$updateQuery = "UPDATE user_details_tbl SET Email = '$email' WHERE User_Id =" . $_SESSION['user_id'];
mysqli_query($con, $updateQuery);

header('Location: settings.php');
exit();
