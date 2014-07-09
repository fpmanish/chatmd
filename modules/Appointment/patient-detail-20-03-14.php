<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Appointment/code/patientDetails.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
$(document).ready(function() {
$('#radio-1-1').click(function(){
	if($('#radio-1-1').is(':checked')) { 
		$("#login").hide();
		$("#registration").show();
	 }
	
});
$('#radio-1-2').click(function(){
	if($('#radio-1-2').is(':checked')) { $("#registration").hide();
	$("#login").show();
	 }
	
});
	    $("#loginForm").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
 	    $("#registration").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});

<?php if($infoChat==0 || $infoChat =="") { ?> 
 	$('#radio-1-1').attr("checked", "checked");
	$("#login").hide();
	$("#registration").show();
	<?php  }?>
	<?php if($infoChat==1 ) { ?> 
	$('#radio-1-2').attr("checked", "checked");
	$("#login").show();
		$("#registration").hide();
	
	<?php  }?> 
	 $("#email").focusout(function() {
   	var name=$(this).val();
   	$.ajax({
   		type: "POST",
   		url :"<?php echo MODULE_URL."/sign_up/ajax/check_user.php"; ?>",
   		data: { name:name }
   	}) .done(function( msg ) {
    if(msg=="1"){
    	 $("#email").val('');
    	 $("#erorr").show();
    	 $("#erorr").html("Email already exists");
    	 $("#erorr").fadeOut(8000, function() {
  
  });
    }
  });
   });
   $("#TermUse").click(function() {
    $('#myModa112').modal('show');
  });
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
    
    });
    $('img#refresh').click(function() {  
			
			change_captcha();
	 });
	  function change_captcha()
	 {
	 	document.getElementById('captcha').src="<?=DEFAULT_URL?>/modules/captch/get_captcha.php?rnd=" + Math.random();
	 }
	  $("#code").click(function() {
    $('#erorr').hide();
  });
});

</script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
     <div class="span12 top_do_bg">
      <div class="span4 hide767"><span>1</span><a href="<?php  echo MODULE_URL.'/search ' ;?>" title="Top Doctor's">Top Doctors</a></div>
      <div class="span4 active"><span>2</span>Pick Your Appointment</div>
      <div class="span4 hide767" style="border:none;"><span>3</span><a href="<?php if ($_SESSION['AD_admin_user_id'] !="") { echo MODULE_URL.'/doctor/Accounts.php ' ; }else {
      	echo MODULE_URL.'/Login ' ;
      } ?>" title="Chat with a Doctor">Chat with a Doctor </a></div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span12 upload_image_head">Book Your Appointment</div>
      <div class="span6 progress_bar_text">
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"><br>
          Patient Info</div>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_1.jpg" alt="image"><br>
          Details</div>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"><br>
          Payment</div>
      </div>
      <div class="upload_image">
        <div class="span6">
          <div class="upload_image_que">Have you visited this doctor before?</div>
          <div class="checkbox_text">
          	<div class="fl">
            <input type="radio" id="radio-1-1" name="radio_set" class="regular-radio"  value="0" /><label for="radio-1-1"></label></div>
            <div>I'm a new patient.</div>
            <div class="cls"></div>
