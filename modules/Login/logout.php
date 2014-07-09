<?php
include_once("../../conf/config.inc.php");
$loginObj= new LoginSystem();
$loginObj->logout();
 header("location:".MODULE_URL."/home");
 exit;
?>


