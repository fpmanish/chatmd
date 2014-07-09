<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "faqCategory";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$faqCategoryList = $pageObj->faqCategoryList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addfaqCategory" && $id == "")      // Add faqCategory
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "category_name" => $category_name,
			  "add_date"=>$currentTimestamp,
			   "modify_date"=>$currentTimestamp,
			  "is_active" =>1
			  );

      $pageObj->faqCategoryAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/faqCategory");
         exit();

}
 else if($pageType == "editfaqCategory" && $id != "")    // Edit faqCategory
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			    "category_name" => $category_name,
			  "modify_date"=>$currentTimestamp,
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->faqCategoryUpdate($id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/faqCategory");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editfaqCategory" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $faqCategoryData=$pageObj->getfaqCategoryById($page_id);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactfaqCategory($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/faqCategory");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deletefaqCategoryById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/faqCategory");    
 exit;
}


?>