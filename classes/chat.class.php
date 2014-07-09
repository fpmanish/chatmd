<?php
class chat
{
    public function chat(){}
    
  
   
	 /* For Calendar registration */
	  public function ChatAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_CHAT,$dataArr));
            return DB_insertIdFunc();
        }
    }
	
	 public function ChatListById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"doctor_id=".$id));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
    }
	 public function ChatListByDoctorId($id,$type=0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
	
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"doctor_id=".$id." and appointment_type=".$type." order by display_date desc"));
            
         while ($res = $db->fetchNextAssoc($result)) {
           $mainArr[]=  $res;
         }  
			
            return $mainArr;
	   }  
    }
	 public function ChatListByPatientId($id,$type=0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
	
       if($id !="")
	   {
          
	   	  	$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"user_id=".$id." and appointment_type=".$type." order by display_date desc"));
	   	  
		  
         while ($res = $db->fetchNextAssoc($result)) {
           $mainArr[]=  $res;
         }  
			
            return $mainArr;
	   }  
    }
	 public function ChatListByAccessTokenfordoctor($access,$id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($access !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"access_token='".trim($access)."' and token !='' and doctor_id=$id"));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
    }
	public function ChatListByAccessTokenforpatient($access,$id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($access !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"access_token='".trim($access)."' and token !='' and user_id=$id"));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
    }
	   public function ChatListBydate($date)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($date !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"display_date=".$date));
            
          while($res = $db->fetchNextAssoc($result))
			{
				$mainArr[] = $res;
			}
            return $mainArr;
	   }  
    }
    public function CheckAccessToken($access)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($access !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,"access_token='".trim($access)."'"));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
    }
	 public function chatList()
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       
            
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CHAT,""));
            
            while($res = $db->fetchNextAssoc($result))
			{
				$mainArr[] = $res;
			}
                
            
            return $mainArr;
        
    }

    public function deleteCalendarById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_CHAT,"id=".$id));
    }
	
 public function chatUpdate($chat_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($chat_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_CHAT,$dataArr,"session_num=".$chat_id));
    }
	public function getPatientName($id)
    {
    	  global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"name","patient_id=".$id));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
	}
		
	public function getDoctorName($id)
    {
    	  global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"name","patient_id=".$id));
            
           $res = $db->fetchNextAssoc($result);
			
            return $res;
	   }  
	}	
	//last three doctor
	 public function chatlatestThreeDoctorId($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       
            
                $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_CHAT,"DISTINCT(doctor_id)","user_id=$id","created_date desc limit 3"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				$mainArr[] = $res;
			}
                
            
            return $mainArr;
        
    }
	//delete chat By chat Id
	 public function deleteAppointmentById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_CHAT,"session_num=".$id));
    }
	
	public function insertpatientimage($dataArr1)
	{
		
		global $db;
        $utilityObj = new utility();
        if(is_array($dataArr1) && count($dataArr1))
        {
        	
		$db->query($utilityObj->am_createInsertQuery(tbl_patient_image,$dataArr1));
            return DB_insertIdFunc();
		}
		
	}
	public function GetPatientimage($chat_id)
	{
		
	global $db;
        $utilityObj = new utility();
		$this->chat_id = $chat_id;
		 $sql = $utilityObj->am_createSelectAllQuery(tbl_patient_image,"chat_id='".($this->chat_id)."' ");
		$data = $db->query($sql);
		$result=array();
	    while($row = DB_fetchArrayFunc($data))
		{
		$result[]=	$row;
		}
		
		return $result;
	}
}

?>