<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Specialty";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$SpecialtyList = $pageObj->SpecialtyList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addSpecialty" && $Specialty_id == "")      // Add Specialty
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "Specialty_name" => $Specialty_name,
			  "add_date"=>$currentTimestamp,
			   "modify_date"=>$currentTimestamp,
			  "is_active" =>1
			  );

      $pageObj->SpecialtyAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/Specialty");
         exit();

}
 else if($pageType == "editSpecialty" && $Specialty_id != "")    // Edit Specialty
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			    "Specialty_name" => $Specialty_name,
			  "modify_date"=>$currentTimestamp,
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->SpecialtyUpdate($Specialty_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/Specialty");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editSpecialty" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $SpecialtyData=$pageObj->getSpecialtyById($page_id);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactSpecialty($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/Specialty");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteSpecialtyById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/Specialty");    
 exit;
}


?>