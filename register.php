<?php include('header.php'); ?>
<div class="container">
    <div class="row p-3 g-3 mt-4 d-flex justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                <div class="mb-3 w-75">
                    <h2 class="mb-3">Create an account</h2>
                    <div class="mb-4">Enter your details below</div>
                    <form id="registrationForm" action="otp-page.php" onsubmit="return validateRegistrationForm();">
                        <input type="text" id="name" class="w-100" placeholder="Name">
                        <p id="nameError" class="error mb-4"></p>

                        <input type="text" id="email" class="w-100 " placeholder="Email">
                        <p id="emailError" class="error mb-4"></p>

                        <input type="text" id="password" class="w-100 " placeholder="Password">
                        <p id="passwordError" class="error mb-4"></p>

                        <input type="text" id="confirmPassword" class="w-100" placeholder="Confirm Password">
                        <p id="confirmPasswordError" class="error mb-4"></p>

                        <input type="submit" value="Create an account" class="btn-msg w-100">
                        <div class="mt-4 text-center">
                            Already have an account? <a href="login.php" class="dim link ms-2">Log in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
