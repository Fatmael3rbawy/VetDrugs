<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

if (isset($_POST["btncheck"])) {
    include_once "users.php";
    $cust = new Users();

    $cust->setemail($_POST["txtemail"]);

    $rs = $cust->GetByEmail();
    if ($row = mysqli_fetch_assoc($rs)) {

        $no = rand(1111, 9999);
        $link = "http://localhost/vet2/pages/updatepassword.php?id=" . $row["user_id"];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.example.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth  = true;                                   // Enable SMTP authentication
            // SMTP password
            $mail->SMTPSecure = "TLS";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->Username = "fa2911674@gmail.com";
            $mail->Password = "171@abcd";

            $mail->setFrom('fa2911674@gmail.com', 'VET_DRUGS');



            $mail->addAddress($_POST["txtemail"], "VET_DRUGS");
            $mail->Subject = 'Forget Password';

            $mail->Body = "Dear : " . ($row["name"]) . "\n Your Verfication Code is " . $no . "\n Please Clike here To Update Password " . $link;

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                $_SESSION["code"] = $no;
                echo ("<div class='alert alert-success'> Check Your Email </div>");
            }
        } catch (Exception $a) {
        }
    } else
        echo ("<br/><div class='alert alert-danger'> Invaild Email , Try Again </div>");
}
