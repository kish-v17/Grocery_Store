<?php
include("sidebar.php");

$query = "SELECT Email FROM user_details_tbl WHERE User_Id = " . $_SESSION['user_id'];
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin Settings</li>
        </ol>

        <!-- Admin Email Update Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Email</h4>
            </div>
            <div class="card-body">
                <form id="emailUpdateForm" action="update-email.php" method="POST" onsubmit="return validateEmailForm();">
                    <div class="mb-3">
                        <label for="adminEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="adminEmail" name="admin_email" value="<?php echo $user['Email']; ?>">
                        <div id="adminEmailError" class="error-message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Email</button>
                </form>
            </div>
        </div>

        <!-- Admin Password Update Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Password</h4>
            </div>
            <div class="card-body">
                <form id="passwordUpdateForm" action="update-password.php" method="POST" onsubmit="return validatePasswordForm();">
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="adminPassword" name="admin_password">
                        <div id="adminPasswordError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
                        <div id="confirmPasswordError" class="error-message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>

    </div>
<?php include("footer.php"); ?>
