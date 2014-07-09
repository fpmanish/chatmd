<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/sign_up/code/DocReg_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="inner-main-bg">
        <div class="inner_heading_bg prnova"><a class="select" href="javascript:void(0)">Why Join?</a> &nbsp; | &nbsp; <a href="<?php echo MODULE_URL."/sign_up/howitworks.php"; ?>">How it Works</a> <div class="sign-up-now login-but">
	            <a href="<?php echo MODULE_URL."/sign_up/doctorRegistration.php"; ?>">
	            	<input type="submit" name="" value="Sign Up Now" class="process">
	            </a>
            </div></div>
        <div class="about_contant_box round">
          <div class="main_head">Let more patients come to you</div>
          <div class="sub_head">Chat md helps patients find doctors and book appointments online — instantly</div>
          <div class="terms_img"><img src="<?php echo IMAGE_URL;?>/terms.png"></div>
          
          	<div class="terms_box">
            <div class="terms_box_img show767"><img src="<?php echo IMAGE_URL;?>/terms-box.png"></div>
          	<h1>We bring new patients to your office</h1>
            <h3>More than 4 million patients use Chat MD to find doctors  every month.  Let them book appointments with you instantly.e bring new patients to your office More than 4 million patients use Chat MD to find doctors  every month.  Let them book appointments with you instantly.e bring new patients to your office et them book appointments with you instantly.e bring new patients to your office Let them book appointments with you instantly.e bring new patients to your</h3>
            <div class="terms_box_img hide767"><img src="<?php echo IMAGE_URL;?>/terms-box.png"></div>
            <div class="cls"></div>
          </div>
          
          <div class="terms_box no_padding">
          <div class="terms_box_img2"><img src="<?php echo IMAGE_URL;?>/terms-box2.png"></div>
          	<h1 class="width60">Turn your website traffic into real appointments</h1>
            <h3 class="width60">More than 4 million patients use Chat MD to find doctors  every month.  Let them book appointments with you instantly.e bring new patients to your office More than 4 million patients use Chat MD to find doctors  every month.  Let them book appointments with you instantly.e bring new patients to your office</h3>
            <div class="cls"></div>
          </div>
          
          <div class="login-but sign-up2">
          	<a href="<?php echo MODULE_URL."/sign_up/doctorRegistration.php"; ?>">
          		<input type="submit" name="" value="Sign Up Now" class="process">
          	</a>
          </div>
          <div class="cls"></div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>