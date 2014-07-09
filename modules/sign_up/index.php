<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/sign_up/code/sign_code.php");
include_once(INCLUDES_DIR."/header.php");
?>


<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Sign Up</div>
      <div class="contant_box sign_up">
      	<div class="span6 border">
      	  <div class="fl patient_img"><img src="<?php echo IMAGE_URL;?>/patient.png" alt="image"></div>
          <div class="fl">
            <div class="patient_text"><h3>I'm new a patient</h3>
            <p>Find a doctor and book an appointment online for free!</p>
            </div>
            <div class="sign_up_but"><a href="<?php echo MODULE_URL."/sign_up/patientRegistration.php"; ?>">Sign Up</a></div>
          </div>
      	</div>
        <div class="span5">
          <div class="fr doctor_img"><img src="<?php echo IMAGE_URL;?>/doctor.png" alt="image"></div>
          <div class="fr">
            <div class="doctor_text"><h3>I'm a doctor</h3>
            <p>Learn how ChatMD helps new patients find you</p>
            </div>
            <!-- <div class="sign_up_but"><a href="<?php echo MODULE_URL."/sign_up/doctorRegistration.php"; ?>">Sign Up</a></div> -->
            <div class="sign_up_but"><a href="<?php echo MODULE_URL."/sign_up/whyjoin.php"; ?>">Learn More</a></div>
          </div>
        </div>
        <div class="cls"></div>
      </div>
      </div>
    </div>
  </div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>