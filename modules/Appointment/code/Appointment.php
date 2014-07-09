<?php
extract($_GET);
error_reporting(E_ERROR | E_PARSE);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$findObj = new find();
$pageType = "sign";
$blogObj = new blog();
$ReasonListArr=$pageObj->ReasonList(1);
$calendraObj = new calendar();
$appointmentObj = new appointment();
if(isset($_SESSION['doctorAppointmentId']) && $test !="")
{
	unset($_SESSION['doctorAppointmentId']);
	$test1=substr($test,3,-2); 
 	$_SESSION['doctorAppointmentId']=$test1;
	if($test1==$_SESSION['AD_admin_user_id'])
	{
	$error="You cannot take yourself appointment ";
	}
	else {
		unset($error);
	}
}
if(isset($_SESSION['AppTime']))
{
unset($_SESSION['AppTime']); $_SESSION['AppTime']=$Time;
}
if(isset($_SESSION['AppDate']))
{
unset($_SESSION['AppDate']); $_SESSION['AppDate']=$date;
}

 if($test !="")
 {
 	
 	$test1=substr($test,3,-2); 
 	if(!isset($_SESSION['doctorAppointmentId']))
	{
		$_SESSION['doctorAppointmentId']=$test1;
	}
 	$dateFormCurrnt= date("m-d-y");
	if($test1==$_SESSION['AD_admin_user_id'])
	{
	$error="You cannot take yourself appointment ";
	}
 	$interval=$appointmentObj->getIntervalById($_SESSION['doctorAppointmentId']);

	$_SESSION['AppTime']=$Time;
	$_SESSION['AppDate']=$date;
	$_SESSION['AppInterval']=$interval['intervalBetween'];
 		$doctorDetails=$settingsObj->getDoctorById($_SESSION['doctorAppointmentId']) ;
		$rgistrationDeatlis=$settingsObj->getDoctorByRegisterId($_SESSION['doctorAppointmentId']) ;
		 $AppointmentArr=  $appointmentObj->appointmentListbydoctorId($_SESSION['doctorAppointmentId']);
		
		//echo "<pre>"; print_r($doctorDetails); die;
 }
 $CountryListArr=$settingsObj->CountryList();
 
?>