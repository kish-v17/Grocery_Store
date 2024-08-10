<?php include('header.php'); ?>
    <div class="container">
        <div class="row p-3 g-3">
            <div class="col-md-6 mb-3">
                <img src="img/items/chocolate2.webp" alt="It is an chocolate image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3">Create an account</h2>
                        <div class="mb-4 ">Enter your details below</div>
                        <form action="">
                            <input type="text" class="w-100 mb-4" placeholder="Name">
                            <input type="text" class="w-100 mb-4" placeholder="Email">
                            <input type="text" class="w-100 mb-4" placeholder="Password">
                            <input type="text" class="w-100 mb-4" placeholder="Confirm Password">
                            <input type="submit" value="Create an account" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                Already have an account?<a href="login.php" class="dim link ms-2">Log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>