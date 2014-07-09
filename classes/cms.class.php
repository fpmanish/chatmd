<?php
class cms
{
    public function cms(){}
    
    /* Events section. */
    public function eventAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_EVENTS,$dataArr));
            return DB_insertIdFunc();
        }
    }
    
    public function eventUpdate($event_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($event_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_EVENTS,$dataArr,"events_id=".$event_id));
    }
    
    public function eventList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_EVENTS,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_EVENTS,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getEventById($event_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$event_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_EVENTS,"events_id=".$event_id." limit 1")));
            return $result;
        }
    }
    
    public function actDeactEvent($event_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($event_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_EVENTS,$dataArr,"events_id=".$event_id));
        }
    }
    
    public function deleteEventById($event_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($event_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_EVENTS,"events_id=".$event_id));
    }
    
    public function getEventImageById($event_id)
    {
        global $db;
        $utilityObj = new utility();
        $mainImageURL = "";
        
        if($event_id != "")
        {
            $eventDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_EVENTS,"events_id=".$event_id." limit 1")));
            
            if($eventDetails['event_image_is_local'])
                $mainImageURL .= GALLERY_URL."/".$eventDetails['event_image'];
            else
                $mainImageURL .= $eventDetails['event_image_URL'];
            
            return $mainImageURL;
        }
    }
    /* News section. */
    public function newsAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_NEWS,$dataArr));
            return DB_insertIdFunc();
        }
    }
    
    public function newsUpdate($news_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($news_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"news_id=".$news_id));
    }
    
    public function newsList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    public function newsListBytArchives($archive = 0)
    {
	     global $db;
        $utilityObj = new utility();
        $mainArr = array();
		
		$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"is_active=1 and Is_Archive=$archive" ,"created_date DESC"));

		while($res = $db->fetchNextAssoc($result))
			$mainArr[] = $res;
		
		return $mainArr;
    }
	
    public function getNewsById($news_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$news_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"news_id=".$news_id." limit 1")));
            return $result;
        }
    }
    
    public function actDeactNews($news_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($news_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"news_id=".$news_id));
        }
    }
    
    public function deleteNewsById($news_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($news_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_NEWS,"news_id=".$news_id));
    }
    
    public function getNewsImageById($news_id)
    {
        global $db;
        $utilityObj = new utility();
        $mainImageURL = "";
        
        if($news_id != "")
        {
            $newsDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"news_id=".$news_id." limit 1")));
            
            if($newsDetails['news_image_is_local'])
                $mainImageURL .= GALLERY_URL."/".$newsDetails['news_image'];
            else
                $mainImageURL .= $newsDetails['news_image_URL'];
            
            return $mainImageURL;
        }
    }
    
    public function setFeaturedNews($news_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($news_id != "")
        {
            $dataArr = array(
                "is_featured" => 0
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"1"));
            $dataArr = array(
                "is_featured" => 1
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"news_id=".$news_id));
        }
    }
     public function setFeaturedNewsByDate($news_id,$modify,$feature)
    {
        global $db;
        $utilityObj = new utility();
        $currentTimestamp = getCurrentTimestamp();
        if($news_id != "")
        {
			$result =$db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"is_featured=1 ", "modified_date ASC limit 1")));
			$modify_date=$result['modified_date'];
			if($feature==0)
			{
				$dataArr = array(
                "is_featured" => 1,"modified_date"=>$currentTimestamp
            );
			$db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"news_id=$news_id and modified_date=$modify "));
            $dataArr = array(
                "is_featured" => 0
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"modified_date=$modify_date "));
						}}
    }
    public function getFeaturedNews()
    {
        global $db;
        $utilityObj = new utility();
        
        return $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"is_featured=1")));
    }
    
     public function getAllFeaturedNews()
    {
		 global $db;
        $utilityObj = new utility();
        $mainArr = array();
		
		$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWS,"is_featured=1 ", "modified_date DESC limit 2"));

		while($res = $db->fetchNextAssoc($result))
			$mainArr[] = $res;
		
		return $mainArr;
      
    }
     /* Newrel section. */
    public function newrelAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_NEWREL,$dataArr));
            return DB_insertIdFunc();
        }
    }
    
    public function newrelUpdate($newrel_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($newrel_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWREL,$dataArr,"newrel_id=".$newrel_id));
    }
    
    public function newrelList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getNewrelById($newrel_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$newrel_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,"newrel_id=".$newrel_id." limit 1")));
            return $result;
        }
    }
    
    public function actDeactNewrel($newrel_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($newrel_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWREL,$dataArr,"newrel_id=".$newrel_id));
        }
    }
    
    public function deleteNewrelById($newrel_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($newrel_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_NEWREL,"newrel_id=".$newrel_id));
    }
    
    public function getNewrelImageById($newrel_id)
    {
        global $db;
        $utilityObj = new utility();
        $mainImageURL = "";
        
        if($newrel_id != "")
        {
            $newrelDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,"newrel_id=".$newrel_id." limit 1")));
            
            if($newrelDetails['newrel_image_is_local'])
                $mainImageURL .= GALLERY_URL."/".$newrelDetails['newrel_image'];
            else
                $mainImageURL .= $newrelDetails['newrel_image_URL'];
            
            return $mainImageURL;
        }
    }
    
    public function getLatestNewrel($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,"is_active=1 order by newrel_id desc"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_NEWREL,"order by newrel_id desc"));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    /* Home page slider controls. */
    public function sliderAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_SLIDER,$dataArr));
            return DB_insertIdFunc();
        }
    }
    
    public function sliderUpdate($slider_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($slider_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SLIDER,$dataArr,"slider_id=".$slider_id));
    }
    
    public function sliderList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_SLIDER,"is_active=1 order by created_date asc"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_SLIDER,"1 order by created_date asc"));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function actDeactSlider($slider_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($slider_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SLIDER,$dataArr,"slider_id=".$slider_id));
        }
    }
    public function getSliderImageById($slider_id)
    {
        global $db;
        $utilityObj = new utility();
        $mainImageURL = "";
        
        if($slider_id != "")
        {
            $newsDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SLIDER,"slider_id=".$slider_id." limit 1")));
            
          
                $mainImageURL .= GALLERY_URL."/".$newsDetails['slider_image_file'];
           
            
            return $mainImageURL;
        }
    }
      public function deleteSliderById($slider_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($slider_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_SLIDER,"slider_id=".$slider_id));
    }
	public function setArchiveNews($news_id,$is_act)
    {
       global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($news_id != "" && isset($is_act))
        {
            $dataArr = array(
                "Is_Archive" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_NEWS,$dataArr,"news_id=".$news_id));
        }
	}
	//section firt manager
	 public function sectionUpdate($section_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($section_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SECTION,$dataArr,"section_id=".$section_id));
    }
	public function getsectionById($section_id)
    {
        global $db;
        $utilityObj = new utility();
        
            $result = DB_fetchArrayFunc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECTION,"section_id=".$section_id ,"")));
            return $result;
       
		
    }
	 public function getsection()
    {
		$section_id=1;
        global $db;
        $utilityObj = new utility();
       
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECTION,"section_id=".$section_id,"")));
            return $result;
       
    }
	//section second manager
	 public function section1Update($section_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($section_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SECTION,$dataArr,"section_id=".$section_id));
    }
	public function getsection1ById($section_id=1)
    {
        global $db;
        $utilityObj = new utility();
        
            $result = DB_fetchArrayFunc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECTION,"section_id=".$section_id ,"")));
            return $result;
       
		
    }
	 public function getsection1()
    {
		$section_id=2;
        global $db;
        $utilityObj = new utility();
       
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECTION,"section_id=".$section_id,"")));
            return $result;
       
    }
	public function getsectionImageById($section_id)
    {
        global $db;
        $utilityObj = new utility();
        $mainImageURL = "";
        
        if($section_id != "")
        {
            $sectionDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECTION,"section_id=".$section_id." limit 1")));
            
            if($sectionDetails['section_image_is_local'])
                $mainImageURL .= GALLERY_URL."/".$sectionDetails['section_image'];
            else
                $mainImageURL .= $sectionDetails['section_image_url'];
            
            return $mainImageURL;
        }
    }
	
}

?>