<?php

ob_start() ;

session_start();


include("../conf/config.inc.php");



header('Location: modules/login'); 
exit;
?>

