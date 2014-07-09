<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$calendraObj = new calendar();
$doctor_id=explode("_",$name);
$id= $doctor_id[1];


$date1 = str_replace('-', '/', $time);

 $startDate=strtotime($date1);
 $endDate=strtotime($date1 . "+7 days");
 $CalenderDateResult=$calendraObj->NextCalendarList($id);
 
$tomorrow = date('m-d-y',strtotime($date1 . "+1 days"));

if($CalenderDateResult['end_date']+strtotime($date1 . "+7 days")>$endDate){
?>
  	<div class="calender" id="docTable_<?php echo $id;?>">
  		
        	<div class="cl-row">
        		<div class="cl-row-head <?php echo $id;?>" ><a javascript:><img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $id;?>" onClick="PriviousCalender(this)" ></a></div>
            	<?php $startTime=$calendraObj->getCalendarStartDateById($id); ?>
            		<?php 
       $k=$startTime['start_time'];
	   $l=1;
while ($k <=  $startTime['end_time']) { 
 ?>
<div <?php if ($l>6) { ?> style="display:none"  class="nbsp_00<?php echo $id;?>11" <?php  }?>  >&nbsp;</div>
<?php if ($l==6) {?>
	<div class="down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"><img class="down_arrow_left" src="<?php echo IMAGE_URL;?>/table_arrow_down.png" alt="arrow"></a></div>
	<?php } ?>
 <?php

  $k=$k+($startTime['intervalBetween']*60);
  $l++;
}
        		?>
     	<div style="display:none" class="up_00<?php echo $id;?>11"><a title="Show Less" id="00<?php echo $id;?>11" onclick="return showUp(this.id);" ><img class="down_arrow_left" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>
           
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",strtotime($date1 . "+1 days"));?></strong><br><?php echo  date("m-d-y",strtotime($date1 . "+1 days")) ;?></div>
        		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >

	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+1 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+1 days")) { ?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+1 days"); ?>">
	
	<?php echo date("G:i",$k); ?>
	 </a>
	 <?php } else { echo "N "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
            
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+2 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+2 days"));?></div>
            	<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+2 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+2 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+2 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 <?php } else { echo "ot "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+3 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+3 days"));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+3 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+3 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+3 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 <?php } else { echo " av "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+4 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+4 days"));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+4 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+4 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+4 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 <?php } else { echo "ai"; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+5 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+5 days"));?></div>
            	<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+5 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+5 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+5 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 <?php } else { echo "la "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        	
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+6 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+6 days"));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+6 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
	{ ?>
		<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+6 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+6 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 	<?php } else { echo "bl "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        
        	
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date("D",  strtotime($date1 . "+7 days"));?></strong><br><?php echo date("m-d-y",  strtotime($date1 . "+7 days"));?></div>
            		<?php 
       $k=$startTime['start_time'];
	    $l=0;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?>  >
	<?php $exitTime= $calendraObj->checkAvilableTime($id,strtotime($date1 . "+7 days"),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
			<?php if($CalenderDateResult['end_date']>strtotime($date1 . "+7 days")) { ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 . "+7 days"); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	 	<?php } else { echo "e "; }?>
	<?php }?></div>
 <?php
 $l++;
  $k=$k+($startTime['intervalBetween']*60);
}
        		?>
        	</div>
        
        	
            <div class="cl-row">
        		<div class="cl-row-head <?php echo $id;?>"><a javascript:><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $id;?>" onClick="NextCalender(this)"></a></div>
            	<?php 
       $k=$startTime['start_time'];
	   $l=1;
while ($k <=  $startTime['end_time']) { 
 ?>
 <div <?php if ($l>6) { ?> style="display:none"  class="nbsp_00<?php echo $id;?>11" <?php  }?>  >&nbsp;</div>
 <?php if ($l==6) {?>
	<div style="display: block" class="down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"><img class="down_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_down.png" alt="arrow"></a></div>

 <?php
	}
  $k=$k+($startTime['intervalBetween']*60);
  $l++;
}
        		?>
           	<div style="display:none" class="up_00<?php echo $id;?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $id;?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>
     
        	</div>
        </div>
        <?php } else {echo "Not Available";  }?>