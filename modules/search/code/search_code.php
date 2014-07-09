<?php
extract($_POST);

$mediaObj = new media();
$searchObj = new search();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$calendraObj = new calendar();
$appointmentObj = new appointment();
$findObj = new find();
$blogObj = new blog();
$pageType = "findDoctor";
 $SpecialtyListArr=$settingsObj->SpecialtyList(1);
  $ReasonListArr=$pageObj->ReasonList(1);
    $LanguageListArr=$pageObj->LanguageList(1);
  if($action=="HomeSearch"){

  $specility=$speciality;
  	$homeRearchResult=$searchObj->HomeSearch($reason,$specility);
	//echo "<pre>"; print_r($homeRearchResult); die;
  
  }
   elseif ($action=="refineSearch") {
  $location=explode(",",$city);
	  $cityArr=$settingsObj->getCityByCityName($location[0]);

 $cityId=$cityArr['cityID'];
 $stateId=$cityArr['regionID'];
 $homeRearchResult=$searchObj->RefineSearch($cityId,$stateId,$specilaty,$chatReason,$language,$gender);
  }
  else if($action =="")
  	{
  		$homeRearchResult=$searchObj->HomeSearch($cityId,$stateId,$specility);	
  	}
$Message = $pageObj->getMessageById(5);
?>