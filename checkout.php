<?php include('header.php'); ?>
    <div class="container sitemap">
        <p>
            <a href="index.php" class="text-decoration-none dim link">Home /</a>
            <a href="cart.php" class="text-decoration-none dim link">Cart /</a> 
            Checkout
        </p>
    </div>
    <div class="container">
        <h2 class="mb-4">Billing Details</h2>
        <div class="row g-5">
            <div class="col-md-6">
                <div class="mb-4">
                    <form action="" class="billing-details form">
                        <div class="row gx-2 gy-3">
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">First Name<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Last Name<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="" class="form-label">Street Address<span class="required">*</span></label>
                                <textarea name="message" id="contactMessage" class="w-100" rows="2" ></textarea>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="" class="form-label">Apartment, Floor, etc.(Optional)</label>
                                <textarea name="message" id="contactMessage" class="w-100" rows="2" ></textarea>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">City<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">State<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Pin code<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Phone<span class="required">*</span></label>
                                <input type="text" class="w-100" >
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
                        <!-- <div class="d-flex justify-content-end">
                            <input type="submit" value="Send Message" class="btn-msg mt-2 ">
                        </div> -->
                    </form>
                </div>
                <div class="js-shipping-details invisible">
                    <div class="line mb-4"></div>
                    <h2 class="mb-4">Shipping Details</h2>
                    <form action="" class="billing-details form">
                        <div class="row gx-2 gy-3">
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">First Name<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Last Name<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="" class="form-label">Street Address<span class="required">*</span></label>
                                <textarea name="message" id="contactMessage" class="w-100" rows="2" ></textarea>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="" class="form-label">Apartment, Floor, etc.(Optional)</label>
                                <textarea name="message" id="contactMessage" class="w-100" rows="2" ></textarea>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">City<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">State<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Pin code<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Phone<span class="required">*</span></label>
                                <input type="text" class="w-100" >
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-4 line mb-4"></div>
            </div>
            <div class="col-md-6 font-black checkout">
                <div class="mb-2">
                    <div class="d-flex align-items-center p-2">
                        <img src="img\items\chocolate.webp" class="checkout-image" alt="">
                        <div class="item-name ms-2">Chocolate 1</div>
                        <div class="price">₹100.00</div>
                    </div>
                    <div class="d-flex align-items-center p-2">
                        <img src="img\items\chocolate2.webp" class="checkout-image" alt="">
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
                <div class="mt-2">
                    <div class="mb-3">
                        <input type="radio" name="payment-choice" id="">
                        <label for="" class="ms-1 form-label m-0" >Bank</label>
                    </div>
                    <div class="mb-3">
                        <input type="radio" name="payment-choice" id="">
                        <label for="" class="ms-1 form-label m-0" >Cash on Delivery</label>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Place order" class="btn-msg mt-2">
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>