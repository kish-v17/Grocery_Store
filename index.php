<?php include('header.php'); ?>

    <div class="hero">
    <div class="hero-text"> <span>PUREBITE</span> Taste the Goodness </div>
    <img src="img\items\banners\Hero-img.png" class="image" alt="">
    </div>
    <section class=" mt-5 container">
        <div class="d-flex justify-content-between featured-products">
            <h4 >Featuerd products</h4>
            <div class="d-flex gap-2">
                <div class="active">All</div>
                <div>Vegetables</div>
                <div>Fruits</div>
                <div>Coffee & teas</div>
                <div>Namkeen</div>
            </div>
        </div>
        <div class="row justify-content-start pt-3">
            <?php display_products();?>
        </div>
        <div class="row mt-5">
            <div class="col-6 ps-2 pe-2">
                <div class="border ms-0 banner-1">
                    <p class="label">Free delivery</p>
                    <h5 class="heading">Free shipping over ₹500</h5>
                    <p class="content">Shop ₹500 products and get free delivery anywhere</p>
                    <button class="primary-btn">Shop Now <i class='fas fa-arrow-right ms-2'></i></button>
                </div>
            </div>
            <div class="col-6 pe-2 ps-2">
                <div class="border banner-2">
                    <p class="label">60% off</p>
                    <h5 class="heading">Organic Food</h5>
                    <p class="content">Save up to 60% off on your first order</p>
                    <button class="primary-btn">Order Now <i class='fas fa-arrow-right ms-2'></i></button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center featured-products mt-5">
            <div class="d-flex align-items-center gap-5">
                <h4 >Daily Best Sales</h4>
                <div class="label-red">Expires in: 10:56:21</div>
            </div>

            <div class="d-flex gap-2">
                <div class="active">All</div>
                <div>Vegetables</div>
                <div>Fruits</div>
                <div>Coffee & teas</div>
                <div>Namkeen</div>
            </div>
        </div>
        <div class="row justify-content-start pt-3">
            <?php display_products2();?>
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
    function display_products2(){
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
                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <div>
                                <span class="price">₹100.00</span>
                                <span class="striked-price">₹150.00</span>
                            </div>
                        </div>
                        <div class="sold">Sold: 20/50</div>
                        <a class=" order-link d-block cart-btn" href="cart.php"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart</a>
                    </div>
                </div>
            </div>
            ';
        }
    }
?>