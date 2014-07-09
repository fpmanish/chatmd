<?php include_once("../../../conf/config.inc.php");
$settingsObj = new settings();
$calendraObj = new calendar();
$doctorDetails=$settingsObj->getDoctorById($_GET['my_id']) ;
$ByPTDetails=$settingsObj->getPatientById($_GET['my_id']);
	$pageObj = new pageManager();
$calendraObj = new calendar();
$findObj = new find();
	$dateFormCurrnt= date("m-d-y");
	$test1=$_GET['my_id'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel"> Book an Appointment </h3>
</div>
<div class="modal-body">
<div class="span3 profile_image"><?php if($doctorDetails['image'] !="") {?><img src="<?php  echo MODULE_URL."/doctor/upload_file/".$doctorDetails['image']; ?>" alt="picture"><?php }
      	else { ?>
      	<img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
          <div class="span8">
          <div class="profile_text">
        	<div class="do_name"><?php echo $ByPTDetails['name'];?></div>
        	<div class="do_dis"><strong>Specialties : &nbsp;&nbsp;&nbsp;<span><?php $specilityFindid=$findObj->SpecialtyList($_GET['my_id']); 
		for($j=0;count($specilityFindid)>$j;$j++)
		{
			$speciltyName=$pageObj->getSpecialtyById($specilityFindid[$j]['Specialty_id']);
		echo $speciltyName['Specialty_name'];
		if(count($specilityFindid)==$j+1){
			
		}else {
			echo ",";
		}
		}
		
		 ?></span></strong></div>
        	<div class="do_dis fl"><strong>Contact Info :</strong></div>
            <div class="contact-info"> Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $doctorDetails['phone'];?>, <br>Email  : <?php echo $ByPTDetails['email'];?></div>
            <div class="cls"></div>
            </div>
      		</div>

      	<div class="calender" id="docTable_<?php echo $test1;?>">
        	<div class="cl-row">
        		<div class="cl-row-head <?php echo $test1;?>" ><a href="#"><img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $test1;?>" onClick="PriviousCalender(this)" ></a></div>
            	<?php $startTime=$calendraObj->getCalendarStartDateById($test1); ?>
            		<?php 
       $k=$startTime['start_time'];
	   $l=1;
while ($k <=  $startTime['end_time']) { 
 ?>
<div <?php if ($l>6) { ?> style="display:none"  class="nbsp_00<?php echo $test1;?>11" <?php  }?>  >&nbsp;</div>
<?php if ($l==6) {?>
	<div class="down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"><img class="down_arrow_left" src="<?php echo IMAGE_URL;?>/table_arrow_down.png" alt="arrow"></a></div>
	<?php } ?>
 <?php

  $k=$k+($startTime['intervalBetween']*60);
  $l++;
}
        		?>
     	<div style="display:none" class="up_00<?php echo $test1;?>11"><a title="Show Less" id="00<?php echo $test1;?>11" onclick="return showUp(this.id);" ><img class="down_arrow_left" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>
           
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D");?></strong><br><?php echo  ($dateFormCurrnt) ;?></div>
        		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >

	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime("now"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
            
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +1 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +1 day'));?></div>
            	<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +1 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +1 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +2 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +2 day'));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +2 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +3 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +3 day'));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +3 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +4 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +4 day'));?></div>
            	<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +4 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +5 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +5 day'));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +5 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
	{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime(' +6 day'));?></strong><br><?php echo date("m-d-y",  strtotime(' +6 day'));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
	<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime(' +6 day'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head <?php echo $test1;?>"><a href="#"><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $test1;?>" onClick="NextCalender(this)"></a></div>
            	<?php 
       $k=$startTime['start_time'];
	   $l=1;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div <?php if ($l>6) { ?> style="display:none"  class="nbsp_00<?php echo $test1;?>11" <?php  }?>  >&nbsp;</div>
 <?php if ($l==6) {?>
	<div style="display: block" class="down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"><img class="down_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_down.png" alt="arrow"></a></div>

 <?php
	}
  $k=$k+($startTime['intervalBetween']*60);
  $l++;
}
        		?>
           	<div style="display:none" class="up_00<?php echo $test1;?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $test1;?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>
     
        	</div>
        </div>
</div>
<div class="modal-footer">
</div>

