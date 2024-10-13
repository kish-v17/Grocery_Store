<?php include('header.php'); ?>
<div class="container ">
    <div class="row p-3 g-3 mt-4 justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="login-form d-flex flex-column justify-content-center h-100 align-items-center">
                <div class="mb-3 w-75">
                    <h2 class="mb-3">Log in to PureBite</h2>
                    <div class="mb-4 font-black">Enter your details below</div>
                    <form id="loginForm" method="post" action="verify-login.php" onsubmit="return validateLoginForm();">
                        <input type="text" id="loginEmail" name="logEmail" class="w-100 p-2" placeholder="Email">
                        <p id="loginEmailError" class="error mb-4"></p>
                        <input type="text" id="loginPassword" name="logPwd" class="w-100 p-2" placeholder="Password">
                        <p id="loginPasswordError" class="error mb-4"></p>
                        <div class="d-flex w-100 align-items-center">
                            <input type="submit" value="Log in" name="login" class="btn-msg">
                            <div class="highlight justify-self-end ms-auto">
                                <a href="forgot-password.php" class="text-decoration-none link highlight">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>