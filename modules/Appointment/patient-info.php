<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Appointment/code/patientInfo.php");
include_once(INCLUDES_DIR."/header.php");

?>

<!--| Contant Start |-->
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
      <div class="span6 progress_bar_text pa-info-bar">
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_1.jpg" alt="image"><br>
          Patient Info</div>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"><br>
          Details</div>
          <?php if(!isset($action) && $action != 'officeAppointment'){?>
        <div class="image"><img src="<?php echo IMAGE_URL; ?>/prograss_bar_2.jpg" alt="image"><br>
          Payment</div>
          <?php }  ?>
      </div>
     
      <div class="upload_image">
      	 <form action="<?php echo MODULE_URL."/Appointment/patient-detail.php";?>" method="post" name="info">
        <div class="span6 pa-info">
          <div class="upload_image_que">Have you used Chat MD before?</div>
          <div class="pd-top5">We-ll use the information form your last visit</div>
          <div class="checkbox_text">
          	<div class="fl">
            <input type="radio" id="radio-1-1" name="infoChat" class="regular-radio" value="0" checked / /><label for="radio-1-1"></label></div>
            <div>I'm new to Chat MD</div>
            <div class="cls"></div>
<div class="fl">
  <input type="radio" id="radio-1-2" name="infoChat" class="regular-radio" value="1" /><label for="radio-1-2"></label></div>
            <div>I’ve used Chat MD</div>
          </div>
           <?php if(isset($action) && $action == 'officeAppointment'){?>
           	<input type="hidden" name="appointType" value="officeAppointment">
          	<?php }  ?>
          <input class="pa-info-but" type="submit" value="Proceed" name="" >
         
          <div class="cls"></div>
          </div>
           </form>
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
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>