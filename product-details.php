<?php  $title="Product Details"; include('header.php'); ?>
    <div class="container sitemap">
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
            <div class="review-section my-5 col-6">
            <h3>Leave a Review</h3>
            <form action="" method="">
                <div class="mb-3">
                    <label for="rating" class="form-label">Your Rating:</label>
                    <div class="rating">
                        <i class="fa fa-star star" data-value="1"></i>
                        <i class="fa fa-star star" data-value="2"></i>
                        <i class="fa fa-star star" data-value="3"></i>
                        <i class="fa fa-star star" data-value="4"></i>
                        <i class="fa fa-star star" data-value="5"></i>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0">

                </div>
                <div class="mb-3">
                    <label for="review" class="form-label">Your Review:</label>
                    <div class="flex">
                            <textarea name="message" id="contactMessage" class="flex-item"  rows="5" placeholder="Your Message*"></textarea>
                    </div>              
                 </div>
                <button type="submit" class="primary-btn">Submit Review</button>
            </form>
        </div>
        
</div>

        </div>
        
    </div>
<?php include('footer.php'); ?>