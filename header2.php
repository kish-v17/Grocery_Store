<?php
include('db-connection.php');
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
    "about.php" => "About PureBite",
    "order-history.php" => "Your orders",
    "order-details.php" => "Order details",
    "order-success.php" => "Order successful",
    "forgot-password.php" => "Forgot password?",
    "otp-page.php" => "OTP page",
    "product-details.php" => "Chocolate"

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
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav id="navibar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid">
        <div class="container-fluid">
            <button id="collapse-btn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="logo navbar-brand fs-1 fw-bold" style="color:#198754" href="index.php">PureBite</a>
                <ul class="links navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title == "Home" ? "active" : "" ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title == "Shop" ? "active" : "" ?>" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title == "Contact" ? "active" : "" ?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $title == "About PureBite" ? "active" : "" ?>" href="about.php">About</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-end align-items-center flex-sm-row flex-column">
                    <div class="d-flex justify-content-end align-items-center not-hidden" id="SearchSection2">
                        <form class="d-flex justify-content-end ">
                            <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar">
                            <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-between align-items-center justify-content-sm-between w-100">
                        <li class="nav-item ms-lg-auto dropdown profile-menu">
                            <i class="fa fa-user-circle"></i><a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tony Strak</a>
                            <ul id="pro-drop" class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="account.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="order-history.php">Your Orders</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                            </ul>
                        </li>
                        <div class="d-flex justify-content-end align-items-center justify-content-sm-center w-100">
                            <a href="wishlist.php" class="icon-link">
                                <div class="icon me-1">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="badge-class">3</span>
                                </div>
                            </a>
                            <a href="cart.php" class="icon-link">
                                <div class="icon me-1">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="badge-class">3</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center  hidden" id="SearchSection">
                <form class="d-flex justify-content-end">
                    <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar">
                    <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </nav>