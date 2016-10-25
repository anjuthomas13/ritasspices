<?php
$to_id='ritasspices@gmail.com';
require 'PHPMailer/class.phpmailer.php';
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
if(isset($_POST['email']))
{
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 465;
   $mail->SMTPSecure = 'tls';
   $mail->SMTPAuth = true;
   $mail->Encoding='7bit';
   
   //authentication
   $mail->Username = "mail2ritasspices@gmail.com";
   $mail->Password="ritasspices01";
   
   //compose
   $mail->SetFrom($email_address,$name);
   $mail->AddReplyTo($email_address,$name)
   $mail->Subject = "Website Contact Form:  $name";
   $mail->msgHTML($message);
   
   //sendto
   $mail->addAddress($to_id,"Ritas Spices");
   if (!$mail->send()) {
	   return true;
   }
   else
   {
	    return true;
   }
}
// Create the email and send the message
/*	$mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 587;
   $mail->SMTPSecure = 'tls';
   $mail->SMTPAuth = true;
$to = 'ritasspices@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: mail2ritasspices@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;    */    
?>