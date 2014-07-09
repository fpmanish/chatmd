<?php $settingsObj = new settings();
$pageType = "myaccount";
if(isset($_SESSION['AD_admin_user_id'])){
	$doctorData=$settingsObj->getDoctorById($_SESSION['AD_admin_user_id']);
}
else {
	
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}

?>