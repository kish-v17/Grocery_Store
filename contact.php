<?php include('header.php'); ?>
<div class="container mt-4">
    <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Contact</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 col-sm-12 p-2">
            <div class="shadow-sm p-4 flex-col">
                <div class="flex">
                    <img src="img/icons/icons-phone.png" alt="">
                    <p class="m-0">Call to us</p>
                </div>
                <p class="m-0">We are available 24/7, 7 days a week.</p>
                <p class="m-0">Phone: +8801611112222</p>
                <div class="line"></div>
                <div class="flex">
                    <img src="img/icons/icons-mail.png" alt="">
                    <p class="m-0">Write To US</p>
                </div>
                <p class="m-0">Fill out our form and we will contact you within 24 hours.</p>
                <p class="m-0">Emails: customer@exclusive.com</p>
            </div>
        </div>
        <div class="col-12 col-md-8 col-sm-12 p-2">
            <div class="shadow-sm p-4">
                <form id="contactForm" method="POST" action="">
                    <div class="flex form">
                        <div class="flex-item">
                            <input type="text" id="contactName" name="contactName" placeholder="Your Name*" class="w-100">
                            <p id="contactNameError" class="error"></p>
                        </div>
                        <div class="flex-item">
                            <input type="text" id="contactEmail" name="contactEmail" placeholder="Your Email*" class="w-100">
                            <p id="contactEmailError" class="error"></p>
                        </div>
                        <div class="flex-item">
                            <input type="text" id="contactPhone" name="contactPhone" placeholder="Your Phone*" class="w-100">
                            <p id="contactPhoneError" class="error"></p>
                        </div>
                    </div>
                    <div class="flex flex-column align-items-start">
                        <textarea name="contactMessage" id="contactMessage" class="flex-item w-100" rows="7" placeholder="Your Message*"></textarea>
                        <p id="contactMessageError" class="error"></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" name="submit" value="Send Message" class="btn-msg mt-2">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8 col-sm-12 p-2">
            <div class="shadow-sm p-4">
                <form id="contactForm" action="" onsubmit="return contactFormValidation()">
                    <div class="flex form">
                        <div class="flex-item">
                            <input type="text" id="contactName" placeholder="Your Name*" class="w-100">
                            <p id="contactNameError" class="error"></p>
                        </div>
                        <div class="flex-item">
                            <input type="text" id="contactEmail" placeholder="Your Email*" class="w-100">
                            <p id="contactEmailError" class="error"></p>
                        </div>
                        <div class="flex-item">
                            <input type="text" id="contactPhone" placeholder="Your Phone*" class="w-100">
                            <p id="contactPhoneError" class="error"></p>
                        </div>
                    </div>
                    <div class="flex flex-column align-items-start">
                        <textarea name="message" id="contactMessage" class="flex-item w-100" rows="7" placeholder="Your Message*"></textarea>
                        <p id="contactMessageError" class="error "></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Send Message" class="btn-msg mt-2">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include('footer.php'); ?>

<?php
if (isset($_POST['submit'])) 
{
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $phone = $_POST['contactPhone'];
    $message = $_POST['contactMessage'];

    $query = "INSERT INTO responses_tbl (Name, Email, Phone, Message) VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Message sent successfully!');location.href=location;</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

}
?>
