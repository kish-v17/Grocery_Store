<?php
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email_id = $_POST['email_id'];
$reply = $_POST['message'];
$subject = $_POST['subject'];

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'purebitegroceryshop@gmail.com';
    $mail->Password = 'ojpb rwba znvs mjac';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('purebitegroceryshop@gmail.com');
    $mail->addAddress($email_id);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<html>
                        <body>
                            <h2>Contact Response</h2>
                            <p>{$reply}</p>
                        </body>
                        </html>";

    if (!$mail->send()) {
        echo "<script>alert('Mail sending failed')</script>";
    } else {
        echo "<script>alert('Mail sent successfully')</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('" . $mail->ErrorInfo . "')</script>";
}

echo "<script> location.replace('responses.php');</script>";
