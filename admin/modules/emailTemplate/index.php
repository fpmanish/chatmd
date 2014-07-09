<?php
include_once("../../../conf/config.inc.php");
include_once(ADMIN_MODULE_PATH."/emailTemplate/code/email_code.php");
include_once(ADMIN_INCLUDE_PATH."/header_post.php");

?>
    <?php include_once(ADMIN_INCLUDE_PATH."/info_header.php"); ?>
    <div id="mws-wrapper">
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        <?php include_once(ADMIN_INCLUDE_PATH."/sidebar_menu.php"); ?>
        <?php
        if($pageType == "addEmail" || $pageType == "editEmail")
            include_once(ADMIN_MODULE_PATH."/emailTemplate/form/email_form.php");
        else if($pageType == "list" || !isset($pageType))
            include_once(ADMIN_MODULE_PATH."/emailTemplate/table/email_table.php");
        ?>
    </div>
<?php include_once(ADMIN_INCLUDE_PATH."/footer.php"); ?>