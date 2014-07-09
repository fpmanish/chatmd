<?php
class settings
{
    public function settings(){}
    
  
    /* For admin settings */
    public function getSettings($admin_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($admin_id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_ADMIN,"admin_id=".$admin_id)));
            return $adminDetails;
        }
    }
    
  public function updateSettings($admin_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if(count($dataArr) && $admin_id != "")
            $db->query($utilityObj->am_createUpdateQuery(TABLE_ADMIN,$dataArr,"admin_id=".$admin_id));
    }
    
	 /* For Country selection */
	  public function CountryList()
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_COUNTRY,""));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
               
            
            return $mainArr;
        
    }
	  public function getCountryByCountryId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	  $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_COUNTRY,"countryID=".$id));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
	  public function getCountryNameByCountryId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	    $mainArr=   $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_COUNTRY,"countryID=".$id)));
		 return $mainArr;	
        	
        }
    }
	/* For State selection */
	
	public function getStateByCountryId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
         $mainArr = array();
        if($id != "")
        {
        	  $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_STATE,"countryID=".$id));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
        	
		 return $mainArr;	
        }
    }
	 public function getStateByStateId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
         
        if($id != "")
        {
            
         $mainArr=   $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_STATE,"regionID=".$id)));
		 return $mainArr;	
        }
    }
	/* For City selection */
	  public function getCityByCityName($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	    $mainArr=   $db->fetchNextAssoc($db->query($utilityObj->am_createSelectFieldQuery(TABLE_CITY,"cityID,regionID","cityName='$id'")));
		 return $mainArr;	
        	
        }
    }
	  public function CityList($id)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
       
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CITY,"cityName like '$id%'"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
               
            
            return $mainArr;
        
    }
	  public function getCityByStateId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_CITY,"regionID=".$id));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
	 /* For Patient registration */
	
	  public function patientAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_PATIENT,$dataArr));
            return DB_insertIdFunc();
        }
    }
     public function doc_paypal_info_add($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_PAYPAL_DETAILS,$dataArr));
            return DB_insertIdFunc();
        }
    }
	public function doc_registration_info_add($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_DOCTOR_REG_DETAILS,$dataArr));
            return DB_insertIdFunc();
        }
    }
	 public function patientList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"is_active=1 and user_type='0' "));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"user_type='0'"));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
	 public function doctorList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"is_active=1 and user_type='1'"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"user_type='1'"));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
	   public function getPatientById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"patient_id=".$id." and is_active=1")));
            return $adminDetails;
			
        }
    }
	 public function getDoctorById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"registration_id=".$id."")));
            return $adminDetails;
			
        }
    }
	 public function getDoctorByRegisterId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"patient_id=".$id."")));
            return $adminDetails;
			
        }
    }
	public function UpdatePatientById($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"patient_id=".$id)));
            return $adminDetails;
			
        }
    }
      public function getPatientByName($name)
    {
        global $db;
        $utilityObj = new utility();
        
        if($name != "")
        {
            $adminDetails =DB_fetchArrayFunc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"email='$name'")));
            return $adminDetails;
        }
    }
	public function getPatientEmailByID($name,$id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($name != "")
        {
            $adminDetails =DB_fetchArrayFunc($db->query($utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"email='$name' and patient_id !=".$id)));
            return $adminDetails;
        }
    }
    public function updatePatient($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if(count($dataArr) && $id != "")
            $db->query($utilityObj->am_createUpdateQuery(TABLE_PATIENT,$dataArr,"patient_id=".$id));
    }
	 public function updateDoctor($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if(count($dataArr) && $id != "")
            $db->query($utilityObj->am_createUpdateQuery(TABLE_DOCTOR,$dataArr,"registration_id=".$id));
    }
    public function actDeactPatient($patient_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($patient_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_PATIENT,$dataArr,"patient_id=".$patient_id));
			$db->query($utilityObj->am_createUpdateQuery(TABLE_DOCTOR,$dataArr,"registration_id=".$patient_id));
        }
    }
     public function actDeactuser($patient_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($patient_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_verfiy" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_PATIENT,$dataArr,"patient_id=".$patient_id));
			$db->query($utilityObj->am_createUpdateQuery(TABLE_DOCTOR,$dataArr,"registration_id=".$patient_id));
        }
    }
    public function deletePatientById($patient_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($patient_id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_PATIENT,"patient_id=".$patient_id));
    }
	public function deleteDoctorById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_DOCTOR,"registration_id=".$id));
    }
	//Get Speclity
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
	 /* For Doctor registration */
	  public function DoctorInfoAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_DOCTOR,$dataArr));
            return DB_insertIdFunc();
        }
    }
	 public function DoctorInfoList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
	   public function getDoctorInfoById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"patient_id=".$id."and is_active=1")));
            return $adminDetails;
        }
    }
    
    public function updateDoctorInfoId($id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if(count($dataArr) && $id != "")
            $db->query($utilityObj->am_createUpdateQuery(TABLE_DOCTOR,$dataArr,"patient_id=".$id));
    }
    
    
    public function deleteDoctorInfoById($patient_id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($patient_id != "")
            $db->query($utilityObj->am_createDeleteAllQuery(TABLE_DOCTOR,"patient_id=".$patient_id));
    }
}

?>