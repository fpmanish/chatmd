<link href="<?php echo ADMIN_CSS_URL; ?>/fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_URL; ?>/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.form.min.js"); ?>
<?php echo jscripts::script("jQuery.fileinput.js"); ?>
<?php echo jscripts::script("jquery.validationEngine-en.js"); ?>
<?php echo jscripts::script("jquery.validationEngine.js"); ?>
<!-- Main Container Start -->
<script>
    $(document).ready(function(){
        
        $("[id$=_image_sec]").hide().find("input").attr("disabled","disabled");
        $("[id$=_image]").change(function(){
            $("[id$=_image_sec]").hide().find("input").attr("disabled","disabled");
            if($(this).val() == "upload")
            {
                $("#Upload_image_sec").show().find("input").removeAttr("disabled");
                $(".customfile-feedback").text("Select File. (Max file size 100M)");
            }
            else if($(this).val() == "ext")
            {
                $("#Ext_image_sec").show().find("input").removeAttr("disabled");
                $(".customfile-feedback").text("File Present in database.");
            }
        });
<?php
if($pageType = "editAlbum" && $album_id != ""){
?>
        $("[name=album_source]").attr('disabled','disabled');
        $("#album_file").trigger('disable');
        $(".customfile-feedback").text("File Present in database.");
        
        $("#edit_image_file").change(function(){
            if($("[name=album_source]").is(":disabled"))
            {
                $("[name=album_source]").removeAttr('disabled');
                if($("[name=album_source]").val() == "upload")
                    $("#Upload_image_sec").hide().find("input").removeAttr("disabled");
                else if($("[name=album_source]").val() == "ext")
                    $("#Ext_image_sec").hide().find("input").removeAttr("disabled");
            }
            else
            {
                $("[name=album_source]").attr('disabled','disabled');
                $("[id$=_image_sec]").hide().find("input").attr("disabled","disabled");
            }
        });
<?php
}
?>
    $("#media_form").validationEngine("attach",{binded:false});
    $(".customfile").attr("id","customfile");
});
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/home/album.php?pageType=list" ?>" class="mws-button blue">View Album List</a></div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-polaroids">Album <?php echo $PagetypeText; ?></span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" value="<?php echo $_GET['pageType'] != ""?$_GET['pageType']:$pageType; ?>" name="pageType" />
                            <input type="hidden" value="<?php echo $_GET['album_id'] != ""?$_GET['album_id']:($albumDetails['album_id']!=""?$albumDetails['album_id']:$album_id); ?>" name="album_id" />
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>                             
                                <div class="mws-form-row">
                                    <label>Album Name</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="album_name" placeholder="Enter Album Name" value="<?php echo $albumDetails['album_name']; ?>">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label>Cover Source</label>
                                    <div class="mws-form-item clearfix">
                                        <?php if($pageType = "editAlbum" && $album_id != ""){ ?>
                                    <input type="checkbox" name="edit_image_file" id="edit_image_file" value="1" /><label for="edit_image_file" id="change_image_file">&nbsp;&nbsp;Change Image?</label>
                                    <?php } ?>
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" id="upload_image" name="album_source" value="upload" class="validate[required]"> <label for="upload_image" />Upload Image</label></li>
                                            <li><input type="radio" id="ext_image" name="album_source" value="ext" class="validate[required]" /> <label for="ext_image">External URL</label></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row" id="Upload_image_sec">
                                    <label>Image File</label>
                                    <div class="mws-form-item small" id="image_file_contaner">
                                        <input type="file" name="album_file" id="album_file" class="validate[required]" <?php if($pageType = "editAlbum" && $album_id != ""){ ?> disabled="disabled" value="<?php echo $albumDetails['album_image']; ?>" <?php } ?> data-prompt-target="album_id" />
                                        <label for="album_file" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row" id="Ext_image_sec">
                                    <label>External URL</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required,custom[url]]" type="text" name="ext_URL" id="ext_URL" placeholder="Enter external image URL here." value="<?php echo $albumDetails['album_image_url']; ?>" />
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label>Order Number</label>
                                    <div class="mws-form-item" style="width: 25%;">
                                        <input class="mws-textinput validate[custom[integer]]" type="text" name="album_order_no" value="<?php echo $albumDetails['album_order_no']; ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Activate?</label>
                                    <div class="mws-form-item large">
                                        <ul class="mws-form-list">
                                            <li><input <?php if($albumDetails['album_is_active']){ ?> checked="checked" <?php } ?> id="active_yes" type="radio" name="activate" class="validate[required]" value="1" /> <label for="active_yes">Yes</label></li>
                                            <li><input <?php if(!$albumDetails['album_is_active']){ ?> checked="checked" <?php } ?> id="active_no" type="radio" name="activate" class="validate[required]" value="0" /> <label for="active_no">No</label></li>
                                        </ul>
                                        <label for="activate" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="Submit" class="mws-button red" />
                                <input type="reset" value="Reset" class="mws-button gray" />
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