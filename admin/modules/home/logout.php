<?php
include("../../../conf/config.inc.php");
$loginObj = new LoginSystemAdmin();
$loginObj->logout();
header("location:".ADMIN_MODULE_URL."/login/login.php");
exit;
?>