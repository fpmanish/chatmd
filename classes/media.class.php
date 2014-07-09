<?php
class media
{
    public function media(){}
    
    

    /* Video section.*/
    public function videoAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_VIDEO,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function videoUpdate($video_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($video_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_VIDEO,$dataArr,"vidoes_id=".$video_id));
    }
    
    public function videoList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"video_is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getVideoById($video_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$video_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"vidoes_id=".$video_id." limit 1")));
            return $result;
        }
    }
    
    public function searchDuplicateVideo($searchStr = "")
    {
        global $db;
        $utilityObj = new utility();
        
        if(strlen($searchStr))
            $returnVar = (bool)$db->numRows($db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"video_file LIKE '".DB_realExcapeString($searchStr)."'")));
        
        if(!$returnVar)
            $returnVar = file_exists(VIDEO_PATH."/".$searchStr);
        
        return $returnVar;
    }
    
    public function actDeactVideo($video_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($video_id != "" && isset($is_act))
        {
            $dataArr = array(
                "video_is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_VIDEO,$dataArr,"video_id=".$video_id));
        }
    }
    
    public function deleteVideoById($video_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($video_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_VIDEO,"video_id=".$video_id));
    }
    
    public function getVideoCodeById($video_id="",$height=239,$width=366)
    {
        global $db;
        $utilityObj = new utility();
        $videoCode = "";
        
        if($video_id != "")
            $videoDetails = $this->getVideoById($video_id);
        else    // For latest video.
            $videoDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"video_is_active=1 order by video_id desc limit 1")));
        
        if($videoDetails['video_is_local'])
        {
            $videoCode = '<object width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash" data="'.SWF_URL.'/flashmediaelement.swf">        
                    <param name="movie" value="'.SWF_URL.'/flashmediaelement.swf" /> 
                    <param name="flashvars" value="controls=true&poster='.GALLERY_URL.'/'.$videoDetails['video_image'].'&file='.VIDEO_URL."/".$videoDetails['video_file'].'" />        
                </object>';
        }
        else
        {
            $videoCode = $videoDetails['video_embed_code'];
            $videoCode = preg_replace("/(width=\"([0-9])*\")/", "width=\"".$width."\"", $videoCode);
            $videoCode = preg_replace("/(height=\"([0-9])*\")/", "height=\"".$height."\"", $videoCode);
        }
        return $videoCode;
    }
    
    public function getVideoListAscOrder($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"video_is_active=1 order by video_order_no asc"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"order by video_order_no asc"));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
  public function getLatestVideo()
	{
	global $db;
	$utilityObj = new utility();
	
	$result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_VIDEO,"video_is_active=1 order by video_id desc")));
	return $result;
	}

    public function getVideoImageById($video_id)
    {
        $imageCode = "";
        
        if($video_id != "")
        {
            $videoList = $this->getVideoById($video_id);
            if($videoList['video_is_local'])
                $imageCode = GALLERY_URL."/".$videoList['video_image'];
            else
                $imageCode = "http://img.youtube.com/vi/".getYoutubeVideoId($videoList['video_embed_code'])."/0.jpg";
            return $imageCode;
        }
    }
 public function MakeAutoLink($url)
{
/*
global $db;
$path = parse_url($url, PHP_URL_PATH);
$query = parse_url($url, PHP_URL_QUERY);
parse_str($query, $args);
return $args['v'];*/
$pattern =
'%^# Match any youtube URL
(?:https?://)? # Optional scheme. Either http or https
(?:www\.)? # Optional www subdomain
(?: # Group host alternatives
youtu\.be/ # Either youtu.be,
| youtube\.com # or youtube.com
(?: # Group path alternatives
/embed/ # Either /embed/
| /v/ # or /v/
| /watch\?v= # or /watch\?v=
) # End path alternatives.
) # End host alternatives.
([\w-]{10,12}) # Allow 10-12 for 11 char youtube id.
$%x'
;

$result = preg_match($pattern, $url, $matches);
if (false !== $result) {
return $matches[1];
}
return false;
}

    
   
}
?>