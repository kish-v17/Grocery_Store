<?php include('header.php');
$user_id = $_SESSION["user_id"];
$query = "select * from user_details_tbl where User_Id=" . $user_id;
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

$orderQuery = "select oh.Order_Id, oh.User_Id, oh.Order_Status, DATE(oh.Order_Date) AS Order_Date, sum(od.Quantity) as 'Quantity', oh.Total from order_header_tbl oh left join order_details_tbl od on oh.Order_Id = od.Order_Id group by oh.Order_Id, oh.Order_Status, oh.Order_Date, oh.Total, oh.User_Id having oh.User_Id =" . $_SESSION["user_id"];
$orderResult = mysqli_query($con, $orderQuery);

$wishQuery = "select p.Product_Name,p.Product_Id, p.Product_Image, round(p.Sale_Price-p.Sale_Price*p.Discount/100,2) as 'Price' from wishlist_details_tbl as w left join product_details_tbl as p on w.Product_Id = p.Product_Id where User_Id = " . $user_id;
$wishResult = mysqli_query($con, $wishQuery);

?>
<div class="container ">
    <div class=" d-flex justify-content-between sitemap mt-5">
        <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Account</p>
        <p>Welcome! <span class="highlight"><?php echo $user["First_Name"]; ?></span></p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3 p-2 d-flex flex-row flex-sm-column ">
            <div class="shadow-sm p-4 d-flex heading text-nowrap">
                <ul class="d-flex flex-row flex-md-column gap-3 heading">
                    <li class="active menu-item js-account mb-0" data-id="my-profile">My Profile</li>
                    <!-- <li class=" menu-item js-account mb-0" data-id="address-book">Address Book</li> -->
                    <li class="menu-item my-orders-main mb-0" data-id="all-orders">My Orders</li>
                    <li class="menu-item mb-0" data-id="my-wishlist">My Wishlist</li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-9 p-2">
            <div class="shadow-sm p-4">
                <div id="my-profile" class="invisible">
                    <p class="highlight title">Edit Your Profile</p>
                    <form class="edit-profile form" onsubmit="return validateMyAccountForm();" action="update-profile.php" method="post" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="w-100" name="firstName" placeholder="Your Name*" id="firstName" value="<?php echo $user["First_Name"]; ?>">
                                <p id="firstNameError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="w-100" name="lastName" placeholder="Your Last name*" id="lastName" value="<?php echo $user["Last_Name"]; ?>">
                                <p id="lastNameError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label d-block">Email</label>
                                <input type="text" class="w-100" placeholder="Your Email*" name="uemail" id="email" value="<?php echo $user['Email']; ?>" disabled>
                                <p id="emailError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="" class="form-label d-block">Phone</label>
                                <input type="text" class="w-100" placeholder="Your Phone*" name="uphone" id="phone" value="<?php echo $user['Mobile_No']; ?>" disabled>
                                <p id="phoneError" class="error"></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <img src="img/users/<?php echo $user["Profile_Picture"]; ?>" alt="" height="200" width="200">
                                <input type="hidden" name="old_image" value="<?php echo $user["Profile_Picture"]; ?>">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userImage" class="form-label">User Image</label>
                                    <input type="file" class="form-control" id="userImage" name="user_image" accept="image/*">
                                    <div id="userImageError" class="error-message"></div>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Update Profile" class="btn-msg mt-2 ">
                        </div>
                    </form>
                    <form class="edit-profile form" onsubmit="return validateChangePassword();" action="update-password.php" method="post">
                        <div class="row g-2">
                            <div class="col-12">
                                <label for="" class="form-label d-block">Password</label>
                                <input type="text" name="current" class="w-100 mb-2" placeholder="Current password" id="currentPassword">
                                <p id="currentPasswordError" class="error"></p>
                                <input type="text" name="new" class="w-100 mb-2" placeholder="New password" id="newPassword">
                                <p id="newPasswordError" class="error"></p>
                                <input type="text" name="confirm" class="w-100 mb-2" placeholder="Confirm password" id="confirmPassword">
                                <p id="confirmPasswordError" class="error"></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" name="change" value="Change Password" class="btn-msg mt-2 ">
                        </div>
                    </form>
                </div>
                <!-- <div id="address-book" class="invisible">
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
                </div> -->
                <div id="all-orders" class="invisible container cart-table">
                    <table class="table cart-table  text-nowrap">
                        <tr class="heading">
                            <th>Order ID</th>
                            <th>Order status</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>View Orders</th>
                        </tr>
                        <?php while ($order = mysqli_fetch_assoc($orderResult)) { ?>
                            <tr>
                                <td><?php echo $order["Order_Id"]; ?></td>
                                <td><?php echo $order["Order_Date"]; ?></td>
                                <td><?php echo $order["Quantity"]; ?></td>
                                <td>₹<?php echo number_format($order["Total"], 2); ?></td>
                                <td>
                                    <a class="primary-btn order-link" href="order-details.php?id=<?php echo $order["Order_Id"]; ?>">View Order</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div id="my-wishlist" class="invisible container cart-table">
                    <table class="table cart-table text-nowrap">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                            <tr class="heading">
                                <th>Product</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                            while ($product = mysqli_fetch_assoc($wishResult)) { ?>
                                <tr>
                                    <td>
                                        <img src="img/items/products/<?php echo $product["Product_Image"]; ?>" alt="<?php echo $product["Product_Name"]; ?>" class="image-item d-inline-block">
                                        <div class="d-inline-block"><?php echo $product["Product_Name"]; ?></div>
                                    </td>
                                    <td>₹<?php echo $product["Price"]; ?></td>
                                    <td>
                                        <a class="primary-btn update-btn" href="php/move-to-cart.php?product_id=<?php echo $product["Product_Id"] ?>&user_id=<?php echo $user_id ?>">Add to cart</a>
                                        <a class="primary-btn delete-btn ms-2" href="php/remove-from-wishlist.php?product_id=<?php echo $product["Product_Id"] ?>">Delete</a>
                                    </td>
                                </tr>

                        <?php }
                        } else {
                            echo "<td colspan='4'>No items in wishlist.</td>";
                        } ?>
                    </table>
                    <div class="text-end cart-page mb-5 mt-3">
                        <a class="primary-btn update-btn" href="move-all-to-cart.php">Move all to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('footer.php'); ?>

    <?php

    if (isset($_POST['btnUpdate'])) {

        $ufnm = $_POST['ufname'];
        $ulnm = $_POST['ulname'];
        $umob = $_POST['uphone'];

        $sql = "UPDATE user_details_tbl SET First_Name='$ufnm',Last_Name='$ulnm',Mobile_No='$umob' WHERE User_Id='$_SESSION[user_id]'";
        if (mysqli_query($con, $sql)) {
            setcookie('success', 'Your Details has been updated.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        } else {
            setcookie('error', 'Error in Update Profile.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        }
    }

    if (isset($_POST['change'])) {
        $curr = $_POST['current'];
        $new = $_POST['new'];

        if ($curr == $user['Password']) {
            $sql = "UPDATE user_details_tbl SET Password='$new' WHERE User_Id='$_SESSION[user_id]'";
            if (mysqli_query($con, $sql)) {
                setcookie('success', 'Your Details has been updated.', time() + 5, "/");
                echo "<script> location.replace('account.php');</script>";
            } else {
                setcookie('error', 'Error in Update Profile.', time() + 5, "/");
                echo "<script> location.replace('account.php');</script>";
            }
        } else {
            setcookie('error', 'Password does not matched.', time() + 5, "/");
            echo "<script> location.replace('account.php');</script>";
        }
    }

    ?>