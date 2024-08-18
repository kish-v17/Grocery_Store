<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Banner</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="banner-management.php">Banners</a></li>
                <li class="breadcrumb-item active">Update Banner</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="update_banner_handler.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bannerImage" class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" id="bannerImage" name="banner_image">
                                    <div class="mt-2">
                                        <img src="path/to/existing-banner.jpg" alt="Existing Banner" width="150">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="viewOrder" class="form-label">View Order</label>
                                    <input type="number" class="form-control" id="viewOrder" name="view_order" value="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bannerUrl" class="form-label">URL</label>
                            <input type="url" class="form-control" id="bannerUrl" name="banner_url" value="https://example.com/existing-banner" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <input type="hidden" name="banner_id" value="123"> <!-- Example ID for the banner -->
                        <a href="banner-management.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>
