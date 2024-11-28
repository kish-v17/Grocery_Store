<?php include('header.php');
$query = 'select c.Quantity, p.Product_Name, p.Product_Image, p.Sale_Price - p.Sale_Price * p.Discount / 100 as "Price" FROM `product_details_tbl` p 
right join cart_details_tbl c on c.Product_Id = p.Product_Id where c.User_Id = ' . $_SESSION["user_id"];
$result = mysqli_query($con, $query);

?>
<div class="container sitemap">
    <p>
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="cart.php" class="text-decoration-none dim link">Cart /</a>
        Checkout
    </p>
</div>

<div class="container">
    <div class="row g-5">
        <div class="col-md-6">
            <div class="card border-0" style="margin-top: 20px;">
                <div class="row">
                    <h5>Select Shipping Address</h5>
                    <?php
                    $q = "select * from address_details_tbl where User_Id = '$_SESSION[user_id]'";
                    $result_address = mysqli_query($con, $q);
                    $i = 0;
                    while ($r_address = mysqli_fetch_assoc($result_address)) {
                        $fullAddress = $r_address['Full_Name'] . ',<br />' . $r_address['Phone'] . ',<br />' . $r_address['Address'] . ',<br/>' . $r_address['City'] . ',<br/>' . $r_address['State'] . ' - ' . $r_address['Pincode'];
                    ?>
                        <div class="col-6">
                            <div class="col-12">
                                <div name="address" style="border:2px solid black;height:28vh;" class="w-100 mb-2 p-2"><?php echo $fullAddress ?></div>

                                <div class="d-flex justify-content-between">
                                    <a href="edit_address.php?id=<?php echo $r_address['Address_Id']; ?>"><input type="button" class="primary-btn" style="margin-right:1vw;border:none" value="Edit"></a>
                                    <input type="button" style="border:none" value="Select this Address" onclick="select_address(<?php echo $r_address['Address_Id']; ?>)" class="primary-btn">
                                </div>
                            </div>
                            <?php
                            $i++;

                            if ($i % 2 == 0) {

                                echo "<br><br>";
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" id="add-new-address" onclick="showHideForm();" class="btn-msg mt-2">Add New Address</button>
                </div>
            </div>

            <form action="" method="post" id="billingForm" class="billing-details form" style="display:none !important" onsubmit="return validateForms();">
                <div class="mb-4">
                    <h2 class="mb-4">Billing Details</h2>
                    <div class="row gx-2 gy-3">
                        <div class="col-12 col-sm-6">
                            <label for="billingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                            <input name="billingFirstName" type="text" id="billingFirstName" class="w-100" placeholder="First Name">
                            <p id="billingFirstNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                            <input name="billingLastName" type="text" id="billingLastName" class="w-100" placeholder="Last Name">
                            <p id="billingLastNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                            <textarea name="billingAddress" id="billingAddress" class="w-100" rows="2" placeholder="Street Address"></textarea>
                            <p id="billingAddressError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingApartment" class="form-label d-block">Apartment, Floor, etc.(Optional)</label>
                            <textarea name="billingApartment" id="billingApartment" class="w-100" rows="2" placeholder="Apartment, Floor, etc."></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingCity" class="form-label d-block">City<span class="required">*</span></label>
                            <input name="billingCity" type="text" id="billingCity" class="w-100" placeholder="City">
                            <p id="billingCityError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingState" class="form-label d-block">State<span class="required">*</span></label>
                            <input name="billingState" type="text" id="billingState" class="w-100" placeholder="State">
                            <p id="billingStateError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                            <input name="billingPinCode" type="text" id="billingPinCode" class="w-100" placeholder="Pin Code">
                            <p id="billingPinCodeError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                            <input name="billingPhone" type="text" id="billingPhone" class="w-100" placeholder="Phone Number">
                            <p id="billingPhoneError" class="error"></p>
                        </div>

                        <div class="col-12">
                            <div>
                                <input name="add-shipping-address" type="checkbox" id="choice">
                                <label for="choice" class="form-label ms-1">Prefer a different address for shipping?</label>
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
                            <input name="shippingFirstName" type="text" id="shippingFirstName" class="w-100" placeholder="First Name">
                            <p id="shippingFirstNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                            <input name="shippingLastName" type="text" id="shippingLastName" class="w-100" placeholder="Last Name">
                            <p id="shippingLastNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="shippingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                            <textarea name="shippingAddress" id="shippingAddress" class="w-100" rows="2" placeholder="Street Address"></textarea>
                            <p id="shippingAddressError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="shippingApartment" class="form-label d-block">Apartment, Floor, etc.(Optional)</label>
                            <textarea name="shippingApartment" id="shippingApartment" class="w-100" rows="2" placeholder="Apartment, Floor, etc."></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingCity" class="form-label d-block">City<span class="required">*</span></label>
                            <input name="shippingCity" type="text" id="shippingCity" class="w-100" placeholder="City">
                            <p id="shippingCityError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingState" class="form-label d-block">State<span class="required">*</span></label>
                            <input name="shippingState" type="text" id="shippingState" class="w-100" placeholder="State">
                            <p id="shippingStateError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                            <input name="shippingPinCode" type="text" id="shippingPinCode" class="w-100" placeholder="Pin Code">
                            <p id="shippingPinCodeError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="shippingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                            <input name="shippingPhone" type="text" id="shippingPhone" class="w-100" placeholder="Phone Number">
                            <p id="shippingPhoneError" class="error"></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Save Address" name="address" class="btn-msg mt-2">
                </div>
                <div class="mt-4 line mb-4"></div>
            </form>
        </div>
        <div class="col-md-6 font-black checkout">
            <div class="mb-2">
                <?php
                while ($product = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="d-flex align-items-center p-2">
                        <img src="img/items/products/<?php echo $product["Product_Image"] ?>" class="checkout-image" alt="">
                        <div class="item-name ms-2"><?php echo $product["Product_Name"] ?> x <?php echo $product["Quantity"] ?></div>
                        <div class="price">₹<?php echo number_format($product["Price"], 2) ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="d-flex align-items-center p-2">
                <div>Subtotal:</div>
                <div class="price">₹<?php echo number_format($_SESSION["subtotal"], 2); ?></div>
            </div>
            <div class="my-2 line"></div>
            <div class="d-flex align-items-center p-2">
                <div>Shipping:</div>
                <div class="price">₹<?php echo number_format($_SESSION["shipping_charge"], 2); ?></div>
            </div>
            <?php if (isset($_SESSION["discount_amount"])) {
                echo '<div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                    <div>Discount:</div>
                    <div class="price">-₹' . number_format($_SESSION["discount_amount"], 2) . '</div>
                    </div>';
            } ?>
            <div class="my-2 line"></div>
            <div class="d-flex align-items-center p-2">
                <div>Total:</div>
                <div class="price">₹<?php echo number_format($_SESSION["total"], 2); ?></div>
            </div>
            <div class="my-2 line"></div>
            <form action="" method="post" id="checkoutForm" class="billing-details form" onsubmit="return validateForms();">
                <div class="p-2">
                    <div class="mb-1">Payment Mode:</div>
                    <div class="mb-1"><input type="radio" name="pay-mode" id="" value="COD"> Cash On Delivery</div>
                    <div><input type="radio" name="pay-mode" id="" value="Online"> Online</div>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Place Order" name="pay_now" class="btn-msg mt-2">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');

if (isset($_POST['address'])) {
    $userId = $_SESSION['user_id'];

    // Retrieve billing address data
    $billingFirstName = $_POST['billingFirstName'];
    $billingLastName = $_POST['billingLastName'];
    $billingAddress = $_POST['billingAddress'] . '<br />' . $_POST['billingApartment'];
    $billingCity = $_POST['billingCity'];
    $billingState = $_POST['billingState'];
    $billingPinCode = $_POST['billingPinCode'];
    $billingPhone = $_POST['billingPhone'];

    $addShippingAddress = isset($_POST['add-shipping-address']) ? true : false;

    $billingFullName = $billingFirstName . ' ' . $billingLastName;
    $billingQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
                     VALUES ('$userId', '$billingFullName', '$billingAddress', '$billingCity', '$billingState', '$billingPinCode', '$billingPhone')";

    if (mysqli_query($con, $billingQuery)) {
        $billingAddressId = mysqli_insert_id($con); // Get last inserted billing address ID
    } else {
        echo  mysqli_error($con);
    }

    // Handle shipping address if "same as billing" is unchecked
    if ($addShippingAddress) {
        $shippingFirstName = $_POST['shippingFirstName'];
        $shippingLastName = $_POST['shippingLastName'];
        $shippingAddress = $_POST['shippingAddress'] . ', ' . $_POST['shippingApartment'];
        $shippingCity = $_POST['shippingCity'];
        $shippingState = $_POST['shippingState'];
        $shippingPinCode = $_POST['shippingPinCode'];
        $shippingPhone = $_POST['shippingPhone'];

        $shippingFullName = $shippingFirstName . ' ' . $shippingLastName;
        $shippingQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
                          VALUES ('$userId', '$shippingFullName', '$shippingAddress', '$shippingCity', '$shippingState', '$shippingPinCode', '$shippingPhone')";

        if (mysqli_query($con, $shippingQuery)) {
            $shippingAddressId = mysqli_insert_id($con); // Get last inserted shipping address ID
        } else {
            echo  mysqli_error($con);
        }
    } else {
        $shippingAddressId = $billingAddressId;
    }
}




if (isset($_POST["pay_now"])) {
    $orderDate = date('Y-m-d H:i:s'); // Current date and time
    $paymentMode = $_POST['pay-mode']; // Set default or fetch from user input
    $orderStatus = $paymentMode == 'COD' ? 'Pending' : ''; // Default order status
    $shippingCharge = $_SESSION["shipping_charge"];
    $total = $_SESSION["total"];
    if ($paymentMode == 'Online') {
        echo "<script>
    location.href='payment-page.php';</script>";
    }
    // Insert Order into order_header_tbl
    $orderQuery = "INSERT INTO order_header_tbl 
                   (User_Id, Order_Date, Order_Status, Billing_Address_Id, Shipping_Address_Id, Shipping_Charge, Total, Payment_Mode) 
                   VALUES ('$userId', '$orderDate', '$orderStatus', '$billingAddressId', '$shippingAddressId', '$shippingCharge', '$total', '$paymentMode')";

    if (mysqli_query($con, $orderQuery)) {
        $orderId = mysqli_insert_id($con); // Get the last inserted Order ID
    } else {
        die("Error inserting order: " . mysqli_error($con));
    }

    // Fetch Products from the Cart and Insert into order_details_tbl
    $cartQuery = "SELECT c.Product_Id, c.Quantity, 
                         (p.Sale_Price - p.Sale_Price * p.Discount / 100) as Price 
                  FROM cart_details_tbl c
                  INNER JOIN product_details_tbl p ON c.Product_Id = p.Product_Id
                  WHERE c.User_Id = '$userId'";

    $cartResult = mysqli_query($con, $cartQuery);

    while ($cartRow = mysqli_fetch_assoc($cartResult)) {
        $productId = $cartRow['Product_Id'];
        $quantity = $cartRow['Quantity'];
        $price = $cartRow['Price'];

        $orderDetailsQuery = "INSERT INTO order_details_tbl 
                              (Order_Id, Product_Id, Quantity, Price) 
                              VALUES ('$orderId', '$productId', '$quantity', '$price')";

        if (!mysqli_query($con, $orderDetailsQuery)) {
            die("Error inserting order details: " . mysqli_error($con));
        }
    }

    // Clear the cart after placing the order
    $clearCartQuery = "DELETE FROM cart_details_tbl WHERE User_Id = '$userId'";
    if (!mysqli_query($con, $clearCartQuery)) {
        die("Error clearing cart: " . mysqli_error($con));
    }

    echo "<script>
    location.href='order-success.php';</script>";
}
