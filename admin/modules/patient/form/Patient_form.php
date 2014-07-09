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
        $("#newrel_date").datepicker({"dateFormat":'mm-dd-yy',changeMonth: true,
      changeYear: true});
          $("#password_field").removeAttr("placeholder").attr('disabled','disabled');
        $("#edit_password").change(function(){
            if($("#password_field").is(":disabled"))
                $("#password_field").removeAttr('disabled').attr('placeholder',"Enter New Password");
            else
                $("#password_field").removeAttr("placeholder").attr('disabled','disabled');
        });
        $("#email").focusout(function() {
  
   	var name=$(this).val();
   	$.ajax({
   		type: "POST",
   		url :"<?php echo ADMIN_MODULE_URL."/patient/ajax/check_user.php"; ?>",
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
    });
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/patient/index.php?pageType=list" ?>" class="mws-button blue">View Patient's List</a></div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-admin-user">Patient <?php echo $PagetypeText; ?></span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" value="<?php echo $_GET['pageType'] != ""?$_GET['pageType']:$pageType; ?>" name="pageType" />
                            <input type="hidden" value="<?php echo $_GET['patient_id'] != ""?$_GET['patient_id']:($patientData['patient_id']!=""?$patientData['patient_id']:$patient_id); ?>" name="patient_id" />
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>                             
                                <div class="mws-form-row">
                                    <label>Name</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="name" placeholder="Enter The Name" value="<?php echo $patientData['name']; ?>">
                                    </div>
                                </div>
                               <div class="mws-form-row">
                                    <label>Email</label>
                                    <label id="emailError" style="display: none;color: red;float:inherit">Email already exist !</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required,custom[email]]" type="text" name="email" id="email" placeholder="Enter The Email" value="<?php echo $patientData['email']; ?>">
                                    </div>
                                </div>
                                <?php if($patientData=="") {?>
                                <div class="mws-form-row">
                                    <label>Password</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="password" name="password" id="password" value="">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Confirm Password</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required,equals[password]]" type="password" name="cpassword"  value="">
                                    </div>
                                </div>
                                <?php }else {?> 
                                	  <div class="mws-form-row">
  <input type="checkbox" name="edit_password" id="edit_password" value="1" /><label for="edit_password" id="change_password" style="float:inherit">&nbsp;&nbsp;Change Password?</label>                                    <label>Password</label>
                                    <div class="mws-form-item small" id="music_file_contaner">
                                        <input type="text" name="password" id="password_field" class="mws-textinput validate[required]" disabled="disabled" placeholder="Enter New Password" />
                                        <label for="password_field" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                                	<?php }?>
                                <div class="mws-form-row">
                                    <label>Date Of Birth</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="dob"  id="newrel_date" value="<?php if($patientData !=""){echo  date('Y-m-d',$patientData['dob']); } ?>" readonly="readonly">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label>Sex</label>
                                    <div class="mws-form-item large">
                                        <ul class="mws-form-list">
                                            <li><input <?php if($patientData['gender']==0){ ?> checked="checked" <?php } ?>  type="radio" name="gender" class="validate[required]" value="0" /> <label for="active_yes">Male</label></li>
                                            <li><input <?php if($patientData['gender']==1){ ?> checked="checked" <?php } ?>  type="radio" name="gender" class="validate[required]" value="1" /> <label for="active_no">Female</label></li>
                                        </ul>
                                        <label for="activate" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                                 
                               
                              <div class="mws-form-row">
                                    <label>Activate?</label>
                                    <div class="mws-form-item large">
                                        <ul class="mws-form-list">
                                            <li><input <?php if($patientData['is_active']){ ?> checked="checked" <?php } ?> id="active_yes" type="radio" name="activate" class="validate[required]" value="1" /> <label for="active_yes">Yes</label></li>
                                            <li><input <?php if(!$patientData['is_active']){ ?> checked="checked" <?php } ?> id="active_no" type="radio" name="activate" class="validate[required]" value="0" /> <label for="active_no">No</label></li>
                                        </ul>
                                        <label for="activate" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                            	<?php if(empty($patientData)) {?>
                                <input type="submit" value="Save" class="mws-button red" />
                                <?php }else {?>
                                	 <input type="submit" value="Edit" class="mws-button red" />
                                	<?php }?>
                                <!-- <input type="reset" value="Reset" class="mws-button gray" /> -->
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