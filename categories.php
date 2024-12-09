<?php include('header.php'); 
    $category_id = $_GET['category_id'];
    $query = "select Category_Name from category_details_tbl where Category_Id = $category_id";
    $result = mysqli_query($con, $query);
    $category=mysqli_fetch_assoc($result);
    $category_name = $category['Category_Name'];
    $sitemap ="<a href='categories.php?category_id=$category_id' class='text-decoration-none dim link'>/ $category_name</a>";
?>
<div class="container ">
    <div class="row align-items-center sitemap">
        <div class="col-6">
            <p class="mt-5"><a href="index.php" class="text-decoration-none dim link">Home </a> <?php echo $sitemap; ?></p>
        </div>
        <div class="col-6 justify-content-end d-flex">
            <button class="primary-btn js-filter-btn"><i class="fa-solid fa-filter pe-2"></i>Filter</button>
        </div>
    </div>
    <?php include "filter.php"; ?>
    <div class="row justify-content-start">
        <?php include "php/products-list.php"; ?>
    </div>
</div>
<?php include('footer.php'); ?>
