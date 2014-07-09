<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/sign_up/code/DocReg_code.php");
include_once(INCLUDES_DIR."/header.php");
include_once(MODULES_PATH."/sign_up/code/fee_code.php");
//include_once(MODULES_PATH."/sign_up/config.php");
?>


<script>
$(document).ready(function(){
	$("#Country").val('');
    $("#Doc_reg").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
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
    	 $("#erorr").html("This Email already exists. Please choose another.");
    
    }else{
    		 $("#erorr").fadeOut(1000, function() {
  
  });
    }
  });
   });
  
  $("#TermUse").click(function() {
    $('#myModa112').modal('show');
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
<?php if($_REQUEST['pay'] == 1){ ?>
	<form class="paypal" action="http://chat-md.com/modules/sign_up/code/process.php" method="post" id="paypal_form" >
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="lc" value="UK" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="first_name" value="<?php echo $_SESSION['doc_name'] ; ?>" />
<!-- <input type="hidden" name="last_name" value="Customer's Last Name" /> -->
<input type="hidden" name="payer_email" value="<?php echo $_SESSION['payer_email'] ; ?>" />
<input type="hidden" name="item_number" value="123456" / >
<input type="hidden" name="item_name" value="Doctor Registration Fee">
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="amount" value="<?php echo $feedetails['fee'] ; ?>">
</form>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#paypal_form").submit();
});
</script>
	<?php die;} ?>


<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Doctor Registration</div>
      	<form action="<?php $_SERVER['PHP_SELF'] ; ?>"  id="Doc_reg" method="post">
      <div class="ragister_box">
      	<div class="span5">
        <div class="span12 error" id="erorr"> <?php echo $error_message;?> </div>
        <div class="name">Full Name :</div>
            <div class="ragi-input">
				<input  name="full_name" class="validate[required]" maxlength="43" type="text" data-errormessage-value-missing="Full Name is required!">
			</div>
            <div class="name">Email :</div>
            <div class="ragi-input">
			    <input name="email" id="email" type="text" class="validate[required,custom[email]]" maxlength="55" data-errormessage-value-missing="Email is required!" >
			</div>
			
            <div class="name">Password :</div>
            <div class="ragi-input">
				<input name="password" type="password" class="validate[required]" id="password" data-errormessage-value-missing="Password is required!">
			</div>
			  <div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input name="Cpassword" type="password" class="validate[required,equals[password]]" data-errormessage-value-missing="Confirm Password is required!"  data-errormessage="Passwords not match">
			</div>
            <div class="name">Specialty :</div>
            <div class="ragi-input">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="Specialty" data-errormessage-value-missing="Specialty is required!" autocomplete="off">
                  		<option selected="" value=""> Select Your Specialty </option>
                  		<?php for($i=0;count($SpecialtyListArr)>$i;$i++){?>
                  			<option value="<?php echo $SpecialtyListArr[$i]['Specialty_id']; ?>"> <?php echo $SpecialtyListArr[$i]['Specialty_name']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
			<div class="name">Country :</div>
            <div class="ragi-input" id="CountryDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="Country" id="Country" data-errormessage-value-missing="country is required!" >
                  		<option  value=""> Select Your Country </option>
                  		<?php for($i=0;count($CountryListArr)>$i;$i++){?>
                  			<option value="<?php echo $CountryListArr[$i]['countryID']; ?>"> <?php echo $CountryListArr[$i]['countryName']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
            <div class="name">Phone:</div>
            <div class="ragi-input">
				<input name="phone" type="text" class="validate[required,custom[phone]]" maxlength="13" data-errormessage-value-missing="Phone Number is required!">
			</div>
            <div class="name">Sex :</div>
            <div class="radio_text">
          	<div class="fl"><input type="radio" checked="" class="regular-radio" name="radio_1_set" id="radio-1-1" value="0"><label for="radio-1-1"></label></div><div class="fl mr-right">Male</div>
			<div class="fl"><input type="radio" class="regular-radio" name="radio_1_set" id="radio-1-2"><label for="radio-1-2"value="1"></label></div><div>Female</div>
            </div>
            <div class="name">About :</div>
            <div class="ragi-input">
				<textarea name="About" cols="" rows=""></textarea>
			</div>
			 <div class="check_box_text">
          	<div class="check"><div class="squaredThree"><input type="checkbox" value="None" id="squaredThree" name="check"  class="validate[required]" data-errormessage-value-missing="Please accept Terms Of Use!" />
	<label for="squaredThree"></label></div></div><div class="check-text">I have read and accept Chat MD <a href="#" id="TermUse">Terms of Use</a>.</div>
            </div>
            <div class="name">Doctor's Annual fee:</div>
            <div class="ragi-input">
				<input name="fees" type="text" class="validate[required]" value="$<?php echo $feedetails['fee'] ; ?>" disabled="disabled">
			</div>
            <div class="ragi-but">
            	<input type="hidden" name="doctor_reg" value="save_doctor">
            <input type="submit" class="process" value="Sign Up" name="doc_submit">
            </div>
            <div class="cls"></div>
        </div>
        <div class="span4"><img src="<?php echo IMAGE_URL;?>/ragister.png" alt="image"></div>
		<div class="cls"></div>
      </div>
      </form>
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