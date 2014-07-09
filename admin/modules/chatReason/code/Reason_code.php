<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "Reason";
$PagetypeText = "Add";
$pageObj = new pageManager();
 
$ReasonList = $pageObj->ReasonList();
 $currentTimestamp = getCurrentTimestamp();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addReason" && $Reason_id == "")      // Add Reason
    {
    	 $PagetypeText = "Add";
		 
  $dataArr = array(
			  "chatReason" => $chat_reason,
			"add_date"=>$currentTimestamp,
			  "is_active" =>1
			  );

      $pageObj->ReasonAdd($dataArr);
	  header("location: ".ADMIN_MODULE_URL."/chatReason");
         exit();

}
 else if($pageType == "editReason" && $id != "")    // Edit Reason
    {
		
  $PagetypeText = "Edit";
	  $dataArr = array(
			    "chatReason" => $chat_reason,
			    "modify_date"=>$currentTimestamp,
			  );

			//  echo "<pre>";
			 // print_r($dataArr); die;
      $pageObj->ReasonUpdate($id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/chatReason");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editReason" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $ReasonData=$pageObj->getReasonById($page_id);
 
}

	
else if($isAct !="" && $id != "") {
		
		$pageObj->actDeactReason($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/chatReason");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $pageObj->deleteReasonById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/chatReason");    
 exit;
}


?>