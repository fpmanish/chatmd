<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$settingsObj = new settings();
$user_array=$settingsObj->getPatientEmailByID($name,$_SESSION['AD_admin_user_id']);

if(count($user_array) !=0)
{
	echo "1";
}

?>