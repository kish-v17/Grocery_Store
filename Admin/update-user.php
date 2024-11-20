<?php include("sidebar.php"); 

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sql = "SELECT * FROM user_details_tbl WHERE User_Id = $userId";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('User not found!'); window.location.href = 'users.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location.href = 'users.php';</script>";
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="updateUserForm" action="update-user.php" method="POST" enctype="multipart/form-data" onsubmit="return validateAddUserForm();">
                    <input type="hidden" name="user_id" id="userId" value="<?php echo $user['User_Id']; ?>">
                    <input type="hidden" name="User_Image" value="<?php echo $user["Profile_Picture"]; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $user['First_Name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $user['Last_Name']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['Mobile_No']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"  value="<?php echo $user['Password']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userImage" class="form-label">User Image</label>
                                <input type="file" class="form-control" id="userImage" name="user_image" accept="image/*">
                                <div id="userImageError" class="error-message"></div>
                            </div>
                            <div class="mb-3">
                                <img src="../img/users/<?php echo $user['Profile_Picture']; ?>" alt="" height="200px" width="200px">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update-user">Update User</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>

<?php
if (isset($_POST["update-user"])) {
    $userId = $_POST['user_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $old_image = $_POST['User_Image'];
    $new_image = $_FILES['user_image']['name'];

    if ($new_image) {
        $image = uniqid() . "_" . $new_image;
        move_uploaded_file($_FILES['user_image']['tmp_name'], "../img/users/" . $image);
        if (!empty($old_image) && file_exists("../img/users/" . $old_image)) {
            unlink("../img/users/" . $old_image);
        }
    } else {
        $image = $old_image;
    }

    $sql = "UPDATE user_details_tbl 
            SET First_Name = '$firstName', Last_Name = '$lastName', Email = '$email', Mobile_No = '$phone', Password = '$password', Profile_Picture = '$image'
            WHERE User_Id = $userId";

    if (mysqli_query($con, $sql)) {
        ?>
        <script>
            window.location.href = "users.php";
        </script>
        <?php
    } else {
        echo "Error updating user: " . mysqli_error($con);
    }
}
?>
