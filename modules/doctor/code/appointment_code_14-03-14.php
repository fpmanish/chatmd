<?php
extract($_POST);
if(!isset($_SESSION['AD_admin_LoggedIn'])) {
	
	 header("location:".MODULE_URL."/home");
                exit;
}
$appointmentObj= new appointment();
$currentTimestamp = getCurrentTimestamp();
$appointmentListArr=$appointmentObj->appointmentListbydoctorId($_SESSION['AD_admin_user_id']);

if(isset($action) && $action==1 && $Edtaction=="")
{
$dataArr=array(
"doctor_id"=>$_SESSION['AD_admin_user_id'],
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
?>