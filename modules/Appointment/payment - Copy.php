<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/chatMD_vid/addAppointment.php");
include_once(INCLUDES_DIR."/header.php");
?>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 top_do_bg">
      <div class="span4 hide767"><span>1</span>Top Doctors</div>
      <div class="span4 active"><span>2</span>Pick Your Appointment</div>
      <div class="span4 hide767" style="border:none;"><span>3</span>Chat with a Doctor</div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span12 upload_image_head">Make your Payment</div>
      <div class="span6 progress_bar_text">
        <div class="image"><a href="<?php echo MODULE_URL."/Appointment/patient-info.php";?>"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"></a><br>
          Patient Info</div>
        <div class="image"><a href="<?php echo MODULE_URL."/Appointment/patient-detail.php";?>"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"></a><br>
          Details</div>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_1.jpg" alt="image"><br>
          Payment</div>
        <div class="cls"></div>
      </div>
      <div class="Payment">
      	
      
        <div class="span12">
          <div class="detail">Please enter your  detail to process</div>
          <form name="pay" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="upload_form">
            <div class="name"></div>
            
            <div class="name">date :</div>
            <div>
              <input name="date" type="text"><span></span>
            </div>
             <div class="name" >Time  :</div>
            <div>
              <input name="time" type="text"><span></span>
            </div>
            <div class="name" >Time interval :</div>
            <div>
              <input name="timeinterval" type="text"><span></span>
            </div>
          
            <div class="name"></div>
            <div></div>
            <div class="name">&nbsp;</div>
            <div>
            	<input type="hidden"  name="payment" value="1">
          	<input class="process" type="submit" value="Process" name="sub"></span>
        	</div>
            <div class="cls"></div>
            <div class="border"></div>
            <div class="bank-text">Pay using Internet Banking (all Major Banks supported )</div>
            <div class="banks"><strong>Banks:</strong><a href="#"><img src="<?php echo IMAGE_URL; ?>/Bank-1.jpg" alt="bank"></a><a href="#"><img src="<?php echo IMAGE_URL; ?>/Bank-2.jpg" alt="bank"></a><a href="#"><img src="<?php echo IMAGE_URL; ?>/Bank-3.jpg" alt="bank"></a><a href="#"><img src="<?php echo IMAGE_URL; ?>/Bank-4.jpg" alt="bank"></a><a href="#"><img src="<?php echo IMAGE_URL; ?>/Bank-5.jpg" alt="bank"></a></div>
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