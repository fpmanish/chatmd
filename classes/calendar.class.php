<?php
class calendar
{
    public function calendar(){}
    
  
   
	 /* For Calendar registration */
	  public function CalendarAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_SECHUDLE,$dataArr));
            return DB_insertIdFunc();
        }
    }
	
	 public function CalendarList($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_SECHUDLE,"doctor_id=".$id));
            
            while($res = $db->fetchNextAssoc($result))
			{
                $mainArr[] = $res;
			}
            return $mainArr;
	   }  
    }
	   public function getCalendarById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECHUDLE,"id=".$id." and is_active=1")));
            return $adminDetails;
			
        }
    }
	
	public function UpdateCalendarById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_SECHUDLE,"id=".$id)));
            return $adminDetails;
			
        }
    }
     
  
	 public function updateCalendar($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if(count($dataArr) && $id != "")
            $db->query($utilityObj->am_createUpdateQuery(TABLE_SECHUDLE,$dataArr,"doctor_id=".$id));
    }
    
     
    public function deleteCalendarById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_SECHUDLE,"id=".$id));
    }
	
	
	   public function getCalendarStartDateById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
        	$query=$utilityObj->am_createSelectFieldQuery(TABLE_SECHUDLE,"start_time,intervalBetween,end_time","doctor_id=".$id);
			
            $adminDetails = $db->fetchNextAssoc($db->query($query));
            return $adminDetails;
			
        }
    }
	  public function getIntervalById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
        	$query=$utilityObj->am_createSelectFieldQuery(TABLE_SECHUDLE,"intervalBetween","doctor_id=".$id);
			
            $adminDetails = $db->fetchNextAssoc($db->query($query));
            return $adminDetails;
			
        }
    }
	 public function checkAvilableTime($id,$date,$time)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
        	$datechat=date('d-m-Y',$date);
			$TimeChat=date("G:i",$time);
        	$query=$utilityObj->am_createSelectFieldQuery(TABLE_CHAT,"intverval","doctor_id=$id and display_time='$TimeChat' and display_date='$datechat'");
			
            $adminDetails = $db->fetchNextAssoc($db->query($query));
            return $adminDetails;
			
        }
    }
	 public function NextCalendarList($id)
    {
        global $db;
        $utilityObj = new utility();
      
       if($id !="")
	   {
	 
	   	$query=$utilityObj->am_createSelectAllQuery(TABLE_SECHUDLE,"doctor_id=$id "); 
                $result = $db->query($query);
            
           
            return $db->fetchNextAssoc($result);
	   }  
    }
	//get price
	 public function getpriceByID($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectFieldQuery(TABLE_SECHUDLE,"price","doctor_id=".$id)));
            return $adminDetails;
        }
    }
}

?>