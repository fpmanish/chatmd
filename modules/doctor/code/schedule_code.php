<?php
extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "myaccount";

if($addTiming !="" && $start_date  !="" && $end_date !="" && $startTime !="" && $endTime !="" && $TimeInterval !="")
{
	echo "<pre>"; print_r($_POST); die;
	
}
 if($addTiming !="" && $start_date  =="" || $end_date =="" || $startTime =="" && $endTime =="" || $TimeInterval =="")
{
	$errr="Please Fill all Input Box";
	
}
?>