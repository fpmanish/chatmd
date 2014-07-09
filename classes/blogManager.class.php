<?php
class blog
{
    public function blog(){}
    //for blog Category
  	  public function blogCategoryAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_BLOGCATEGORY,$dataArr));
            return DB_insertIdFunc();
        }
    }
	
	
	 public function getBlogCatergoryById($id)
    {
        global $db;
        $utilityObj = new utility();
      
	
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOGCATEGORY,"id=".$id));
            
       $res = $db->fetchNextAssoc($result); 
          
			
            return $res;
	   }  
    }


	
	 public function actDeactBlogCatergory($blog_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($blog_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_BLOGCATEGORY,$dataArr,"id=".$blog_id));
        }
    }
   public function blogCategoryList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOGCATEGORY,"is_active=1 order by blog_categoryName desc"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOGCATEGORY,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    public function deleteBlogCatergoryById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_BLOGCATEGORY,"id=".$id));
    }
	
  public function blogCatergoryUpdate($blog_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($blog_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_BLOGCATEGORY,$dataArr,"id=".$blog_id));
    }
	
   
	 /* For Blog */
	  public function blogAdd($dataArr)
    {
        global $db;
        $utilityObj = new utility();
        if(is_array($dataArr) && count($dataArr))
        {
            $db->query($utilityObj->am_createInsertQuery(TABLE_BLOG,$dataArr));
            return DB_insertIdFunc();
        }
    }
	
	
	 public function getBlogById($id)
    {
        global $db;
        $utilityObj = new utility();
      
	
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG," blog_id=".$id));
            
       $res = $db->fetchNextAssoc($result); 
          
			
            return $res;
	   }  
    }
	 public function getBlogByIdActive($id)
    {
    
        global $db;
        $utilityObj = new utility();
      
	
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG," blog_id=".$id));
            
       $res = $db->fetchNextAssoc($result); 
          
			
            return $res;
	   }  
    }
 public function getBlogBycatergoyId($id)
    {
        global $db;
        $utilityObj = new utility();
      
	
       if($id !="")
	   {
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG,"blogcategory_id=".$id));
            
       $res = $db->fetchNextAssoc($result); 
          
			
            return $res;
	   }  
    }

	
	 public function actDeactBlog($blog_id,$is_act)
    {
        global $db;
        $utilityObj = new utility();
        $is_act = (bool)$is_act;
        
        if($blog_id != "" && isset($is_act))
        {
            $dataArr = array(
                "is_active" => $is_act
            );
            $db->query($utilityObj->am_createUpdateQuery(TABLE_BLOG,$dataArr,"blog_id=".$blog_id));
        }
    }
   public function blogList($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG,"is_active=1"));
            else
                $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
    public function deleteBlogById($id)
    {
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        return    $db->query($utilityObj->am_createDeleteAllQuery(TABLE_BLOG,"blog_id=".$id));
    }
	
  public function blogUpdate($blog_id,$dataArr)
    {
        global $db;
        $utilityObj = new utility();
        
        if($blog_id && is_array($dataArr) && count($dataArr))
            $db->query($utilityObj->am_createUpdateQuery(TABLE_BLOG,$dataArr,"blog_id=".$blog_id));
    }
	  public function getBlogByCatId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG,"blogcategory_id=$id"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
	 public function getBlogBydoctorID($id)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_BLOG,"id=$id"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
	//all doctor for autoComplete	
	 public function DoctorListForblog($onlyActive = 0)
    {
        global $db;
        $utilityObj = new utility();
        $mainArr = array();
        if(isset($onlyActive))
        {
            if($onlyActive)
                $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"name,patient_id","is_active=1 and user_type='1'"));
            else
                $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,""));
            
            while($res = $db->fetchNextAssoc($result))
                $mainArr[] = $res;
            
            return $mainArr;
        }
    }
	public function getDoctorByRegistrationId($id)
    {
    	
        global $db;
        $utilityObj = new utility();
        
        if($id != "")
        {
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"registration_id=".$id."")));
            return $adminDetails;
			
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
     public function getCountryIDByCountryName($name)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($name != "")
        {
        	    $mainArr=   $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_COUNTRY,"countryName='$name'")));
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
	  public function getStateIDByStateName($name)
    {
    	
        global $db;
        $utilityObj = new utility();
         
        if($name != "")
        {
            
         $mainArr=   $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_STATE,"regionName='$name'")));
		 return $mainArr;	
        }
    }
	
	  public function getPatientIDByName($name)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($name != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"patient_id","name='$name'"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
	 public function getNameByPatientID($id)
    {
    	
        global $db;
        $utilityObj = new utility();
         
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"name","patient_id=$id"));
            
           $res = $db->fetchNextAssoc($result);
           
		 return $res;	
        }
		
    }
	 public function getImageByDoctorID($id)
    {
    	
        global $db;
        $utilityObj = new utility();
         
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectFieldQuery(tbl_doctor,"image","registration_id=$id"));
            
           $res = $db->fetchNextAssoc($result);
           
		 return $res;	
        }
		
    }
	 public function getCountryByDoctorID($id)
    {
    	
        global $db;
        $utilityObj = new utility();
         
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectFieldQuery(tbl_doctor,"CountryId,StateId","registration_id=$id"));
            
           $res = $db->fetchNextAssoc($result);
           
		 return $res;	
        }
		
    }
	  public function getIDBydoctorTbl($id,$countryId,$stateID)
    {
    	
        global $db;
        $utilityObj = new utility();
          $mainArr = array();
        if($id != "")
        {
        	
        	  $result = $db->query($utilityObj->am_createSelectFieldQuery(TABLE_DOCTOR,"registration_id","registration_id=$id and CountryId=$countryId and StateId=$stateID"));
            
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
           
		 return $mainArr;	
        }
    }
}

?>