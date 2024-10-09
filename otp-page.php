<?php include('header.php'); ?>


<div class="container">
    <div class="row p-3 g-3 justify-content-center">
        <div class="col-md-6">
            <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center mt-4">
                <div class="mb-3 w-75">
                    <h2 class="mb-3">Enter OTP</h2>
                    <div class="mb-4 ">Enter the OTP we sent you in email</div>
                    <form id="otpForm" method="post" onsubmit="return validateOtpForm();">
                        <input type="text" id="otp" name="otp" class="w-100" placeholder="OTP">
                        <p id="otpError" class="error  mb-4"></p>
                        <input type="submit" value="Verify" name="verify" class="btn-msg w-100">
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
if (isset($_POST['verify'])) {
    $inputtedOTP = $_POST['otp'];

    if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiration'])) {

        if (time() > $_SESSION['otp_expiration']) {
            echo "The OTP has expired. Please request a new one.";
        } else {
            $session_otp = $_SESSION['otp'];

            if ($inputtedOTP == $session_otp) {
                $rfname = $_SESSION['user_data']['fname'];
                $rlname = $_SESSION['user_data']['lname'];
                $remail = $_SESSION['user_data']['email'];
                $rphone = $_SESSION['user_data']['phone'];
                $rpwd = $_SESSION['user_data']['pwd'];

                $sql = "INSERT INTO user_details_tbl (User_Id, User_Role_Id, First_Name, Last_Name, Password, Email,Mobile_no, Active_Status) 
                        VALUES (User_Id, User_Role_Id, '$rfname','$rlname','$rpwd','$remail','$rphone', 'Active_Status')";

                if (mysqli_query($con, $sql)) {
                    unset($_SESSION['otp']);
                    unset($_SESSION['otp_expiration']);

                    echo "<script> location.replace('login.php');</script>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Wrong OTP. Please try again.";
            }
        }
    } else {
        echo "No OTP found. Please request a new one.";
    }
}

?>