<?php include('header.php') ?>
    <div class="container ">
        <div class=" d-flex justify-content-between sitemap">
            <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Account</p>
            <p>Welcome! <span class="highlight">Username</span></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3 p-2">
                <div class="shadow-sm p-4 d-flex flex-column heading">
                    <ul>
                        <li class="menu-item active js-account-main" data-id="my-profile">Manage My Account</li>
                        <ul>
                            <li class="active menu-item js-account" data-id="my-profile">My Profile</li>
                            <li class="menu-item js-account" data-id="address-book">Address Book</li>
                        </ul>
                        <li class="menu-item my-orders-main" data-id="all-orders">My Orders</li>
                        <ul>
                            <li class="menu-item my-orders" data-id="all-orders">All Orders</li>
                            <li class="menu-item my-orders" data-id="my-returns">My Returns</li>
                            <li class="menu-item my-orders" data-id="my-cancellations">My Cancellations</li>
                        </ul>
                        <li class="menu-item" data-id="my-wishlist">My Wishlist</li>
                    </ul>
                </div>
            </div>
            <div class="col-9 p-2">
                <div class="shadow-sm p-4">
                    <div id="my-profile" class="invisible">
                        <p class="highlight title">Edit Your Profile</p>
                        <form action="" class="edit-profile form">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="w-100" placeholder="Your Name*">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="w-100" placeholder="Your Email*">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="w-100" placeholder="Your Email*">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="w-100" placeholder="Your Phone*">
                                </div>
                            
                                <div class="col-12">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="w-100 mb-2" placeholder="Current password">
                                    <input type="text" class="w-100 mb-2" placeholder="New password">
                                    <input type="text" class="w-100 mb-2" placeholder="Confirm password">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Send Message" class="btn-msg mt-2 ">
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
                    <div class="row">
                        <div class="col-2">
                            Order ID
                        </div>
                        <div class="col-2 text-center">Order Date</div>
                        <div class="col-2 ">
                            Order status
                        </div>
                        <div class="col-2 text-center">Quantity</div>
                        <div class="col-2 text-center">Total Price</div>
                        <div class="col-2 text-center">View Orders</div>
                    </div>
                        <?php display_orders(); ?>
                    </div>
                    <div id="my-returns" class="invisible">My Returns</div>
                    <div id="my-cancellations" class="invisible">My Cancellations</div>
                    <div id="my-wishlist" class="invisible">My Wishlist</div>
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
            <div class="modal-body">
                <form action="" class="edit-profile form">
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="w-100" placeholder="Your Name*">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="w-100" placeholder="Your Email*">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="w-100" placeholder="Your Phone*">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Pin code</label>
                            <input type="text" class="w-100" placeholder="Your Pin code*">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Address</label>
                            <textarea name="address" class="w-100" id="address" rows="3" placeholder="Your Address*"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end gap">
                    <button class="primary-btn d"  data-bs-dismiss="modal">Close</button>
                    <button class="primary-btn " data-bs-toggle="modal" data-bs-target="#Modal">Edit Address</button>
                </div>
            </div>
          </div>
        </div>
      </div>
<?php include('footer.php'); ?>

<?php 
    function display_orders(){
        for($i=1;$i<=5;$i++){
            echo '
            <div class="row">
                <div class="col-2">
                    123
                </div>
                <div class="col-2 text-center">11-08-2024</div>
                <div class="col-2 ">Pending</div>
                <div class="col-2 text-center">2</div>
                <div class="col-2 text-center">100.00</div>
                <div class="col-2 text-center"><a class="primary-btn order-link">View Order</a></div>
            </div>
    
            ';
        } 
    }
?>