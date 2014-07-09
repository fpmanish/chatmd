<?php
extract($_POST);
if(!isset($_SESSION['AD_admin_LoggedIn'])) {
	
	 header("location:".MODULE_URL."/home");
                exit;
}
$appointmentObj= new appointment();
$currentTimestamp = getCurrentTimestamp();
$appointmentListArr=$appointmentObj->appointmentListbydoctorId($_SESSION['AD_admin_user_id'],1);
$officeappointmentListArr=$appointmentObj->appointmentListbydoctorId($_SESSION['AD_admin_user_id'],2);

//echo "<pre>";print_r($_POST);die;
if(isset($action) && $action==1)
{
   if($Edtaction==""){
		$dataArr=array(
		"doctor_id"=>$_SESSION['AD_admin_user_id'],
		"appointment_type"=>1,
		"start_date"=>$startdate,
		"end_date"=>$enddate,
		"price"=>$price,
		"intervalBetween"=>$interval,
		"sun_starttime"=>$sun_starttime,
		"sun_breakstart"=>$sun_breakstart,
		"sun_breakend" =>$sun_breakend,
		"sun_endtime"  =>$sun_endtime,
		"mon_starttime"=>$mon_starttime,
		"mon_breakstart"=>$mon_breakstart,
		"mon_breakend"=>$mon_breakend,
		"mon_endtime" =>$mon_endtime,
		"tues_starttime"=>$tues_starttime,
		"tues_breakstart"=>$tues_breakstart,
		"tues_breakend"=>$tues_breakend,
		"tues_endtime"=>$tues_endtime,
		"wed_starttime"=>$wed_starttime,
		"wed_breakstart"=>$wed_breakstart,
		"wed_breakend" =>$wed_breakend,
		"wed_endtime"=>$wed_endtime,
		"thru_starttime"=>$thru_starttime,
		"thru_breakstart"=>$thru_breakstart,
		"thru_breakend" =>$thru_breakend,
		"thru_endtime" =>$thru_endtime,
		"fri_starttime" =>$fri_starttime,
		"fri_breakstart" =>$fri_breakstart,
		"fri_breakend" =>$fri_breakend,
		"fri_endtime" =>$fri_endtime,
		"sat_starttime" =>$sat_starttime,
		"sat_breakstart" =>$sat_breakstart,
		"sat_breakend" => $sat_breakend,
		"sat_endtime" => $sat_endtime,
		"add_date" =>$currentTimestamp,
		"modify_date" =>$currentTimestamp
		);
		
		$appointmentObj->appointmentAdd($dataArr);
			 header("Location: ".MODULE_URL."/doctor/Appointment.php");
								 	 exit;	
	}
	else if($Edtaction !="")
	{
	$dataArr=array(
	"doctor_id"=>$_SESSION['AD_admin_user_id'],
	"appointment_type"=>1,
	"start_date"=>$startdate,
	"end_date"=>$enddate,
	"price"=>$price,
	"intervalBetween"=>$interval,
	"sun_starttime"=>$sun_starttime,
	"sun_breakstart"=>$sun_breakstart,
	"sun_breakend" =>$sun_breakend,
	"sun_endtime"  =>$sun_endtime,
	"mon_starttime"=>$mon_starttime,
	"mon_breakstart"=>$mon_breakstart,
	"mon_breakend"=>$mon_breakend,
	"mon_endtime" =>$mon_endtime,
	"tues_starttime"=>$tues_starttime,
	"tues_breakstart"=>$tues_breakstart,
	"tues_breakend"=>$tues_breakend,
	"tues_endtime"=>$tues_endtime,
	"wed_starttime"=>$wed_starttime,
	"wed_breakstart"=>$wed_breakstart,
	"wed_breakend" =>$wed_breakend,
	"wed_endtime"=>$wed_endtime,
	"thru_starttime"=>$thru_starttime,
	"thru_breakstart"=>$thru_breakstart,
	"thru_breakend" =>$thru_breakend,
	"thru_endtime" =>$thru_endtime,
	"fri_starttime" =>$fri_starttime,
	"fri_breakstart" =>$fri_breakstart,
	"fri_breakend" =>$fri_breakend,
	"fri_endtime" =>$fri_endtime,
	"sat_starttime" =>$sat_starttime,
	"sat_breakstart" =>$sat_breakstart,
	"sat_breakend" => $sat_breakend,
	"sat_endtime" => $sat_endtime,
	"add_date" =>$currentTimestamp,
	"modify_date" =>$currentTimestamp
	);	
	$appointmentObj->appointmentUpdate($Edtaction,$dataArr);
		 header("Location: ".MODULE_URL."/doctor/Appointment.php");
							 	 exit;	
	}
}

