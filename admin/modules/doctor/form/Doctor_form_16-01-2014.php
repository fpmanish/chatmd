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
        $("#newrel_date").datepicker({"dateFormat":'yy-dd-mm',changeMonth: true,
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
   $("#Country").change(function() {
  	$("#CountryDiv").append('<div id="Ajax_upload"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
  	$('#stateDiv').remove();
  	$('#stateRemove').remove();
  	$('#cityDiv').remove();
  	$('#cityRemove').remove();
  	
  	$.ajax(
  		{
  			type : "POST" ,
  			url:"<?php echo ADMIN_MODULE_URL."/doctor/ajax/ajax_state.php"; ?>" ,
  			data: { id :$(this).val()} ,
  			 success : function(data) 
      {$("#Ajax_upload").remove();
  		$("#CountryDiv").after(data);}
  			
  		});
  	
  	 });
    });
     function stateChange(id) {
  	
  	$("#stateDiv").append('<div id="Ajax_upload"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
  	$('#cityDiv').remove();
  	$('#cityRemove').remove();
  	$.ajax(
  		{
  			type : "POST" ,
  			url:"<?php echo ADMIN_MODULE_URL."/doctor/ajax/ajax_city.php"; ?>" ,
  			data: { id :id} ,
  		 success : function(data) 
      {
      	$("#Ajax_upload").remove();
  		$("#stateDiv").after(data);}
  			
  		});
  	
  	 };
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/doctor/index.php?pageType=list" ?>" class="mws-button blue">View Doctor's List</a></div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-admin-user">Doctor <?php echo $PagetypeText; ?></span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" value="<?php echo $_GET['pageType'] != ""?$_GET['pageType']:$pageType; ?>" name="pageType" />
                            <input type="hidden" value="<?php echo $_GET['patient_id'] != ""?$_GET['patient_id']:($patientData['patient_id']!=""?$patientData['patient_id']:$patient_id); ?>" name="doctor_id" />
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
                                        <input class="mws-textinput validate[required]" type="text" name="dob" readonly="readonly" id="newrel_date" value="<?php if($patientData !=""){echo  date('Y-m-d',$patientData['dob']); } ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Phone</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="Phone"  value="<?php echo $doctorData['phone']; ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                    				<label>Specialty</label>
                    				<div class="mws-form-item small">
                    					<select class="chzn-select validate[required]" name="Specialty[]" multiple="multiple">
                  		<?php for($i=0;count($SpecialtyListArr)>$i;$i++){?>
                  			<option value="<?php echo $SpecialtyListArr[$i]['Specialty_id']; ?>" <?php if(searchMultiArrays($SpecialtyListArr[$i]['Specialty_id'],$SpecialtyFindArr, 'Specialty_id') > -1 ) {echo "selected='selected'";}?> > <?php echo $SpecialtyListArr[$i]['Specialty_name']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			 <div class="mws-form-row">
                    				<label>Chat Reason</label>
                    				<div class="mws-form-item small">
                    					<select class="chzn-select validate[required]" name="ChatReason[]" multiple="multiple">
                  		<?php for($i=0;count($ChatListArr)>$i;$i++){?>
                  			<option value="<?php echo $ChatListArr[$i]['id']; ?>" <?php if(searchMultiArrays($ChatListArr[$i]['id'],$ReasonFindArr, 'chatReason_id') > -1 ) {echo "selected='selected'";}?> > <?php echo $ChatListArr[$i]['chatReason']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                                    <label>Degrees</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="Degrees"  value="<?php echo $doctorData['Degrees']; ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Hospital/Clinic Name:</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" name="hospital" type="text"   value="<?php echo $doctorData['hospital'];?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                    				<label>Languages </label>
                    				<div class="mws-form-item small">
                    					<select class="chzn-select validate[required]" name="langauge[]" multiple="multiple">
                  		<?php for($j=0;count($LanguageListArr)>$j;$j++){?>
                  			<option value="<?php echo $LanguageListArr[$j]['language_id']; ?>" <?php if(searchMultiArrays($LanguageListArr[$j]['language_id'],$LanguageFindArr, 'language_id') > -1) {echo "selected='selected'";}?> > <?php echo $LanguageListArr[$j]['name']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label>Experience  </label>
                    				<div class="mws-form-item small">
                    					<select class="chzn-select validate[required]" name="Experience">
                    						<option value=""> Not Specified </option>
                  		<option value="0" <?php if ($doctorData['Experience']==0) { echo "selected='selected'";}?> ><?php echo (date("Y"))?> (0 years)</option>
                        <option value="1" <?php if ($doctorData['Experience']==1) { echo "selected='selected'";}?>><?php echo (date("Y")-1)?> (1 years)</option>
                        <option value="2" <?php if ($doctorData['Experience']==2) { echo "selected='selected'";}?>><?php echo (date("Y")-2)?> (2 years)</option>
                        <option value="3" <?php if ($doctorData['Experience']==3) { echo "selected='selected'";}?>><?php echo (date("Y")-3)?> (3 years)</option>
                        <option value="4" <?php if ($doctorData['Experience']==4) { echo "selected='selected'";}?>><?php echo (date("Y")-4)?> (4 years)</option>
                        <option value="5" <?php if ($doctorData['Experience']==5) { echo "selected='selected'";}?>><?php echo (date("Y")-5)?> (5 years)</option>
                        <option value="6" <?php if ($doctorData['Experience']==6) { echo "selected='selected'";}?>><?php echo (date("Y")-6)?> (6 years)</option>
                        <option value="7" <?php if ($doctorData['Experience']==7) { echo "selected='selected'";}?>><?php echo (date("Y")-7)?> (7 years)</option>
                        <option value="8" <?php if ($doctorData['Experience']==8) { echo "selected='selected'";}?>><?php echo (date("Y")-8)?> (8 years)</option>
                        <option value="9" <?php if ($doctorData['Experience']==9) { echo "selected='selected'";}?>><?php echo (date("Y")-9)?> (9 years)</option>
                        <option value="10" <?php if ($doctorData['Experience']==10) { echo "selected='selected'";}?>><?php echo (date("Y")-10)?> (10+ years)</option>
                    					</select>
                    				</div>
                    			</div>
                    			 <div class="mws-form-row" id="CountryDiv">
                    				<label>Country </label>
                    				<div class="mws-form-item small" >
                    					<select class="chzn-select validate[required]" name="Country" id="Country" >
                  		<option  value=""> Select Your Country </option>
                  		<?php for($i=0;count($CountryListArr)>$i;$i++){?>
                  			<option value="<?php echo $CountryListArr[$i]['countryID']; ?>" <?php if($CountryListArr[$i]['countryID']== $doctorData['CountryId']) {echo "selected='selected'";} ?> > <?php echo $CountryListArr[$i]['countryName']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			<?php if($doctorData['CountryId'] !="") { $State_array=$settingObj->getStateByCountryId($doctorData['CountryId']); 
			
			?><div class="mws-form-row" id="stateDiv">
                    				<label>State </label>
                    				<div class="mws-form-item small" >
                    					<select class="chzn-select validate[required]"  name="State" id="state" onchange="stateChange(this.value)">
                  		<option  value=""> Select Your state </option>
                  		<?php for($i=0;count($State_array)>$i;$i++){?>
                  			<option value="<?php echo $State_array[$i]['regionID']; ?>" <?php if($State_array[$i]['regionID']== $doctorData['StateId']) {echo "selected='selected'";} ?>  > <?php echo $State_array[$i]['regionName']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			 <?php }if( $doctorData['StateId']!="") { $City_array=$settingObj->getCityByStateId($doctorData['StateId']); ?>
                    			 <div class="mws-form-row" id="cityRemove">
                    				<label>City </label>
                    				<div class="mws-form-item small" >
                    					<select class="chzn-select validate[required]"  name="City" id="City">
                  		<option  value=""> Select Your City </option>
                  		<?php for($i=0;count($City_array)>$i;$i++){?>
                  			<option value="<?php echo $City_array[$i]['cityID']; ?>" <?php if($City_array[$i]['cityID']== $doctorData['CityId']) {echo "selected='selected'";} ?> > <?php echo $City_array[$i]['cityName']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>
                    			<?php }?>
                                 <div class="mws-form-row">
                                    <label>New Patients :</label>
                                    <div class="mws-form-item large">
                                        <ul class="mws-form-list">
                                            <li><input <?php if($doctorData['is_accepted']==1){ ?> checked="checked" <?php } ?>  type="radio" name="New_1_set" class="validate[required]" value="1" /> <label for="active_yes">Yes</label></li>
                                            <li><input <?php if($doctorData['is_accepted']==0){ ?> checked="checked" <?php } ?>  type="radio" name="New_1_set" class="validate[required]" value="0" /> <label for="active_no">No</label></li>
                                        </ul>
                                        <label for="activate" class="error plain" generated="true" style="display:none"></label>
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