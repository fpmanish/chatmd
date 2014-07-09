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
    <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/MetaTag/index.php?pageType=addMeta" ?>" class="mws-button blue">Add A Meta Tag</a></div>
        <!-- Inner Container Start -->
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-new-releases">Meta Tag</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-datatable mws-table">
                    <thead>
                        <tr>
                            <th>Meta Keyword</td>
                            <th>Meta Author</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<count($MetaList);$i++)
                        {
                        ?>
                        <tr>
                            <td><?php echo $MetaList[$i]['keyword']; ?></td>
                             <td><?php echo $MetaList[$i]['author']; ?></td>
                            <td><a href="<?php echo ADMIN_MODULE_URL."/MetaTag/index.php?pageType=editMeta&page_id=".$MetaList[$i]['id']; ?>"><img src="<?php echo ADMIN_IMAGE_URL; ?>/pencil.png" /></a></td>
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