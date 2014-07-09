<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Appointment/code/patient_image_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
            <div class="upload_form"  id="registration">
              	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="patient_imade_form" id="patient_imade_form" enctype="multipart/form-data">
              		<div class="span12 error" id="erorr"> <?php //echo $error_message;?> </div>
		            <div class="name">Upload Images :</div>
		            <div class="ragi-input">
						<input name="patient_image[]" type="file" value="" class="validate[required]" multiple="multiple">
					</div>
					<div class="cls"></div>
		             <div class="ragi-but">
		             <input type="hidden" name="action" value="insert" />
		             <input type="hidden" name="chat_id"  value="2"/>
		             <input type="submit" class="process" value="save" name="" >
		             </div>
		             <div class="cls"></div>
		            </form>
        </div>
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>