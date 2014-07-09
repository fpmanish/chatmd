<?php
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "term";


$TERM_OF_USE = $pageObj->getpageByIdAct(8,1);

?>