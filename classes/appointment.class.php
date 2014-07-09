<?php
class appointment
{
    public function appointment(){}
    
  
   
	 /* For appointment registration */
	  public function appointmentAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_APPOINTMENT,$dataArr));
            return DB_insertIdFunc();
        }
    }
	  public function appointmentListbydoctorId($id,$type=0)
    {
        global $db;
        $utilityObj = new utility();
       
                if($type==0){
			 $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_APPOINTMENT,"doctor_id=$id order by modify_date desc"));
		}else{
			 $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_APPOINTMENT,"doctor_id=$id and appointment_type=$type order by modify_date desc"));
		}
         
          $res = $db->fetchNextAssoc($result);
            
            return $res;
   
}
	public function appointmentUpdate($Appointment_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($Appointment_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_APPOINTMENT,$dataArr,"id=".$Appointment_id));
    }
	  public function appointmentShedualebydoctorId($id,$days,$type=1)
    {
        global $db;
        $utilityObj = new utility();
       if($days=="Tue")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"tues_starttime,tues_breakstart,tues_breakend,tues_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Wed")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"wed_starttime,wed_breakstart,wed_breakend,wed_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Thu")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"thru_starttime,thru_breakstart,thru_breakend,thru_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Fri")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"fri_starttime,fri_breakstart,fri_breakend,fri_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Sat")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"sat_starttime,sat_breakstart,sat_breakend,sat_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Sun")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"sun_starttime,sun_breakstart,sun_breakend,sun_endtime","doctor_id=$id and appointment_type = $type ");
	   }
	    if($days=="Mon")
	   {
	   	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"mon_starttime,mon_breakstart,mon_breakend,mon_endtime","doctor_id=$id and appointment_type = $type ");
	   }
                $result = $db->query($query);
         
          $res = DB_fetchArrayFunc($result);
            
            return $res;
   
}
 public function NextCalendarList($id,$type=0)
    {
        global $db;
        $utilityObj = new utility();
      
       if($id !="")
	   {
	 
	   if($type==0){
	 			$query=$utilityObj->am_createSelectAllQuery(TABLE_APPOINTMENT,"doctor_id=$id "); 
	 		}else{
	 			$query=$utilityObj->am_createSelectAllQuery(TABLE_APPOINTMENT,"doctor_id=$id and appointment_type = $type"); 
	 		}
	 		 
                $result = $db->query($query);
            
           
            return $db->fetchNextAssoc($result);
	   }  
    }
	 public function checkAvilableTime($id,$date,$time)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
        	
     	$query=$utilityObj->am_createSelectFieldQuery(TABLE_CHAT,"intverval","doctor_id=$id and display_time='$time' and display_date='$date'");
			
            $adminDetails = $db->fetchNextAssoc($db->query($query));
            return $adminDetails;
			
        }
    }
     public function getpriceByID($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"price","doctor_id=".$id)));
            return $adminDetails;
        }
    }
	  public function getIntervalById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
        	$query=$utilityObj->am_createSelectFieldQuery(TABLE_APPOINTMENT,"intervalBetween","doctor_id=".$id);
			
            $adminDetails = $db->fetchNextAssoc($db->query($query));
            return $adminDetails;
			
        }
    }
}
?>