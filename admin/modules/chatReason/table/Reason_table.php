<link href="<?php echo ADMIN_CSS_URL; ?>/core/table.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_CSS_URL; ?>/core/panels.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.dataTables.js"); ?>
<!-- Main Container Start -->
    <div id="mws-container" class="clearfix">
    <div class="container">
    <script>
        $(document).ready(function(){
            $(".mws-datatable").dataTable();
        });
    </script>
    <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/chatReason/index.php?pageType=addReason" ?>" class="mws-button blue">Add  Chat Reason</a></div>
        <!-- Inner Container Start -->
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-document">Chat Reason Manager</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-datatable mws-table">
                    <thead>
                        <tr>
                            <th>Chat Reason</td>
                            <th>Activate</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<count($ReasonList);$i++)
                        {
                        ?>
                        <tr>
                            <td><?php echo $ReasonList[$i]['chatReason']; ?></td>
                            <td><?php echo actInactSwitch(ADMIN_MODULE_URL."/chatReason/index.php?id=".$ReasonList[$i]['id']."&isAct=1&pageType=list",ADMIN_MODULE_URL."/chatReason/index.php?id=".$ReasonList[$i]['id']."&isAct=0&pageType=list",$ReasonList[$i]['is_active']); ?></td>
                            <td><a href="<?php echo ADMIN_MODULE_URL."/chatReason/index.php?pageType=editReason&page_id=".$ReasonList[$i]['id']; ?>"><img src="<?php echo ADMIN_IMAGE_URL; ?>/pencil.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick="deleteConfirmation('<?php echo ADMIN_MODULE_URL."/chatReason/index.php?pageType=list&delete_id=".$ReasonList[$i]['id']."&action=delete"; ?>');"><img src="<?php echo ADMIN_IMAGE_URL; ?>/cross.png" /></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        </div>           
    </div>
    <?php include_once(ADMIN_INCLUDE_PATH."/copyright.php"); ?>
    </div>
    <!-- Main Container End -->