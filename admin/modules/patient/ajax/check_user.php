<?php extract($_POST);
include_once("../../../../conf/config.inc.php");
$settingsObj = new settings();
$user_array=$settingsObj->getPatientByName($name);

if(count($user_array)>0)
{
	echo "1";
}

?>