<div class="fl">
  <input type="radio" id="radio-1-2" name="radio_set" class="regular-radio"  /><label for="radio-1-2"></label></div>
            <div>I've chat this doctor before</div>
          </div>
  
              <div class="upload_form"  id="registration">
              	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registration" id="registration">
              		<div class="span12 error" id="erorr"> <?php echo $error_message;?> </div>
            <div class="name">Full Name :</div>
            <div class="ragi-input">
				<input name="full_name" type="text" value="<?php echo $full_name; ?>" class="validate[required]"  data-errormessage-value-missing="Full Name is required!">
			</div>
            <div class="name">Email :</div>
            <div class="ragi-input">
			    <input name="email" id="email" autocomplete="off" value="<?php echo $email; ?>" type="text" class="validate[required,custom[email]]"  data-errormessage-value-missing="Email is required!">
			</div>
            <div class="name">Password :</div>
            <div class="ragi-input">
				<input name="password" autocomplete="off" type="password" value="<?php echo $password; ?>"  id="password" class="validate[required]"  data-errormessage-value-missing="Password is required!">
			</div>
            <div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input name="confirm" type="password" value="<?php echo $confirm; ?>" class="validate[required,equals[password]]"  data-errormessage-value-missing="Confirm Password is required!">
			</div>
            <div class="name">Date of Birth :</div>
            <div class="ragi-input">
				<input name="dob" type="text" id="datepicker" value="<?php echo $dob; ?>" class="validate[required]"  data-errormessage-value-missing="Date Of birth is required!" readonly="readonly">
			</div>
            <div class="name">Sex :</div>
            <div class="mainsel">
              <label>
                <select  name="gender"  class="validate[required]"  data-errormessage-value-missing="Please select Gender!" >
                	<option selected value="">gender </option>
                  <option  value="0" <?php if($gender ==0) {echo "selected='selected'" ;} ?>>Male</option>
                  <option value="1" <?php if($gender ==1) {echo "selected='selected'" ;} ?>>Female</option>
                </select>
              </label>
            </div>
             <div class="name">Capctha Code :</div>
            <div class="ragi-input">
				<input style="width:90px !important;" name="code" id="code" type="text">&nbsp; <img src="<?php echo MODULE_URL."/captch/get_captcha.php" ; ?>"  id="captcha" alt="Captcha"><img src="<?php echo IMAGE_URL ;?>/gtk_refresh.png" width="20" alt="" id="refresh" /></a></div>
          
         
            <div class="check_box_text">
          	<div class="check"><div class="squaredThree"><input type="checkbox" value="None" id="squaredThree" name="check"  class="validate[required]"  data-errormessage-value-missing="Please select Terms of Use!" />
	<label for="squaredThree"></label></div></div><div class="check-text">I have read and accept Chat MD <a title="Terms of Use"  id="TermUse" href="#">Terms of Use </a>.</div>
            </div>
            <div class="ragi-but">
            	<input type="hidden" name="radio1"  value="0"/>
            	<input type="hidden" name="registrationSubmit" value="Yes">	
            	<input type="hidden" name="action"  value="reg"/>
            <input type="submit" class="process" value="Continue" name="" >
            </div>
            <div class="cls"></div>
            </form>
        </div>
       
          <div class="upload_form" style="display:none" id="login">
          	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginForm" id="loginForm" method="post">
          		 <div class="name">Email :</div>
            <div class="ragi-input">
			    <input name="email" type="text" class="validate[required,custom[email]]"  data-errormessage-value-missing="Email is required!">
			</div>
            <div class="name">Password :</div>
            <div class="ragi-input">
				<input name="password" type="password" class="validate[required]"  data-errormessage-value-missing="Password is required!">
			</div>
        
             <div class="cls"></div>           
            <div class="pdb">
            	<input type="hidden" name="radio2" value="1">	
            	<input type="hidden" name="Login" value="Yes">	
            	<input type="hidden" name="action" value="submit">	
          	<input type="submit" value="Login" name="login" >
        	</div>
            <div class="cls"></div>
            </form>
          </div>
        </div>
       <div class="span5 dr_disc_box">
          <div class="image"><?php if($doctorDetails['image'] !="") {?><img height="130px" width="131px" src="<?php  echo MODULE_URL."/doctor/upload_file/".$doctorDetails['image']; ?>" alt="picture"><?php }
      	else { ?><img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
          <div class="info">
            <div class="doname"><?php echo $doctorData['name'];?></div>
            <div class="do_blog"><a href="#">Doctors Blog</a></div>
            <div class="star"><?php echo  doctorRatting($doctorDetails['Ratting']); ?></div>
            
          </div>
          <div class="post"><span>Specialties :</span><?php $specilityFindid=$findObj->SpecialtyList($doctorData['patient_id']); 
		for($j=0;count($specilityFindid)>$j;$j++)
		{
			$speciltyName=$pageObj->getSpecialtyById($specilityFindid[$j]['Specialty_id']);
		echo $speciltyName['Specialty_name'];
		if(count($specilityFindid)==$j+1){
			
		}else {
			echo ", ";
		}
		}
		
		 ?></div>
          <div class="disc"><strong>Reason of chat :</strong> <?php echo $reason; ?></div>
          <div class="chat-time"><strong>Time :</strong> &nbsp;<?php echo date("H:i",$_SESSION['AppTime']) ;?></div>
          <div class="chat-date"><strong>Date :</strong> &nbsp;<?php echo date("m-d-y",$_SESSION['AppDate']) ;?></div>
<div class="cls"></div>
        </div>
      </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<!-- Term And Condtion -->
<div class="modal hide fade" id="myModa112" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $TERM_OF_USE['page_title']; ?> </h4>
      </div>
      <div class="modal-body">
     <?php echo $TERM_OF_USE['page_description']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>