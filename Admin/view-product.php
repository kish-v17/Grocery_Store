<?php include "sidebar.php" ; 

$product_id = $_GET['product_id'];

$query = "select product.`Product_Id`, product.`Category_Id`, product.`Product_Name`, product.`Description`, product.`Product_Image`, product.`Sale_Price`, product.`Cost_Price`, product.`Discount`, product.`stock` , round(avg(review.Rating)) 'Rating', round(Sale_Price-Sale_Price*Discount/100,2) 'Price',COUNT(o.Order_Id) 'Sold_Quantity' from product_details_tbl as product left join review_details_tbl as review on product.Product_Id = review.Product_Id left join order_details_tbl as o on o.Product_Id = review.Product_Id group by Product_Id having Product_Id=$product_id";
$result = mysqli_query($con,$query);
$product = mysqli_fetch_assoc($result);


$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE r.Rating LIKE '%$search%' OR r.Review LIKE '%$search%' OR p.Product_Name LIKE '%$search%' OR u.First_Name LIKE '%$search%' OR u.Last_Name LIKE '%$search%'";
}

$query = "
    SELECT 
        r.Review_Id, r.Rating, r.Review, r.Review_Date, 
        p.Product_Id, p.Product_Name, p.Product_Image, 
        u.User_Id, u.First_Name, u.Last_Name,
        r1.Review_Id as 'Reply_Id', r1.Review as 'Reply' 
    FROM review_details_tbl r
    JOIN product_details_tbl p ON r.Product_Id = p.Product_Id
    JOIN user_details_tbl u ON r.User_Id = u.User_Id
    left join review_details_tbl r1 on r.Review_Id = r1.Reply_To 
    $search_query
";

$result = mysqli_query($con, $query);
$total_records = mysqli_num_rows($result);

$records_per_page = 10;
$total_pages = ceil($total_records / $records_per_page);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

$query .= " LIMIT $start_from, $records_per_page";
$result = mysqli_query($con, $query);
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
                <div class="d-flex justify-content-end mb-2">
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="search"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
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
                    if (mysqli_num_rows($result)) 
                    {
                        while($review = mysqli_fetch_assoc($result))
                        {
                            $fullName = $review['First_Name'] . ' ' . $review['Last_Name'];
                            ?>
                            <tr>
                                <td><a href="user-profile.php?user_id=<?php echo $review['User_Id']; ?>"><?php echo $fullName; ?></a></td>
                                <td style="width: 100px;">
                                    <span class="text-warning">
                                        <?php
                                        for($i = 0; $i < 5; $i++) {
                                            echo ($i < $review['Rating']) ? "&#9733;" : "&#9734;";
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td style="max-width: 250px;" class="text-wrap"><?php echo $review['Review']; ?></td>
                                <td>
                                    <div class="d-flex flex-nowrap">
                                        <button class="btn btn-primary btn-sm me-2 <?php echo isset($review['Reply_Id'])?'d-none':''; ?>" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $review['Review_Id']; ?>">Reply</button>
                                        <a class="btn btn-info btn-sm" href="update-review.php?review_id=<?php echo $review['Review_Id']; ?>">Update</a>
                                        <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $review['Review_Id']; ?>">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Reply Modal -->
                            <div class="modal fade" id="replyModal<?php echo $review['Review_Id']; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
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
                                if(isset($review['Reply_Id']))
                                {
                                    $reply_text = $review["Reply"];
                                ?>
                                    <tr>
                                        <td>Reply:</td>
                                        <td colspan="2"><?php echo $reply_text; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $review['Reply_Id']; ?>">Update</button>
                                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $review['Reply_Id']; ?>">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Update Modal -->
                                    <div class="modal fade" id="updateModal<?php echo $review['Reply_Id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel">Update Reply</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update-reply.php" method="post">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="review_id" value="<?php echo $review['Reply_Id']; ?>">
                                                            <label for="reviewReply" class="form-label">Your Reply</label>
                                                            <textarea class="form-control" id="reviewReply" rows="3" name="reply"><?php echo $reply_text; ?></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update Reply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $review['Reply_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                                    <a href="delete-review.php?review_id=<?php echo $review['Reply_Id']; ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                    }
                    else 
                    {
                        echo "<td colspan='4'>No reviews found!</td>";
                    }
                    ?>
                </tbody>

                </table>
                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                            <?php 
                                if ($page > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=$search&product_id=$product_id'>Previous</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=$search&product_id=$product_id'>" . $i . "</a></li>";
                                }
                                if ($page < $total_pages) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1) . "&search=$search&product_id=$product_id'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div> 

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
