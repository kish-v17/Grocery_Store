<?php
    error_reporting(0);
    $backtrace = debug_backtrace();
    $caller_file = basename($backtrace[0]['file']);
    $title_array = array(
        "index.php" => "Home",
        "contact.php" => "Contact",
        "account.php" => "My Profile",
        "checkout.php" => "Checkout",
        "cart.php" => "Cart"
    );
    $title = $title_array[$caller_file];
?>

<!-- HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
</head>
<body>
    <div class="mx-5 text-center border">
        <h1 class="p-3">Header</h1>
    </div>