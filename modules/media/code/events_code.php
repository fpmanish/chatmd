<?php
extract($_GET);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();

$pageType = "events";

$videoList = $mediaObj->getVideoListAscOrder(1);
$imagesList = $mediaObj->getImagesByOrderNo(1);
$latestMusic = $mediaObj->getLatestMusic();
$featuredNews = $cmsObj->getFeaturedNews();
$latestNewrelAll = $cmsObj->getLatestNewrel(1);
$latestNewrel = $latestNewrelAll[0];

// grouping of data according to months.
$eventsList = $cmsObj->eventList(1);
$eventsGrouped = array();
$today = time();
$currentTimestamp = getCurrentTimestamp();
$todate= strtotime('-6 months',$currentTimestamp);
for($i=0;$i<count($eventsList);$i++)
{
	unset($tempArr);
    $newMonth = date("n",$eventsList[$i]['event_date']);
    $key = searchMultiArrays($newMonth,$eventsGrouped,"monthNum");
    if($key > -1)
    {
        $eventsGrouped[$key]['data'][] = array(
            "event_id" => $eventsList[$i]['events_id'],
            "date" => convertTimestampToDate($eventsList[$i]['event_date']),
            "heading" => $eventsList[$i]['events_name'],
            "image" => $cmsObj->getEventImageById($eventsList[$i]['events_id']),
            "content" => $eventsList[$i]['events_content']
        );
    }
    else
    {
        $tempArr[] = array(
                "event_id" => $eventsList[$i]['events_id'],
                "date" => convertTimestampToDate($eventsList[$i]['event_date']),
                "heading" => $eventsList[$i]['events_name'],
                "image" => $cmsObj->getEventImageById($eventsList[$i]['events_id']),
                "content" => $eventsList[$i]['events_content']
        );
        
        $eventsGrouped[] = array(
            "monthNum" => $newMonth,
            "monthName" => date("F",$eventsList[$i]['event_date']),
            "data" => $tempArr
        );
    }
}
?>