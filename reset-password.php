<?php include('header.php'); ?>
<div class="container">
    <div class="row p-3 g-3 justify-content-center">
        <div class="col-md-6">
            <div class="login-form d-flex flex-column justify-content-center h-100 align-items-center mt-4">
                <div class="mb-3 w-75">
                    <h2 class="mb-3">Reset Password</h2>
                    <div class="mb-4">Enter your new password</div>
                    <form method="post" onsubmit="return validateResetPasswordForm()">
                        <input type="text" id="newPassword" name="new_password" class="w-100 mb-3" placeholder="New Password">
                        <p id="newPasswordError" class="error"></p>

                        <input type="text" id="confirmPassword" name="confirm_password" class="w-100 mb-3" placeholder="Confirm New Password">
                        <p id="confirmPasswordError" class="error"></p>

                        <input type="submit" value="Reset Password" name="submit" class="btn-msg w-100">
                        <div class="mt-4 text-center">
                            <a href="login.php" class="dim link ms-2">Back to log in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');
if (isset($_POST['submit'])) {
    if (isset($_SESSION['verified'])) {
        $email = $_SESSION['email'];
        $password = $_POST['new_password'];
        $query = "update user_details_tbl set Password = '$password' where Email = '$email'";
        if (mysqli_query($con, $query)) {
            unset($_SESSION['email']);
            unset($_SESSION['verified']);
            setcookie('success', "Password changed successfully!", time() + 5, "/");
            echo "<script>location.href='login.php'</script>";
        } else {
            setcookie('error', mysqli_error($con), time() + 5, "/");
            echo "<script>location.href='reset-password.php';</script>";
        }
    } else {
        setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
        echo "<script>location.href='forgot-password.php';</script>";
    }
}
?>