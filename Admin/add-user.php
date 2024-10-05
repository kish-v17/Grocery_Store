<?php include "sidebar.php"; ?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="addUserForm" action="" method="POST" onsubmit="return validateAddUserForm();">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" required>
                                <div id="firstNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" required>
                                <div id="lastNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div id="emailError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                <div id="phoneError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div id="passwordError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="add-user" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php");

if (isset($_POST['add-user'])) {  
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "INSERT INTO user_details_tbl (First_Name, Last_Name, Email, Mobile_No, Password, Active_Status) 
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$password', 1)";
    echo $query;
    if (mysqli_query($con, $query)) {
        echo "<script>alert('User added successfully!');</script>";
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Error adding user: " . mysqli_error($con) . "');</script>";
    }
}
?>