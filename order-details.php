<?php include('header.php'); ?>

<div class="container sitemap">
    <p>
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="order-history.php" class="text-decoration-none dim link">Orders /</a>
        Order# 123456
    </p>
    <div class="row order-border p-3 mb-4">
        <div class="col-6">
            <h4 class="mb-2">Order# 123456</h4>
            <div class="order-status mb-3">
                Pending
            </div>
            <div class="order-date">
                Placed on: 11/08/2024, 06:49 PM
            </div>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-start">
            <button class="primary-btn">Re-order</button>
        </div>
    </div>
    <div class="row align-items-stretch mb-4">
        <div class="col-md-4 col-sm-6 ps-0">
            <div class="order-border p-3 h-100">
                <h5 class="mb-3">Customer & Order</h5>

                <div class="row customer-details">
                    <div class="col-4">
                        <p>Name:</p>
                        <p>Phone:</p>
                        <p>Email:</p>
                        <p>Payment Terms</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-7">
                        <p>Tony Stark</p>
                        <p>+91 99099 99099</p>
                        <p>tony.stark@gmail.com</p>
                        <p>Cash on delivery</p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="order-border p-3">
                <h5 class="mb-3">Shipping Address</h5>
                
                <address class="address-book">
                    <p>Tony Stark</p>
                    <p> Street: 56 Lotus Avenue</p>
                    <p> City: New Delhi</p>
                    <p> State/Province full: Delhi</p>
                    <p> Zip Code/Postal code: 110001</p>
                    <p> Phone Number: +91 98101 23456</p>
                </address>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="order-border p-3">
                <h5 class="mb-3">Billing Address</h5>

                <address class="address-book">
                    <p>Tony Stark</p>
                    <p> Street: 56 Lotus Avenue</p>
                    <p> City: New Delhi</p>
                    <p> State/Province full: Delhi</p>
                    <p> Zip Code/Postal code: 110001</p>
                    <p> Phone Number: +91 98101 23456</p>
                </address>
            </div>
        </div>
    </div>
    <div class="row order-border py-4 mb-4 order-item-list">
        <h5 class="mb-3">Items ordered</h5>
        <div class="row py-3 order-item-list-header mx-0 my-2">
            <div class="col-4 p-0">
                Item name
            </div>
            <div class="col-2 text-center">Quantity</div>
            <div class="col-4">Price</div>
            <div class="col-2 text-center">Total</div>
        </div>
        <div class="row m-0 border-bottom">
            <div class="col-4 p-0">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">2</div>
            <div class="col-4">₹100.00</div>
            <div class="col-2 text-center">₹200.00</div>
        </div>
        <div class="row m-0 border-bottom">
            <div class="col-4 p-0">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">2</div>
            <div class="col-4">₹100.00</div>
            <div class="col-2 text-center">₹200.00</div>
        </div>
        <div class="row m-0 border-bottom">
            <div class="col-4 p-0">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-2 text-center">2</div>
            <div class="col-4">₹100.00</div>
            <div class="col-2 text-center">₹200.00</div>
        </div>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0"></div>
            <div class="col-2 text-center"></div>
            <div class="col-4 grey ">Subtotal</div>
            <div class="col-2 text-center">₹600.00</div>
        </div>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0">
                Free Shipping
                <a href="" class="ps-5 highlight">[Change]</a>
            </div>
            <div class="col-2 text-center"></div>
            <div class="col-4 grey ">Shipping Charge</div>
            <div class="col-2 text-center">₹0.00</div>
        </div>
        <div class="row m-0 border-bottom py-3">
            <div class="col-4 p-0"></div>
            <div class="col-2 text-center"></div>
            <div class="col-4 grey bold">Total</div>
            <div class="col-2 text-center bold">₹600.00</div>
        </div>
        
    </div>
</div>

<?php include('footer.php'); ?>