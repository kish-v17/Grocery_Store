<?php include('header.php'); 
    $query = "select oh.Order_Id, oh.Order_Status, oh.Order_Date, 
    u.First_Name, u.Last_Name, u.Mobile_No, u.Email, oh.Payment_Mode, oh.Shipping_Address_Id, oh.Billing_Address_Id
    from order_header_tbl oh right join user_details_tbl u on oh.User_Id = u.User_Id 
    where u.User_Id = ". $_SESSION["user_id"];
    $result = mysqli_query($con, $query);
    $order = mysqli_fetch_assoc($result);
?>

<div class="container sitemap">
    <p class="my-5">
        <a href="index.php" class="text-decoration-none dim link">Home /</a>
        <a href="order-history.php" class="text-decoration-none dim link">Orders /</a>
        Order# 123456
    </p>
    <div class="row order-border p-3 mb-4 m-1">
        <div class="col-6">
            <h4 class="mb-2">Order# <?php echo $order["Order_Id"]; ?></h4>
            <div class="order-status mb-3">
            <?php echo $order["Order_Status"]; ?>
            </div>
            <div class="order-date">
                Placed on: <?php echo $order["Order_Date"]; ?>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-start">
            <button class="primary-btn">Re-order</button>
        </div>
    </div>
    <div class="row align-items-stretch mb-4 gap-md-0 m-1">
        <div class="col-md-4 col-sm-6 col-12 ps-md-0 mb-2">
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
                        <p><?php echo $order["First_Name"] . $order["Last_Name"]; ?></p>
                        <p>+91 <?php echo $order["Mobile_No"]?></p>
                        <p class="text-break"><?php echo $order["Email"]; ?></p>
                        <p><?php echo $order["Payment_Mode"]; ?></p>
                    </div>
                </div>

            </div>
        </div>
        <?php
            $query = "select * from address_details_tbl where Address_Id=". $order["Shipping_Address_Id"];
            $result = mysqli_query($con, $query);
            $shipping_address = mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-4 col-sm-6 col-12 mb-2">
            <div class="order-border p-3">
                <h5 class="mb-3">Shipping Address</h5>
                <address class="address-book">
                    <p><?php echo $shipping_address["Full_Name"]; ?></p>
                    <p> Street: <?php echo $shipping_address["Address"]; ?></p>
                    <p> City: <?php echo $shipping_address["City"]; ?></p>
                    <p> State:<?php echo $shipping_address["State"]; ?></p>
                    <p> Pin code: <?php echo $shipping_address["Pincode"]; ?></p>
                    <p> Phone Number: +91 <?php echo $shipping_address["Phone"]; ?></p>
                </address>
            </div>
        </div>
        <?php
            $query = "select * from address_details_tbl where Address_Id=". $order["Billing_Address_Id"];
            $result = mysqli_query($con, $query);
            $billing_address = mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-4 col-sm-6 col-12 mb-2">
            <div class="order-border p-3">
                <h5 class="mb-3">Billing Address</h5>

                <address class="address-book">
                <p><?php echo $billing_address["Full_Name"]; ?></p>
                    <p> Street: <?php echo $billing_address["Address"]; ?></p>
                    <p> City: <?php echo $billing_address["City"]; ?></p>
                    <p> State:<?php echo $billing_address["State"]; ?></p>
                    <p> Pin code: <?php echo $billing_address["Pincode"]; ?></p>
                    <p> Phone Number: +91 <?php echo $billing_address["Phone"]; ?></p>
                </address>
            </div>
        </div>
    </div>
    <?php 
        
    ?>
    <div class="row order-border py-4 mb-4 order-item-list m-1 m-md-0 cart-table">
        <h5 class="mb-3">Items ordered</h5>
        <div class="row py-3 order-item-list-header mx-0 my-2 text-nowrap">
            <div class="col-4 p-md-0">
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