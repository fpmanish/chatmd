<?php
class search
{
    public function search(){}
    
  
    public function HomeSearch($reason,$specilaity)
	{
		  global $db;
        $utilityObj = new utility();
         $mainArr = array();
		 $mainDoArr = array();
		 if($reason =="" && $specilaity !="")
		 {
		 
	 	$uqery=$utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDSPECIALTY,"registration_id","Specialty_id=$specilaity group by registration_id ").") order by Ratting desc"); 
			  $result = $db->query($uqery);
		 }
		 elseif ($reason !="" && $specilaity =="") {
					 	$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDREASON,"registration_id","chatReason_id=$reason group by registration_id ").") order by Ratting desc"));
			 
		 }
		  elseif ($reason !="" && $specilaity !="") {
					 	$result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDREASON,"registration_id","chatReason_id=$reason group by registration_id ")." )
			  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDSPECIALTY,"registration_id","Specialty_id=$specilaity group by registration_id ").") order by Ratting desc"));
			 
		 }
		 elseif ($reason =="" && $specilaity =="") {
			 $result = $db->query($utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,"is_active=1 and is_verfiy=1 order by Ratting desc"));
		 }
            while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
        	
		 return $mainArr;	
	}

public function RefineSearch($city,$state,$specilaity,$reason,$language,$gender)
	{
		 global $db;
        $utilityObj = new utility();
         $mainArr = array();
		$strQuery="";
		
	if($city !="" && $state !="" )
	{
     $strQuery=	"is_active=1 and is_verfiy=1 and CityId=$city and StateId =$state "	;
	}
	if($specilaity !="" )
	{
		if($strQuery =="")
		{
			$strQuery=	 "is_active=1 and is_verfiy=1 and registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDSPECIALTY,"registration_id","Specialty_id=$specilaity group by registration_id ").") "	;
		}
		else 
		{
			$strQuery .=	 "and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDSPECIALTY,"registration_id","Specialty_id=$specilaity group by registration_id ").") "	;
		}
		
	}
	if($reason !="" )
	{
if($strQuery =="")
		{
			$strQuery=	 "is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDREASON,"registration_id","chatReason_id=$reason group by registration_id ").") "	;
		}
		else 
		{
			$strQuery .=	 " and   registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDREASON,"registration_id","chatReason_id=$reason group by registration_id ").") "	;
		}
	}
	if($gender !="" )
	{
if($strQuery =="")
		{
			$strQuery=	 "is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"patient_id","gender=$gender group by patient_id ").") "	;
		}
		else 
		{
			$strQuery .=	 " and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_PATIENT,"patient_id","gender=$gender group by patient_id ").") "	;
		}
	}
	if($language !="" )
	{
if($strQuery =="")
		{
			$strQuery=	 "is_active=1 and is_verfiy=1  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDLANGUAGE,"registration_id","language_id=$language group by registration_id ").")"	;
		}
		else 
		{
			$strQuery .=	 "  and  registration_id IN (".
			  $utilityObj->am_createSelectFieldQuery(TABLE_FINDLANGUAGE,"registration_id","language_id=$language group by registration_id ").")   "	;
		}
	}
	
	
 $query=$utilityObj->am_createSelectAllQuery(TABLE_DOCTOR,$strQuery,"Ratting desc");
	 $result = $db->query($query); 
 while($res = $db->fetchNextAssoc($result))
			{
				 $mainArr[] = $res;
			}
        	
		 return $mainArr;	
  }	

}

?>