<?php
extract($_POST);
$settingsObj = new settings();
$pageObj= new pageManager();
$findObj = new find();
$calendraObj = new calendar();
$blogObj = new blog();
if($_SESSION['doctorAppointmentId'] !="")
{
	$_SESSION['resaon']=$chat_Reason;
	$reasonName=$pageObj->getReasonById($_SESSION['resaon']);
		$reason= $reasonName['chatReason'];
$doctorData=$settingsObj->getPatientById($_SESSION['doctorAppointmentId']);
	$doctorDetails=$settingsObj->getDoctorById($_SESSION['doctorAppointmentId']);	
	$interval=$calendraObj->getIntervalById($_SESSION['doctorAppointmentId']);
	$_SESSION['interval']=$interval['intervalBetween'];
}
else{
	 header("Location: ".MODULE_URL."/home");
						 	 exit;
}



?>