<?php
extract($_POST);
$settingsObj = new settings();
$pageObj= new pageManager();
$findObj = new find();
$loginObj= new LoginSystem();
$TERM_OF_USE = $pageObj->getpageByIdAct(8,1);
if($action=="")
{
if($_SESSION['doctorAppointmentId'] !=""  && $_SESSION['AD_admin_user_id'] =="")
{
	$reasonName=$pageObj->getReasonById($_SESSION['resaon']);
		$reason= $reasonName['chatReason'];
$doctorData=$settingsObj->getPatientById($_SESSION['doctorAppointmentId']);
	$doctorDetails=$settingsObj->getDoctorById($_SESSION['doctorAppointmentId']);	
}
elseif ($_SESSION['AD_admin_user_id'] !="") {
	 header("Location: ".MODULE_URL."/Appointment/payment.php");
						 	 exit;
}
else{
	 header("Location: ".MODULE_URL."/home");
						 	 exit;
}

}
if($Login !="")
{
	
	if($email != "" && $password != "")
	{  
       $testUser=$settingsObj->getPatientByName($email);
	   if($testUser['is_active']==1){
		//echo $_SESSION['joinnow'].'===>';exit;
		$check=1;
		$loginObj->doLogin($email,$password,$check);
		
		if($remember)
		{
			setcookie("cookiepass",$password, time()+60*60*24*10);
			setcookie("cookieuser",$email, time()+60*60*24*10);
			setcookie("cookieremember",$remember, time()+60*60*24*10);
		}
		else
		{
			unset($_COOKIE['cookiepass']);
			unset($_COOKIE['cookieuser']);
			unset($_COOKIE['cookieremember']);
		}
	   }
	   else {
		  $error="You are deactivated by admin";
	   }
	   if(empty($testUser))
	   {
	    $error="Please sign up first";	
	   }
	}

}

if($registrationSubmit !="")
{if($_SESSION['random_number']==strtolower($code)){
	$_SESSION['fullName']=$full_name;
	$_SESSION['email']=$email;
	$_SESSION['password']=$password;
	$_SESSION['gender']=$gender;
	$_SESSION['dob']=$dob;
	
 header("Location: ".MODULE_URL."/Appointment/payment.php");
						 	 exit;
}
else {

	$error_message="Please enter correct Code";
}
}


?>