<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/sign_up/code/PatReg_code.php");
include_once(INCLUDES_DIR."/header.php");
?>


<script>
$(document).ready(function(){
    $("#Patient_reg").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
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
    	 $("#erorr").html("This Email already exists. Please choose another");
    	 
    }else{
    	
    	$("#erorr").fadeOut(1000, function() {
  
  });
    }
  });
   });
   $("#TermUse").click(function() {
    $('#myModa112').modal('show');
  });
    $( "#datepicker" ).datepicker({maxDate: '0',
      changeMonth: true,
      changeYear: true,
      yearRange: "1900:2014"
    
    });
    });
</script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Patient Registration</div>
      <div class="ragister_box">
      	<form action="<?php echo $_SERVER['PHP_SELF'];?>"  id="Patient_reg" method="post">
      	<div class="span5">
      		 <div class="span12 error" id="erorr"> <?php echo $error_message;?> </div>
        	<div class="name">Full Name :</div>
            <div class="ragi-input">
				<input name="full_name"  id="full_name" type="text" class="validate[required]" maxlength="43" data-errormessage-value-missing="Full Name is required!" >
			</div>
            <div class="name">Email :</div>
            <div class="ragi-input">
			    <input name="email" id="email" type="text" class="validate[required,custom[email]]" maxlength="55" data-errormessage-value-missing="Email is required!" >
			</div>
				
            <div class="name">Password :</div>
            <div class="ragi-input">
				<input name="password" type="password" id="password" class="validate[required]" autocomplete="off" data-errormessage-value-missing="Password is required!">
			</div>
			 <div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input name="Cpassword" type="password" class="validate[required,equals[password]]"  data-errormessage-value-missing="Confirm Password is required!"  data-errormessage="Passwords not match">
			</div>
            <div class="name">Date of Birth :</div>
            <div class="ragi-input">
            					<input name="dob"  id="datepicker" type="text" class="validate[required]" maxlength="43" data-errormessage-value-missing="Full Name is required!" readonly="readonly">

			</div>
            <div class="name">Sex :</div>
            <div class="radio_text">
          	<div class="fl"><input type="radio" checked="" class="regular-radio" name="radio_1_set" id="radio-1-1" value="0"><label for="radio-1-1"></label></div><div class="fl mr-right">Male</div>
			<div class="fl"><input type="radio" class="regular-radio" name="radio_1_set" id="radio-1-2" value="1"><label for="radio-1-2"></label></div><div>Female</div>
            </div>
            
            <div class="check_box_text">
          	<div class="check"><div class="squaredThree"><input type="checkbox" value="None" id="squaredThree" name="check"  class="validate[required]"  data-errormessage-value-missing="Please accept Terms Of Use!" />
	<label for="squaredThree"></label></div></div><div class="check-text">I have read and accept Chat MD <a href="#" id="TermUse">Terms Of Use</a>.</div>
            </div>
           
            <div class="ragi-but">
            	<input type="hidden" name="Patient_reg" value="save_patient">
            <input type="submit" class="process" value="Sign Up" name="pat_submit">
            </div>
            <div class="cls"></div>
        </div>
        </form>
        <div class="span4"><img src="<?php echo IMAGE_URL;?>/patient-reg.png" alt="image"></div>
		<div class="cls"></div>
      </div>
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
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>