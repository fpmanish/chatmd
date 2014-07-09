<link href="<?php echo CSS_URL; ?>/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.validationEngine-en.js"); ?>
<?php echo jscripts::script("jquery.validationEngine.js"); ?>
<!-- Main Container Start -->
<script>
    $(document).ready(function(){
        $("#password_field").removeAttr("placeholder").attr('disabled','disabled');
        $("#edit_password").change(function(){
            if($("#password_field").is(":disabled"))
                $("#password_field").removeAttr('disabled').attr('placeholder',"Enter New Password");
            else
                $("#password_field").removeAttr("placeholder").attr('disabled','disabled');
        });
    
    $("#media_form").validationEngine("attach",{binded:false});
    $(".customfile").attr("id","customfile");
});
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-video">Video</span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        	<input type="hidden" value="editVideo" name="pageType" />
                            <input type="hidden" value="<?php echo $videoList[0]['vidoes_id']; ?>" name="video_id" />
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>                             
                                <div class="mws-form-row">
                                    <label>Video Name</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="video_name" placeholder="Enter Video Name" value="<?php echo $videoList[0]['vidoes_name']; ?>">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label>Embed Code</label>
                                    <div class="mws-form-item small">
<textarea id="embed_code" class="validate[required]" name="embed_code"><?php if($videoList[0]['vidoes_embedcode'] !="") {echo "http://www.youtube.com/watch?v=".$videoList[0]['vidoes_embedcode']; } ?></textarea>
</div>
                                </div>
                              
                            </div>
                            <div class="mws-button-row">
                              <?php if(empty($videoList)) {?>
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
              #change_password  {
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