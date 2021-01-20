<?php


// mail($to, $subject, $message, $headers);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';
//Load composer's autoloader
require 'vendor/autoload.php';
// require_once 'PHPMailer-FE_v4.11/_lib/class.phpmailer.php'; 
//   creates object
  // $mail = new PHPMailer(true); 
  if(isset($_POST['btn_send']))
  {
   $email      = strip_tags($_POST['email']);
   $subject    = strip_tags($_POST['subject']);
   $text_message    = "Hello";      
   $message  = strip_tags($_POST['message']);
 try
   {
    $mail = new PHPMailer;

    // $mail->From = "name@gmail.com";
    // $mail->FromName = "username";
    
    // $mail->addAddress($email, "Recipient Name");
    
    //Provide file path and name of the attachments
    // $mail->addAttachment("file.txt", "File.txt");        
    // $mail->addAttachment("images/profile.png"); //Filename is optional
    
    // $mail->isHTML(false);
    
    // $mail->Subject = "Subject Text";
    // $mail->Body = "<i>Mail body in HTML</i>";
    // $mail->AltBody = "This is the plain text version of the email content";
    
    // try {
    //     $mail->send();
    //     echo "Message has been sent successfully";
    // } catch (Exception $e) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;
    // }
    $mail->IsSMTP(); 
    $mail->isHTML(true);
    $mail->SMTPDebug  = 2;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port        = '587'; 
    $mail->Username   ="fromname@gmail.com";  
    $mail->Password   ="password";            
    $mail->setFrom('fromname@gmail.com','First Last');
    $mail->AddReplyTo("replyto@gmail.com","First Last");
    $mail->Subject    = $subject;
    $mail->Body    = $message;
    $mail->AltBody    = $message;
     
    if($mail->Send())
    {
     
      echo "Hi, Your mail successfully sent to".$email." ";
     
    } else {

      echo "Your mail not sent";

    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
  } 
  
?>