<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Meta";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$MetaList = $pageObj->MetaList();

if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addMeta" && $edit_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
  $dataArr = array(
			  "keyword" => $keywords,
			  "descrption"=>$description,
			  "author" =>$author,
			   "page_name" =>$page_name
			  );

      $pageObj->MetaAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/MetaTag");
         exit();

}
 else if($pageType == "editMeta" && $edit_id != "")    // Edit page
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			 "keyword" => $keywords,
			  "descrption"=>$description,
			 "author" =>$author,
			  "page_name" =>$page_name
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->MetaUpdate($edit_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/MetaTag");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editMeta" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $MetaData=$pageObj->getMetaById($page_id,1);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactMeta($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/MetaTag");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteMetaById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/MetaTag");    
 exit;
}


?>