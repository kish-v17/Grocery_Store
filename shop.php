<?php include('header.php'); ?>
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
    <div class="row justify-content-start">
        <?php
        display_products($con);
        ?>
    </div>
</div>
<?php include('footer.php'); ?>

<?php
function display_products($con)
{
    $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name , product.Sale_Price , round((product.Sale_Price-product.Sale_Price*product.Discount/100),2) as 'Price' from product_details_tbl as product left join category_details_tbl as category on product.Category_Id = category.Category_Id";
    $result = mysqli_query($con, $query);

    while ($product = mysqli_fetch_assoc($result)) {
?>
        <div class=" col-md-3 gap col-sm-4 p-2 col-6 mt-2">
            <div class="card">
                <div class="product-image">
                    <a href="product-details.php?id=1">
                        <img class="img-thumbnail p-4" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                    </a>
                    <div class="like"><i class="fa-regular fa-heart"></i></div>
                    <div class="label">Save <?php echo $product["Discount"]; ?>%</div>
                </div>
                <div class="card-body product-body px-3">
                    <p class="category-name"><?php echo $product["Category_Name"]; ?></p>
                    <h6 class="card-title not-link text-decoration-none"><?php echo $product["Product_Name"]; ?></h6>
                    <div class="rating-section">
                        <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="review-count ps-1">(95)</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-sm-2 flex-sm-column flex-row align-items-sm-center flex-lg-row">
                        <div>
                            <span class="price">₹<?php echo $product["Price"]; ?></span>
                            <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                        </div>
                        <a class="primary-btn order-link mt-sm-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2 "></i>Add</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>