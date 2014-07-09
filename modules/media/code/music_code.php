<?php
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();

$pageType = "music";

$latestMusic = $mediaObj->getLatestMusic();
$musicList = $mediaObj->musicList(1);
?>