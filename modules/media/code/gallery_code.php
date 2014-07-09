<?php
extract($_GET);
extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();

$pageType = "gallery";

$videoList = $mediaObj->getVideoListAscOrder(1);
$imagesList = $mediaObj->galleryList();
$latestMusic = $mediaObj->getLatestMusic();
$featuredNews = $cmsObj->getFeaturedNews();
$latestNewrelAll = $cmsObj->getLatestNewrel(1);
$latestNewrel = $latestNewrelAll[0];
$albmlist=$settingsObj->albumList(1);
// grouping of data according to months.
$galleryList = $mediaObj->galleryList(1);
if($albm_id)
{
$galleryGrouped = $mediaObj->galleryListImagebyId($albm_id);


}



?>