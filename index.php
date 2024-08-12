<?php include('header.php'); ?>

<div class="container">
    <div class="hero">
    
    </div>
    <section class=" mt-5">
        <h4>Featuerd products</h4>
        <div class="row justify-content-start pt-3">
            <?php display_products();?>
        </div>
        <div class="row">
            <div class="col-6 ps-2">
                <div class="ps-0 pe-2 py-2 border ms-0 banner-1">
                    <p>Free delivery</p>
                </div>
            </div>
            <div class="col-6 pe-2">
                <div class="pe-0 ps-2 py-2 border banner-2">
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>

<?php
    function display_products(){
        for($i=1;$i<=4;$i++)
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