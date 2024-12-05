<?php
include('DB/connection.php');
if (isset($_SESSION["user_id"]) && $_SESSION['role'] == "admin") {
    echo "<script>
        window.location.href = 'Admin';
    </script>";
}
error_reporting(1);
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
    "order-histroy.php" => "Your orders",
    "order-details.php" => "Order details",
    "order-success.php" => "Order successful",
    "forgot-password.php" => "Forgot password?",
    "otp-page.php" => "OTP page",
    "product-details.php" => "Chocolate"
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
    <script src="js/bootstrap/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">


</head>
<?php
if (isset($_SESSION['user_id'])) {
    $query = "Select First_Name, Profile_Picture from user_details_tbl where User_Id=$_SESSION[user_id]";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    }

    $query = "select count(*) from cart_details_tbl where User_Id = " . $_SESSION['user_id'];
    $result = mysqli_query($con, $query);
    $cart_count = mysqli_fetch_array($result);
    $cart_count = $cart_count[0];

    $query = "select count(*) from wishlist_details_tbl where User_Id = " . $_SESSION['user_id'];
    $result = mysqli_query($con, $query);
    $wishlist_count = mysqli_fetch_array($result);
    $wishlist_count = $wishlist_count[0];

?>

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
                            <form class="d-flex justify-content-end" action="search.php" onsubmit="return validateSearch();">
                                <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar" name="search" value="<?php echo $_GET['search']; ?>">
                                <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="d-flex justify-content-between align-items-center justify-content-sm-between w-100">
                            <li class="nav-item dropdown profile-menu ms-lg-auto">
                                <a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/users/<?php echo $user['Profile_Picture']; ?>" alt="User Image" style="width: 45px; height: 45px; border-radius: 50%; margin-right: 10px;">
                                    <?php echo $user['First_Name']; ?>
                                </a>

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
                                        <span class="badge-class"><?php echo $wishlist_count; ?></span>
                                    </div>
                                </a>
                                <a href="cart.php" class="icon-link">
                                    <div class="icon me-1">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="badge-class"><?php echo $cart_count; ?></span>
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
    <?php } else { ?>

        <body>
            <nav id="navibar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid">
                <div class="container ">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between " id="navbarTogglerDemo01">
                        <a class="logo navbar-brand fs-1 fw-bold" href="index.php">PureBite</a>
                        <ul class="links navbar-nav mb-2 mb-lg-0 me-auto">
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
                                <a class="nav-link <?php echo $title == "About" ? "active" : "" ?>" href="about.php">About</a>
                            </li>
                        </ul>
                        <form class="d-flex flex-nowrap justify-content-end">
                            <input class="search-input" type="search" placeholder="Search for items..." size="25" id="SearchSection2">
                            <button class="primary-btn me-3 search-button" id="SearchSection3"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <a class="header-btn" href="register.php">Register</a>
                            <a class="header-btn" href="login.php">Login</a>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end align-items-center w-100 hidden" id="SearchSection">
                        <form class="d-flex justify-content-end width-100">
                            <input class="search-input" type="search" placeholder="Search for items..." size="25" id="searchBar">
                            <button class="primary-btn me-3 search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </nav>

        <?php }
        ?>
        <?php
        if (isset($_COOKIE['success']) || isset($_COOKIE['error'])) {
            $message = isset($_COOKIE['success']) ? $_COOKIE['success'] : $_COOKIE['error'];

            //         echo '
            // <div class="toast-container position-fixed end-0 p-3 ">
            //     <div class="toast align-items-center ' . (isset($_COOKIE['success']) ? 'bg-success' : 'bg-danger') . ' text-white border-0" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
            //         <div class="d-flex">
            //         <div class="toast-body">
            //             ' . $message . '
            //         </div>
            //         <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            //         </div>
            //     </div>
            // </div>
            // <script>
            //     window.onload = function() {
            //         var myToast = document.getElementById("myToast");
            //         var toast = new bootstrap.Toast(myToast);
            //         toast.show();
            //     };
            // </script>';
            echo '
        <div class="alert ' . (isset($_COOKIE['success']) ? 'alert-success' : 'alert-danger') . '" role="alert" id="myAlert">
            ' . $message . '
        </div>
        <script>
            setTimeout(()=>{
                const alert = bootstrap.Alert.getOrCreateInstance("#myAlert");
                alert.close();
            },3000);
        </script>
        ';
        }

        ?>