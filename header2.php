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
        "register.php" => "Register to PureBite"
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <nav id="navibar" class="navbar navbar-expand-lg navbar-light sticky-top container-fluid">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="logo navbar-brand fs-1 fw-bold" style="color:#198754" href="index.php">PureBite</a>
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
                <form class="d-flex justify-content-end align-items-center gap-3">
                    <a href="profile.php"><img src="img/user-img/profile.jpg" class="profile" alt=""></a>
                    <a class="username" href="profile.php">Tony Stark</h5>
                </form>
            </div>
        </div>
    </nav>
