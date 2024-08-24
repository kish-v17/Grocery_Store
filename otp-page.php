<?php include('header2.php'); ?>
    <div class="container">
        <div class="row p-3 g-3 justify-content-center">
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center mt-4">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3">Enter OTP</h2>
                        <div class="mb-4 ">Enter the OTP we sent you in email</div>
                        <form id="otpForm" action="index.php" onsubmit="return validateOtpForm();">
                            <input type="text" id="otp" class="w-100" placeholder="OTP">
                            <p id="otpError" class="error  mb-4"></p>
                            <input type="submit" value="Verify" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                <a href="login.php" class="dim link ms-2">Back to log in</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>