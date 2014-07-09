<?php
class find
{
    public function find(){}
    
  
	 /* For SEPCILITY */
	 
	  public function SpecialtyAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_FINDSPECIALTY,$dataArr));
            return DB_insertIdFunc();
        }
    }
	 public function SpecialtyList($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($id))
        {
            $query=$utilityObj->am_createSelectAllQuery(TABLE_FINDSPECIALTY,"registration_id=$id"); 
                $result = $db->query($query);
            
            
            while($res = $db->fetchNextAssoc($result))
			{
				$mainArr[] = $res;
			}
                
         
            return $mainArr;
        }
    }
	  public function deleteSpecialtyById($Specialty_id,$id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($Specialty_id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_FINDSPECIALTY,"Specialty_id !=".$Specialty_id." and registration_id=$id"));
    }
	 public function doctorListByRegID($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
      
		if (isset($id)) {
			$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FINDSPECIALTY,"registration_id=$id"));
			}
		    while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        
    }
	  
	

  /* For Language */  
   public function LanguageAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_FINDLANGUAGE,$dataArr));
            return DB_insertIdFunc();
        }
    } 
	 public function deleteLanguageById($Language_id,$id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($Language_id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_FINDLANGUAGE,"language_id !=".$Language_id." and registration_id=$id"));
    }
	 public function LanguageList($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($id))
        {
           
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FINDLANGUAGE,"registration_id=$id"));
            
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
	 /* For ChatReason */  
   public function ChatReasonAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_FINDREASON,$dataArr));
            return DB_insertIdFunc();
        }
    } 
	 public function deleteChatReasonById($reason_id,$id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($reason_id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_FINDREASON,"chatReason_id !=".$reason_id." and  registration_id=$id"));
    }
	 public function chatReasonList($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($id))
        {
           
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_FINDREASON,"registration_id=$id"));
            
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
}

?>