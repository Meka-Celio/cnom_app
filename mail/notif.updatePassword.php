<?php
//Import PHPMailer classes into the global namespace
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$CIN    =   $_GET['CIN']; 
$Email  =   $_GET['Email'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug  = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'www.rachabusinessgroup.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rachabusinessgro';                     // SMTP username
    $mail->Password   = 'R@ch@2017';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587; 

    //Recipients
    $mail->setFrom('contact@cnom.ma', 'Service Espace Cotisation');
    $mail->addAddress($Email);     //Add a recipient
    $mail->addBCC('contact@cnom.ma');
    $mail->addBCC('support@cnom.ma', 'Support Espace Cotisation CNOM');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Changement de mot de passe';
    $mail->Body    = "
     ------------------------------------ <br>
    ESPACE COTISATION <br>
    ------------------------------------ <br>
    Vous avez proccede a un changement de mot de passe. <br><br>
    **************************************************<br>
    SERVICE ESPACE COTISATION <br>
    **************************************************<br><br>
    Pour toute information, merci de prendre contact avec notre support <br>
    contact@cnom.ma 
    ";
    $mail->AltBody = 'Vous avez fait un changement de mot de passe';
    $mail->send();
    header('Location:../view.user.php?msg=setPwdOK');
} catch (Exception $e) {
    echo "Le message a pas ??t?? envoy??. Erreur: {$mail->ErrorInfo}";
}