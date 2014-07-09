<?php
	/*==================================================================*\
	#       Coder: Manish Sonwal (m_sonwal@yahoo.co.in)
		Date : 7 May 2012                                              
	\*==================================================================*/
	# ----------------------------------------------------------------------------------------------------
	# SITE TITLE
	# ----------------------------------------------------------------------------------------------------
	define('MAIN_TITLE', "chat MD");
	define('ADMIN_MAIN_TITLE', "chat MD Admin Panel");
	# ----------------------------------------------------------------------------------------------------
	# DATE FORMAT - SET JUST ONE FORMAT
	# Y - numeric representation of a year with 4 digits (xxxx)
	# m - numeric representation of a month with 2 digits (01 - 12)
	# d - numeric representation of a day of the month with 2 digits (01 - 31)
	# ----------------------------------------------------------------------------------------------------
	define('DEFAULT_DATE_FORMAT', "j M y");
	# ----------------------------------------------------------------------------------------------------
	# FRIENDLY URL CONSTANTS
	# IMPORTANT - PAY ATTENTION
	# Any changes here need to be done in all .htaccess (modrewrite)
	# ----------------------------------------------------------------------------------------------------
	//define(FRIENDLYURL_SEPARATOR, "_");
	//define(FRIENDLYURL_VALIDCHARS, "a-zA-Z0-9");
	//define(FRIENDLYURL_REGULAREXPRESSION, "^[".FRIENDLYURL_VALIDCHARS.FRIENDLYURL_SEPARATOR."]{1,}$");
	# ----------------------------------------------------------------------------------------------------
    # DEFAULT HASH ALGORITHM
    # ----------------------------------------------------------------------------------------------------
    define('DEFAULT_HASH_ALGO', "sha512");
	# ----------------------------------------------------------------------------------------------------
	# IMAGE FOLDER CONSTANTS
	# ----------------------------------------------------------------------------------------------------
	define('IMAGE_RELATIVE_PATH', "/images");
	define('IMAGE_ADMIN_PATH', "/img");
	define('IMAGE_DIR', SITE_ROOT.IMAGE_RELATIVE_PATH);
	define('IMAGE_URL', DEFAULT_URL.IMAGE_RELATIVE_PATH);
    define('ADMIN_IMAGE_URL', DEFAULT_URL.ADMIN_FOLDER.IMAGE_ADMIN_PATH);
	define('BROWSE_IMAGE_DIR', SITE_ROOT.BROWSE_IMAGE_RELATIVE_PATH);
	define('BROWSE_IMAGE_URL', DEFAULT_URL.BROWSE_IMAGE_RELATIVE_PATH);
    define('SWF_URL',         DEFAULT_URL."/swf");
	# ----------------------------------------------------------------------------------------------------
	# CONSTANTS
	# ----------------------------------------------------------------------------------------------------
	define('INCLUDES_DIR',  SITE_ROOT."/includes");
	define('CLASSES_DIR',   SITE_ROOT."/classes");
	define('FUNCTIONS_DIR', SITE_ROOT."/functions");
    define('JS_PATH',       SITE_ROOT."/js");
	define('MODULES_PATH',  SITE_ROOT."/modules");
	define('ADMIN_PATH',       SITE_ROOT."/admin");
	define('CSS_PATH',         SITE_ROOT."/css");
    define('SWF_PATH',         SITE_ROOT."/swf");
	# ----------------------------------------------------------------------------------------------------
    # Global Seperator
    # ----------------------------------------------------------------------------------------------------
	define('GLOBAL_SEP','_$$||$$_');
    # ----------------------------------------------------------------------------------------------------
    # Global Variables
    # ----------------------------------------------------------------------------------------------------
    global $db_link;
?>