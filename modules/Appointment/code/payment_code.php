<?php
extract($_POST);
include('mail_patient.php');
$mailObj = new PHPMailer(true);
$settingsObj = new settings();
$pageObj= new pageManager();
$findObj = new find();
$loginObj= new LoginSystem();
$blogObj = new blog();
$chatObj=new chat();
$success=$chatObj->ChatAdd($dataArr);
$userDetalis=$settingsObj->getPatientById($_SESSION['AD_admin_user_id']);
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