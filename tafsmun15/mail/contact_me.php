<?php

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Required fields not filled!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = 'mail@tafsmun.com';
//$cc = 'gurek0001@gmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From:  noreply@tafsmun.com\n"; 
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
//mail($cc,$email_subject,$email_body,$headers);

return true;			

?>