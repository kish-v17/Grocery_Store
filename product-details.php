<?php include('header2.php'); ?>
    <div class="container sitemap mt-5">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="shop.php" class="text-decoration-none dim link">Shop /</a>
            Chocolate
        </p>

        <div class="row">
            <div class="col-md-5">
                <img src="img/items/chocolate.webp" alt="Product image" class="img-thumbnail p-3">
            </div>
            <div class="col-md-7 d-flex flex-column px-5 align-items-start">
                <h4 class="product-title">5-Star Chocolate</h4>
                <div class="rating-section-description">
                    <div class="ratings">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="review-count ps-1">
                            (95) 
                            <!-- <span class="mx-1">|</span>
                            <span class="green mx-1">In Stock</span> -->
                    </div>
                </div>
                <div class="product-description mt-3">
                    Five Star Cadbury is a deliciously indulgent chocolate bar with a rich, creamy caramel center wrapped in smooth Cadbury milk chocolate. Its unique combination of chewy caramel and chocolate creates a satisfyingly sweet and gooey experience. Perfect for a treat anytime you crave a little sweetness!
                </div>
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Price</div>
                    <div class="col-9 price">₹100.00</div>
                </div>
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3 mt-">Quantity</div>
                    <div class="col-9 quantity d-flex flex-wrap">
                        <div onclick="selectQuantity(this, 1)">1</div>
                        <div onclick="selectQuantity(this, 2)">2</div>
                        <div onclick="selectQuantity(this, 3)">3</div>
                        <div onclick="selectQuantity(this, 4)">4</div>
                        <div onclick="selectQuantity(this, 5)">5</div>
                    </div>
                </div>
                <form action="cart.php" class="w-100 mt-4">
                    <input type="hidden" id="selectedQuantity" name="quantity" value="">
                    <button class="add-to-cart-btn primary-btn w-100" type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h4 class="mb-4 text-center fw-bold">Customer Reviews</h4>
        <div class="row">
            <div class="col-6">
            <form  onsubmit="return validateReviewForm();">
                <div >
                    <label for="userRating" class="d-block">Rating</label>
                    <select class="form w-100 p-2 rounded" id="userRating">
                        <option value="">Select rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                    <p id="userRatingError" class="text-danger"></p>
                </div>
                <div >
                    <label for="userReview " class="d-block">Review</label>
                    <textarea  id="userReview" class="w-100" rows="3" placeholder="Write your review"></textarea>
                    <p id="userReviewError" class="text-danger"></p>
                </div>
                <button class="primary-btn">Leave a review</button>
            </form>
            </div>
            <div class="col-6">
                <div class="row">
                    <?php display_review();?>
                </div>
            </div>
        </div>
       
        

        <h4 class="mt-5 mb-4 text-center fw-bold">More from PureBite</h4>
        <div class="d-flex justify-content-start mt-3">
            <?php display_products();?>
        </div>
    </div>


<?php include('footer.php'); 
    function display_products(){
        for($i=1;$i<=4;$i++)
        {
            echo '
            <div class="col-md-3 gap col-sm-4 pe-3 col-12">
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

    function display_review(){
        for($i=1;$i<=4;$i++)
        {
            echo '
            <div class="col-md-6 card mb-4 review-card">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <h6 class="card-subtitle mb-2 text-warning">★★★★☆</h6>
                    <p class="card-text">This product is really fresh and tastes great! Will definitely buy again.</p>
                    <p class="text-muted mb-0"><small>Posted on August 19, 2024</small></p>
                </div>
            </div>';
        }
    }
?>