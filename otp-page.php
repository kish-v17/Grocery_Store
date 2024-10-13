<?php include 'header.php';
?>

<div class="container">
    <div class="row p-3 g-3 justify-content-center">
        <div class="col-md-6">
            <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center mt-4">
                <div class="mb-3 w-75">
                    <h2 class="mb-3">Enter OTP</h2>
                    <div class="mb-4 ">Enter the OTP we sent you in email</div>
                    <form action="verify-otp.php" id="otpForm" method="post" onsubmit="return validateOtpForm();">
                        <input type="text" id="otp" name="otp" class="w-100" placeholder="OTP">
                        <p id="otpError" class="error  mb-4"></p>
                        <input type="submit" value="Verify" name="verify" class="btn-msg w-100">
                    </form>
                    <form id="resend">
                        <div class="mt-4 text-center">
                            <div id="timer" class="text-danger"></div>
                            <button type="submit" name="resend_otp" id="resend_otp" style="display:none;" class="otp ms-2">Resend OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');
?>

<script>
    let timeLeft = <?php 
        $time = $_SESSION['otp_expiration'] - time(); 
        echo $time <= 0 ? 0 : $time; 
    ?>;

    const timerDisplay = document.getElementById('timer');
    const resendButton = document.getElementById('resend_otp');

    function startCountdown() {
        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerDisplay.innerHTML = "You can now resend the OTP.";
                resendButton.style.display = "inline";
            } else {
                timerDisplay.innerHTML = `Resend OTP in ${timeLeft} seconds`;
                timeLeft -= 1;
            }
        }, 1000);
    }

    startCountdown();

    resendButton.onclick = function(event) {
        event.preventDefault();
        window.location.href = 'resend-otp.php';
    };
</script>
