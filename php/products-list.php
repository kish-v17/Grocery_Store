<div class="row justify-content-start align-items-stretch">
    <?php
    $query = "SELECT product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, 
    ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) AS 'Price', 
    COALESCE(AVG(review.Rating), 0) AS 'Average_Rating', COUNT(review.Review_Id) AS 'Review_Count', 
    category.Category_Id, product.stock
    FROM product_details_tbl AS product
    LEFT JOIN category_details_tbl AS category ON product.Category_Id = category.Category_Id
    LEFT JOIN review_details_tbl AS review ON product.Product_Id = review.Product_Id
    WHERE product.is_active = 1";

    // Apply filters
    $conditions = [];
    $having_conditions = [];

    // Check if category_id is provided
    if (!empty($_GET['category_id'])) {
        $category_id = (int)$_GET['category_id'];
        $conditions[] = "category.Category_Id = $category_id";
    }

    // Check if search is provided
    if (!empty($_GET['search'])) {
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $conditions[] = "(product.Product_Name LIKE '%$search%' OR category.Category_Name LIKE '%$search%')";
    }

    // Ratings filter
    if (!empty($_POST['ratings'])) {
        $ratings = (int)$_POST['ratings'];
        $having_conditions[] = "COALESCE(AVG(review.Rating), 0) >= $ratings";
    }

    // Price filter
    if (!empty($_POST['price-range'])) {
        switch ($_POST['price-range']) {
            case 'lt50':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) < 50";
                break;
            case '51to100':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 51 AND 100";
                break;
            case '101to200':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 101 AND 200";
                break;
            case '201to500':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) BETWEEN 201 AND 500";
                break;
            case 'gt500':
                $conditions[] = "ROUND((product.Sale_Price - product.Sale_Price * product.Discount / 100), 2) > 500";
                break;
        }
    }

    // Discount filter
    if (!empty($_POST['discount'])) {
        switch ($_POST['discount']) {
            case 'lt5':
                $conditions[] = "product.Discount < 5";
                break;
            case '5to15':
                $conditions[] = "product.Discount BETWEEN 5 AND 15";
                break;
            case '15to25':
                $conditions[] = "product.Discount BETWEEN 15 AND 25";
                break;
            case 'gt25':
                $conditions[] = "product.Discount > 25";
                break;
        }
    }

    // Append conditions to WHERE clause
    if (count($conditions) > 0) {
        $query .= " AND " . implode(" AND ", $conditions);
    }

    $query .= " GROUP BY product.Product_Id, product.Discount, product.Product_Image, product.Product_Name, category.Category_Name, product.Sale_Price, category.Category_Id, product.stock";

    // Append HAVING conditions
    if (count($having_conditions) > 0) {
        $query .= " HAVING " . implode(" AND ", $having_conditions);
    }

    // Pagination
    $result = mysqli_query($con, $query);
    $total_records = mysqli_num_rows($result);

    $records_per_page = 8;
    $total_pages = ceil($total_records / $records_per_page);
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $records_per_page;

    // Apply limit and offset
    $query .= " LIMIT $offset, $records_per_page";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
            $isOutOfStock = $product['stock'] <= 0;
            ?>
            <div class="col-md-3 gap col-sm-4 p-2 col-6 mt-2">
                <div class="card h-100 <?php echo $isOutOfStock ? 'disabled-card' : ''; ?>">
                    <div class="product-image">
                        <a href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                            <img class="img-thumbnail p-4" style="height:300px;" src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="Card image cap">
                        </a>
                        <a href="wishlist.php?product_id=<?php echo $product["Product_Id"]; ?>" class="like text-decoration-none">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <?php if (!$isOutOfStock) {
                            echo "<div class='label'>Save $product[Discount]%</div>";
                        } else {
                            echo "<div class='label'>Out Of Stock</div>";
                        } ?>
                    </div>
                    <div class="card-body product-body px-3">
                        <a class="category-name category-link" href="categories.php?category_id=<?php echo $product["Category_Id"]; ?>"><?php echo $product["Category_Name"]; ?></a>
                        <a class="card-title category-link font-black" href="product-details.php?product_id=<?php echo $product["Product_Id"]; ?>">
                            <h6 class="not-link text-decoration-none"><?php echo $product["Product_Name"]; ?></h6>
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
                                <a class="primary-btn order-link mt-sm-1" href="cart.php?product_id=<?php echo $product["Product_Id"]; ?>"><i class="fa-solid fa-cart-shopping pe-2"></i>Add</a>
                            <?php } else { ?>
                                <a class="primary-btn order-link mt-sm-1" disabled><i class="fa-solid fa-cart-shopping pe-2"></i>Add</a>
                            <?php } ?>
                        </div>
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
                    if ($current_page > 1) {
                        echo "<li class='page-item'><a class='page-link' href='?page=" . ($current_page - 1) . "'>Previous</a></li>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item " . ($i == $current_page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                    }
                    if ($current_page < $total_pages) {
                        echo "<li class='page-item'><a class='page-link' href='?page=" . ($current_page + 1) . "'>Next</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <?php
    } else {
        echo "<h2>No products found.</h2>";
    }
    ?>
</div>
