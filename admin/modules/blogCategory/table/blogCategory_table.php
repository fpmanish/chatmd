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
    <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/blogCategory/index.php?pageType=addblogCategory" ?>" class="mws-button blue">Add  Category</a></div>
        <!-- Inner Container Start -->
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-tags-2">Blog Category Manager</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-datatable mws-table">
                    <thead>
                        <tr>
                            <th>Category Name</td>
                            <th>Activate</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<count($blogCategoryList);$i++)
                        {
                        ?>
                        <tr>
                            <td><?php echo $blogCategoryList[$i]['blog_categoryName']; ?></td>
                            <td><?php echo actInactSwitch(ADMIN_MODULE_URL."/blogCategory/index.php?id=".$blogCategoryList[$i]['id']."&isAct=1&pageType=list",ADMIN_MODULE_URL."/blogCategory/index.php?id=".$blogCategoryList[$i]['id']."&isAct=0&pageType=list",$blogCategoryList[$i]['is_active']); ?></td>
                            <td><a href="<?php echo ADMIN_MODULE_URL."/blogCategory/index.php?pageType=editblogCategory&page_id=".$blogCategoryList[$i]['id']; ?>"><img src="<?php echo ADMIN_IMAGE_URL; ?>/pencil.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick="deleteConfirmation('<?php echo ADMIN_MODULE_URL."/blogCategory/index.php?pageType=list&delete_id=".$blogCategoryList[$i]['id']."&action=delete"; ?>');"><img src="<?php echo ADMIN_IMAGE_URL; ?>/cross.png" /></a></td>
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