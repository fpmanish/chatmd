<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/doctor_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<script>
$(document).ready(function(){
	
    $("#Doc_profile").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
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
    });
</script>
<script type="text/javascript" >
 $(document).ready(function() { 
 	
		 $( "#datepicker" ).datepicker({
		 	maxDate: '0',
      changeMonth: true,
      changeYear: true,
      yearRange: "1900:2014"
    
    });
            $('#myfile').live('change', function()			{ 
			           $("#profile_image").html('');
			    $("#profile_image").html('<img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/>');
			$("#gallery").ajaxForm({
						target: '#profile_image'
		}).submit();
		
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
  			url:"<?php echo MODULE_URL."/sign_up/ajax/ajax_state.php"; ?>" ,
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
  			url:"<?php echo MODULE_URL."/sign_up/ajax/ajax_city.php"; ?>" ,
  			data: { id :id} ,
  		 success : function(data) 
      {
      	$("#Ajax_upload").remove();
  		$("#stateDiv").after(data);}
  			
  		});
  	
  	 };
</script>
<script type="text/javascript">
$(document).ready(function  () {
   var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
});
   
  </script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
      <div class="span2 active"><a href="#">Profile</a></div>
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/Appointment.php"; ?>">Appointments</a></div>
       <div class="span2 "><a href="<?php echo MODULE_URL."/doctor/blog.php"; ?>">Blogs</a></div>
      <div class="span2" style="border:none;"><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span12 upload_image_head">Edit Your Profile</div>
      	<div class="edit-profile">
      		<form id="Doc_profile" name="" method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
      <div class="span10">
            <div class="name">Name :</div>
            <div class="ragi-input">
			    <input name="FullName" type="text" placeholder="Your Name" value="<?php echo $patientData['name'];?>" class="validate[required]">
			</div>
            <div class="edit-pro-border"></div>
        	<div class="name">Email  :</div>
            <div class="ragi-input">
			    <input name="Email" type="text" placeholder="acb@domain.com" value="<?php echo $patientData['email'];?>" class="validate[required]"  readonly="readonly" >
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Current Password :</div>
            <div class="ragi-input">
				<input name="CurrentPassword" type="password" id="old_pass">
			</div>
            <div class="name">New Password :</div>
            <div class="ragi-input">
				<input name="NewPassword" type="password" id="password" disabled="disabled" class="validate[required]" placeholder="Please fill current password first">
			</div>
            <div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input name="ConfirmPassword" type="password" id="Cpass" disabled="disabled" class="validate[required,equals[password]]">
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Phone  :</div>
            <div class="ragi-input">
				<input name="Phone" type="text" placeholder="xxx xxxx xxx xxx" value="<?php echo $doctorData['phone']?>">
			</div>
            <div class="edit-pro-border"></div>
            <div class="name">Date of Birth  :</div>
            <div class="ragi-input">
            	             <input name="dob" type="text" id="datepicker" readonly="readonly" value="<?php if($patientData['dob'] >0){ echo date('m/d/Y',$patientData['dob']); } ?>" >
				</div>
            <div class="edit-pro-border"></div>
            <div class="name">Sex :</div>
            <div class="radio_text">
          	<div class="fl"><input type="radio" <?php if($patientData['gender']==0){ ?> checked="checked" <?php } ?>class="regular-radio" name="radio_1_set" id="radio-1-1" value="0"><label for="radio-1-1"></label></div><div class="fl mr-right">Male</div>
			<div class="fl"><input type="radio"  <?php if($patientData['gender']==1){ ?> checked="checked" <?php } ?> class="regular-radio" name="radio_1_set" id="radio-1-2" value="1"><label for="radio-1-2"></label></div><div>Female</div>
            </div>
            <div class="edit-pro-border"></div>
             <div class="name">New Patients :</div>
            <div class="radio_text">
          	<div class="fl"><input type="radio" <?php if($doctorData['is_accepted']==1){ ?> checked="checked" <?php } ?>class="regular-radio" name="New_1_set" id="New-1-1" value="1"><label for="New-1-1"></label></div><div class="fl mr-right">Yes</div>
			<div class="fl"><input type="radio"  <?php if($doctorData['is_accepted']==0){ ?> checked="checked" <?php } ?> class="regular-radio" name="New_1_set" id="New-1-2" value="0"><label for="New-1-2"></label></div><div>No</div>
            </div>
            <div class="edit-pro-border"></div>
            
            <div class="name">Paypal ID  :</div>
            <div class="ragi-input">
			    <input class="mws-textinput " name="paypal_id" type="text"   value="<?php {echo $doctorData['paypal_id'];}  ?>">
			</div>
			
			<div class="name">Country :</div>
            <div class="ragi-input" id="CountryDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="Country" id="Country" data-errormessage-value-missing="country is required!" >
                  		<option  value=""> Select Your Country </option>
                  		<?php for($i=0;count($CountryListArr)>$i;$i++){?>
                  			<option value="<?php echo $CountryListArr[$i]['countryID']; ?>" <?php if($CountryListArr[$i]['countryID']== $doctorData['CountryId']) {echo "selected='selected'";} ?> > <?php echo $CountryListArr[$i]['countryName']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
			<?php if($doctorData['CountryId'] !="") { $State_array=$settingsObj->getStateByCountryId($doctorData['CountryId']); 
			
			?>
				<div class="name" id="stateRemove">State :</div>
<div class="ragi-input" id="stateDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="State" id="state" data-errormessage-value-missing="state is required!" onchange="stateChange(this.value)">
                  		<option selected="" value=""> Select Your State </option>
                  		<?php for($i=0;count($State_array)>$i;$i++){?>
                  			<option value="<?php echo $State_array[$i]['regionID']; ?>" <?php if($State_array[$i]['regionID']== $doctorData['StateId']) {echo "selected='selected'";} ?> >  <?php echo $State_array[$i]['regionName']; ?> </option>
                  			<?php } ?>
                	</select>
              	</label>
            	</div>
			</div>
				 <?php }if( $doctorData['StateId']!="") { $City_array=$settingsObj->getCityByStateId($doctorData['StateId']); ?>
                  	<div class="name" id="cityRemove">City :</div>
<div class="ragi-input" id="cityDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="City" id="City" data-errormessage-value-missing="City is required!">
                  		<option selected="" value=""> Select Your City </option>
                  		<?php for($i=0;count($City_array)>$i;$i++){?>
                  			<option value="<?php echo $City_array[$i]['cityID']; ?>" <?php if($City_array[$i]['cityID']== $doctorData['CityId']) {echo "selected='selected'";} ?> > <?php echo $City_array[$i]['cityName']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>		
                  			<?php }?>
        
                  			<div class="name">Specialty :</div>
            <div class="ragi-input">
				<div class="mainsel">
              	<label>
                	<select  name="Specialty[]"  class="chosen-select validate[required]" multiple tabindex="6">
                  		<option  value=""> Select Your Specialty </option>
                  		<?php for($i=0;count($SpecialtyListArr)>$i;$i++){
                  			?>
                  			<option value="<?php echo $SpecialtyListArr[$i]['Specialty_id']; ?>" <?php if(searchMultiArrays($SpecialtyListArr[$i]['Specialty_id'],$SpecialtyFindArr, 'Specialty_id') > -1 ) {echo "selected='selected'";}?> > <?php echo $SpecialtyListArr[$i]['Specialty_name']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
			<div class="name">Chat Reason :</div>
            <div class="ragi-input">
				<div class="mainsel">
              	<label>
                	<select  name="ChatReason[]" class="chosen-select validate[required]" multiple tabindex="6">
                  		<option  value=""> Select Chat Reason </option>
                  		<?php for($i=0;count($ChatListArr)>$i;$i++){?>
                  			<option value="<?php echo $ChatListArr[$i]['id']; ?>" <?php if(searchMultiArrays($ChatListArr[$i]['id'],$ReasonFindArr, 'chatReason_id') > -1 ) {echo "selected='selected'";}?> > <?php echo $ChatListArr[$i]['chatReason']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
            <div class="name">Degrees  :</div>
            <div class="ragi-input">
			    <input name="Degrees" type="text" class="validate[required]"   value="<?php echo $doctorData['Degrees'];?>">
			</div>
		 <div class="name">Hospital/Clinic Name: </div>
            <div class="ragi-input">
			    <input name="hospital" type="text" class="validate[required]"   value="<?php echo $doctorData['hospital'];?>">
			</div>
            <div class="name">Languages  :</div>
           <div class="ragi-input">
				<div class="mainsel">
              	<label>
                	<select name="langauge[]" id="language" class="chosen-select validate[required]" multiple tabindex="6">
                  		<option  value=""> Select Your Language </option>
                  		<?php for($j=0;count($LanguageListArr)>$j;$j++){?>
                  			<option value="<?php echo $LanguageListArr[$j]['language_id']; ?>" <?php if(searchMultiArrays($LanguageListArr[$j]['language_id'],$LanguageFindArr, 'language_id') > -1) {echo "selected='selected'";}?> > <?php echo $LanguageListArr[$j]['name']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
            <div class="name">Experience  :</div>
            <div class="ragi-input">
				<div class="mainsel">
              	<label>
                	<select name="Experience">
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
              	</label>
            	</div>
			</div>
			 <div class="name">About :</div>
            <div class="ragi-input">
				<textarea name="About" cols="" rows=""><?php echo $doctorData['about']; ?></textarea>
			</div>
            <div class="cls"></div>
            
            <div class="ragi-but">
            	<input type="hidden" name="Doctor_update" value="1">
            <input type="submit" class="process" value="Save" name="submit"> &nbsp;&nbsp; <input type="submit" class="process" value="Cancel" name="">
            </div>
            <div class="cls"></div>
        </div>
        </form>
        <div class="span6 gallery">
     <div class="span3 profile_image" id="profile_image">
      	<?php if( $doctorData['image'] !=""){   ?><img alt="prifile-image" src="<?php echo MODULE_URL.'/doctor/upload_file/'.$doctorData['image']?>"><?php }else {?>
      	<img alt="prifile-image" src="<?php echo IMAGE_URL .'/No_Photo_Available.png';?>"> <?php }?></div>
      <form action="<?php echo MODULE_URL."/doctor/code/GalleryCode.php"; ?>" name="gallery" id="gallery" method="post" enctype="multipart/form-data">
      <div class="upload_form" id="preview">
            <div class="name">Upload image :</div>
           
            <div><input type="file" name="myfile" id="myfile"></div>
            <div class="my-but">
          	 <span style="color: red">Image dimensions equal to 200X200</span>
        	</div>
            <div class="cls"></div>
          </div>
         </form>
      </div>
      
        </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>