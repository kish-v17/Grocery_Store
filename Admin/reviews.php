<?php include("sidebar.php"); ?>
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
        <div class="card-body ">
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
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="../img/items/chocolate.webp" alt="Product 1" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="view-product.php?productId=">Turmeric Powder</a>
                            </div>
                        </td>
                        <td><a href="user-profile.php">John Doe</a></td>
                        <td style="width: 100px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9733; &#9734;
                            </span>
                        </td>
                        <td  class="">
                        A pantry essential, turmeric powder adds vibrant color and earthy flavor to dishes, while offering health benefits like anti-inflammatory properties.
                        </td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                                <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="../img/items/chocolate.webp" alt="Product 2" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="view-product.php?productId=2">Basmati Rice</a>
                            </div>
                        </td>
                        <td><a href="user-profile.php">Jane Smith</a></td>
                        <td style="width: 100px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9733; &#9733;
                            </span>
                        </td>
                        <td  style="max-width: 250px;" class="text-wrap">
                        Fragrant and fluffy, basmati rice enhances any meal with its delicate aroma and long, slender grains that cook to perfection.
                        </td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                                <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="../img/items/chocolate.webp" alt="Product 3" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                <a href="view-product.php?productId=3">Toor Dal</a>
                            </div>
                        </td>
                        <td><a href="user-profile.php">Emily Johnson</a></td>
                        <td style="width:110px;">
                            <span class="text-warning">
                                &#9733; &#9733; &#9733; &#9734; &#9734;
                            </span>
                        </td>
                        <td  style="max-width: 250px;" class="text-wrap">
                        Mild and earthy, toor dal is a staple in Indian kitchens, perfect for making rich, hearty dals that pair beautifully with rice or rotis. It's also a great source of protein and fiber.
                        </td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
                                <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reviewReply" class="form-label">Your Reply</label>
                            <textarea class="form-control" id="reviewReply" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <a href="delete_review-handler.php" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
