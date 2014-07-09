<?php
function getCurrentTimestamp(){
	$timestamp = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	return $timestamp;
}

function getTodayDate(){
	$date_take 			= date(DEFAULT_DATE_FORMAT);
	$dateObj 			= new Date_Time_Calc($date_take, "m-d-Y");
	$currentDateStamp	= $dateObj->date_time_stamp;
	return $currentDateStamp;
}

function convertTimestampToDate($timestamp = "")
{
    $dateText = "";
    if($timestamp != "")
        $dateText .= date(DEFAULT_DATE_FORMAT,$timestamp);
    else
        $dateText .= date(DEFAULT_DATE_FORMAT);
    return $dateText;
}

function convertDateToTimestamp($dateStr)
{
    if($dateStr != "")
        $timeStamp = strtotime($dateStr);
    
    return $timeStamp;
}
function isBetweenDate($startDate,$endDate,$now){
	    $startDate=strtotime($startDate);	$endDate=strtotime($endDate);	   if($startDate <= $now && $endDate >= $now) {
	    	    // It's between    
	    	    $timeStamp=$now;}       
		 return $timeStamp;}
		 function CheckGreaterdate($endDate){   	$endDate=strtotime($endDate);	$now=strtotime("now");   
		 if($endDate >= $now) {
		 	    // It's between    
		 	    $timeStamp=$now;}        return $timeStamp;}
?>