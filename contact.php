<?php 
    include('header.php'); 
    $query = "SELECT `Contact_Email`, `Contact_Number` FROM `contact_page_details_tbl`";
    $result = mysqli_query($con, $query);
    $contact = mysqli_fetch_assoc($result);
?>
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
                <p class="m-0">Phone: +91 <?php echo $contact["Contact_Number"]; ?></p>
                <div class="line"></div>
                <div class="flex">
                    <img src="img/icons/icons-mail.png" alt="">
                    <p class="m-0">Write To US</p>
                </div>
                <p class="m-0">Fill out our form and we will contact you within 24 hours.</p>
                <p class="m-0 text-break">Email: <?php  echo $contact["Contact_Email"]; ?></p>
            </div>
        </div>
        <div class="col-12 col-md-8 col-sm-12 p-2">
            <div class="shadow-sm p-4">
                <form id="contactForm" method="POST" action="submit-response.php" onsubmit="return contactFormValidation()">
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
    </div>
</div>

<?php include('footer.php'); ?>