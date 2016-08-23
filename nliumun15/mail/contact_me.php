<?php

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['subject']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Required fields not filled!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$to = 'nliumun@gmail.com';
//$cc = 'gurek0001@gmail.com';
$email_subject = "Website Contact Form:  $name | $subject";
$email_body = "\n\nName: $name\n\nEmail: $email_address\n\nSubject: $subject\n\nMessage:\n$message";
$headers = "From:  noreply@nliumun.com\n"; 
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
//mail($cc,$email_subject,$email_body,$headers);

return true;			

?>