<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) 
&& isset($_POST['subject']) && isset($_POST['message']))
{

	// Variables
	$name = strip_tags($_POST['name']);
	$mobile = strip_tags($_POST['mobile']);
	$email = strip_tags($_POST['email']);
	$subject = strip_tags($_POST['subject']);
	$message = strip_tags($_POST['message']);
	try
	{
		$phpEmail = new PHPMailer();
		$phpEmail->IsSMTP();
		$phpEmail->SMTPAuth = true;
		$phpEmail->SMTPSecure = "tls";
		$phpEmail->Host = "smtp.gmail.com";
		$phpEmail->Port = 587;
		$phpEmail->Username = "from@gmail.com";
		$phpEmail->Password = "frompwd@96";
		$phpEmail->SetFrom('from@gmail.com','firstname Website');
		$phpEmail->FromName = "Firstname Website";
		$phpEmail->addAddress("to@gmail.com");
		$phpEmail->Subject = $subject;
		$phpEmail->Body = "<strong>Name:</strong> $name <br>
							<strong>Email:</strong> <a href=mailto:$email?subject=RE:$subject>$email</a> <br> <br>
							<strong>Mobile:</strong> $mobile <br>
							<strong>Message:</strong> $message <br>";
		$phpEmail->IsHTML (true);
		if (!$phpEmail->Send())
		{
			 
			echo $phpEmail->ErrorInfo;
		}
		else
		{
			echo "Message Sent!";
		}
	}
	catch(phpmailerException $ex)
	{
		echo $ex->errorMessage();
	}
} 
  
?>