<?php
	@session_start();
	@define(SITE_ADMIN_EMAIL,"m_sonwal@yahoo.co.in");
	ini_set('date.timezone', 'America/New_York');
	# ----------------------------------------------------------------------------------------------------
	# DATABASE CONNECTION PARAMETERS
	# ----------------------------------------------------------------------------------------------------
	define('MAINDB_HOST',  "localhost");
	define('MAINDB_USER',  "km1079_chat123"); 
	define('MAINDB_PASS',  "chatmd@123");
	define('MAINDB_NAME',  "km1079_chatmd");
	define('MAINDB_EMAIL', SITE_ADMIN_EMAIL);
	# ----------------------------------------------------------------------------------------------------
	# Enabling error reporting.
	# ----------------------------------------------------------------------------------------------------
	ini_set('display_errors',1);
 	error_reporting(E_ALL & ~E_NOTICE);
    set_time_limit(0);
    ini_set('memory_limit',-1);
	# ----------------------------------------------------------------------------------------------------
	# DEFINE GREEN FOLDER
	# ----------------------------------------------------------------------------------------------------
	define('ROOT_FOLDER', "");
	# ----------------------------------------------------------------------------------------------------
	# TMP FOLDER PATH DEFINITION
	# ----------------------------------------------------------------------------------------------------
	//define(TMP_FOLDER, "/tmp");
	# ----------------------------------------------------------------------------------------------------
	# DEFINE MODULE FOLDER
	# ----------------------------------------------------------------------------------------------------
	define('MODULE_FOLDER', "/modules");
	define('ADMIN_FOLDER', "/admin");
	# ----------------------------------------------------------------------------------------------------
	# DEFINE GREEN ROOT
	# ----------------------------------------------------------------------------------------------------
	//checking if last char in DOCUMENT_ROOT is '/' than remove it
	$lastchar	= substr($_SERVER["DOCUMENT_ROOT"], -1, 1);
	if($lastchar=='/'){
		$rest = substr($_SERVER["DOCUMENT_ROOT"], 0, -1);  
		define('SITE_ROOT', $rest.ROOT_FOLDER);
	}else{
		define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].ROOT_FOLDER);
	}
	#----------------------------------------------------------------
	# admin root
	#----------------------------------------------------------------
	define('ADMIN_ROOT', SITE_ROOT."/admin");
	# ----------------------------------------------------------------------------------------------------
	# DEFAULT URL
	# ----------------------------------------------------------------------------------------------------
	if ((!$_SERVER["HTTPS"]) || ($_SERVER["HTTPS"] == "off")) {

		define('HTTPS_MODE', "off");
		define('DEFAULT_URL', "http://".$_SERVER["HTTP_HOST"].ROOT_FOLDER);
	} else {
		define('HTTPS_MODE', "on");
		define('DEFAULT_URL', "https://".$_SERVER["HTTP_HOST"].ROOT_FOLDER);
	}
	
	# ----------------------------------------------------------------------------------------------------
	# DEFINE HOST NAME
	# ----------------------------------------------------------------------------------------------------
	define('HOST_NAME', $_SERVER["HTTP_HOST"]);
	# ----------------------------------------------------------------------------------------------------
	# DEFINE MODULE URL
	# ----------------------------------------------------------------------------------------------------
	define('MODULE_URL', "http://".$_SERVER["HTTP_HOST"].ROOT_FOLDER.MODULE_FOLDER);
	# ----------------------------------------------------------------------------------------------------
	# DEFINE ADMIN URLs
	# ----------------------------------------------------------------------------------------------------
	define('ADMIN_URL', DEFAULT_URL."/admin");
	define('ADMIN_MODULE_URL', ADMIN_URL.MODULE_FOLDER);
	# ----------------------------------------------------------------------------------------------------
	define('MODULE_PATH',SITE_ROOT."/modules");
	define('INCLUDE_PATH', SITE_ROOT."/includes");
	
	define('ADMIN_MODULE_PATH',SITE_ROOT.ADMIN_FOLDER."/modules");
	define('ADMIN_INCLUDE_PATH', SITE_ROOT.ADMIN_FOLDER."/includes");
	# ----------------------------------------------------------------------------------------------------
	define('SECURE_URL', "https://".$_SERVER["HTTP_HOST"].GREEN_FOLDER);
	# ----------------------------------------------------------------------------------------------------
	# NON_SECURE_URL
	# ----------------------------------------------------------------------------------------------------
	define('NON_SECURE_URL', "http://".$_SERVER["HTTP_HOST"].ROOT_FOLDER);
	define('CSS_URL', DEFAULT_URL."/css");
	define('JS_URL', DEFAULT_URL."/js");
	define('IMAGE_URL', DEFAULT_URL."/images");
    
    define('Uploads_URL', DEFAULT_URL."/media");
    define('Uploads_PATH', SITE_ROOT."/media");
    
    define('MUSIC_URL', Uploads_URL."/music");
    define('MUSIC_PATH', Uploads_PATH."/music");
    
    define('GALLERY_URL', Uploads_URL."/gallery");
    define('GALLERY_PATH', Uploads_PATH."/gallery");
    
    define('VIDEO_URL', Uploads_URL."/video");
    define('VIDEO_PATH', Uploads_PATH."/video");
	
	define('ADMIN_CSS_URL', DEFAULT_URL.ADMIN_FOLDER."/css");
	define('ADMIN_JS_URL', DEFAULT_URL.ADMIN_FOLDER."/js");
	
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL INCLUDES
	# ----------------------------------------------------------------------------------------------------
	include(SITE_ROOT."/conf/includes.inc.php");
?>