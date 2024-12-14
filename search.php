<?php include('header.php');
$search = $_GET['search'];
?>
<div class="container ">
    <div class="row align-items-center sitemap">
        <div class="col-6">
            <p class="mt-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
        </div>
        <div class="col-6 justify-content-end d-flex">
            <button class="primary-btn js-filter-btn"><i class="fa-solid fa-filter pe-2"></i>Filter</button>
        </div>
    </div>
    <?php
    include "filter.php";
    ?>
    <?php include "php/products-list.php"; ?>

</div>
<?php include('footer.php'); ?>