if(isset($action) && $action==2)
{
   if($Edtaction==""){
		$dataArr=array(
		"doctor_id"=>$_SESSION['AD_admin_user_id'],
		"appointment_type"=>2,
		"start_date"=>$startdate1,
		"end_date"=>$enddate1,
		"price"=>$price1,
		"intervalBetween"=>$interval1,
		"sun_starttime"=>$sun_starttime1,
		"sun_breakstart"=>$sun_breakstart1,
		"sun_breakend" =>$sun_breakend1,
		"sun_endtime"  =>$sun_endtime1,
		"mon_starttime"=>$mon_starttime1,
		"mon_breakstart"=>$mon_breakstart1,
		"mon_breakend"=>$mon_breakend1,
		"mon_endtime" =>$mon_endtime1,
		"tues_starttime"=>$tues_starttime1,
		"tues_breakstart"=>$tues_breakstart1,
		"tues_breakend"=>$tues_breakend1,
		"tues_endtime"=>$tues_endtime1,
		"wed_starttime"=>$wed_starttime1,
		"wed_breakstart"=>$wed_breakstart1,
		"wed_breakend" =>$wed_breakend1,
		"wed_endtime"=>$wed_endtime1,
		"thru_starttime"=>$thru_starttime1,
		"thru_breakstart"=>$thru_breakstart1,
		"thru_breakend" =>$thru_breakend1,
		"thru_endtime" =>$thru_endtime1,
		"fri_starttime" =>$fri_starttime1,
		"fri_breakstart" =>$fri_breakstart1,
		"fri_breakend" =>$fri_breakend1,
		"fri_endtime" =>$fri_endtime1,
		"sat_starttime" =>$sat_starttime1,
		"sat_breakstart" =>$sat_breakstart1,
		"sat_breakend" => $sat_breakend1,
		"sat_endtime" => $sat_endtime1,
		"add_date" =>$currentTimestamp,
		"modify_date" =>$currentTimestamp
		);
		
		$appointmentObj->appointmentAdd($dataArr);
			 header("Location: ".MODULE_URL."/doctor/Appointment.php");
								 	 exit;	
	}
	else if($Edtaction !="")
	{
	$dataArr=array(
	"doctor_id"=>$_SESSION['AD_admin_user_id'],
	"appointment_type"=>2,
	"start_date"=>$startdate1,
	"end_date"=>$enddate1,
	"price"=>$price1,
	"intervalBetween"=>$interval1,
	"sun_starttime"=>$sun_starttime1,
	"sun_breakstart"=>$sun_breakstart1,
	"sun_breakend" =>$sun_breakend1,
	"sun_endtime"  =>$sun_endtime1,
	"mon_starttime"=>$mon_starttime1,
	"mon_breakstart"=>$mon_breakstart1,
	"mon_breakend"=>$mon_breakend1,
	"mon_endtime" =>$mon_endtime1,
	"tues_starttime"=>$tues_starttime1,
	"tues_breakstart"=>$tues_breakstart1,
	"tues_breakend"=>$tues_breakend1,
	"tues_endtime"=>$tues_endtime1,
	"wed_starttime"=>$wed_starttime1,
	"wed_breakstart"=>$wed_breakstart1,
	"wed_breakend" =>$wed_breakend1,
	"wed_endtime"=>$wed_endtime1,
	"thru_starttime"=>$thru_starttime1,
	"thru_breakstart"=>$thru_breakstart1,
	"thru_breakend" =>$thru_breakend1,
	"thru_endtime" =>$thru_endtime1,
	"fri_starttime" =>$fri_starttime1,
	"fri_breakstart" =>$fri_breakstart1,
	"fri_breakend" =>$fri_breakend1,
	"fri_endtime" =>$fri_endtime1,
	"sat_starttime" =>$sat_starttime1,
	"sat_breakstart" =>$sat_breakstart1,
	"sat_breakend" => $sat_breakend1,
	"sat_endtime" => $sat_endtime1,
	"add_date" =>$currentTimestamp,
	"modify_date" =>$currentTimestamp
	);	
	$appointmentObj->appointmentUpdate($Edtaction,$dataArr);
		 header("Location: ".MODULE_URL."/doctor/Appointment.php");
							 	 exit;	
	}
}
?>