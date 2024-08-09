<?php
    $backtrace = debug_backtrace();
    $caller_file = basename($backtrace[0]['file']);
    $title_array = array(
        "index.php" => "Home",
        "contact.php" => "Contact",
        "account.php" => "My Profile"
    );

?>

<!-- HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_array[$caller_file] ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
</head>
<body>
    <!-- header will go here -->