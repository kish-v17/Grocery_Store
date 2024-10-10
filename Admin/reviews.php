<?php include "sidebar.php"; 
$query = "
    SELECT 
        r.Review_Id, r.Reply_To, r.Rating, r.Review, r.Review_Date, 
        p.Product_Id, p.Product_Name, p.Product_Image, 
        u.User_Id, u.First_Name, u.Last_Name
    FROM review_details_tbl r
    JOIN product_details_tbl p ON r.Product_Id = p.Product_Id
    JOIN user_details_tbl u ON r.User_Id = u.User_Id
";

$result = mysqli_query($con, $query);

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <div>
                <h1 class="mt-4">Review Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ol>
            </div>
            <a class="btn btn-primary text-nowrap" href="add-review.php">Add Review</a>
        </div>
        <div class="card-body">
                <tbody>
                    <?php
                    if (mysqli_num_rows($result)) {
                        ?>
            <table class="table border text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Username</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                        <?php
                        $temp_review_id = 0;
                        while($review = mysqli_fetch_assoc($result)) {
                            $temp_review_id++;
                            $fullName = $review['First_Name'] . ' ' . $review['Last_Name'];
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../img/items/products/<?php echo $review['Product_Image']; ?>" alt="<?php echo $review['Product_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                        <a href="view-product.php?product_id=<?php echo $review['Product_Id']; ?>"><?php echo $review['Product_Name']; ?></a>
                                    </div>
                                </td>
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
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $temp_review_id; ?>">Reply</button>
                                        <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $temp_review_id; ?>">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Reply Modal -->
                            <div class="modal fade" id="replyModal<?php echo $temp_review_id; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
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
                            <div class="modal fade" id="deleteModal<?php echo $temp_review_id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                            <a href="delete-review.php?user_id=<?php echo $review['User_Id'].'&product_id='.$review['Product_Id']; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo "</tbody>";
                    } else {
                        echo "<h3>No reviews found!</h3>";
                    }
                    ?>
            </table>
        </div>
    </div>
<?php include("footer.php"); ?> 
