<link href="<?php echo ADMIN_CSS_URL; ?>/fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_URL; ?>/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_CSS_URL; ?>/elrte.full.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_URL; ?>/elfinder.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.form.min.js"); ?>
<?php echo jscripts::script("jQuery.fileinput.js"); ?>
<?php echo jscripts::script("jquery.validationEngine-en.js"); ?>
<?php echo jscripts::script("jquery.validationEngine.js"); ?>
<?php echo jscripts::script("elrte.min.js"); ?>
<!-- Main Container Start -->
<script>
    $(document).ready(function(){
        
     
        
        $("#media_form").validationEngine("attach",{binded:false});
        $("#elrte").elrte({toolbar: 'compact',allowSource:false,width:410,height:150});
        $("#newrel_date").datepicker({"dateFormat":'d M y'});
    });
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/MetaTag/index.php?pageType=list" ?>" class="mws-button blue">View Meta Tag's</a></div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-new-releases">Meta Tag <?php echo $PagetypeText; ?></span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" value="<?php echo $_GET['pageType'] != ""?$_GET['pageType']:$pageType; ?>" name="pageType" />
                            <input type="hidden" value="<?php echo $_GET['id'] != ""?$_GET['id']:($MetaData['id']!=""?$MetaData['id']:$id); ?>" name="edit_id" />
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>  
                                 <div class="mws-form-row">
                                    <label> Page Name</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput " type="text" name="page_name" placeholder="Enter The Page Name" value="<?php echo $MetaData['page_name']; ?>">
                                    </div>
                                </div>                           
                                <div class="mws-form-row">
                                    <label>Meta keywords</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput " type="text" name="keywords" placeholder="Enter The meta keywords" value="<?php echo $MetaData['keyword']; ?>">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label>Meta  description</label>
                                    <div class="mws-form-item small">
<textarea id="page_content"  name="description"><?php echo $MetaData['descrption']; ?></textarea>
</div>
                                </div>
                              <div class="mws-form-row">
                                    <label>Meta author</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput " type="text" name="author" placeholder="Enter The meta author" value="<?php echo $MetaData['author']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <?php if(empty($MetaData)) {?>
                                <input type="submit" value="Save" class="mws-button red" />
                                <?php }else {?>
                                	 <input type="submit" value="Edit" class="mws-button red" />
                                	<?php }?>
                            </div>
                        </form>
                    </div>      
                </div>
                </div>
            </div>
            <style type="text/css">
              #change_image_file  {
                    float: none;
    margin: 0;
    padding: 0 0 5px 0;
                }
            </style>
            </div>
    
    </div>
    <?php include_once(ADMIN_INCLUDE_PATH."/copyright.php"); ?>
    </div>
    <!-- Main Container End -->