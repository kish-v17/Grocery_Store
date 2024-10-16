<?php include 'header.php'; 
$query = "select product.Product_Id, product.Product_Name, product.Product_Image, product.Description, product.Sale_Price, round(product.Sale_Price-(product.Sale_Price*product.Discount/100),2) 'Price', count(Rating) as 'Review_Count', round(avg(Rating)) as 'Rating' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id where product.Product_Id=".$_GET['product_id'];
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);
?>
    <div class="container sitemap mt-5">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="shop.php" class="text-decoration-none dim link">Shop /</a>
            <?php echo $product["Product_Name"]; ?>
        </p>

        <div class="row">
            <div class="col-md-5">
                <img src="img/items/products/<?php echo $product['Product_Image']?>" alt="Product image" class="img-thumbnail p-3 w-100">
            </div>
            <div class="col-md-7 d-flex flex-column px-5 align-items-start">
                <h4 class="product-title"><?php echo $product['Product_Name']?></h4>
                <div class="rating-section-description">
                    <div class="ratings">
                        <span class="fa fa-star <?php echo $product["Rating"]>=1?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=2?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=3?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=4?"checked":""; ?>"></span>
                        <span class="fa fa-star <?php echo $product["Rating"]>=5?"checked":""; ?>"></span>
                    </div>
                    <div class="review-count ps-1">
                            (<?php echo $product["Review_Count"]; ?>) 
                    </div>
                </div>
                <div class="product-description mt-3">
                    <?php echo $product['Description']?>
                </div>
                <div class="row align-items-center mt-3 w-100">
                    <div class="col-3">Price</div>
                    <div class="col-9 price">₹<?php echo $product['Price']?></div>
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
                    <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                    <input type="hidden" id="selectedQuantity" name="quantity">
                    <button class="add-to-cart-btn primary-btn w-100" type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h4 class="mb-4 text-center fw-bold">Customer Reviews</h4>
        <div class="row">
            <div class="col-6">
            <form method="post" onsubmit="return validateReviewForm();">
                <div>
                    <input type="hidden" name="product_id" value="<?php echo $product["Product_Id"]; ?>">
                    <label for="userRating" class="d-block">Rating</label>
                    <select class="form w-100 p-2 rounded" id="userRating" name="rating">
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
                    <textarea  id="userReview" class="w-100" rows="3" placeholder="Write your review" name="review" ></textarea>
                    <p id="userReviewError" class="text-danger"></p>
                </div>
                <button type="submit" class="primary-btn" name="add_review_btn">Leave a review</button>
            </form>
            </div>
            <div class="col-6">
                <div class="row">
                    <?php display_review($product,$con);?>
                </div>
            </div>
        </div>
       
        

        <h4 class="mt-5 mb-4 text-center fw-bold">More from PureBite</h4>
        <div class="d-flex justify-content-start mt-3">
            <?php display_products();?>
        </div>
    </div>

<?php 
    include('footer.php'); 

    if(isset($_POST['add_review_btn']))
    {
        $product_id = $_POST["product_id"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
        $user_id = isset($_SESSION["user_id"])?$_SESSION["user_id"]:5;

        $query = "insert into review_details_tbl values('$product_id', $user_id, $rating, '$review', NOW())";
        $sql = mysqli_query($con, $query);

        if($sql)
            echo "<script>alert('Response added successfully!');
        location.href=location;
            </script>";
        else    
            echo "<script>alert(".mysqli_error($con).")</script>";
    }

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

    function display_review($product,$con){
    $product_id =$product["Product_Id"];
    $query = "SELECT * FROM review_details_tbl as review left join user_details_tbl as user on user.User_Id = review.User_Id WHERE review.Product_Id='$product_id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while($review = mysqli_fetch_assoc($result)) {
            
            $rating = intval($review['Rating']); 
            $review_text = htmlspecialchars($review['Review']);
            $review_date = date('F j, Y', strtotime($review['Review_Date']));
            $stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
            
        
            $user_name = $review['First_Name'].' '.$review['Last_Name']; 
            
            echo '
            <div class="col-md-6 card mb-4 review-card">
                <div class="card-body">
                    <h5 class="card-title">'. htmlspecialchars($user_name) .'</h5>
                    <h6 class="card-subtitle mb-2 text-warning">'. $stars .'</h6>
                    <p class="card-text">'. $review_text .'</p>
                    <p class="text-muted mb-0"><small>Posted on '. $review_date .'</small></p>
                </div>
            </div>';
        }
    } else {
        echo '<p>No reviews yet for this product. Be the first to leave a review!</p>';
    }

    }
?>