<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Blog";
$PagetypeText = "Add";
$blogObj = new blog();
 $currentTimestamp = getCurrentTimestamp();
$blogList = $blogObj->blogList();
$blogCatergoryList = $blogObj->blogCategoryList(1);
$DoctorName = $blogObj->DoctorListForblog(1);
 $allowedFileTypes = array("bmp","gif","jpg","jpeg","png");
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addblog" && $edit_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
		
  $dataArr = array(
			  "blog_title" => $blog_title,
			  "blog_description"=>addslashes($blog_content),
			 "blogcategory_id"=>$category,
			  "is_active" =>$activate,
			   "id" =>$DoctorAuotName,
			  "is_modifiy" =>$currentTimestamp,
			  "add_date"   =>$currentTimestamp
			  );

   
	
		
			 $scuess=  $blogObj->blogAdd($dataArr);
		 header("location: ".ADMIN_MODULE_URL."/blog/index.php");
         exit();
	
		

}
 else if($pageType == "editblog" && $edit_id != "")    // Edit page
    {
	$editData=$blogObj->getBlogById($edit_id);	
	if (file_exists(ADMIN_MODULE_PATH."/blog/Image/".$editData['image']) && $editData['image'] !="" &&  isset($_FILES['file'])) 
	{
		unlink(ADMIN_MODULE_PATH."/blog/Image/".$editData['image']);
		unset($editData);
	}
  $PagetypeText = "Edit";
  
  $DoctorAutoValue=explode("/",$DoctorAuotName );

  $doctor_id=$blogObj->getPatientIDByName($DoctorAutoValue[0]);
 
  $countryId=$blogObj->getCountryIDByCountryName($DoctorAutoValue[1]);
  $stateId=$blogObj->getStateIDByStateName($DoctorAutoValue[2]);
  for($k=0;count($doctor_id)>$k;$k++)
  {
  	$id_insert=$blogObj->getIDBydoctorTbl($doctor_id[$k]['patient_id'],$countryId['countryID'],$stateId['regionID']);
	if(count($id_insert)>0)
	{
		$insertID=$doctor_id[$k]['patient_id'];
	}
	else if(count($id_insert)==0)
	{
		$insertID=$doctor_id[$k]['patient_id'];
	}
  }
  
	  $dataArr = array(
			 "blog_title" => $blog_title,
			  "blog_description"=>addslashes($blog_content),
			   "blogcategory_id"=>$category,
			     "id" =>$insertID,
			 "is_active" =>$activate,
			  "is_modifiy" =>$currentTimestamp,
			  "add_date"   =>$currentTimestamp
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
		
      $blogObj->blogUpdate($edit_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/blog/index.php");
         exit();
		
	}
	
}
if(count($_GET) && $pageType == "editblog" && $blog_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $blog_id = (int)allStringValidations($blog_id);
  $blogData=$blogObj->getBlogById($blog_id);

}

	
else if($isAct !="" && $id != "") {
		
		$blogObj->actDeactBlog($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/blog/index.php");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $blogObj->deleteBlogById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/blog/index.php");    
 exit;
}


?>