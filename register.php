    <?php include('header.php');
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['regbtn'])) {
        $regfname = $_POST['regfname'];
        $reglname = $_POST['reglname'];
        $regemail = $_POST['regemail'];
        $regphone = $_POST['regphone'];
        $regpwd = $_POST['regpwd'];

        $_SESSION['user_data'] = [
            'fname' => $regfname,
            'lname' => $reglname,
            'email' => $regemail,
            'phone' => $regphone,
            'pwd' => $regpwd
        ];

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kish.v07@gmail.com';
            $mail->Password = 'epjr uzfc lnfy yams';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';

            $mail->setFrom('kish.v07@gmail.com');
            $mail->addAddress($regemail, $regfname);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiration'] = time() + 300;

            $body = "<html>
                        <body>
                            <h2>Email Verification</h2>
                            <p>Dear {$_SESSION['user_data']['fname']},</p>
                            <p>Your OTP for email verification is: <strong>$otp</strong></p>
                            <p>This OTP will expire in 5 minutes.</p>
                            <p>If you didn't request this, please ignore this email.</p>
                        </body>
                    </html>";

            $mail->Body = $body;

            if (!$mail->send()) {
                setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
            } else {
                setcookie('success', 'Email sent successfully. Please check your inbox for OTP.', time() + 5, "/");
            }
        } catch (Exception $e) {
            setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
        }

        echo "<script> location.replace('otp-page.php');</script>";
    }

    ?>

    <div class="container">
        <div class="row p-3 g-3 mt-4 d-flex justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="login-form d-flex flex-column d-flex justify-content-center h-100 align-items-center">
                    <div class="mb-3 w-75">
                        <h2 class="mb-3">Create an account</h2>
                        <div class="mb-4">Enter your details below</div>
                        <form id="registrationForm" onsubmit="return validateRegistrationForm();" method="post">
                            <div class="names d-flex gap-3">
                                <input type="text" id="fname" name="regfname" class="w-50" placeholder="First Name">
                                <input type="text" id="lname" name="reglname" class="w-50" placeholder="Last Name">
                            </div>
                            <p id="nameError" class="error mb-4"></p>

                            <input type="text" id="email" class="w-100" name="regemail" placeholder="Email">
                            <p id="emailError" class="error mb-4"></p>

                            <input type="text" id="phone" class="w-100" name="regphone" placeholder="Mobile number">
                            <p id="phoneError" class="error mb-4"></p>

                            <input type="text" id="password" class="w-100" name="regpwd" placeholder="Password">
                            <p id="passwordError" class="error mb-4"></p>

                            <input type="text" id="confirmPassword" class="w-100" name="regcpwd" placeholder="Confirm Password">
                            <p id="confirmPasswordError" class="error mb-4"></p>

                            <input type="submit" value="Create an account" name="regbtn" class="btn-msg w-100">
                            <div class="mt-4 text-center">
                                Already have an account? <a href="login.php" class="dim link ms-2">Log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>