<?php
extract($_POST);
$settingsObj = new settings();
$pageObj= new pageManager();
$findObj = new find();
$loginObj= new LoginSystem();
$blogObj = new blog();
 if($action=="" )
{
if($_SESSION['doctorAppointmentId'] !=""  )
{
	$reasonName=$pageObj->getReasonById($_SESSION['resaon']);
		$reason= $reasonName['chatReason'];
$doctorData=$settingsObj->getPatientById($_SESSION['doctorAppointmentId']);
	$doctorDetails=$settingsObj->getDoctorById($_SESSION['doctorAppointmentId']);	
}

else{
	 header("Location: ".MODULE_URL."/Appointment/patient-detail.php");
						 	 exit;
}

}
 
?>