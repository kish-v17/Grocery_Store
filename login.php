<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img/items/chocolate.webp" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3">Log in to PureBite</h2>
                        <div class="mb-4 font-black">Enter your details below</div>
                        <form action="">
                            <input type="text" class="w-100 mb-4 p-2" placeholder="Email or Phone Number">
                            <input type="text" class="w-100 mb-4 p-2" placeholder="Password">
                            <div class="d-flex w-100 align-items-center">
                                <input type="submit" value="Log in" class="btn-msg">
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
<?php include('footer.php'); ?>