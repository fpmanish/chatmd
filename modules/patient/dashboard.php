<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/patient/code/patient_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<script>
$(document).ready(function(){
    $("#Patient_reg").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
   $("#email").focusout(function() {
   	var name=$(this).val();
   	$.ajax({
   		type: "POST",
   		url :"<?php echo MODULE_URL."/patient/ajax/check_user.php"; ?>",
   		data: { name:name }
   	}) .done(function( msg ) {
    if(msg=="1"){
    	 $("#email").val('');
    	 $("#emailError").show();
    	 $("#emailError").fadeOut(5000, function() {
  
  });
    }
  });
   });
 
  
  $("#old_pass").focus(function() {
 $("#Cpass").removeAttr("disabled");
  $("#password").removeAttr("disabled");
});
 $("#old_pass").focusout(function() {
 	if($(this).val() ==""){
 
 $("#Cpass").attr("disabled",true);
  $("#password").attr("disabled",true);
  }
});
<?php if(isset($error)) {?>
	$("#Error").show();
    	 $("#Error").fadeOut(5000, function() {
  
  }); <?php }?>
 <?php if(isset($_GET['success']) && !isset($_SESSION['rest'])) {?>
	$("#success").show();
    	 $("#success").fadeOut(5000, function() {
  
  }); <?php $_SESSION['rest']=1; }?>
   $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
    
    });
    });
</script>


<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
      
      <div class="span4"><a href="<?php echo MODULE_URL."/patient/pastAppointment.php"; ?>">Past Appointments</a></div>
      <div class="span4 active" style="border:none;"><a href="#">Edit Profile</a></div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span12 upload_image_head">Edit Your Profile</div>
      	      <form action="<?php echo  $_SERVER['PHP_SELF']; ?>"  method="post" id="Patient_reg">
        <div class="edit-profile">
            		<span id="success" style="color: red;<?php if(isset($_GET['success'] ) && !isset($_SESSION['rest'])){?>display:block <?php }else {?>display:none <?php }?>" >You have successfully updated your details  </span>

        	<div class="span10">
        		 <div class="span12 error" id="erorr"> <?php echo $error; unset($error); if(isset($_GET['success'] ) && !isset($_SESSION['rest'])){ echo "You have successfully updated your details"; $_SESSION['rest']=1; }?>  </div>
            <div class="name">Name :</div>
            <div class="ragi-input">
			    <input name="full_name" type="text" placeholder="Your Name" class="validate[required]" value="<?php echo $patientData['name'];?>">
			</div>
            <div class="edit-pro-border"></div>
        	<div class="name">Email :</div>
            <div class="ragi-input">
			    <input name="email"  id="email" type="text" placeholder="acb@domain.com" class="validate[required,custom[email]]" maxlength="55" value="<?php echo $patientData['email'];?>" readonly="readonly">
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Current Password :</div>
            <div class="ragi-input">
				<input name="old_password" type="password"  id="old_pass">
			</div>
            <div class="name">New Password :</div>
            <div class="ragi-input">
				<input name="password" type="password" id="password" class="validate[required]" placeholder="Please fill current password first " disabled>
			</div>
            <div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input name="Cpass" id="Cpass" type="password" class="validate[required,equals[password]]" disabled>
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Date of Birth :</div>
           <div class="ragi-input">
			<input name="dob" type="text" id="datepicker" class="validate[required]" readonly="readonly" value="<?php echo date('m/d/Y', $patientData['dob'])?>" >
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Sex :</div>
              <div class="radio_text">
          	<div class="fl"><input type="radio" <?php if($patientData['gender']==0){ ?> checked="checked" <?php } ?>  class="regular-radio" name="radio_1_set" id="radio-1-1" value="0"><label for="radio-1-1"></label></div><div class="fl mr-right">Male</div>
			<div class="fl"><input type="radio" <?php if($patientData['gender']==1){ ?> checked="checked" <?php } ?> class="regular-radio" name="radio_1_set" id="radio-1-2" value="1"><label for="radio-1-2"></label></div><div>Female</div>
            </div>
            <div class="ragi-but">
            	            	<input type="hidden" name="patient_update" value="1">

            <input type="submit" class="process" value="Save" name="submit"> &nbsp;&nbsp; <input type="submit" class="process" value="Cancel" name="">
            </div>
            <div class="cls"></div>
        </div>
        </div>
      <div class="cls"></div>
      </form>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>