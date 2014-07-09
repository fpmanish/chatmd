<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/forgetPassword/code/forget_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<script>
$(document).ready(function(){
   $("#Fpass").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});


});
</script>
<!--| Contant Start |-->
<?php if(! isset($recoveryPasswor) && $id ==""){ ?>


<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Reset Your Password</div>
      <span id="erorr" style="color: #FF0000; margin-left: 185px;" ><?php echo $error_message;?> </span>
      <form action="" id="Fpass" method="post">
      <div class="ragister_box">
      	<div class="span5">
        	<div class="name">Email :</div>            <div class="ragi-input">				<input type="text" name="email" class="validate[required,custom[email]]" value="<?php echo $email;?>"  maxlength="55">			</div>
            <div class="ragi-but" style="margin-top:10px !important;">
            	<input type="hidden" name="Femail" value="1" >
            <input type="submit" class="process" value="Reset password" name="">
            </div>
            <div class="cls"></div>
        </div>
        <div class="span4 reset"><img src="<?php echo IMAGE_URL;?>/forgotpassword.png" alt="image"></div>
		<div class="cls"></div>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!--| Contant End |--> 

<?php } elseif(isset($recoveryPasswor) && $id !=""){
?>
<!--| Contant start |--> 
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Reset Your Password</div>
      <span id="erorr" style="color: #FF0000; margin-left: 185px;" ><?php echo $error_message;?> </span>
      <form action="" id="Fpass" method="post">
      <div class="ragister_box">
      	<div class="span5">
        	<!-- <div class="name">Email :</div>
            <div class="ragi-input">
				<input type="text" name="email" class="validate[required,custom[email]]" value="<?php echo $email;?>" readonly="readonly" maxlength="55">
			</div> -->
			<div class="name">Password :</div>
            <div class="ragi-input">
				<input type="password" name="password" id="password" class="validate[required]" maxlength="55">
			</div>
			<div class="name">Confirm Password :</div>
            <div class="ragi-input">
				<input type="password" name="cPass" class="validate[required,equals[password]]" maxlength="55">
			</div>
            <div class="ragi-but" style="margin-top:10px !important;">
            	<input type="hidden" name="recoveryPass" value="1" >
            <input type="submit" class="process" value="Reset password" name="">
            </div>
            <div class="cls"></div>
        </div>
        <div class="span4 reset"><img src="<?php echo IMAGE_URL;?>/forgotpassword.png" alt="image"></div>
		<div class="cls"></div>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!--| Contant End |--> 
<?php }?>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>