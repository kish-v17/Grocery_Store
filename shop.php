<?php include('header.php'); ?>
    <div class="container sitemap ">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Shop</p>
        <div class="row justify-content-start">
            <?php display_products();?>
        </div>
    </div>
<?php include('footer.php'); ?>

<?php
    function display_products(){
        for($i=1;$i<=8;$i++)
        {
            echo '
            <div class=" col-md-3 gap col-sm-4 p-2 col-6">
                <div class="card">
                    <div class="product-image">
                        <img class="img-thumbnail p-4" src="img/items/chocolate.webp" alt="Card image cap">
                        <div class="like"><i class="fa-regular fa-heart"></i></div>
                        ';
                        if($i%3==0){
                            echo '<div class="label">Save 5%</div>';
                        }
                        echo 
                        '
                        <!--<button class=" primary-btn">Add to cart</button>-->
                    </div>
                    <div class="card-body product-body px-3">
                        <p class="category-name">Packed foods</p>
                        <h6 class="card-title">Chocolate</h6>
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
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <span class="price">₹100.00</span>
                                <span class="striked-price">₹150.00</span>
                            </div>
                            <a class="primary-btn order-link" href="cart.php"><i class="fa-solid fa-cart-shopping pe-2"></i>Add</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
?>