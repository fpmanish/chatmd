<?php
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();

$pageType = "media";

$videoList = $mediaObj->getVideoListAscOrder(1);
$imagesList = $mediaObj->getImagesByOrderNo(1);
$latestMusic = $mediaObj->getLatestMusic();
$featuredNews = $cmsObj->getFeaturedNews();
$latestNewrelAll = $cmsObj->getLatestNewrel(1);
$latestNewrel = $latestNewrelAll[0];
?>