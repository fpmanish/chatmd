<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/patient/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
    <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2"><a href="#">Appointments</a></div>
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/Gallery.php"; ?>">Gallery</a></div>
      <div class="span2" style="border:none;"><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <div class="span12 past-app top_do_bg_contant_box">
      <div class="bs-docs-example">
           
            <div class="tab-content" id="myTabContent">
              <div id="Appointment" class="tab-pane fade active in">
                <iframe class="frame" src="<?php echo MODULE_URL."/doctor/calendar.php"; ?>"></iframe>
              </div>
              <div id="Treatment" class="tab-pane fade">
                <iframe class="frame" src="<?php echo MODULE_URL."/doctor/calendar.php"; ?>"></iframe>
              </div>
            </div>
          </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 

<!--| footer Start |-->
<div class="Foot">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="span6 Navi3"> <a href="index.html">Home</a> <a href="find-a-doctor.html">Find a Doctor</a> <a href="view-history.html">View History</a> <a href="blog.html">Patient & Doctor Blog</a> <a href="about-us.html">About Us</a>
            <div class="cls"></div>
          </div>
          <div class="span6 Copyright">© 2013 Chat MD All Rights Reserved.</div>
        </div>
      </div>
    </div>
    <div class="cls"></div>
  </div>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>