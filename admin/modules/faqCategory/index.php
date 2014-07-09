<?php
include_once("../../../conf/config.inc.php");
include_once(ADMIN_MODULE_PATH."/faqCategory/code/faqCategory_code.php");
include_once(ADMIN_INCLUDE_PATH."/header_post.php");

?>
    <?php include_once(ADMIN_INCLUDE_PATH."/info_header.php"); ?>
    <div id="mws-wrapper">
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        <?php include_once(ADMIN_INCLUDE_PATH."/sidebar_menu.php"); ?>
        <?php
        if($pageType == "addfaqCategory" || $pageType == "editfaqCategory")
            include_once(ADMIN_MODULE_PATH."/faqCategory/form/faqCategory_form.php");
        else if($pageType == "list" || !isset($pageType))
            include_once(ADMIN_MODULE_PATH."/faqCategory/table/faqCategory_table.php");
        ?>
    </div>
<?php include_once(ADMIN_INCLUDE_PATH."/footer.php"); ?>