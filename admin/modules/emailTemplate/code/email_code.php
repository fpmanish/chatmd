<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Template";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$EmailList = $pageObj->EmailList();

if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addEmail" && $edit_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
  $dataArr = array(
			  "template_title" => $title,
			  "template_content"=>$Email,
			  "is_active" =>$activate
			  );

      $pageObj->EmailAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/emailTemplate");
         exit();

}
 else if($pageType == "editEmail" && $edit_id != "")    // Edit page
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			"template_title" => $title,
			  "template_content"=>$Email,
			  "is_active" =>$activate
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->EmailUpdate($edit_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/emailTemplate");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editEmail" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $EmailData=$pageObj->getEmailById($page_id,1);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactEmail($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/emailTemplate");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteEmailById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/emailTemplate");    
 exit;
}


?>