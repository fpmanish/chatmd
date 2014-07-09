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
                <span class="mws-i-24 i-settings">Settings</span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>                             
                                <div class="mws-form-row">
                                    <label>Admin Name</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="admin_name" placeholder="Enter Admin Name" value="<?php echo $adminDetails['admin_username']; ?>">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label>Admin Email</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required,,custom[email]]" type="text" name="admin_email" placeholder="Enter Admin Email" value="<?php echo $adminDetails['admin_email']; ?>">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <input type="checkbox" name="edit_password" id="edit_password" value="1" /><label for="edit_password" id="change_password">&nbsp;&nbsp;Change Password?</label>
                                    <label>Password</label>
                                    <div class="mws-form-item small" id="music_file_contaner">
                                        <input type="text" name="password_field" id="password_field" class="mws-textinput validate[required]" disabled="disabled" placeholder="Enter New Password" />
                                        <label for="password_field" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <?php if(empty($adminDetails)) {?>
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