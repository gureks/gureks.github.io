<?php

$name = $_POST['name'];
$institution = $_POST['institution'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$exper = $_POST['exper'];
$pref1 = $_POST['pref1'];
$pref2 = $_POST['pref2'];
$pref3 = $_POST['pref3'];

if(empty($name)  		||
   empty($email_address) 	||
   empty($phone) 		||
   !filter_var($email_address,FILTER_VALIDATE_EMAIL))
   {
	echo "Required fields not filled!";
	return false;
   }
	
$to = 'mail@tafsmun.com';
$cc = 'gurek0001@gmail.com';
$email_subject = "Individual Delegate Application: $name";
$email_body = "\n\nName: $name\n\nInstitution: $institution\n\nEmail: $email_address\n\nPhone: $phone\n\nExperience: $exper\n\nPreference 1: $pref1\n\nPreference 2: $pref2\n\nPreference 3: $pref3\n\n";
$headers = "From: noreply@tafsmun.com\n"; 
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
//mail($cc,$email_subject,$email_body,$headers);
return true;			

?>