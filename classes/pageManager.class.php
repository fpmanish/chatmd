<?php
class pageManager
{
	 public function pageManager(){}
    
    

    /* Page manager.*/
    public function pageAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_PAGEMANAGER,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function pageUpdate($page_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($page_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_PAGEMANAGER,$dataArr,"id=".$page_id));
    }
    
    public function pageList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PAGEMANAGER,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PAGEMANAGER,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getpageById($page_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$page_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PAGEMANAGER,"id=".$page_id." limit 1")));
            return $result;
        }
    }
     public function getpageByIdAct($page_id,$onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$page_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PAGEMANAGER,"id=".$page_id." and is_active=".$onlyActive." limit 1")));
            return $result;
        }
    }
   
    
    public function actDeactpage($page_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($page_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_PAGEMANAGER,$dataArr,"id=".$page_id));
        }
    }
    
    public function deletePageById($page_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($page_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_PAGEMANAGER,"id=".$page_id));
    }
    
  // FAQ MANGER
    public function faqAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_FAQ,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function faqUpdate($faq_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($faq_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_FAQ,$dataArr,"faq_id=".$faq_id));
    }
    
    public function faqList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FAQ,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FAQ,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getfaqById($faq_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$faq_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_FAQ,"faq_id=".$faq_id." limit 1")));
            return $result;
        }
    }
    
     public function getfaqBycategory($category_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$category_id)
        {
        	 $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FAQ,"category_id=".$category_id." and is_active=1"));
          while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
      public function getfaqByDefaultcategory()
    {
        global $db;
        $utilityObj = new utility();
       
        	 $query=$db->query($utilityObj->am_createSelectAllQuery(TABLE_CATEGORY,"is_active=1 limit 1"));
            $result = $db->fetchNextAssoc($query);
            return $result;
        
    }
    public function actDeactfaq($faq_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($faq_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_FAQ,$dataArr,"faq_id=".$faq_id));
        }
    }
    
    public function deleteFaqById($faq_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($faq_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_FAQ,"faq_id=".$faq_id));
    }
	 // FAQ's Category MANGER
    public function faqCategoryAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_CATEGORY,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function faqCategoryUpdate($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_CATEGORY,$dataArr,"id=".$id));
    }
    
    public function faqCategoryList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CATEGORY,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CATEGORY,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getfaqCategoryById($id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_CATEGORY,"id=".$id." limit 1")));
            return $result;
        }
    }
    
   
    
    public function actDeactfaqCategory($id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_CATEGORY,$dataArr,"id=".$id));
        }
    }
    
    public function deletefaqCategoryById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_CATEGORY,"id=".$id));
    }   
  // Specialty MANGER
    public function SpecialtyAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_SPECIALTY,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function SpecialtyUpdate($Specialty_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($Specialty_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SPECIALTY,$dataArr,"Specialty_id=".$Specialty_id));
    }
    
    public function SpecialtyList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_SPECIALTY,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_SPECIALTY,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getSpecialtyById($Specialty_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$Specialty_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SPECIALTY,"Specialty_id=".$Specialty_id." limit 1")));
            return $result;
        }
    }
    
   
    
    public function actDeactSpecialty($Specialty_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($Specialty_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SPECIALTY,$dataArr,"Specialty_id=".$Specialty_id));
        }
    }
    
    public function deleteSpecialtyById($Specialty_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($Specialty_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_SPECIALTY,"Specialty_id=".$Specialty_id));
    }
	  // Language MANGER
    public function LanguageAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_LANGUAGE,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function LanguageUpdate($language_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($language_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_LANGUAGE,$dataArr,"language_id=".$language_id));
    }
    
    public function LanguageList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_LANGUAGE,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_LANGUAGE,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getLanguageById($language_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$language_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_LANGUAGE,"language_id=".$language_id." limit 1")));
            return $result;
        }
    }
    
   
    
    public function actDeactLanguage($language_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($language_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_LANGUAGE,$dataArr,"language_id=".$language_id));
        }
    }
    
    public function deleteLanguageById($language_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($language_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_LANGUAGE,"language_id=".$language_id));
    }
	  /* Message manager.*/
    public function MessageAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_MESSAGE,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function MessageUpdate($page_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($page_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_MESSAGE,$dataArr,"id=".$page_id));
    }
    
    public function MessageList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_MESSAGE,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_MESSAGE,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getMessageById($page_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$page_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_MESSAGE,"id=".$page_id." limit 1")));
            return $result;
        }
    }
  public function actDeactMessage($page_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($page_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_MESSAGE,$dataArr,"id=".$page_id));
        }
    }
	  /* Email Template manager.*/
    public function EmailAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_EMAILTEMPLATE,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function EmailUpdate($page_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($page_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_EMAILTEMPLATE,$dataArr,"id=".$page_id));
    }
    
    public function EmailList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_EMAILTEMPLATE,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_EMAILTEMPLATE,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getEmailById($page_id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$page_id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_EMAILTEMPLATE,"id=".$page_id." limit 1")));
            return $result;
        }
    }
    /* Meta Tag manager.*/
    public function MetaAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_META,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function MetaUpdate($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if((int)$id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_META,$dataArr,"id=".$id));
    }
    
    public function MetaList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_META,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_META,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getMetaById($id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_META,"id=".$id." limit 1")));
            return $result;
        }
    }
      // Chat Reason MANGER
    public function ReasonAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {   
            $db_query = $utilityObj->am_createInsertQuery(TABLE_REASON,$dataArr);
            
            $db->query($db_query);
            return DB_insertIdFunc();
        }
    }
    
    public function ReasonUpdate($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_REASON,$dataArr,"id=".$id));
    }
    
    public function ReasonList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_REASON,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_REASON,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    
    public function getReasonById($id)
    {
        global $db;
        $utilityObj = new utility();
        if((int)$id)
        {
            $result = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_REASON,"id=".$id." limit 1")));
            return $result;
        }
    }
    
   
    
    public function actDeactReason($id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_REASON,$dataArr,"id=".$id));
        }
    }
    
    public function deleteReasonById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_REASON,"id=".$id));
    }
    }
?>