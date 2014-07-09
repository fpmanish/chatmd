<?php
extract($_POST);
$settingsObj = new settings();
$chatObj = new chat();
$pageObj = new pageManager();
$pageType = "myaccount";

if(isset($_SESSION['AD_admin_user_id'])){
	$patientData=$chatObj->ChatListByDoctorId($_SESSION['AD_admin_user_id']);
 $doctorAsPatientData=$chatObj->ChatListByPatientId($_SESSION['AD_admin_user_id']);
 $OfficepatientData=$chatObj->ChatListByDoctorId($_SESSION['AD_admin_user_id'],1);	
}else{
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}


?>