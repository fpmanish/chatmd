<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/fluid.css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/mws.style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/16x16.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/24x24.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/32x32.css" media="screen" />
<link href="<?php echo ADMIN_CSS_URL; ?>/jui/jquery.ui.css" rel="stylesheet" type="text/css" />
<!-- Demo and Plugin Stylesheets -->
<!--<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/demo.css" media="screen" />-->
<script type="text/javascript" src="<?php echo ADMIN_URL ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo ADMIN_URL ?>/ckeditor/sample.js" type="text/javascript"></script>
<link href="<?php echo ADMIN_URL ?>/ckeditor/sample.css" rel="stylesheet" type="text/css" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL; ?>/mws.theme.css" media="screen" />

<!-- JavaScript Plugins -->
<?php echo jscripts::jQuery(); ?>
<?php echo jscripts::script("jquery.mousewheel-min.js"); ?>

<!-- jQuery-UI Dependent Scripts -->
<?php echo jscripts::jQueryUI(); ?>

<!-- Core Script -->
<?php echo jscripts::script("mws.js"); ?>
<?php echo jscripts::script("miscAdmin.js"); ?>

<!-- Demo Scripts (remove if not needed) -->
<?php //echo jscripts::script("demo.js"); ?>
<?php //echo jscripts::script("demo.dashboard.js"); ?>

<title><?php echo ADMIN_MAIN_TITLE; ?></title>

</head>
<body>