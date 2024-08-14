<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img/items/chocolate.webp" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3">Enter OTP</h2>
                        <div class="mb-4 ">Enter the OTP we sent you in email</div>
                        <form action="index.php">
                            <input type="number" class="w-100 mb-4" placeholder="OTP">
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