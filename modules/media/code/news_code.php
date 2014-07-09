<?php
$settingsObj = new settings();
$mediaObj = new media();
$cmsObj = new cms();
extract($_GET);
$pageType = "news";

if($page == "archieve")
	$page = 1;
else
	$page = 0;

$NewsList = $cmsObj->newsList();
$Newsnullarch = $cmsObj->newsListBytArchives($page);
$latestMusic = $mediaObj->getLatestMusic();
?>