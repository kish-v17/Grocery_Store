<?php 
include 'header.php'; 

// Query for banners
$query = "SELECT `Banner_Image` FROM `banner_details_tbl` WHERE Active_Status=1 AND View_Order > 0 ORDER BY View_Order";
$result = mysqli_query($con, $query);
$total_banners = mysqli_num_rows($result);
?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <?php 
    for ($i = 0; $i < $total_banners; $i++) {
        echo '<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" class="'.($i == 0 ? 'active' : '').'"></li>';
    }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
        $result = mysqli_query($con, $query);
        $i = 0;
        while ($banner = mysqli_fetch_assoc($result)) {
            ?>
            <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                <img class="d-block w-100" src="img/banners/<?php echo $banner['Banner_Image']; ?>" alt="Banner <?php echo $i + 1; ?>">
                
                <?php if ($i == 0) { ?>
                    <div class="carousel-caption h-100 justify-content-center flex d-md-block">
                        <div class="row align-items-center flex h-100">
                            <div class="hero-content col-md-6 order-md-1 order-2 text-center text-md-start text-wrap justify-content-center text-black">
                                <span>Welcome to</span>
                                <h1 class="text-black" style="color: black !important;">PureBite</h1>
                                <p>Discover a world of fresh, quality groceries delivered straight to your door. From farm-fresh produce to pantry essentials, we bring convenience and freshness to your daily life.</p>
                                <a href="shop.php" class="cta-button btn btn-primary text-center align-self-sm-center align-self-md-start">Explore</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>   
            </div>
            <?php
            $i++;
        }
    ?>
  </div>

  <?php 
  if ($total_banners >= 2) {
      echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>';
  }
  ?>
</div>

<?php 
    $query = "SELECT `Discount`, `Minimum_Order` FROM `offer_details_tbl` WHERE `offer_type`=1 and `active_status`=1";
    $result = mysqli_query($con, $query);

    #offer 1
    $offerQuery = "SELECT `Discount`, `Minimum_Order` FROM `offer_details_tbl` WHERE `offer_type`=3";
    $offerResult = mysqli_query($con,$offerQuery);
    $offer1 = mysqli_fetch_assoc($offerResult);

    #offer2
    $offerQuery = "SELECT `Discount`, `Discount` FROM `offer_details_tbl` WHERE `offer_type`=2";
    $offerResult = mysqli_query($con,$offerQuery);
    $offer2 = mysqli_fetch_assoc($offerResult);

    #banner1
    $bannerQuery = "SELECT `Banner_Image` FROM `banner_details_tbl` WHERE View_Order=-1";
    $bannerResult = mysqli_query($con, $bannerQuery);
    $banner1 = mysqli_fetch_assoc($bannerResult);

    #banner2
    $bannerQuery = "SELECT `Banner_Image` FROM `banner_details_tbl` WHERE View_Order=-2";
    $bannerResult = mysqli_query($con, $bannerQuery);
    $banner2 = mysqli_fetch_assoc($bannerResult);
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Exclusive Offers</h2>
    <div class="row">
        <?php   
            while($offer = mysqli_fetch_assoc($result))
            {
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success"><?php echo $offer['Discount']; ?>% Discount</h5>
                            <p class="card-text">On orders above ₹<?php echo $offer['Minimum_Order']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

<section class=" mt-5 container">
    <div class="d-flex justify-content-between featured-products">
        <h4>Featuerd products</h4>
        <!-- <div class="d-flex gap-2">
            <div class="active">All</div>
            <div>Vegetables</div>
            <div>Fruits</div>
            <div>Coffee & teas</div>
            <div>Namkeen</div>
        </div> -->
    </div>
    <?php
        $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price',COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count'
        FROM product_details_tbl AS product
        LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
        LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
        WHERE product.is_active = 1
        GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name,  product.Sale_Price
        ";
             $result = mysqli_query($con, $query);
             $total_records = mysqli_num_rows($result);
             
             $records_per_page = 8;
             $total_pages = ceil($total_records / $records_per_page);
             $page = isset($_GET['page']) ? $_GET['page'] : 1;
             $start_from = ($page - 1) * $records_per_page;
             
             $query .= " LIMIT $start_from, $records_per_page ";
             $result = mysqli_query($con, $query);
             $query = "select p.Product_Id, w.User_Id from product_details_tbl p left join wishlist_details_tbl w on p.Product_Id = w.Product_Id where w.User_Id=" . $_SESSION['user_id'];
            //  $wishlist_result = mysqli_query($con,$query);
 
        include "php/products-list.php";?>
        <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."'>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."'>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 
    
    <div class="row mt-5">
        <div class="col-md-6 col-6 ps-2 pe-2">
            <div class="border position-relative banner">
                <img src="img/banners/<?php echo $banner1['Banner_Image']; ?>" alt="" class="img-fluid">
                <div class="banner-content">
                    <p class="label">Free delivery</p>
                    <h5 class="heading">Free shipping over ₹<?php echo $offer1['Minimum_Order']; ?></h5>
                    <p class="content">Shop ₹<?php echo $offer1['Minimum_Order']; ?> products and get free delivery anywhere</p>
                    <a class="primary-btn order-link" href="shop.php">Shop Now <i class='fas fa-arrow-right ms-2'></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-6 pe-2 ps-2">
            <div class="border position-relative banner">
                <img src="img/banners/<?php echo $banner2['Banner_Image']; ?>" alt="" class="img-fluid">
                <div class="banner-content">
                    <p class="label"><?php echo $offer2['Discount']; ?>% off</p>
                    <h5 class="heading">Organic Food</h5>
                    <p class="content">Save up to <?php echo $offer2['Discount']; ?>% off on your first order</p>
                    <a class="primary-btn order-link" href="shop.php">Shop Now <i class='fas fa-arrow-right ms-2'></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center featured-products mt-5 ">
        <div class="d-flex align-items-center gap-5">
            <h4>Best selling products</h4>
            <!-- <div class="label-red">Expires in:10:56:21</div> -->
        </div>

        <!-- <div class="d-md-flex gap-2 d-none">
            <div class="active">All</div>
            <div>Vegetables</div>
            <div>Fruits</div>
            <div>Coffee & teas</div>
            <div>Namkeen</div>
        </div> -->
    </div>
    <div class="row justify-content-start align-items-stretchs">
        <?php
                  $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price', COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count', COALESCE(SUM(order_tbl.Quantity), 0) AS 'Sold_Quantity' FROM product_details_tbl AS product LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id LEFT JOIN order_details_tbl AS order_tbl ON product.Product_Id = order_tbl.Product_Id WHERE product.is_active = 1 GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price order by Sold_Quantity desc";
                  $result = mysqli_query($con, $query);
                 $total_records = mysqli_num_rows($result);
                 
                 $records_per_page = 8;
                 $total_pages = ceil($total_records / $records_per_page);
                 $page = isset($_GET['page']) ? $_GET['page'] : 1;
                 $start_from = ($page - 1) * $records_per_page;
                 
                 $query .= " LIMIT $start_from, $records_per_page ";
                 $result = mysqli_query($con, $query);
                 $query = "select p.Product_Id, w.User_Id from product_details_tbl p left join wishlist_details_tbl w on p.Product_Id = w.Product_Id where w.User_Id=" . $_SESSION['user_id'];
                //  $wishlist_result = mysqli_query($con,$query);
     
            while ($product = mysqli_fetch_assoc($result)) {
        ?>
            <div class=" col-md-3 gap col-sm-4 p-2 col-6">
                <div class="card h-100">
                    <div class="product-image">
                            <a href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                                <img class="img-thumbnail p-4" style="height:300px;" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                            </a>
                        <div class="like"><i class="fa-regular fa-heart"></i></div>
                        <div class="label">Save <?php echo $product["Discount"]; ?>%</div>

                        <!--<button class=" primary-btn">Add to cart</button>-->
                    </div>
                    <div class="card-body product-body px-3">
                        <p class="category-name"><?php echo $product["Category_Name"]; ?></p>
                        <h6 class="card-title not-link text-decoration-none"><?php echo $product["Product_Name"]; ?></h6>
                            
                            <div class="rating-section">
                                <div class="ratings">
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=1?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=2?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=3?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=4?'checked':''; ?>"></span>
                                    <span class="fa fa-star <?php echo $product['Average_Rating']>=5?'checked':''; ?>"></span>
                                </div>
                                <div class="review-count ps-1">(<?php echo $product['Review_Count']; ?>)</div>
                            </div>
                        <div class="d-flex justify-content-between align-items-end mb-2 mt-sm-2">
                            <div>
                                <span class="price">₹<?php echo $product["Price"]; ?></span>
                                <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                            </div>
                        </div>
                        <!-- <div class="sold">Sold: 20/50</div> -->
                        <a class=" order-link d-block cart-btn" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."'>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."'>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 
    </div>
</section>
<?php include('footer.php'); ?>

