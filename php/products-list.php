<div class="row justify-content-start align-items-stretch">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
            $isOutOfStock = $product['stock'] <= 0;
            // $wishlist =mysqli_fetch_assoc($wishlist_result);
    ?>
            <div class=" col-md-3 gap col-sm-4 p-2 col-6 mt-2">
                <div class="card h-100 <?php echo $isOutOfStock ? 'disabled-card' : ''; ?>">
                    <div class="product-image">
                        <a href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                            <img class="img-thumbnail p-4" style="height:300px;" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                        </a>
                        <a href="wishlist.php?product_id=<?php echo $product["Product_Id"]; ?>" class="like text-decoration-none"><i class="<?php $wishlist['User_Id'] == "" ? 'fa-regular' : 'fa-solid'; ?>fa-regular fa-heart"></i></a>
                        <?php if (!$isOutOfStock) {
                            echo "<div class='label'>Save $product[Discount]%</div>";
                        } else {
                            echo "<div class='label'>Out Of Stock</div>";
                        }
                        ?>
                    </div>
                    <div class="card-body product-body px-3">
                        <a class="category-name category-link" href="categories.php?category_id=<?php echo $product["Category_Id"]; ?>"><?php echo $product["Category_Name"]; ?></a>
                        <a class=" card-title category-link font-black" href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                            <h6 class=" not-link text-decoration-none"><?php echo $product["Product_Name"]; ?></h6>
                        </a>
                        <div class="rating-section">
                            <div class="ratings">
                                <span class="fa fa-star <?php echo $product['Average_Rating'] >= 1 ? 'checked' : ''; ?>"></span>
                                <span class="fa fa-star <?php echo $product['Average_Rating'] >= 2 ? 'checked' : ''; ?>"></span>
                                <span class="fa fa-star <?php echo $product['Average_Rating'] >= 3 ? 'checked' : ''; ?>"></span>
                                <span class="fa fa-star <?php echo $product['Average_Rating'] >= 4 ? 'checked' : ''; ?>"></span>
                                <span class="fa fa-star <?php echo $product['Average_Rating'] >= 5 ? 'checked' : ''; ?>"></span>
                            </div>
                            <div class="review-count ps-1">(<?php echo $product['Review_Count']; ?>)</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-sm-2 flex-sm-column flex-row align-items-sm-center flex-lg-row">
                            <div>
                                <span class="price">₹<?php echo $product["Price"]; ?></span>
                                <span class="striked-price">₹<?php echo $product["Sale_Price"]; ?></span>
                            </div>
                            <?php if ($product["stock"] > 0) { ?>
                                <a class="primary-btn order-link mt-sm-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2 "></i>Add</a>
                            <?php } else { ?>
                                <a class="primary-btn order-link mt-sm-1" disabled><i class="fa-solid fa-cart-shopping pe-2 "></i>Add</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    } else {
        echo "<h2>No products found.</h2>";
    }
    ?>
</div>