<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if (isset($_POST['email-submit'])) {
		

		require 'PHPMailer/src/Exception.php';
		require 'PHPMailer/src/PHPMailer.php';
		require 'PHPMailer/src/SMTP.php';
		$senderName = $_POST['name'];
		$subject = $_POST['subject'];
		$fromEmail = $_POST['email'];
		$toEmail = "romsky.bardillon@gmail.com";
		$message = $_POST['message'];
		
		$mail = new PHPMailer(true);
		$mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = "mail.smtp2go.com";
		$mail->SMTPAuth = true;
		$mail->Username = "rmbardillonjr@iskolarngbayan.pup.edu.ph";
		$mail->Password = "Romsky@001";
		$mail->SMTPSecure = "tls";
		$mail->Port = "2525";
		$mail->From = $fromEmail;
		$mail->FromName = $senderName;
		$mail->addAddress($toEmail, "Romeo JR Bardillon");
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AltBody = "This is the plain text version of email content";
		
		if (!$mail->send()) {
			header("location: ../home.html?email=failed");
    		exit();
		} else {
			header("location: ../home.html?email=success");
    		exit();
		}
	}