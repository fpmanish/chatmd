<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/Appointment/code/Appointment.php");
include_once(INCLUDES_DIR."/header.php");
?>

<!--| Contant Start |-->
<script>
$(document).ready(function() {
	$("#readmore").click(function(){
		$("#unread").hide();
		
	$("#read").fadeIn('swing');	
	});
	$("#readless").click(function(){
		$("#read").hide();
		
	$("#unread").fadeIn( 'swing');	
	});
	$("#ShowCAl").click(function() {
	$(".calender").show();	
	$("#AppDeatils").hide();
	});
	$(".cl-time").click(function() {
	$(".calender").hide();	
	$("#AppDeatils").show();
	});
	    $("#chatReason").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});

});
function NextCalender(value)
{
var IDd=value.id;


var newId= IDd.split('_')[1];
var NDate=$("."+newId).parent().prev().children(".cl-row-head").html().split('<br>')[1];
$("#docTable_"+newId).hide();
$(".ajaxUp").append('<div id="Ajax_upload" style="text-align: center;"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');

$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_next.php"; ?>",
  data: {  name: IDd, time: NDate  }
})
  .done(function( msg ) {
  		alert(msg);
  	$("#Ajax_upload").remove();
  	$("#docTable_"+newId).show();
  
  });
}
function PriviousCalender(value)
{
var IDp=value.id;

var newId= IDp.split('_')[1] ;

var PDate=$("."+newId).parent().next().children(".cl-row-head").html().split('<br>')[1];

$("#docTable_"+newId).hide();
$(".ajaxUp").append('<div id="Ajax_upload"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_next.php"; ?>",
  data: {  name: IDp, time: PDate  }
})
  .done(function( msg ) {
  	$("#Ajax_upload").remove();
  	$("#docTable_"+newId).show();
  	alert(msg);
  });
}
function showDown(vlaue)
{
	$(".showMore_"+vlaue).show();
	$(".up_"+vlaue).show();
	$(".down_"+vlaue).hide();
	$(".nbsp_"+vlaue).show();
}
function showUp(myvalue)
{

	$(".showMore_"+myvalue).hide();
	$(".up_"+myvalue).hide();
	$(".nbsp_"+myvalue).hide();
	$(".down_"+myvalue).show();
}
</script>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="inner-main-bg">
        <div class="inner_heading_bg"><?php echo $rgistrationDeatlis['name'];?></div>
        <div class="doctor_profile_box">
          <div class="span3 profile_image"><?php if($doctorDetails['image'] !="") {?><img src="<?php  echo MODULE_URL."/doctor/upload_file/".$doctorDetails['image']; ?>" alt="picture"><?php }
      	else { ?><img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
          <div class="span8">
          <div class="profile_text">
        	<div class="do_name"><?php echo $doctorDetails['hospital'];?></div>
        	<div class="do_dis"><strong>Specialties : &nbsp;&nbsp;&nbsp;<span><?php $specilityFindid=$findObj->SpecialtyList($rgistrationDeatlis['patient_id']); 
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
            <div class="contact-info"> Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: +<?php echo $doctorDetails['phone'];?><br> Email  : <?php echo $rgistrationDeatlis['email']; ?></div>
        	<div class="do_blog"><a href="#">Doctors Blog</a></div>
            <div class="cls"></div>
            </div>
            <?php if ($doctorDetails['about'] !="") { ?>
            <div class="disc"><strong>Professional Statement :</strong><br>
<?php  $timestring=$doctorDetails['about'];
          $strLen= strlen($doctorDetails['about']); if($strLen >200){ ?><p id="unread"><?php echo  substr($timestring,0,200);?> <span><a href="#" id="readmore">Read more...</a></span> </p> 
          <p id="read" style="display:none"><?php echo $timestring; ?> <span><a href="#" id="readless">Read Less...</a></span></p> <?php }else { echo $doctorDetails['about'];  } ?></div>
      		<?php }?></div>
      		
          <div class="span12">
          	<form action="<?php echo MODULE_URL."/Appointment/patient-info.php";?>" method="POST"  id="chatReason">
           <div class="span4">
           <div class="upload_image_head">Book an Appointment</div>
            <div class="profile_form">
            <div class="name">What’s the reason for your visit?</div>
            <div>
            <div class="mainsel">
              <label>
                <select name="chat_Reason" class="validate[required]"  data-errormessage-value-missing="Chat Reason is required!" autocomplete="off">
                  <option selected value=""> Reason for chat ( anuresis, sickness. etc ) </option>
                <?php for($i=0;count($ReasonListArr)>$i;$i++){?>
                  			<option value="<?php echo $ReasonListArr[$i]['id']; ?>" <?php if ($chatReason ==$ReasonListArr[$i]['id']) {echo "selected=selected"; }?>  > <?php echo $ReasonListArr[$i]['chatReason']; ?> </option>
                  			<?php }?>
                </select>
              </label>
            </div>  
            </div>
           
           
          
            <div class="profile-but">
          
            <input type="submit" name="" value="Book Now" class="process" >
      	   </div>
            <div class="cls"></div>
          </div>
          
          </div>
          
            <div class="span7">
            	<div id="AppDeatils">
            <div class="app-time">Appointment Time</div>
            <div class="schedule"><?php echo date("l",$_SESSION['AppDate']);?>, <?php echo date("F",$_SESSION['AppDate']);?> <?php echo date("d",$_SESSION['AppDate']);?>- <?php echo date("H:i",$_SESSION['AppTime']); ?> &nbsp;&nbsp;<a  id="ShowCAl"><img src="<?php echo IMAGE_URL;?>/calender.jpg" alt="icon"></a></div>
            </div>
            <div class="ajaxUp">
            	      	<div class="calender" id="docTable_<?php echo $test1;?>" style="display:none">
        	<div class="cl-row">
        		<div class="cl-row-head <?php echo $test1;?>" ><a ><img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $test1;?>" onClick="PriviousCalender(this)" ></a></div>
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
<?php $exitTime= $calendraObj->checkAvilableTime($test1,strtotime('now'),$k);
	if(count($exitTime)>0)
	{
	echo "N/A";	
	}
	else
		{ ?>
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime('now'); ?>">
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php }
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +1 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>"> </div>
	<?php echo date("G:i",$k); ?>
	 </a>
	<?php } 
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
      </div>
      </form>
          </div>
          <div class="cls"></div>
        </div>
        </div>
      </div>
        <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--| Contant End |--> 

<?php include_once(INCLUDES_DIR."/footer.php") ; ?>