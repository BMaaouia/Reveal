<?php
	use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'C:/xampp/htdocs/reveal123(ajouter+afficher+supprimer)/reveal123/views/PHPMailer-master/PHPMailer-master/src/Exception.php';
  require 'C:/xampp/htdocs/reveal123(ajouter+afficher+supprimer)/reveal123/views/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
  require 'C:/xampp/htdocs/reveal123(ajouter+afficher+supprimer)/reveal123/views/PHPMailer-master/PHPMailer-master/src/SMTP.php';


  $mail = new PHPMailer();

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  
  //Enable SMTP debugging
  //SMTP::DEBUG_OFF = off (for production use)
  //SMTP::DEBUG_CLIENT = client messages
  //SMTP::DEBUG_SERVER = client and server messages
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->SMTPDebug =1;
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
  //if your network does not support SMTP over IPv6,
  //though this may cause issues with TLS
  
  //Set the SMTP port number:
  // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
  // - 587 for SMTP+STARTTLS
  $mail->Port = 465;
  
  //Set the encryption mechanism to use:
  // - SMTPS (implicit TLS on port 465) or
  // - STARTTLS (explicit TLS on port 587)
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = 'ghofranesoltani29@gmail.com';
  
  //Password to use for SMTP authentication
  $mail->Password = 'azerty2018';
  
  //Set who the message is to be sent from
  //Note that with gmail you can only use your account address (same as `Username`)
  //or predefined aliases that you have configured within your account.
  //Do not use user-submitted addresses in here
  $mail->setFrom('ghofranesoltani29@gmail.com', 'First Last');
  
  //Set an alternative reply-to address
  //This is a good place to put user-submitted addresses
  $mail->addReplyTo('ghofranesoltani29@gmail.com', 'First Last');
  
  //Set who the message is to be sent to
  $mail->addAddress('ghofranesoltani29@gmail.com', 'John Doe');
  
  //Set the subject line
  $mail->Subject = 'PHPMailer GMail SMTP test';
  
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  
  //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
  
  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';
  $mail->Body = 'Hello, this is my message.';
  //Attach an image file
 // $mail->addAttachment('images/phpmailer_mini.png');
  
  //send the message, check for errors
  if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message sent!';
      //Section 2: IMAP
      //Uncomment these to save your message in the 'Sent Mail' folder.
      #if (save_mail($mail)) {
      #    echo "Message saved!";
      #}
  }


?>
