<div class="row justify-content-start">
    <?php
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
                            <span class="fa fa-star <?php echo $product['Average_Rating']>=1?'checked':''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating']>=2?'checked':''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating']>=3?'checked':''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating']>=4?'checked':''; ?>"></span>
                            <span class="fa fa-star <?php echo $product['Average_Rating']>=5?'checked':''; ?>"></span>
                        </div>
                        <div class="review-count ps-1">(<?php echo $product['Review_Count']; ?>)</div>
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