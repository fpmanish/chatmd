<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "BlogCat";
$PagetypeText = "Add";
$blogObj = new blog();
 
$blogCategoryList = $blogObj->blogCategoryList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addblogCategory" && $id == "")      // Add blogCategory
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "blog_categoryName" => $category_name,
			  "add_date"=>$currentTimestamp,
			   "modify_date"=>$currentTimestamp,
			  "is_active" =>1
			  );

      $blogObj->blogCategoryAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/blogCategory");
         exit();

}
 else if($pageType == "editblogCategory" && $id != "")    // Edit blogCategory
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			    "blog_categoryName" => $category_name,
			  "modify_date"=>$currentTimestamp,
			  
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $blogObj->blogCatergoryUpdate($id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/blogCategory");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editblogCategory" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $blogCategoryData=$blogObj->getBlogCatergoryById($page_id);
}

	
else if($isAct !="" && $id != "") {
		
		$blogObj->actDeactBlogCatergory($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/blogCategory");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $blogObj->deleteBlogCatergoryById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/blogCategory");    
 exit;
}


?>