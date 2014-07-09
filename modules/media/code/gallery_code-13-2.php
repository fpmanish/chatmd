<?php
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

// grouping of data according to months.
$galleryList = $mediaObj->galleryList(1);
$galleryGrouped = array();



for($i=0;$i<count($galleryList);$i++)
{
	
	unset($tempArr);
   $key = searchMultiArrays($galleryList[$i]['album_id'],$galleryGrouped,"album_id");
	
    if($key > -1)
    {
        
		if(count($galleryGrouped[$key]['data'])%4==0)
		{
		$galleryGrouped[] = array(
            "album_id" => $galleryList[$i]['album_id'],
            "data" => array(
            "image_id" => $galleryList[$i]['image_id'],
            "date" => convertTimestampToDate($galleryList[$i]['image_date']),
            "heading" => $galleryList[$i]['image_name'],
            "image" => $cmsObj->getEventImageById($galleryList[$i]['image_id']),
            "content" => $galleryList[$i]['image_content']
        		)
        	);
		}
		else
		{
			$galleryGrouped[$key]['data'][] = array(
            "image_id" => $galleryList[$i]['image_id'],
            "date" => convertTimestampToDate($galleryList[$i]['image_date']),
            "heading" => $galleryList[$i]['image_name'],
            "image" => $cmsObj->getEventImageById($galleryList[$i]['image_id']),
            "content" => $galleryList[$i]['image_content']
        ); 
			}
    }
	
    else
    {
		
        $tempArr[] = array(
                "image_id" => $galleryList[$i]['image_id'],
                "date" => convertTimestampToDate($galleryList[$i]['image_date']),
                "heading" => $galleryList[$i]['image_name'],
                "image" => $cmsObj->getEventImageById($galleryList[$i]['image_id']),
                "content" => $galleryList[$i]['image_content']
        );
	   $galleryGrouped[] = array(
            "album_id" => $galleryList[$i]['album_id'],
            "data" => $tempArr
        );
	
		
    }
	
}



?>