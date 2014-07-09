<?php
extract($_POST);
$blogObj = new blog();
$pageType = "myaccount";
 
if(isset($_SESSION['AD_admin_user_id'])){
	$bogList_Arr=$blogObj->getBlogBydoctorID($_SESSION['AD_admin_user_id']);
	
	$blogCatergoryList = $blogObj->blogCategoryList(1);
	$currentTimestamp = getCurrentTimestamp();
 if($action=="Add")
 {
 	  $dataArr = array(
			  "blog_title" => $blog_title,
			  "blog_description"=>($blog_content),
			 "blogcategory_id"=>$blogcategory_id,
			  "is_active" =>0,
			   "id" =>$_SESSION['AD_admin_user_id'],
			  "is_modifiy" =>$currentTimestamp,
			  "add_date"   =>$currentTimestamp
			  );

			 $scuess=  $blogObj->blogAdd($dataArr);
			
		 header("location: ".MODULE_URL."/doctor/blog.php");
         exit();
 }else if($action=="Edit" && $Edit_id !="")
 {
   $dataArr = array(
			  "blog_title" => $blog_title,
			  "blog_description"=>($blog_content),
			 "blogcategory_id"=>$blogcategory_id,
			   "id" =>$_SESSION['AD_admin_user_id'],
			  "is_modifiy" =>$currentTimestamp,
			  "add_date"   =>$currentTimestamp
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
		
      $blogObj->blogUpdate($Edit_id,$dataArr);
		 header("location: ".MODULE_URL."/doctor/blog.php");
         exit();	
 }
else if($_GET['id'] !="") 
 {
  
	  $blog_id = (int)allStringValidations($_GET['id']);
  $blogData=$blogObj->getBlogById($blog_id);
 
 }
else if($_GET['delete_id'] !="") 
 {
  
	  $blog_id = (int)allStringValidations($_GET['delete_id']);

    $blogObj->deleteBlogById($blog_id);
 header("location: ".MODULE_URL."/doctor/blog.php");
         exit();
 
 }
}else{
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}


?>