<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Message";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$messageList = $pageObj->MessageList();

if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addMessage" && $edit_id == "")      // Add Page
    {
    	 $PagetypeText = "Add";
  $dataArr = array(
			  "message_title" => $title,
			  "message_content"=>$message,
			  "is_active" =>$activate
			  );

      $pageObj->MessageAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/message");
         exit();

}
 else if($pageType == "editMessage" && $edit_id != "")    // Edit page
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			 "message_title" => $title,
			  "message_content"=>$message,
			  "is_active" =>$activate
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->MessageUpdate($edit_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/message");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editMessage" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $messageData=$pageObj->getMessageById($page_id,1);
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactMessage($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/message");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteMessageById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/message");    
 exit;
}


?>