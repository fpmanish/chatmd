<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Language";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$LanguageList = $pageObj->LanguageList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addLanguage" && $Language_id == "")      // Add Language
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "name" => $Language_name,
			
			  "is_active" =>1
			  );

      $pageObj->LanguageAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/Language");
         exit();

}
 else if($pageType == "editLanguage" && $Language_id != "")    // Edit Language
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			    "name" => $Language_name,
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->LanguageUpdate($Language_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/Language");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editLanguage" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $LanguageData=$pageObj->getLanguageById($page_id);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactLanguage($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/Language");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteLanguageById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/Language");    
 exit;
}


?>