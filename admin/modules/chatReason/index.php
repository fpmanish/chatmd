<?php
include_once("../../../conf/config.inc.php");
include_once(ADMIN_MODULE_PATH."/chatReason/code/Reason_code.php");
include_once(ADMIN_INCLUDE_PATH."/header_post.php");

?>
    <?php include_once(ADMIN_INCLUDE_PATH."/info_header.php"); ?>
    <div id="mws-wrapper">
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        <?php include_once(ADMIN_INCLUDE_PATH."/sidebar_menu.php"); ?>
        <?php
        if($pageType == "addReason" || $pageType == "editReason")
            include_once(ADMIN_MODULE_PATH."/chatReason/form/Reason_form.php");
        else if($pageType == "list" || !isset($pageType))
            include_once(ADMIN_MODULE_PATH."/chatReason/table/Reason_table.php");
        ?>
    </div>
<?php include_once(ADMIN_INCLUDE_PATH."/footer.php"); ?>