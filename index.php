<?php include 'header.php'; 
    $query = "SELECT `Banner_Image` FROM `banner_details_tbl` WHERE Active_Status=1 and View_Order>0 order by View_Order";
    $result = mysqli_query($con, $query);
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php
        $i=0;
        while($banner = mysqli_fetch_assoc($result))
        {
            ?>
            <div class="carousel-item <?php echo $i==0?'active':''; ?>">
                <img class="d-block w-100" src="img/banners/<?php echo $banner['Banner_Image']?>" alt="First slide">
                <?php if($i==0){?>
                    <div class="carousel-caption h-100 justify-content-center flex d-md-block ">
                    <div class="row align-items-center flex h-100">
                    <div class="hero-content col-md-6 order-md-1 order-2 text-center text-md-start text-wrap justify-content-center text-black">
                        <span>Welcome to</span>
                        <h1 class="text-black" style="color:black !important;">PureBite</h1>
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
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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
        <div class="d-flex gap-2">
            <div class="active">All</div>
            <div>Vegetables</div>
            <div>Fruits</div>
            <div>Coffee & teas</div>
            <div>Namkeen</div>
        </div>
    </div>
    <div class="row justify-content-start">
        <?php
            $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name , product.Sale_Price , round((product.Sale_Price-product.Sale_Price*product.Discount/100),2) as 'Price' from product_details_tbl as product left join category_details_tbl as category on product.Category_Id = category.Category_Id where is_active=1";
            $result = mysqli_query($con, $query);
        
            while ($product = mysqli_fetch_assoc($result)) {
        ?>
                <div class=" col-md-3 gap col-sm-4 p-2 col-6 mt-2">
                    <div class="card">
                        <div class="product-image">
                            <a href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                                <img class="img-thumbnail p-4" style="height:300px;" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
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
        ?>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 col-6 ps-2 pe-2">
            <div class="border position-relative banner">
                <img src="img/banners/<?php echo $banner1['Banner_Image']; ?>" alt="" class="img-fluid">
                <div class="banner-content">
                    <p class="label">Free delivery</p>
                    <h5 class="heading">Free shipping over ₹<?php echo $offer1['Minimum_Order']; ?></h5>
                    <p class="content">Shop ₹<?php echo $offer1['Minimum_Order']; ?> products and get free delivery anywhere</p>
                    <button class="primary-btn">Shop Now <i class='fas fa-arrow-right ms-2'></i></button>
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
                    <button class="primary-btn">Order Now <i class='fas fa-arrow-right ms-2'></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center featured-products mt-5 ">
        <div class="d-flex align-items-center gap-5">
            <h4>Daily Best Sales</h4>
            <div class="label-red">Expires in:10:56:21</div>
        </div>

        <div class="d-md-flex gap-2 d-none">
            <div class="active">All</div>
            <div>Vegetables</div>
            <div>Fruits</div>
            <div>Coffee & teas</div>
            <div>Namkeen</div>
        </div>
    </div>
    <div class="row justify-content-start">
        <?php
            $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name , product.Sale_Price , round((product.Sale_Price-product.Sale_Price*product.Discount/100),2) as 'Price' from product_details_tbl as product left join category_details_tbl as category on product.Category_Id = category.Category_Id where is_active=1";
            $result = mysqli_query($con, $query);
        
            while ($product = mysqli_fetch_assoc($result)) {
        ?>
            <div class=" col-md-3 gap col-sm-4 p-2 col-6">
                <div class="card">
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
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="review-count ps-1">(95)</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mb-2 mt-sm-2">
                            <div>
                                <span class="price">₹<?php echo $product["Price"]; ?></span>
                                <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                            </div>
                        </div>
                        <div class="sold">Sold: 20/50</div>
                        <a class=" order-link d-block cart-btn" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</section>
<?php include('footer.php'); ?>

