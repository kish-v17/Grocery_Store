<?php include('header2.php'); ?>
<div class="container sitemap">
    <p>
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="cart.php" class="text-decoration-none dim link">Cart /</a> 
        Checkout
    </p>
</div>
<form action="order-success.php" id="billingForm" class="billing-details form" onsubmit="return validateForms();">
<div class="container">
    <h2 class="mb-4">Billing Details</h2>
    <div class="row g-5">
        <div class="col-md-6">
            <div class="mb-4">
                    <div class="row gx-2 gy-3">
                        <div class="col-12 col-sm-6">
                            <label for="billingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                            <input type="text" id="billingFirstName" class="w-100" placeholder="First Name">
                            <p id="billingFirstNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                            <input type="text" id="billingLastName" class="w-100" placeholder="Last Name">
                            <p id="billingLastNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                            <textarea id="billingAddress" class="w-100" rows="2" placeholder="Street Address"></textarea>
                            <p id="billingAddressError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingApartment" class="form-label d-block">Apartment, Floor, etc.(Optional)</label>
                            <textarea id="billingApartment" class="w-100" rows="2" placeholder="Apartment, Floor, etc."></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingCity" class="form-label d-block">City<span class="required">*</span></label>
                            <input type="text" id="billingCity" class="w-100" placeholder="City">
                            <p id="billingCityError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingState" class="form-label d-block">State<span class="required">*</span></label>
                            <input type="text" id="billingState" class="w-100" placeholder="State">
                            <p id="billingStateError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                            <input type="text" id="billingPinCode" class="w-100" placeholder="Pin Code">
                            <p id="billingPinCodeError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                            <input type="text" id="billingPhone" class="w-100" placeholder="Phone Number">
                            <p id="billingPhoneError" class="error"></p>
                        </div>
                        <div class="col-12">
                            <div>
                                <input type="checkbox" id="confirmation">
                                <label for="confirmation" class="form-label ms-1">Save this information for faster check-out next time</label>
                            </div>
                            <div>
                                <input type="checkbox" id="choice">
                                <label for="choice" class="form-label ms-1">Do you want to add shipping address?</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="js-shipping-details invisible">
                <div class="line mb-4"></div>
                <h2 class="mb-4">Shipping Details</h2>
                    <div class="row gx-2 gy-3">
                        <div class="col-12 col-sm-6">
                            <label for="shippingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                            <input type="text" id="shippingFirstName" class="w-100" placeholder="First Name">
                            <p id="shippingFirstNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                            <input type="text" id="shippingLastName" class="w-100" placeholder="Last Name">
                            <p id="shippingLastNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="shippingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                            <textarea id="shippingAddress" class="w-100" rows="2" placeholder="Street Address"></textarea>
                            <p id="shippingAddressError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="shippingApartment" class="form-label d-block">Apartment, Floor, etc.(Optional)</label>
                            <textarea id="shippingApartment" class="w-100" rows="2" placeholder="Apartment, Floor, etc."></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingCity" class="form-label d-block">City<span class="required">*</span></label>
                            <input type="text" id="shippingCity" class="w-100" placeholder="City">
                            <p id="shippingCityError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingState" class="form-label d-block">State<span class="required">*</span></label>
                            <input type="text" id="shippingState" class="w-100" placeholder="State">
                            <p id="shippingStateError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                            <input type="text" id="shippingPinCode" class="w-100" placeholder="Pin Code">
                            <p id="shippingPinCodeError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                            <input type="text" id="shippingPhone" class="w-100" placeholder="Phone Number">
                            <p id="shippingPhoneError" class="error"></p>
                        </div>
                    </div>
            </div>
            <div class="mt-4 line mb-4"></div>
        </div>
        <div class="col-md-6 font-black checkout">
            <div class="mb-2">
                <div class="d-flex align-items-center p-2">
                    <img src="img/items/chocolate.webp" class="checkout-image" alt="">
                    <div class="item-name ms-2">Chocolate 1</div>
                    <div class="price">₹100.00</div>
                </div>
                <div class="d-flex align-items-center p-2">
                    <img src="img/items/chocolate2.webp" class="checkout-image" alt="">
                    <div class="item-name ms-2">Chocolate 1</div>
                    <div class="price">₹100.00</div>
                </div>
            </div>
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
            <div class="d-flex justify-content-end">
                <input type="submit" value="Pay Now" class="btn-msg mt-2">
            </div>
        </div>
    </div>
</div>
</form>
<?php include('footer.php'); ?>
