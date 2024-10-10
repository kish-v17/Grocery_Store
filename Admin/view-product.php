<?php include "sidebar.php" ; 

$product_id = $_GET['product_id'];

$query = "select product.`Product_Id`, product.`Category_Id`, product.`Product_Name`, product.`Description`, product.`Product_Image`, product.`Sale_Price`, product.`Cost_Price`, product.`Discount`, product.`stock` , round(avg(review.Rating)) 'Rating', round(Sale_Price-Sale_Price*Discount/100,2) 'Price',COUNT(o.Order_Id) 'Sold_Quantity' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id left join order_details_tbl as o on o.Product_Id = review.Product_Id group by Product_Id having Product_Id=$product_id";
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Product</li>
        </ol>

        <!-- Product Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Product Information</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img src="..\img\items\products\<?php echo $product["Product_Image"]; ?>" alt="Product Photo" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Product ID:</strong> <?php echo $product["Product_Id"]; ?></p>
                        <p><strong>Product Name:</strong> <?php echo $product["Product_Name"]; ?></p>
                        <p><strong>Average Rating:</strong>  <?php echo $product["Rating"]; ?></p>
                        <p><strong>Description:</strong>  <?php echo $product["Description"]; ?></p>
                        <p><strong>Stock Quantity:</strong>  <?php echo $product["stock"]; ?></p>
                        <p><strong>Cost Price:</strong> ₹ <?php echo $product["Cost_Price"]; ?></p>
                        <p><strong>Sale Price:</strong> ₹ <?php echo $product["Sale_Price"]; ?></p>
                        <p><strong>Discount Percentage:</strong>  <?php echo $product["Discount"]; ?>%</p>
                        <p><strong>Price After Discount:</strong> ₹<?php echo $product["Price"]; ?></p>
                        <p><strong>Category:</strong> Bakery > Desserts</p>
                        <p><strong>Total Sales:</strong>  <?php echo $product["Sold_Quantity"]; ?></p>
                        <a class="btn btn-success" href="update-product.php?product_id=<?php echo $product["Product_Id"]; ?>">Update Product</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ratings and Reviews Section -->
        <div class="card mb-4 text-nowrap">
            <div class="card-header">
                <h4>Ratings and Reviews</h4>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT 
                                    r.Review_Id,
                                    r.Product_Id,
                                    r.User_Id, 
                                    r.Rating, 
                                    r.Review, 
                                    r.Review_Date,
                                    u.First_Name, 
                                    u.Last_Name 
                                FROM 
                                    review_details_tbl r
                                JOIN 
                                    user_details_tbl u 
                                ON 
                                    r.User_Id = u.User_Id having r.Product_Id = $product_id";
                        
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {

                            while ($review = mysqli_fetch_assoc($result)) {
                                $review_id = $review["Review_Id"];
                                $full_name = $review["First_Name"] . " " . $review["Last_Name"];
                                $rating = $review["Rating"];
                                $review_text = $review["Review"];
                                $review_date = $review["Review_Date"];

                                $stars = "";
                                for ($i = 1; $i <= 5; $i++) {
                                    $stars .= $i <= $rating ? "&#9733; " : "&#9734; ";
                                }
                                ?>
                                <tr>
                                    <td><a href="user-profile.php?user_id=<?php echo $review['User_Id']; ?>"><?php echo $full_name; ?></a></td>
                                    <td><span class="text-warning"><?php echo $stars; ?></span></td>
                                    <td><?php echo $review_text; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $review['User_Id']; ?>">Reply</button>
                                        <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $review['Review_Id']; ?>">Delete</button>
                                    </td>
                                </tr>

                                <!-- Reply Modal -->
                                <div class="modal fade" id="replyModal<?php echo $review['User_Id']; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="replyModalLabel">Reply to Review</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="review-reply.php" method="post">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="review_id" value="<?php echo $review["Review_Id"]; ?>">
                                                        <label for="reviewReply" class="form-label">Your Reply</label>
                                                        <textarea class="form-control" id="reviewReply" rows="3" name="reply"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Send Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $review['Review_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this review? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-review.php?review_id=<?php echo $review['Review_Id']; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $query = "select * from review_details_tbl where Reply_To=$review_id";
                                    $result = mysqli_query($con,$query);
                                    if(mysqli_num_rows($result)!=0)
                                    {
                                        $reply = mysqli_fetch_assoc($result);
                                        $reply_text = $reply["Review"];
                                    ?>
                                <tr>
                                    <td>Reply:</td>
                                    <td colspan="2"><?php echo $reply_text; ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $reply['Review_Id']; ?>">Delete</button>
                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $reply['Review_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this review? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-review.php?review_id=<?php echo $reply['Review_Id']; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                            }
                        } else {
                            echo "<tr><td colspan='4'>There are no reviews to display!</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="delete-product.php?product_id=<?php echo $product['Product_Id']; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>
