<?php
include_once("../../../conf/config.inc.php");
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'satyanarayan2_api1.futureprofilez.com'; //PayPal API Username
$PayPalApiPassword 		= '1368195171'; //Paypal API password
$PayPalApiSignature 	= 'AeD3kECT6P.AHYxxtUu-4tUfbP0ZAVY9bNOt7tGSMDQfhB46Fi4HqtoO'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://chat-md.com/modules/sign_up/code/process.php'; //Point to process.php page
$PayPalCancelURL 		= 'http://chat-md.com/modules/home/'; //Cancel URL if user clicks cancel
//$PayPalReturnURL 		= 'http://www.facebook.com/'; //Point to process.php page
//$PayPalCancelURL 		= 'http://http://www.facebook.com/'; //Cancel URL if user clicks cancel
$payer_email = "satyanarayan-facilitator@futureprofilez.com" ;
?>