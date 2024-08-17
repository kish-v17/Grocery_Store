<?php include('header.php'); ?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Wishlist</p>
        <!-- table start -->
        <div class="row font-bold heading">
            <div class="col-4">
                Product
            </div>
            <div class="col-2 text-center">Price</div>
            <div class="col-3 text-center">Subtotal</div>
            <div class="col-3">
                Actions
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">₹100.00</div>
            <div class="col-3 text-center">₹300.00</div>
            <div class="col-3">
                <a class="primary-btn update-btn">Add to cart</a>
                <a class="primary-btn delete-btn">Delete</a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate2.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate 2</div>
            </div>
            <div class="col-2 text-center">₹200.00</div>
            <div class="col-3 text-center">₹600.00</div>
            <div class="col-3">
                <a class="primary-btn update-btn">Add to cart</a>
                <a class="primary-btn delete-btn">Delete</a>
            </div>
        </div>
        <!-- table end -->
    </div>
    <div class="container mb-5">
        <div class="d-flex justify-content-end align-items-center cart-page mb-5">
            <button class="btn-msg">Move all to cart</button>
        </div>
    </div>
<?php include('footer.php'); ?>
