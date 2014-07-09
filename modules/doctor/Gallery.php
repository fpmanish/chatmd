<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/GalleryPage.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#myfile').live('change', function()			{ 
			           $("#profile_image").html('');
			    $("#profile_image").html('<img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/>');
			$("#gallery").ajaxForm({
						target: '#profile_image'
		}).submit();
		
			});
        }); 
</script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
     <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/Appointment.php"; ?>">Appointments</a></div>
      <div class="span2"><a href="#">Gallery</a></div>
      <div class="span2" style="border:none;"><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <form action="<?php echo MODULE_URL."/doctor/code/GalleryCode.php"; ?>" name="gallery" id="gallery" method="post" enctype="multipart/form-data">
    <div class=" span12 top_do_bg_contant_box gallery">
      <div class="span12 upload_image_head" style="text-align:left !important;">Upload Your Picture</div>
      <div class="span3 profile_image" id="profile_image">
      	<?php if( $doctorData['image'] !=""){   ?><img alt="prifile-image" src="<?php echo MODULE_URL.'/doctor/upload_file/'.$doctorData['image']?>"><?php }else {?>
      	<img alt="prifile-image" src="<?php echo IMAGE_URL .'/No_Photo_Available.jpg';?>"> <?php }?></div>
      <div class="upload_form" id="preview">
            <div class="name">Upload image :</div>
            <div><input type="file" name="myfile" id="myfile"></div>
            <div class="my-but">
          	<!-- <input type="submit" name="" value="Save"> -->
        	</div>
            <div class="cls"></div>
          </div>
      <div class="cls"></div>
    </div>
    </form>
  </div>
</div>
</div>
<!--| Contant End |--> 

	
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>