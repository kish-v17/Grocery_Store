<?php include('header.php'); ?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Cart</p>
        <!-- table start -->
        <div class="row font-bold heading">
            <div class="col-4">
                Product
            </div>
            <div class="col-2 text-center">Price</div>
            <div class="col-2 ">
                Quantity
            </div>
            <div class="col-2 text-center">Subtotal</div>
            <div class="col-2">
                Actions
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">₹100.00</div>
            <div class="col-2 ">
                <div class="d-flex qty-mod">
                    <button class="number-button qty-minus">-</button>
                    <input type="number" class="qty" name="qty" id="" value="3">
                    <button class="number-button qty-plus">+</button>
                </div>
            </div>
            <div class="col-2 text-center">₹300.00</div>
            <div class="col-2 ">
                <a class="primary-btn update-btn">Update</a>
                <a class="primary-btn delete-btn">Delete</a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">₹100.00</div>
            <div class="col-2 ">
                <div class="d-flex qty-mod">
                    <button class="number-button qty-minus">-</button>
                    <input type="number" class="qty" name="qty" id="" value="3">
                    <button class="number-button qty-plus">+</button>
                </div>
            </div>
            <div class="col-2 text-center">₹300.00</div>
            <div class="col-2 ">
                <a class="primary-btn update-btn">Update</a>
                <a class="primary-btn delete-btn">Delete</a>
            </div>
        </div>
        <!-- table end -->
    </div>
    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center cart-page mb-5">
            <a class="btn-msg" href="shop.php">Return to shop</a>
            <button class="btn-msg">Update Cart</button>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="bold-border p-4">
                    <h5 class="mb-3">Cart Total</h5>
                    <div class="d-flex align-items-center p-2">
                        <div>Subtotal:</div>
                        <div class="price">₹200.00</div>
                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Shipping:</div>
                        <div class="price">₹100.00</div>
                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Total:</div>
                        <div class="price">₹300.00</div>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-3">
                        <a class="btn-msg checkout-link" href="checkout.php">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>
