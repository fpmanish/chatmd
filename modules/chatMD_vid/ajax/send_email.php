<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$mailObj = new PHPMailer();
  $mailObj->IsHTML(true);

					$mailObj->AddAddress($email);

					$mailObj->From = $email;

					$mailObj->FromName = $full_name;

					$mailObj->Subject = 'ChatMD notes';

					$mailObj->Body =$notes
					;

					if(!$mailObj->Send()) {



$error_message="Mailer Error: " . $mailObj->ErrorInfo; 



}

					 else {
					 	echo "Email has been send";
					 }

?>