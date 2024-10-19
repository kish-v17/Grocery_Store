<?php
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
include "../DB/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email_id = $_POST['email_id'];
$reply = $_POST['message'];
$subject = $_POST['subject'];
$response_id = $_POST['response_id'];

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
        $query = "update responses_tbl set Reply='$reply' where Response_Id = $response_id";
        if(mysqli_query($con, $query)){
            echo "<script>alert('Mail sent successfully')</script>";
        }
        else{
            echo "<script>alert('". mysqli_error($con) ."')</script>";
        }
    }
} catch (Exception $e) {
    echo "<script>alert('" . $mail->ErrorInfo . "')</script>";
}

echo "<script> location.replace('responses.php');</script>";
