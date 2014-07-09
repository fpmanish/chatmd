<?php
extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "myaccount";

if(isset($_SESSION['AD_admin_user_id'])){
	$patientData=$settingsObj->getPatientById($_SESSION['AD_admin_user_id']);

	
}else{
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}

 if($patient_update =="1" && $submit=="Save"){
 	$user_array=$settingsObj->getPatientEmailByID($email,$_SESSION['AD_admin_user_id']);
	
	 if(count($user_array)==0)
	 {
	 	$currentTimestamp = getCurrentTimestamp();
	
 
 	$date_str= strtotime($dob);  
	 if($old_password !="")
	 {
	 	$old_password=createHash($old_password);
	 if($patientData['password']==$old_password){
	 	$password=createHash($password);
	 	$dataArr=array("name"=>$full_name,"email"=>$email,"password"=>$password,"dob"=>$date_str,
                "gender"=>$radio_1_set,
                "modify_date"=>$currentTimestamp,"user_type"=>'0');
				$settingsObj->updatePatient($_SESSION['AD_admin_user_id'],$dataArr);
				unset($_SESSION['rest']);
				 header("Location: ".MODULE_URL."/patient/dashboard.php?success=1");
						 	 exit;
	 }	
	 else {
		$error="Please enter correct password";
	 }	
	 }
	 else {
		 
		 $dataArr=array("name"=>$full_name,"email"=>$email,"dob"=>$date_str,
                "gender"=>$radio_1_set,
                "modify_date"=>$currentTimestamp,"user_type"=>'0');
				$settingsObj->updatePatient($_SESSION['AD_admin_user_id'],$dataArr);
				unset($_SESSION['rest']);
			 header("Location: ".MODULE_URL."/patient/dashboard.php?success=1");
						 	 exit;	
		 
	 }
 
 
 }
	 else if(count($user_array) >0) {
		 $error="Email Id already exists";
	 }
 }
?>