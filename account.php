<?php include('header.php') ?>
    <div class="container ">
        <div class=" d-flex justify-content-between sitemap mt-5">
            <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Account</p>
            <p>Welcome! <span class="highlight">Username</span></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 p-2 d-flex flex-row flex-sm-column ">
                <div class="shadow-sm p-4 d-flex heading text-nowrap">
                    <ul class="d-flex flex-row flex-md-column gap-3 heading">
                        <li class="active menu-item js-account mb-0" data-id="my-profile">My Profile</li>
                        <li class=" menu-item js-account mb-0" data-id="address-book">Address Book</li>
                        <li class="menu-item my-orders-main mb-0" data-id="all-orders">My Orders</li>
                        <li class="menu-item mb-0" data-id="my-wishlist">My Wishlist</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-8 p-2">
                <div class="shadow-sm p-4">
                    <div id="my-profile" class="invisible">
                        <p class="highlight title">Edit Your Profile</p>
                        <form class="edit-profile form" onsubmit = "return validateMyAccountForm();">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="w-100" placeholder="Your Name*" id="firstName" value="Rixit">
                                    <p id="firstNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="w-100" placeholder="Your Email*" id="lastName" value="Dobariya">
                                    <p id="lastNameError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label d-block">Email</label>
                                    <input type="text" class="w-100" placeholder="Your Email*" id="email" value="rixitdoabariya05@gmail.com">
                                    <p id="emailError" class="error"></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label d-block">Phone</label>
                                    <input type="text" class="w-100" placeholder="Your Phone*" id="phone" value="87329 65892">
                                    <p id="phoneError" class="error"></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Update Profile" class="btn-msg mt-2 ">
                            </div>
                        </form>
                        <form  class="edit-profile form" onsubmit="return validateChangePassword();">
                            <div class="row g-2">                            
                                <div class="col-12">
                                    <label for="" class="form-label d-block">Password</label>
                                    <input type="text" class="w-100 mb-2" placeholder="Current password" id="currentPassword">
                                    <p id="currentPasswordError" class="error"></p>
                                    <input type="text" class="w-100 mb-2" placeholder="New password" id="newPassword">
                                    <p id="newPasswordError" class="error"></p>
                                    <input type="text" class="w-100 mb-2" placeholder="Confirm password" id="confirmPassword">
                                    <p id="confirmPasswordError" class="error"></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Change Password" class="btn-msg mt-2 ">
                            </div>
                        </form>
                    </div>
                    <div id="address-book" class="invisible">
                        <p class="highlight title">Address Book</p>
                        <div class="row row-cols-2 g-2">
                            <div class="col-12 col-sm-6">
                                <div class="border-red p-3">
                                    <address class="address-book">
                                        <h6>Tony Stark</h6>
                                        <p> Street: 56 Lotus Avenue</p>
                                        <p> City: New Delhi</p>
                                        <p> State/Province abbr: DL</p>
                                        <p> State/Province full: Delhi</p>
                                        <p> Zip Code/Postal code: 110001</p>
                                        <p> Phone Number: +91 98101 23456</p>
                                    </address>
                                    <div class="d-flex justify-content-end gap">
                                        <button class="primary-btn dlt-btn">Delete</button>
                                        <button class="primary-btn" data-bs-toggle="modal" data-bs-target="#Modal">Edit Address</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="border-red p-3">
                                    <address class="address-book">
                                        <h6>Tony Stark</h6>
                                        <p> Street: 56 Lotus Avenue</p>
                                        <p> City: New Delhi</p>
                                        <p> State/Province abbr: DL</p>
                                        <p> State/Province full: Delhi</p>
                                        <p> Zip Code/Postal code: 110001</p>
                                        <p> Phone Number: +91 98101 23456</p>
                                    </address>
                                    <div class="d-flex justify-content-end gap">
                                        <button class="primary-btn dlt-btn">Delete</button>
                                        <button class="primary-btn " data-bs-toggle="modal" data-bs-target="#Modal">Edit Address</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="border-red p-3">
                                    <address class="address-book">
                                        <h6>Tony Stark</h6>
                                        <p> Street: 56 Lotus Avenue</p>
                                        <p> City: New Delhi</p>
                                        <p> State/Province abbr: DL</p>
                                        <p> State/Province full: Delhi</p>
                                        <p> Zip Code/Postal code: 110001</p>
                                        <p> Phone Number: +91 98101 23456</p>
                                    </address>
                                    <div class="d-flex justify-content-end gap">
                                        <button class="primary-btn dlt-btn">Delete</button>
                                        <button class="primary-btn " data-bs-toggle="modal" data-bs-target="#Modal">Edit Address</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="all-orders" class="invisible container cart-table">
                        <table class="table cart-table  text-nowrap">
                            <tr class="heading">
                                <th>Order ID</th>
                                <th>Order status</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>View Orders</th>
                            </tr>

                            <?php display_orders(); ?>
                        </table>
                    </div>
                    <div id="my-wishlist" class="invisible container cart-table">
                        <table class="table cart-table text-nowrap">
                            <tr class="heading">
                                <th>Product</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>

                            <tr>
                                <td>
                                    <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                                    <div class="d-inline-block">Chocolate</div>
                                </td>
                                <td>₹100.00</td>
                                <td>₹300.00</td>
                                <td>
                                    <a class="primary-btn update-btn">Add to cart</a>
                                    <a class="primary-btn delete-btn">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                                    <div class="d-inline-block">Chocolate</div>
                                </td>
                                <td>₹100.00</td>
                                <td>₹300.00</td>
                                <td>
                                    <a class="primary-btn update-btn">Add to cart</a>
                                    <a class="primary-btn delete-btn">Delete</a>
                                </td>
                            </tr>
                        </table>
                        <!-- <div class="container mb-5">
                            <div class="d-flex justify-content-end align-items-center cart-page mb-5">
                                <button class="btn-msg">Move all to cart</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container ">
        <footer class="py-5">
            <!-- footer will be here -->
        </footer>
    </div>

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 h" id="exampleModalLabel">Update Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" class="edit-profile form" onsubmit="return validateEditAddressForm();">
                <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-12">
                                <label for="modalFirstName" class="form-label">First Name</label>
                                <input type="text" class="w-100" placeholder="Your Name*" id="modalFirstName">
                                <p id="modalFirstNameError" class="error"></p>
                            </div>
                            <div class="col-12">
                                <label for="modalLastName" class="form-label">Last Name</label>
                                <input type="text" class="w-100" placeholder="Your Last Name*" id="modalLastName">
                                <p id="modalLastNameError" class="error"></p>
                            </div>
                            <div class="col-12">
                                <label for="modalPhone" class="form-label">Phone</label>
                                <input type="text" class="w-100" placeholder="Your Phone*" id="modalPhone">
                                <p id="modalPhoneError" class="error"></p>
                            </div>
                            <div class="col-12">
                                <label for="modalPinCode" class="form-label">Pin code</label>
                                <input type="text" class="w-100" placeholder="Your Pin code*" id="modalPinCode">
                                <p id="modalPinCodeError" class="error"></p>
                            </div>
                            <div class="col-12">
                                <label for="modalAddress" class="form-label">Address</label>
                                <textarea name="address" class="w-100" id="modalAddress" rows="3" placeholder="Your Address*"></textarea>
                                <p id="modalAddressError" class="error"></p>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end gap">
                        <button class="primary-btn d" data-bs-dismiss="modal">Close</button>
                        <input class="primary-btn" type="submit" value="Edit Address">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>

<?php 
    function display_orders(){
        for($i=1;$i<=5;$i++){
            echo '
            <tr>
                <td>123</td>
                <td>11-08-2024</td>
                <td>
                    2
                </td>
                <td>₹100.00</td>
                <td>
                    <a class="primary-btn order-link" href="order-details.php">View Order</a>
                </td>
            </tr>
            ';
        } 
    }
?>