<?php
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "home";

$videoList = $mediaObj->videoList(1);

 $SAVE_TIME = $pageObj->getpageByIdAct(3,1);
 $SAVE_MONEY = $pageObj->getpageByIdAct(4,1);
 $BE_SAFE = $pageObj->getpageByIdAct(5,1);
  $RegMessage = $pageObj->getMessageById(1);
   $Message = $pageObj->getMessageById(3);
   $confirm = $pageObj->getMessageById(4);
   $SpecialtyListArr=$settingsObj->SpecialtyList(1);
 $ReasonListArr=$pageObj->ReasonList(1);
?>