<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "faq";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$faqList = $pageObj->faqList();
$faqcategoryList = $pageObj->faqCategoryList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $faqType != "list")   // for add/edit/delete condition.
{
if($pageType == "addFaq" && $Faq_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "faq_title" => $page_title,
			  "faq_description"=>$page_content,
			  "category_id"=>$category,
			  "add_date"=>$currentTimestamp,
			   "modify_date"=>$currentTimestamp,
			  "is_active" =>$activate
			  );

      $pageObj->faqAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/cms/faqManager.php");
         exit();

}
 else if($pageType == "editFaq" && $Faq_id != "")    // Edit page
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			  "faq_title" => $page_title,
			  "faq_description"=>$page_content,
			   "category_id"=>$category,
			   "modify_date"=>$currentTimestamp,
			  "is_active" =>$activate
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->faqUpdate($Faq_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/cms/faqManager.php");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editFaq" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $faqData=$pageObj->getfaqById($page_id);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactfaq($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/cms/faqManager.php");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteFaqById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/cms/faqManager.php");    
 exit;
}


?>