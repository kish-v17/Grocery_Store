<?php include('header.php');
$query = 'select c.Quantity, p.Product_Name, p.Product_Image, p.Sale_Price - p.Sale_Price * p.Discount / 100 as "Price" FROM `product_details_tbl` p 
right join cart_details_tbl c on c.Product_Id = p.Product_Id where c.User_Id = ' . $_SESSION["user_id"];
$result = mysqli_query($con, $query);

?>
<script>
    function select_address(id) {
        $.ajax({
            url: 'select-address.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                // Display the selected address and hide other addresses
                const addressElement = document.getElementById('d_address');
                if (addressElement) {
                    addressElement.innerHTML = `
                    <div class="alert alert-success">
                        ${response}
                    </div>`;
                }

                // Hide the address selection container
                document.querySelector('.addresses').style.display = 'none';
            },
            error: function(xhr, status, error) {
                console.error("Error selecting address:", error);
                alert("An error occurred while selecting the address. Please try again.");
            }
        });
    }
</script>

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
                    <div class="addresses d-flex flex-wrap">
                        <?php
                        $q = "SELECT * FROM address_details_tbl WHERE User_Id = '$_SESSION[user_id]'";
                        $result_address = mysqli_query($con, $q);

                        while ($r_address = mysqli_fetch_assoc($result_address)) {
                            $fullAddress = $r_address['Full_Name'] . ',<br />' . $r_address['Phone'] . ',<br />' . $r_address['Address'] . ',<br/>' . $r_address['City'] . ',<br/>' . $r_address['State'] . ' - ' . $r_address['Pincode'];
                        ?>
                            <div class="col-md-6 mb-4"> <!-- 2 columns layout -->
                                <div class="border p-3 h-100 d-flex flex-column justify-content-between">
                                    <div><?php echo $fullAddress ?></div>
                                    <button type="button" onclick="select_address(<?php echo $r_address['Address_Id']; ?>)" class="btn btn-primary mt-2">Select this Address</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card mt-4 p-3 border">
                        <h5><u>Delivery Address</u></h5>
                        <p id="d_address"></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" id="add-new-address" onclick="showHideForm()" class="btn btn-success mt-2">Add New Address</button>
                </div>
            </div>


            <form action="checkout.php" method="post" id="billingForm" class="billing-details form" style="display:none !important" onsubmit="return validateForms();">
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
                <div class="price">₹<?php echo number_format($_SESSION['total-pay']['subtotal'], 2); ?></div>
            </div>
            <div class="my-2 line"></div>
            <div class="d-flex align-items-center p-2">
                <div>Shipping:</div>
                <div class="price">₹<?php echo number_format($_SESSION['total-pay']['shipping_charge'], 2); ?></div>
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
                <div class="price">₹<?php echo number_format($_SESSION['total-pay']['total'] - $_SESSION["discount_amount"], 2); ?></div>
            </div>
            <div class="my-2 line"></div>
            <form action="" method="post" id="checkoutForm" class="form" onsubmit="return validateCheckout();">
                <div class="p-2">
                    <div class="mb-1">Payment Mode:</div>
                    <div class="mb-1"><label><input type="radio" name="pay-mode" value="COD"> Cash On Delivery</label></div>
                    <div><label><input type="radio" name="pay-mode" value="Online"> Online</label></div>
                </div>
                <div id="payModeError" class="error"></div>
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Place Order" name="pay_now" class="btn-msg mt-2">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');
// echo $_SESSION["discount_amount"];
$_SESSION['checkout_initiated'] = true;
if (isset($_POST['address'])) {
    $userId = $_SESSION['user_id'];

    // Retrieve billing address data
    $billingFirstName = $_POST['billingFirstName'];
    $billingLastName = $_POST['billingLastName'];
    $billingAddress = $_POST['billingAddress'] . ',<br />' . $_POST['billingApartment'];
    $billingCity = $_POST['billingCity'];
    $billingState = $_POST['billingState'];
    $billingPinCode = $_POST['billingPinCode'];
    $billingPhone = $_POST['billingPhone'];


    $billingFullName = $billingFirstName . ' ' . $billingLastName;
    $billingQuery = "INSERT INTO address_details_tbl (User_Id, Full_Name, Address, City, State, Pincode, Phone) 
                     VALUES ('$userId', '$billingFullName', '$billingAddress', '$billingCity', '$billingState', '$billingPinCode', '$billingPhone')";

    if (mysqli_query($con, $billingQuery)) {
        $billingAddressId = mysqli_insert_id($con);
        echo "<script>
    location.href='checkout.php';</script>"; // Get last inserted billing address ID
    } else {
        echo  mysqli_error($con);
    }
}

if (isset($_POST["pay_now"])) {
    $userId = $_SESSION['user_id'];
    $orderDate = date('Y-m-d H:i:s'); // Current date and time
    $paymentMode = $_POST['pay-mode']; // Set default or fetch from user input
    $orderStatus = $paymentMode == 'COD' ? 'Pending' : ''; // Default order status
    $shippingCharge = $_SESSION['total-pay']['shipping_charge'];
    $total_amount = $_SESSION['total-pay']['total'] - $_SESSION["discount_amount"];
    if ($paymentMode == 'Online') {
        echo "<script>
    location.href='payment-page.php';</script>";
    } else {
        // Insert Order into order_header_tbl
        $orderQuery = "INSERT INTO order_header_tbl 
                   (User_Id, Order_Date, Order_Status,Del_Address_Id, Shipping_Charge, Total, Payment_Mode) 
                   VALUES ('$userId', '$orderDate', '$orderStatus', '$_SESSION[add_id]', '$shippingCharge', '$total_amount', '$paymentMode')";

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
}
