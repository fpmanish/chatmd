<?php
header("location: settings.php");
exit;
include_once("../../../conf/config.inc.php");
include_once(ADMIN_MODULE_PATH."/home/code/dashboard_code.php");
include_once(ADMIN_INCLUDE_PATH."/header_post.php");
?>
	<!-- Header -->
	<?php include_once(ADMIN_INCLUDE_PATH."/info_header.php"); ?>
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        <!-- Sidebar Wrapper -->
        <?php include_once(ADMIN_INCLUDE_PATH."/sidebar_menu.php"); ?>
        <?php include_once(ADMIN_MODULE_PATH."/home/table/dashboard_table.php"); ?>
    </div>
<?php include_once(ADMIN_INCLUDE_PATH."/footer.php"); ?>