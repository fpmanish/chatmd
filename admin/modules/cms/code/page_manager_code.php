<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "pageMa";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$pageList = $pageObj->pageList();
 $allowedFileTypes = array("bmp","gif","jpg","jpeg","png");
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addPage" && $edit_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
		
  $dataArr = array(
			  "page_title" => $page_title,
			  "short_description" => $page_content1,
			  "page_description"=>$page_content2,
			  "is_active" =>1
			  );

   
	
		 if(isset($_FILES['file']) && $_FILES['file']['size'])
            {
                $fileExp = explode(".", $_FILES['file']['name']);
                $extension = end($fileExp);
                $extension = strtolower($extension);
                if(in_array($extension, $allowedFileTypes))
                {
                    $fileName =time()."_".$_FILES['file']['name'];
                    if(strlen($fileName) && strlen($_FILES['file']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['file']['tmp_name'], ADMIN_MODULE_PATH."/cms/Image/".$fileName);
                        $dataArr['image'] = $fileName;
                       
                    }
                }
                else
                {
                    $error .= "Error: This extension not allowed for image files.<br />";
                    $errorVar = 1;
                }
                	
            }
            else
            {
                $error .= "Error: Image file not found or size too less.<br />";
                $errorVar = 1;
            }
			if(!isset($errorVar)){
			 $scuess=  $pageObj->pageAdd($dataArr);
		 header("location: ".ADMIN_MODULE_URL."/cms/pageManager.php");
         exit();
	
			}

}
 else if($pageType == "editPage" && $edit_id != "")    // Edit page
    {
	$editData=$pageObj->getpageById($edit_id,1);	
	if (file_exists(ADMIN_MODULE_PATH."/cms/Image/".$editData['image']) && $editData['image'] !="" &&  isset($_FILES['file'])) 
	{
		unlink(ADMIN_MODULE_PATH."/cms/Image/".$editData['image']);
		unset($editData);
	}
  $PagetypeText = "Edit";
	  $dataArr = array(
			  "page_title" => $page_title,
			  "short_description" => $page_content1,
			  "page_description"=>$page_content2,
			  "is_active" =>1
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;			
			  if(isset($_FILES['file']) && $_FILES['file']['size'] && $_FILES['file']['name'] !="")
            {
                $fileExp = explode(".", $_FILES['file']['name']);
                $extension = end($fileExp);
                $extension = strtolower($extension);
                if(in_array($extension, $allowedFileTypes))
                {
                	
                    $fileName =time()."_".$_FILES['file']['name'];
					
                    if(strlen($fileName) && strlen($_FILES['file']['tmp_name']))
                    {
                    	
                      if(move_uploaded_file($_FILES['file']['tmp_name'], ADMIN_MODULE_PATH."/cms/Image/".$fileName))  
					  {
					 
					  	$dataArr['image'] = $fileName;
					  }
                       else
                {
                    $error .= "Error: This  file not uploaded.<br />";
                    $errorVar = 1;
					
                }  
                       
                    }
                }
                else
                {
                    $error .= "Error: This extension not allowed for image files.<br />";
                    $errorVar = 1;
                }
                	
            }
          
			if(!isset($errorVar)){
      $pageObj->pageUpdate($edit_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/cms/pageManager.php");
         exit();
			}
	}
	
}
if(count($_GET) && $pageType == "editPage" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $pageData=$pageObj->getpageById($page_id,1);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactpage($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/cms/pageManager.php");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deletePageById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/cms/pageManager.php");    
 exit;
}


?>