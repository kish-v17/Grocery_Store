<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin Settings</li>
        </ol>

        <!-- Admin Login Info Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Login Information</h4>
            </div>
            <div class="card-body">
                <form action="update-login.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="admin_email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="adminPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="adminPassword" name="admin_password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Login Info</button>
                </form>
            </div>
        </div>

        <!-- Contact Page Info Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Contact Page Info</h4>
            </div>
            <div class="card-body">
                <form action="update-contact.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Contact Page Email</label>
                                <input type="email" class="form-control" id="contactEmail" name="contact_email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Contact Page Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contact_number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="siteName" class="form-label">Site Name</label>
                                <input type="text" class="form-control" id="siteName" name="site_name" required>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Contact Info</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
