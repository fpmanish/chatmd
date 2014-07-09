<?php
# ----------------------------------------------------------------------------------------------------
# INCLUDE GLOBAL CONSTANTS
# ----------------------------------------------------------------------------------------------------
include(SITE_ROOT."/conf/constants.inc.php");
include_once(SITE_ROOT."/conf/database_tables.php");
# ----------------------------------------------------------------------------------------------------
# INCLUDE GLOBAL CLASSES
# ----------------------------------------------------------------------------------------------------
// including all class files having cls/class at its last.
if($handleCls = opendir(CLASSES_DIR))
	while(false !== ($entry = readdir($handleCls)))
        if(preg_match("/\b\.((class)|(cls))\.php$\b/",$entry))
            include_once(CLASSES_DIR."/".$entry);
# ----------------------------------------------------------------------------------------------------
# INCLUDE GLOBAL FUNCTIONS
# ----------------------------------------------------------------------------------------------------
// including all function files having func/function at its last.
if($handleFunc = opendir(FUNCTIONS_DIR))
    while(false !== ($entry = readdir($handleFunc)))
        if(preg_match("/\b\.((function)|(func))\.php$\b/",$entry))
            include_once(FUNCTIONS_DIR."/".$entry);
# ----------------------------------------------------------------------------------------------------
# CHECK IF MYSQLI DRIVER INSTALLED ON SERVER. USE THAT IF INSTALLED, MYSQL OTHERWISE.
# ----------------------------------------------------------------------------------------------------
if (function_exists('mysqli_connect'))
    define("IS_MYSQLI_ON",1);
else
	define("IS_MYSQLI_ON",0);
/****************************Make connection to database***********************************/
if(MAINDB_NAME != "" && MAINDB_HOST != "" && MAINDB_USER != "" )
    $db = new DB(MAINDB_NAME, MAINDB_HOST, MAINDB_USER, MAINDB_PASS);
?>