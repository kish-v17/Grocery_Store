<?php
    error_reporting(0);
    $backtrace = debug_backtrace();
    $caller_file = basename($backtrace[0]['file']);
    $title_array = array(
        "index.php" => "Home",
        "contact.php" => "Contact",
        "account.php" => "My Profile",
        "checkout.php" => "Checkout",
        "cart.php" => "Cart",
        "shop.php" => "Shop",
        "login.php" => "Log in to PureBite",
        "register.php" => "Register to PureBite",
        "wishlist.php" => "Your Favourites",
        "order-history.php" => "Order History"
    );
    $title = $title_array[$caller_file];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav id="navibar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="logo navbar-brand fs-1 fw-bold"  href="index.php">PureBite</a>
            <ul class="links navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $title=="Home"?"active":""?>" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $title=="Shop"?"active":""?>" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $title=="Contact"?"active":""?>" href="contact.php">Contact</a>
                </li>
            </ul>
            <form class="d-flex flex-wrap justify-content-end">
                <div class="search d-flex justify-content-center align-items-center ">
                    <input class="search-input" type="search" placeholder="Search for items..." size="25" >
                    <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="log-reg d-flex justify-content-center align-items-center">
                    <a class="header-btn"  href="register.php">Register</a>
                    <a class="header-btn"  href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</nav>