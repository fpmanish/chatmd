<?php
extract($_GET);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$appointmentObj = new appointment();
$findObj = new find();
$pageType = "sign";
$ReasonListArr=$pageObj->ReasonList(1);
$calendraObj = new calendar();
$blogObj = new blog();

 if($my_id !="")
 {

 	
 
	
 
 		$doctorDetails=$settingsObj->getDoctorById($my_id) ;
		
		$rgistrationDeatlis=$settingsObj->getDoctorByRegisterId($my_id) ;
		 $AppointmentArr=  $appointmentObj->appointmentListbydoctorId($my_id);
		//echo "<pre>"; print_r($doctorDetails); die;
 }
 $CountryListArr=$settingsObj->CountryList();
?>