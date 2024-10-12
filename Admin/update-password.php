<?php
include('../DB/connection.php');

$password = $_POST['admin_password'];

$updateQuery = "UPDATE user_details_tbl SET Password = '$password' WHERE User_Id =" . $_SESSION['user_id'];
mysqli_query($con, $updateQuery);

header('Location: settings.php');
exit();