<?php
class fee
{
	public function fee(){}
	
	public function getvalue()
	{
		 global $db;
        $utilityObj = new utility();
        
       
            $adminDetails = $db->fetchNextAssoc($db->query($utilityObj->am_createSelectAllQuery(TABLE_ANNUAL_FEE,"")));
            return $adminDetails;
        
	}
	public function setvalue($dataArr)
	{
		 global $db;
        $utilityObj = new utility();
        
    
	
           $db->query($utilityObj->am_createUpdateQuery(TABLE_ANNUAL_FEE,$dataArr,"id=1"));
		
            
        
	}
}
?>