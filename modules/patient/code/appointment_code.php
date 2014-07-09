<?php

$settingsObj = new settings();
$chatObj = new chat();
$calendraObj = new calendar();
$pageObj = new pageManager();
$pageType = "myaccount";
$findObj = new find();
if($_GET['delete_id'] !="")
{
$chatObj->deleteAppointmentById($_GET['delete_id']);
 header("location:".MODULE_URL."/patient/pastAppointment.php");
			exit;
}

if(isset($_SESSION['AD_admin_user_id'])){
	$doctorData=$chatObj->ChatListByPatientId($_SESSION['AD_admin_user_id']);
     $latestDoctor=$chatObj->chatlatestThreeDoctorId($_SESSION['AD_admin_user_id']);
	 $officeAppointmentData=$chatObj->ChatListByPatientId($_SESSION['AD_admin_user_id'],1);
	
	
}else{
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}

 
?>