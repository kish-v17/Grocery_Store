<?php include('header2.php'); ?>
    <div class="container sitemap">
        <p><a href="index.php" class="text-decoration-none dim link">Home /</a> Contact</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 p-2">
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
            <div class="col-12 col-sm-8  p-2">
                <div class="shadow-sm p-4">
                    <form action="">
                        <div class="flex form">
                            <input type="text" placeholder="Your Name*" class="flex-item">
                            <input type="text" placeholder="Your Email*" class="flex-item">
                            <input type="text" placeholder="Your Phone*" class="flex-item">
                        </div>
                        <div class="flex">
                            <textarea name="message" id="contactMessage" class="flex-item"  rows="7" placeholder="Your Message*"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Send Message" class="btn-msg mt-2">
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
<?php include('footer.php') ?>