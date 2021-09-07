<?php 
use PHPMailer\PHPMailer\PHPMailer;
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';

function prati_mail($doAdresa,$doIme,$odAdresa,$odIme,$subject,$body,$is_body_html=false){

    $mail = new PHPMailer();
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->isSMTP();                             
    $mail->Host = 'smtp.gmail.com';              
    $mail->SMTPSecure = 'tls';                  
    $mail->Port = 587;                           
    $mail->SMTPAuth = true;                     
    $mail->Username = 'webappfeit@gmail.com'; 
    $mail->Password = 'webAppTest44$';           
    
   
    $mail->setFrom($odAdresa, $odIme);
    $mail->addAddress($doAdresa, $doIme);
    $mail->Subject = $subject;
    $mail->Body = $body;                  
    $mail->AltBody = strip_tags($body);   
    if ($is_body_html) {
        $mail->isHTML(true);              
    }
    
    if(!$mail->send()) {
        throw new Exception('Error sending email: ' .
                            htmlspecialchars($mail->ErrorInfo) );        
    }    

}

?>