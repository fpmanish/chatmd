<?php
extract($_GET);
extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "login";
$loginObj= new LoginSystem();

if(isset($_SESSION['AD_admin_LoggedIn'])) {
	
	 header("location:".MODULE_URL."/home");
                exit;
}
	if($email != "" && $password != "")
	{  
       $testUser=$settingsObj->getPatientByName($email);
	   if($testUser['is_active']==1){
		//echo $_SESSION['joinnow'].'===>';exit;
		$check="";
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
if($sueccess !="")
{
	 $suceess1=substr($sueccess,3,-2); 
	$preActive=$settingsObj->getPatientById($suceess1);
	if($preActive['is_verfiy']!=1)
	{
	if($suceess1 !="")
	{
		$ret=$settingsObj->actDeactuser($suceess1,1);
		$_SESSION['emailRetunr']="myID";
	}
	}
	else {
		$error="You are already  activated";
	}
	
		
	
}

 
?>