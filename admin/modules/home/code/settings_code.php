<?php
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$settingsObj = new settings();
extract($_POST);
extract($_GET);
$pageNameMenu = "settings";

if(count($_POST))
{
    $dataArr = array(
        "admin_username" => $admin_name,
        "admin_email" => $admin_email
    );
    
    if($edit_password)
        $dataArr['admin_password'] = createHash($password_field);
    
    
    $settingsObj->updateSettings($_SESSION['MAIN_admin_user_id'],$dataArr);
    header("location: ".ADMIN_MODULE_URL."/home/dashboard.php");
    exit;
}
$adminDetails = $settingsObj->getSettings($_SESSION['MAIN_admin_user_id']);
?>