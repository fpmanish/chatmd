<?php
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "ViewHistory";


$VIEW_HISTORY = $pageObj->getpageByIdAct(7,1);

?>