<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Review</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="reviews.php">Reviews</a></li>
            <li class="breadcrumb-item active">Update Review</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <form id="updateReviewForm" action="reviews.php" method="post" onsubmit="return validateAddReviewForm();">
                    <input type="hidden" name="review_id" value="456"> <!-- Static Review ID -->

                    <div class="mb-3">
                        <label for="productid" class="form-label">Product ID</label>
                        <input type="text" class="form-control" id="productid" name="productid" value="789" placeholder="Enter Product ID">
                        <div id="productidError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="userid" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userid" name="userid" value="123" placeholder="Enter User ID">
                        <div id="useridError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select id="rating" name="rating" class="form-select">
                            <option value="" disabled>Select a rating</option>
                            <option value="1" selected>1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                        <div id="ratingError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Enter review">This is an updated review text.</textarea>
                        <div id="reviewError" class="error-message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Review</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
