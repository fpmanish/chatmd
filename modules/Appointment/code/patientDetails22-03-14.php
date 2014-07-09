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
	 if(isset($appointType) && $appointType == 'officeAppointment')
	   {
           $_SESSION['AppointmentFix']="confirm";
		    echo '<script>window.parent.location.href="'.MODULE_URL.'/home"</script>';
            exit();
       }else{
	  	     header("Location: ".MODULE_URL."/Appointment/payment.php");
			 exit;
	   }
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
	$password=createHash($password);
	// Sandeep code for office appointment
	if(isset($appointType) && $appointType == 'officeAppointment')
	{
		
		$dataPreg=array("name"=>$full_name,"email"=>$email,"password"=>$password,"gender"=>$gender,"dob"=>strtotime($dob),"user_type"=>0,"is_verfiy"=>1);
		$regSuccess=$settingsObj->patientAdd($dataPreg);
		if($regSuccess>0)
		{
			
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			unset($_SESSION['gender']);
			unset($_SESSION['dob']);
		        $_SESSION['AD_admin_LoggedIn'] = true;
	            $_SESSION['AD_is_patient'] = 0;
				$_SESSION['AD_admin_user_id']=$regSuccess;
				$_SESSION['AD_admin_user_name']=$_SESSION['fullName'];
				unset($_SESSION['fullName']);
				
				$chatObj=new chat();
				
				$time=date("h:i a",$_SESSION['AppTime']);
				$date=date("d-m-Y",$_SESSION['AppDate']);
			    $timeinterval=$_SESSION['AppInterval'];
				$currentTimestamp = getCurrentTimestamp();
			
			    // Get random string
	            $token = genRandomPass();
	
				$dataArr=array("appointment_type"=>'1',"created_date"=>$currentTimestamp,"user_id"=>$_SESSION['AD_admin_user_id'],"access_token"=>$token
				,"display_date"=>trim($date),"display_time"=>trim($time),"intverval"=>$timeinterval,"doctor_id"=>$_SESSION['doctorAppointmentId'],'created_date'=>$currentTimestamp);
					
				
				$success=$chatObj->ChatAdd($dataArr);
	
				$_SESSION['AppointmentFix']="confirm";
			    echo '<script>window.parent.location.href="'.MODULE_URL.'/home"</script>';
                exit();
		}
	}
 // End
 
	else{
		header("Location: ".MODULE_URL."/Appointment/payment.php");
							 	 exit;
	}	
 
}
else {

	$error_message="Please enter correct Code";
}
}

if(isset($appointType) && $appointType == 'officeAppointment'){
	if(isset($_SESSION['appointType']) && $_SESSION['appointType']!=''){
		unset($_SESSION['appointType']);
	}
	$_SESSION['appointType']= 'officeAppointment';
}


?>