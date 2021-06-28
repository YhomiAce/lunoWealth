<?php

	require_once "db.php";

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require 'vendor/autoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	if(isset($_POST['action']) && $_POST['action'] == 'send_email'){
		print_r($_POST);
		$name = htmlspecialchars($_POST['name']);
		$phone = htmlspecialchars($_POST['Phone']);
		$data = htmlspecialchars($_POST['message']);

		$to = $email;
		$subject = 'Contact Request';

		$headers = "From: " . $email. "\r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= "CC: susan@example.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$message = '<html><body>';
		$message .= '<h1>Hello From Luno Wealth!</h1>';
		$message .= '<div>';
		$message .= '<h2>Contact Request From '. $name.'</h2>';
		$message .= '<h2>Phone Number: '.$phone.' </h2>';
		$message .= '<p>'.$data.' </p>';
		$message .= '</div>';
		$message .= "</body></html>";
		
		try{
			$mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPDebug  = 0;
            $mail->Username   = "1e544c5e5f7d79";                    
            $mail->Password   = "e841d92282037e";                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;

			$mail->setFrom('test@mail.com','Kreative');
			$mail->addAddress("mail@gmail.com");

			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->send();
			echo 'Your mail has been sent successfully.';
			
		}catch(Exception $e){
			echo 'Unable to send email. Please try again.';
		}
		
	}