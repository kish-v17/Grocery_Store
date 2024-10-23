<?php include 'header.php'; 

$user_id = $_SESSION['user_id'];
$product_id = $_GET['product_id'];

$query = "select product.Product_Id, product.Product_Name, product.Product_Image, product.Description, product.Sale_Price, round(product.Sale_Price-(product.Sale_Price*product.Discount/100),2) 'Price', count(Rating) as 'Review_Count', round(avg(Rating)) as 'Rating' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id where product.Product_Id=".$_GET['product_id'];
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);
// $category_id = $product[""]

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
            <?php 
            if(isset($_SESSION['user_id']))
            {
                $query = "select count(*) from order_details_tbl as od
                left join order_header_tbl as oh ON od.Order_Id = oh.Order_Id 
                where Product_Id=$product_id and User_Id IS NOT NULL and User_Id=$user_id ";
            $result = mysqli_query($con, $query);
            $orderCount = mysqli_fetch_array($result);
            $hasOrdered = $orderCount[0]>0 ? true : false;

            }
              
                if($hasOrdered)
                {
                    ?>
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
                            <?php
                }
                else
                {
                    ?>
                    <div class="col-6 d-flex  justify-content-center">
                        <h5>You need to order first to give review on this product!</h5>
                    </div>
                    <?php
                }
            ?>
            <div class="col-6">
                <div class="row align-items-stretch">
                    <?php display_review($product,$con);?>
                </div>
            </div>
        </div>
       
        

        <!-- <h4 class="mt-5 mb-4 text-center fw-bold">More from PureBite</h4>
        <div class="row justify-content-start">
            <?php
                // $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
                // FROM product_details_tbl AS product
                // LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
                // LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
                // WHERE product.is_active = 1
                // GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name,  product.Sale_Price
                // ";
                // $result = mysqli_query($con, $query);
                // include "php/products-list.php";
            ?>
        </div> -->
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


    function display_review($product,$con){

    $product_id =$product["Product_Id"];
    $query = "SELECT 
        r.Review_Id, r.Rating, r.Review, r.Review_Date, 
        p.Product_Id, p.Product_Name, p.Product_Image, 
        u.User_Id, u.First_Name, u.Last_Name,
        r1.Review_Id as 'Reply_Id', r1.Review as 'Reply' 
    FROM review_details_tbl r
    JOIN product_details_tbl p ON r.Product_Id = p.Product_Id
    JOIN user_details_tbl u ON r.User_Id = u.User_Id
    left join review_details_tbl r1 on r.Review_Id = r1.Reply_To
    where p.is_active=1 and p.Product_Id=$product_id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while($review = mysqli_fetch_assoc($result)) {
            
            $rating = intval($review['Rating']); 
            $review_text = $review['Review'];
            $review_date = date('F j, Y', strtotime($review['Review_Date']));
            $stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
            $reply= $review["Reply"];
        
            $user_name = $review['First_Name'].' '.$review['Last_Name']; 
            
            echo '
            <div class="col-md-6 mb-4">
            <div class="review-card  card h-100">
                <div class="card-body">
                    <h5 class="card-title">'. $user_name .'</h5>
                    <h6 class="card-subtitle mb-2 text-warning">'. $stars .'</h6>
                    <p class="card-text">'. $review_text .'</p>
                    <p class="text-muted mb-0"><small>Posted on '. $review_date .'</small></p>
                </div>
                ';
                if(isset($review['Reply_Id']))
                {
                    $reply_text = $review["Reply"];
                    echo '<div class="card-body ">
                    <h5 class="card-title">Admin</h5>
                    <p class="card-text ms-5">'. $reply_text .'</p>
                </div>';
                }
                echo '
            </div>
            </div>';
        }
    } else {
        echo '<p>No reviews yet for this product. Be the first to leave a review!</p>';
    }

    }
?>