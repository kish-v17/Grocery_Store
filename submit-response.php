<?php 
    include 'DB/connection.php';
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $phone = $_POST['contactPhone'];
    $message = $_POST['contactMessage'];

    $query = "INSERT INTO responses_tbl (Name, Email, Phone, Message) VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($con, $query)) {
        setcookie('success', "Message sent successfully!", time() + 5, "/");
        echo "<script>location.replace('contact.php');</script>";
    } else {
        setcookie('error', mysqli_error($con), time() + 5, "/");
        echo "<script>location.replace('contact.php');</script>";
    }
?>