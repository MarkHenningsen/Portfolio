<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
  empty($_POST['message'])	||
  !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
  {
	echo "No arguments Provided!";
	return false;
  }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

 //Create the email and send the message
$to = 'cc-mark@live.dk';
$email_subject = "Hjemmeside kontaktformular:  $name";
$email_body = "Du har modtaget en ny besked fra din hjemmesides kontaktformular.\n\n"."Her er detaljerne:\n\nNavn: $name\n\nEmail: $email_address\n\nBesked:\n$message";
$headers = "Fra: noreply@fodterapeutirene.dk/\n"; 
$headers .= "Svar til: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			


?>