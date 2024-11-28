<?php include('header.php');
$addId = $_GET['id'];
$q = "select * from address_details_tbl where Address_Id='$addId'";
$data = mysqli_query($con, $q);
$address = mysqli_fetch_assoc($data);
$nameParts = explode(" ", trim($address['Full_Name']));
$firstname = $nameParts[0];
$lastname = $nameParts[1];
$addParts = explode(", ", $address['Address']);
$street = $addParts[0];
$apartment = $addParts[1];

?>
<div class="container sitemap">
    <p>
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="cart.php" class="text-decoration-none dim link">Cart /</a>
        Edit Address
    </p>
</div>
<div class="container">
    <div class="row g-5">
        <div class="col-12">
            <form action="" method="post" id="billingForm" class="billing-details form" onsubmit="return validateForms();">
                <div class="mb-4">
                    <h2 class="mb-4">Edit Address</h2>
                    <div class="row gx-2 gy-3">
                        <div class="col-12 col-sm-6">
                            <label for="billingFirstName" class="form-label d-block">First Name<span class="required">*</span></label>
                            <input name="billingFirstName" type="text" id="billingFirstName" class="w-100" placeholder="First Name" value="<?php echo $firstname; ?>">
                            <p id="billingFirstNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingLastName" class="form-label d-block">Last Name<span class="required">*</span></label>
                            <input name="billingLastName" type="text" id="billingLastName" class="w-100" placeholder="Last Name" value="<?php echo $lastname; ?>">
                            <p id="billingLastNameError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingAddress" class="form-label d-block">Street Address<span class="required">*</span></label>
                            <textarea name="billingAddress" id="billingAddress" class="w-100" rows="2" placeholder="Street Address" value="<?php echo $street; ?>"></textarea>
                            <p id="billingAddressError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label for="billingApartment" class="form-label d-block">Apartment, Floor, etc.(Optional)</label>
                            <textarea name="billingApartment" id="billingApartment" class="w-100" rows="2" placeholder="Apartment, Floor, etc." value="<?php echo $apartment; ?>"></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingCity" class="form-label d-block">City<span class="required">*</span></label>
                            <input name="billingCity" type="text" id="billingCity" class="w-100" placeholder="City" value="<?php echo $address['City']; ?>">
                            <p id="billingCityError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingState" class="form-label d-block">State<span class="required">*</span></label>
                            <input name="billingState" type="text" id="billingState" class="w-100" placeholder="State" value="<?php echo $address['State']; ?>">
                            <p id="billingStateError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPinCode" class="form-label d-block">Pin Code<span class="required">*</span></label>
                            <input name="billingPinCode" type="text" id="billingPinCode" class="w-100" placeholder="Pin Code" value="<?php echo $address['Pincode']; ?>">
                            <p id="billingPinCodeError" class="error"></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="billingPhone" class="form-label d-block">Phone<span class="required">*</span></label>
                            <input name="billingPhone" type="text" id="billingPhone" class="w-100" placeholder="Phone Number" value="<?php echo $address['Phone']; ?>">
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
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Save Address" name="address" class="btn-msg mt-2">
                </div>
                <div class="mt-4 line mb-4"></div>
            </form>
        </div>
    </div>
</div>