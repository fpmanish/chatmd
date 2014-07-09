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
    $key = searchMultiArrays($galleryList[$i]['album_id'],$galleryGrouped,"album_id");
    if($key > -1)
    {
        $galleryGrouped[$key]['data'][] = array(
            "image_id" => $galleryList[$i]['image_id'],
            "date" => convertTimestampToDate($galleryList[$i]['image_date']),
            "heading" => $galleryList[$i]['image_name'],
            "image" => $mediaObj->getImageCodeById($galleryList[$i]['image_id']),
            "content" => $galleryList[$i]['image_content']
        );
    }
    else
    {
        $tempArr[] = array(
            "image_id" => $galleryList[$i]['image_id'],
            "date" => convertTimestampToDate($galleryList[$i]['image_date']),
            "heading" => $galleryList[$i]['image_name'],
            "image" => $mediaObj->getImageCodeById($galleryList[$i]['image_id']),
            "content" => $galleryList[$i]['image_content']
        );
        
        $galleryGrouped[] = array(
            "album_id" => $galleryList[$i]['album_id'],
            "data" => $tempArr
        );
    }
    $tempArr = array();
}

// function for paging in gallery.
function pagingGallery($galleryGrouped,$page = 1)
{
    $runningPageNum = 1;
    $mainRetArr = array();
    
    if(!$page)
        $page = 1;
    
    for($i=0;$i<count($galleryGrouped);$i++)
    {
    	// creating new array according to pagination.
    	for($j=0;$j<count($galleryGrouped[$i]['data']);$j++)
        {
            $pageKey = searchMultiArrays($runningPageNum,$mainRetArr,'page_num');
            if($pageKey > -1)
            {
                $row = 0;
                for($k=0;$k<count($mainRetArr[$pageKey]['page_data']);$k++)     // finding no. of rows in this page.
                {
                    if(($dataSize = count($mainRetArr[$pageKey]['page_data'][$k]['data'])) > 4)
                        $row += ceil($dataSize/4);
                    else
                        $row++;
                }
                if((($pageDataSize = count($mainRetArr[$pageKey]['page_data'])) >= 4) || ($row>4))
                {
                    $runningPageNum++;
                    // create new page here.
                    $tmpArrImageDta[] = array(
                        "image_id" => $galleryGrouped[$i]['data'][$j]['image_id'],
                        "date" => $galleryGrouped[$i]['data'][$j]['date'],
                        "heading" => $galleryGrouped[$i]['data'][$j]['heading'],
                        "image" => $galleryGrouped[$i]['data'][$j]['image'],
                        "content" => $galleryGrouped[$i]['data'][$j]['content']
                    );
                    
                    $tmpArr[] = array(
                        "album_id" => $galleryGrouped[$i]['album_id'],
                        "data" => $tmpArrImageDta
                    );
                    
                    
                    $mainRetArr[] = array(
                        "page_num" => $runningPageNum,
                        "page_data" => $tmpArr
                    );
                }
                else
                {
                	$albumKey = searchMultiArrays($galleryGrouped[$i]['album_id'],$mainRetArr[$pageKey]['page_data'],'album_id');
                    
                    if($albumKey > -1)
                    {
                        $mainRetArr[$pageKey]['page_data'][$albumKey]['data'][] = array(
                            "image_id" => $galleryGrouped[$i]['data'][$j]['image_id'],
                            "date" => $galleryGrouped[$i]['data'][$j]['date'],
                            "heading" => $galleryGrouped[$i]['data'][$j]['heading'],
                            "image" => $galleryGrouped[$i]['data'][$j]['image'],
                            "content" => $galleryGrouped[$i]['data'][$j]['content']
                        );
                    }
                    else
                    {
                        $tmpArrImageDta[] = array(
                            "image_id" => $galleryGrouped[$i]['data'][$j]['image_id'],
                            "date" => $galleryGrouped[$i]['data'][$j]['date'],
                            "heading" => $galleryGrouped[$i]['data'][$j]['heading'],
                            "image" => $galleryGrouped[$i]['data'][$j]['image'],
                            "content" => $galleryGrouped[$i]['data'][$j]['content']
                        );
                        
                        $mainRetArr[$pageKey]['page_data'][] = array(
                            "album_id" => $galleryGrouped[$i]['album_id'],
                            "data" => $tmpArrImageDta
                        );
                    }
                }
            }
            else
            {
                $tmpArrImageDta[] = array(
                    "image_id" => $galleryGrouped[$i]['data'][$j]['image_id'],
                    "date" => $galleryGrouped[$i]['data'][$j]['date'],
                    "heading" => $galleryGrouped[$i]['data'][$j]['heading'],
                    "image" => $galleryGrouped[$i]['data'][$j]['image'],
                    "content" => $galleryGrouped[$i]['data'][$j]['content']
                );
                
                $tmpArr[] = array(
                    "album_id" => $galleryGrouped[$i]['album_id'],
                    "data" => $tmpArrImageDta
                );
                
                
                $mainRetArr[] = array(
                    "page_num" => $runningPageNum,
                    "page_data" => $tmpArr
                );
            }
            $tmpArr = array();
            $tmpArrImageDta = array();
            //$albumKey = searchMultiArrays($galleryGrouped[$i]['album_id'],$mainRetArr[$pageKey]['page_data'],'album_id');
        }
    }
    return $mainRetArr;
}
$galleryGrouped = pagingGallery($galleryGrouped);

?>