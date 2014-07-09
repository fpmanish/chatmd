<?php
extract($_POST);
extract($_GET);
$pageNameMenu = "annual_fee";
$feeObj = new fee();
//$adminDetails = $settingsObj->getSettings($_SESSION['MAIN_admin_user_id']);
 $feedetails = $feeObj->getvalue();
 if(count($_POST))
{
	    $dataArr = array(
        "fee" => $fees
     
    );

    
   $feeObj->setvalue($dataArr) ;
    header("location: ".ADMIN_MODULE_URL."/home/annual_fee.php");
    exit;
}
 
?>
