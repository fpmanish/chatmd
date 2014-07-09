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
$("#noAvailabliaty").remove();

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
  		$("#Ajax_upload").remove();
  	$("#docTable_"+newId).remove();
  	$("#upload_"+newId).append(msg);
  
  });
}
function PriviousCalender(value)
{
var IDp=value.id;

$("#noAvailabliaty").remove();
var newId= IDp.split('_')[1] ;

var PDate=$("."+newId).parent().next().children(".cl-row-head").html().split('<br>')[1];

$("#docTable_"+newId).hide();
$(".ajaxUp").append('<div id="Ajax_upload"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_prev.php"; ?>",
  data: {  name: IDp, time: PDate  }
})
  .done(function( msg ) {
  	$("#Ajax_upload").remove();
  	$("#docTable_"+newId).remove();
  	$("#upload_"+newId).append(msg);
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
        <div class="inner_heading_bg"><?php echo $rgistrationDeatlis['name'];?><span style="color: red;float: right"><?php echo $error; ?></span></div>
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
        	<div class="do_blog"><?php $bogArr= $blogObj->getBlogBydoctorID($test1); 
        	
        	if(count($bogArr)>0){ ?>
        	<a href="<?php echo  MODULE_URL."/blog/viewAll.php?id=".$bogArr[0]['blog_id']; ?>">Doctors Blog</a>
        	<?php }?></div>
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
           <?php if($error=="") { ?>
            <input type="submit" name="" value="Book Now" class="process" >
            <?php }?>
      	   </div>
            <div class="cls"></div>
          </div>
          
          </div>
          
            <div class="span7" id="upload_<?php echo $test1;?>">
            	<div id="AppDeatils">
            <div class="app-time">Appointment Time</div>
            <div class="schedule"><?php echo date("l",$_SESSION['AppDate']);?>, <?php echo date("F",$_SESSION['AppDate']);?> <?php echo date("d",$_SESSION['AppDate']);?>- <?php echo date("h:i a",$_SESSION['AppTime']); ?> &nbsp;&nbsp;<a  id="ShowCAl"><img src="<?php echo IMAGE_URL;?>/calender.jpg" alt="icon"></a></div>
            </div>
            <div class="ajaxUp">
      
	
      	<div class="calender" id="docTable_<?php echo $test1;?>" style="display:none">
        	<div class="cl-row">
	<div class="cl-row-head <?php echo $test1;?>" ><?php if(strtotime("now") !=time()) {?><a href="javascript:">
        			<img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $test1;?>" onClick="PriviousCalender(this)" >
        			</a><?php } ?></div>            	

        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("now"));?></strong><br><?php echo date('m-d-y',strtotime("now"));?></div>
        		<?php  
        		
        		$returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime("now"));
				if($returndate !="")
				{
				$daylist1=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime("now")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist1[0] !="" &&  $daylist1[3] !=""){
					if($daylist1[1] != "" && $daylist1[2] !="")
					{
				 $k=strtotime($daylist1[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
						
				 ?>
				 
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time "  <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime('now')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">
            		<?php echo date("h:i a",$k); ?> </a> <?php } else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist1[2])-strtotime($daylist1[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist1[3])) {
						
				 ?>
				 
            	<div class="cl-time">
            		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
            					<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime('now')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime("now"); ?>">

            	<?php echo date("h:i a",$n); ?>
            	</a>
            	<?php }else { echo "N/A"; }?>
            		</div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist1[0]);     $l=0;
					while ($k <=  strtotime($daylist1[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime('now')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php } else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }  } ?>
					 <?php if ($l+$x>5 && $returndate !="" && $daylist1[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+1 day"));?></strong><br><?php echo date('m-d-y',strtotime("+1 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +1 day'));
				if($returndate !="")
				{
					$daylist2=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +1 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist2[0] !="" &&  $daylist2[3] !=""){
					if($daylist2[1] != "" && $daylist2[2] !="")
					{
				 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +1 day '); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist2[2])-strtotime($daylist2[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +1 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(" +1  day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a>
            		<?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } ?>
					<?php if ($l+$x>5 && $returndate !="" && $daylist2[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+2 day"));?></strong><br><?php echo date('m-d-y',strtotime("+2 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +2 day'));
				if($returndate !="")
				{
					$daylist3=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +2 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist3[0] !="" &&  $daylist3[3] !=""){
					if($daylist3[1] != "" && $daylist3[2] !="")
					{
				 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
    <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time"  <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +2 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist3[2])-strtotime($daylist3[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +2 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +2 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		
            		<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } 
				           } ?>
				         <?php if ($l+$x>5 && $returndate !="" && $daylist3[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+3 day"));?></strong><br><?php echo date('m-d-y',strtotime("+3 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +3 day'));
				if($returndate !="")
				{
					$daylist4=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +3 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist4[0] !="" &&  $daylist4[3] !=""){
					if($daylist4[1] != "" && $daylist4[2] !="")
					{
				 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <  strtotime($daylist4[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +3 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist4[2])-strtotime($daylist4[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist4[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +3 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php } else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <=  strtotime($daylist4[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +3 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					 <?php if ($l+$x>5 && $returndate !="" && $daylist4[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+4 day"));?></strong><br><?php echo date('m-d-y',strtotime("+4 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +4 day'));
				if($returndate !="")
				{
					$daylist5=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +4 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist5[0] !="" &&  $daylist5[3] !=""){
					if($daylist5[1] != "" && $daylist5[2] !="")
					{
				 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
   		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
   			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +4 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist5[2])-strtotime($daylist5[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist5[3])) {
						
				 ?>
   <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 				<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
 			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +4 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +4 day'); ?>">
       
<?php echo date("h:i a",$n); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <=  strtotime($daylist5[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +4 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					<?php if ($l+$x>5 && $returndate !="" && $daylist5[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime("+5 day"));?></strong><br><?php echo date('m-d-y',strtotime("+5 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +5 day'));
				if($returndate !="")
				{
					$daylist6=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +5 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist6[0] !="" &&  $daylist6[3] !=""){
					if($daylist6[1] != "" && $daylist6[2] !="")
					{
				 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <  strtotime($daylist6[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
		
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +5 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist6[2])-strtotime($daylist6[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
				<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
					
					<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +5 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +5 day'); ?>">
		 
           <?php echo date("h:i a",$n); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +5 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; } ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }
} ?>
<?php if ($l+$x>5 && $returndate !="" && $daylist6[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $test1;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime("+6 day"));?></strong><br><?php echo date('m-d-y',strtotime("+6 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +6 day'));
				if($returndate !="")
				{
					$daylist7=	 $appointmentObj->appointmentShedualebydoctorId($test1,date('D',strtotime( ' +6 day')));
					if($AppointmentArr['intervalBetween'] >14 && $daylist7[0] !="" &&  $daylist7[3] !=""){
					if($daylist7[1] != "" && $daylist7[2] !="")
					{
				 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <  strtotime($daylist7[1])) {
						
				 ?>
     <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
 			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +6 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a><?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist7[2])-strtotime($daylist7[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist7[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
 			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +6 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +6 day'); ?>">
           
<?php echo date("h:i a",$n); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <=  strtotime($daylist7[3])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
    		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
    			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime(' +6 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
  
<?php echo date("h:i a",$k); ?> </a> <?php }else { echo "N/A"; }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } ?>
			<?php if ($l+$x>5 && $returndate !="" && $daylist7[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $test1;?>11"><a> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head <?php echo $test1;?>"><a href="javascript:"><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $test1;?>" onClick="NextCalender(this)"></a></div>
             	<div style="display:none" class="up_00<?php echo $test1;?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $test1;?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>

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