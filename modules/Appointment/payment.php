<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Appointment/code/payment_code.php");
include_once(MODULES_PATH."/chatMD_vid/addAppointment.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script type="text/javascript" src="https://www.paypalobjects.com/js/external/dg.js"></script>

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
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"><br>
          Details</div>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_1.jpg" alt="image"><br>
          Payment</div>
      </div>
      <div class="upload_image">
        <div class="span6">
         
         
          <div class="paypal">
            <div>
          	<form action="PayReceipt.php" >		
<input type="submit" id="pay_button" value="Pay with PayPal"> 	
</form>
        	</div>
            <div class="cls"></div>
          </div>
        </div>
        
        <div class="span5 dr_disc_box">
          <div class="image"><?php if($doctorDetails['image'] !="") {?><img height="130px" width="131px" src="<?php  echo MODULE_URL."/doctor/upload_file/".$doctorDetails['image']; ?>" alt="picture"><?php }
      	else { ?><img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
          <div class="info">
            <div class="doname"><?php echo $doctorData['name'];?></div>
            <div class="do_blog"><?php
            $bogArr= $blogObj->getBlogBydoctorID($_SESSION['doctorAppointmentId']); 
             if(count($bogArr)>0){ ?>
        	<a href="<?php echo  MODULE_URL."/blog/viewAll.php?id=".$bogArr[0]['blog_id']; ?>">Doctors Blog</a>
        	<?php }?></div>
            <div class="star"><?php echo  doctorRatting($doctorDetails['Ratting']); ?></div>
            
          </div>
          <div class="post"><span>Specialties :</span><?php $specilityFindid=$findObj->SpecialtyList($doctorData['patient_id']); 
		for($j=0;count($specilityFindid)>$j;$j++)
		{
			$speciltyName=$pageObj->getSpecialtyById($specilityFindid[$j]['Specialty_id']);
		echo $speciltyName['Specialty_name'];
		if(count($specilityFindid)==$j+1){
			
		}else {
			echo " ,";
		}
		}
		
		 ?></div>
          <div class="disc"><strong>Reason of chat :</strong>	<?php echo $reason; ?></div>
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
<script type="text/javascript" charset="utf-8">
    var embeddedPPFlow = new PAYPAL.apps.DGFlow({trigger: 'pay_button'});
    
    function get_full_url(url_path)
    {
        var loc = window.location;
        var url = '' ;
        return url;
    }
     function MyEmbeddedFlow(embeddedFlow) {
              this.embeddedPPObj = embeddedFlow;
              this.paymentSuccess = function () {
                   this.embeddedPPObj.closeFlow();
                   // handle payment success here
                   //  - redirect to a success page (or)
                   //  - show another div confirming the payment (or)
                   //  - display a popup confirming the payment
                   // NOTE: the line below redirects to a success page
                   alert(get_full_url('/success.php'));
                   window.location.href = get_full_url('/success.php');
              };
              this.paymentCanceled = function () {
                   this.embeddedPPObj.closeFlow();
                   // handle payment cancellation here
                   //  - redirect to a cancel page (or)
                   //  - show another div messaging that payment was canceled (or)
                   //  - display a popup to retry payment again
                   // NOTE: the line below redirects to a cancellation page
                   window.location.href = get_full_url('/cancel.php');
              };
         
     }
      var myEmbeddedPaymentFlow = new MyEmbeddedFlow(embeddedPPFlow);
   
     
</script>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>