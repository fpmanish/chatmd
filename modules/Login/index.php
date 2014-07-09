<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Login/code/login_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<script>
$(document).ready(function(){
   $("#Login_id").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});
<?php if(isset($_SESSION['emailRetunr']) ) { ?>
	 $('#myModal11').modal('show');
<?php 
unset($_SESSION['emailRetunr']);
$_SESSION['YourReturn']="2"; }if($err==1 || $error !=""){?>
	 $("#error").show();
    	 $("#error").fadeOut(8000, function() {
  
  });
	<?php }?>

});
</script>
<!--| Contant Start |-->
<?php if(isset($_SESSION['AD_admin_LoggedIn'])) {
	 header("location:".MODULE_URL."/home");
                exit;
 }else {?>
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Login</div>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="Login_id" method="post">
      <div class="login_box">
      	<div class="span5">
      		<div id="error" class="span12 error" style="display:none" > <?php if($error !="") { ?> <?php echo $error; } else {?>Please enter valid email or password <?php }?></div>
        	<div class="name">Email :</div>
            <div class="input-prepend">
				<span class="add-on"><img src="<?php echo IMAGE_URL;?>/username.png" alt="icon"></span>
				<input name="email" type="text" class="validate[required,custom[email]]">
			</div>
            <div class="name">Password :</div>
            <div class="input-prepend">
				<span class="add-on"><img src="<?php echo IMAGE_URL;?>/password.png" alt="icon"></span>
			  <input name="password" type="password" class="validate[required] ">
			</div>
            <div class="login-but">
            <input type="submit" class="process" value="Login" name="">
            </div>
            <div class="login-text">Not a Member? <span><a href="<?php echo MODULE_URL."/sign_up"; ?>">Join Now</a></span><a href="<?php echo MODULE_URL."/forgetPassword"; ?>"> I Forgot My Password</a></div>
        </div>
        <div class="span4"><img class="hide-img-767" src="<?php echo IMAGE_URL;?>/login2.jpg" alt="image"><img class="show-img-767" src="<?php echo IMAGE_URL;?>/login.jpg" alt="image"></div>
		<div class="cls"></div>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php }?>
<!--| Contant End |--> 
<!-- Modal -->
<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registration Sucessful</h4>
      </div>
      <div class="modal-body">
      Your Registration have been completed ,Please login with email and password 
          Thank you for Joining ChatMD.com!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>