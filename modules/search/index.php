<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/search/code/search_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
$(document).ready(function() {
	
// Support for AJAX loaded modal window.
// Focuses on first input textbox after it loads the window.
$('[data-toggle="modal"]').click(function(e) {
	e.preventDefault();
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$(url).modal('open');
	} else {
		$.get(url, function(data) {
			$('<div class="modal hide fade">' + data + '</div>').modal();
		}).success(function() { $('input:text:visible:first').focus(); });
	}
});
	
});
function auto (myval)
	{
	$(document).ready(function(){
		var value =$.trim($("#"+myval).html());
		$("#city").val(value);
	});
	}
	$(document).ready(function(){
	
	$( "#city" ).keypress(function() {
	
		if($(this).val().length >1)
		{
				$("#ui-id-1").remove();
				
			$.ajax(
  		{
  			type : "POST" ,
  			url:"<?php echo MODULE_URL."/home/ajax/city_search.php"; ?>" ,
  			data: { id :$(this).val()} ,
  			 success : function(data) 
      {
      	$("#ui-id-1").remove();
  		$( "#auotcomplete" ).append(data);}
  			
  		});
		}
 		

 $(document).click(function() {
 	
 	
 
 	$("#ui-id-1").remove();

});
});

	});
	
</script>
<script>
	function NextCalender(value)
{
var IDd=value.id;


var newId= IDd.split('_')[1];
$("#noAvailabliaty").remove();
var NDate=$("."+newId).parent().prev().children(".cl-row-head").html().split('<br>')[1];
$("#docTable_"+newId).hide();
$("#upload_"+newId).append('<div id="Ajax_upload" style="text-align: center;"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');

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
$("#upload_"+newId).append('<div id="Ajax_upload"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
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
function showDown1(vlaue)
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
<script>
		function NextCalenderapp(value)
{
var IDd=value.id;
$("#noAvailabliaty").remove();
var newId= IDd.split('_')[1];
var NDate=$("."+newId).parent().prev().children(".cl-row-head").html().split('<br>')[1];
$("#docTable1_"+newId).hide();
$("#uploadApp_"+newId).append('<div id="Ajax_upload1" style="text-align: center;"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');

$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_next1.php"; ?>",
  data: {  name: IDd, time: NDate  }
})
  .done(function( msg ) {

  	$("#Ajax_upload1").remove();
  	$("#docTable1_"+newId).remove();
  	$("#uploadApp_"+newId).append(msg);
  
  });
}
function PriviousCalenderApp(value)
{
var IDp=value.id;
$("#noAvailabliaty").remove();
var newId= IDp.split('_')[1] ;

var PDate=$("."+newId).parent().next().children(".cl-row-head").html().split('<br>')[1];

$("#docTable1_"+newId).hide();
$("#uploadApp_"+newId).append('<div id="Ajax_upload1"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_prev1.php"; ?>",
  data: {  name: IDp, time: PDate  }
})
  .done(function( msg ) {
  
  	$("#Ajax_upload1").remove();
  	$("#docTable1_"+newId).remove();
  	$("#uploadApp_"+newId).append(msg);
  
  });
}
</script>
<!--| Contant Start |-->
<div class="find_do_Top">
  <div class="container">
    <div class="row">
      <div class="span12 width767">
        <div class="find_do_head">Find Doctors</div>
        <div class="find_do_Search">
        	<form name="refineSearch" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <div class="span4 find_do_mainsel">
            <label>
              <select name="specilaty">
                <option selected value=""> Choose a Specialty ( Gynecologist, etc.) </option>
              
                 <?php for($i=0;count($SpecialtyListArr)>$i;$i++){?>
                  			<option value="<?php echo $SpecialtyListArr[$i]['Specialty_id']; ?>" <?php if ($specilaty ==$SpecialtyListArr[$i]['Specialty_id']) {echo "selected=selected"; }?> > <?php echo $SpecialtyListArr[$i]['Specialty_name']; ?> </option>
                  			<?php }?>
              </select>
            </label>
          </div>
          <div class="span4 Textfield2 Textfield " id="auotcomplete">
            <input  type="text" placeholder="Enter your city and state  ( Abbeville,Alabama )" id="city" name="city" value="<?php echo $city; ?>" autocomplete="off">
          </div>
          <div class="span4 find_do_mainsel">
            <label>
              <select name="chatReason">
                <option selected value=""> Reason for chat ( anuresis, sickness. etc ) </option>
                <?php for($i=0;count($ReasonListArr)>$i;$i++){?>
                  			<option value="<?php echo $ReasonListArr[$i]['id']; ?>" <?php if ($chatReason ==$ReasonListArr[$i]['id']) {echo "selected=selected"; }?>  > <?php echo $ReasonListArr[$i]['chatReason']; ?> </option>
                  			<?php }?>
              </select>
            </label>
          </div>
          <div class="cls"></div>
          <div class="span4 find_do_mainsel">
            <label>
              <select name="language">
                <option value="" selected> Speaks ( English. Spanish, etc ) </option>
                <?php for($i=0;count($LanguageListArr)>$i;$i++){?>
                  			<option value="<?php echo $LanguageListArr[$i]['language_id']; ?>" <?php if ($language ==$LanguageListArr[$i]['language_id']) {echo "selected=selected"; }?>  > <?php echo $LanguageListArr[$i]['name']; ?> </option>
                  			<?php }?>
              </select>
            </label>
          </div>
          <div class="span4 find_do_mainsel">
            <label>
              <select name="gender">
                <option selected value=""> Select Gender </option>
                <option value="0" <?php if ($gender==0) {echo "selected=selected"; }?> >Male</option>
                <option value="1" <?php if ($gender==1) {echo "selected=selected"; }?> >Female</option>
              </select>
            </label>
          </div>
          <div class="span2 find_do_but">
          	<input type="hidden" name="action" value="refineSearch">
          	<button class="btn btn-inverse" type="submit">Book now</button>
          	 
            <!--<input type="submit" value="Refine Search" name="">-->
          </div>
          </form>
        </div>
         
      </div>
     
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  	<?php if(count($homeRearchResult) !=0) {?>
    <div class="span12 top_do_bg">
      <div class="span4 active"><span>1</span>Online Doctors</div>
      <div class="span4 hide767"><span>2</span>Pick Your Appointment</div>
      <div class="span4 hide767" style="border:none;"><span>3</span>Chat with a Doctor</div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
    	 <?php 
    	   $pagination = new pagination($homeRearchResult, (isset($_GET['page']) ? $_GET['page'] : 1), 3);
		     $homeRearchResult = $pagination->getResults();
   for($i=0;count($homeRearchResult)>$i;$i++) {
   	$doctorDetails=$settingsObj->getDoctorByRegisterId($homeRearchResult[$i]['registration_id']) ;
	 $AppointmentArr=  $appointmentObj->appointmentListbydoctorId($homeRearchResult[$i]['registration_id']);
	 
	
	   if(!empty($doctorDetails)){
   	   	?>
      <div class="span1"><?php if($homeRearchResult[$i]['image'] !="") {?><img src="<?php  echo MODULE_URL."/doctor/upload_file/".$homeRearchResult[$i]['image']; ?>" alt="picture"><?php }
      	else { ?>
      	<img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
      <div class="span3">
        <div class="do_name"><?php echo $doctorDetails['name'];?></div>
        <div class="do_post"><?php echo $homeRearchResult[$i]['hospital'];?></div>
        <div class="star"><?php echo  doctorRatting($homeRearchResult[$i]['Ratting']); ?></div>
        <div class="do_dis">Specialties : <strong><?php $specilityFindid=$findObj->SpecialtyList($homeRearchResult[$i]['registration_id']); 
		for($j=0;count($specilityFindid)>$j;$j++)
		{
			$speciltyName=$pageObj->getSpecialtyById($specilityFindid[$j]['Specialty_id']);
		echo $speciltyName['Specialty_name'];
		if(count($specilityFindid)==$j+1){
			
		}else {
			echo ",";
		}
		}
		
		 ?></strong></div>
        <div class="do_dis">Accepting New Patients : <strong><?php if($homeRearchResult[$i]['is_accepted']==1) {?>Yes <?php }else { ?> No <?php }?></strong></div>
        
        <div class="do_blog">
        	<?php $bogArr= $blogObj->getBlogBydoctorID($homeRearchResult[$i]['registration_id']); 
        	
        	if(count($bogArr)>0){ ?>
        	<a href="<?php echo  MODULE_URL."/blog/viewAll.php?id=".$bogArr[0]['blog_id']; ?>">Doctors Blog</a>
        	<?php }?>
        	</div>
        <div class="bookonline_but">
        	  <a href="<?php echo MODULE_URL."/search/ajax/makeAppointment.php"; ?>?my_id=<?php echo  $homeRearchResult[$i]['registration_id']; ?>" data-toggle="modal"><input type="submit" name="" value="Schedule Time" class="process"></a>
        	  
        	   <input type="submit" name="" value="View Profile" onclick="location.href='<?php echo MODULE_URL."/search/DoctorProfile.php"; ?>?my_id=<?php echo  $homeRearchResult[$i]['registration_id']; ?>'">
          <!-- <input type="submit" name="" value="Book Online" onclick="location.href='<?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".$homeRearchResult[$i]['registration_id']; ?>'"> -->
          
          <!-- <a href="<?php echo MODULE_URL."/search/ajax/makeofficeAppointment.php"; ?>?my_id=<?php echo  $homeRearchResult[$i]['registration_id']; ?>" data-toggle="modal"><input type="submit" name="" value="Office Appointment" class="process"></a> -->
          
        </div>
        <div class="cls"></div>
      </div>
         <div class="span7" id="upload_<?php echo $homeRearchResult[$i]['registration_id'];?>">
         	<?php 
			$CheckLeftTime=CheckGreaterdate($AppointmentArr['end_date']);
         	if($CheckLeftTime !="")
			{
         	?>
	
      	<div class="calender" id="docTable_<?php echo $homeRearchResult[$i]['registration_id'];?>">
        	<div class="cl-row">
	<div class="cl-row-head <?php echo $homeRearchResult[$i]['registration_id'];?>" ><?php if(strtotime("now") !=time()) {?><a href="javascript:">
        			<img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $homeRearchResult[$i]['registration_id'];?>" onClick="PriviousCalender(this)" >
        			</a><?php } ?></div>            	

        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("now"));?></strong><br><?php echo date('m-d-y',strtotime("now"));?></div>
        		<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime("now"));
				if($returndate !="")
				{
				$daylist1=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime("now")));
			
				if($AppointmentArr['intervalBetween'] >14 && $daylist1[0] !="" &&  $daylist1[3] !=""){
					
					if($daylist1[1] != "" && $daylist1[2] !="")
					{
				 $k=strtotime($daylist1[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
						
				 ?>
				 
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php  $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">
            		<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist1[2])-strtotime($daylist1[1]);
					 $n=$k+$breakinterval;  
					 $x=0;   
					while ($n <=  strtotime($daylist1[3])) {
						
				 ?>
				 
 <div class="cl-time<?php if ($l+$x>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l+$x>5) {?> style="display:none"  <?php }?> >            		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
            					<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime("now"); ?>">

            	<?php echo date("h:i a",$n); ?>
            	</a>
            	<?php }else {echo "N/A" ;}?>
            		</div>
            	
            	<?php 
					$x++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist1[0]);     $l=0;
					while ($k <=  strtotime($daylist1[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("now")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php } else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }  } ?>
					  <?php if ($l+$x>5 && $returndate !="" && $daylist1[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"   ><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+1 day"));?></strong><br><?php echo date('m-d-y',strtotime("+1 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +1 day'));
				if($returndate !="")
				{
					$daylist2=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +1 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist2[0] !="" &&  $daylist2[3] !=""){
					if($daylist2[1] != "" && $daylist2[2] !="")
					{
				 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +1 day '); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist2[2])-strtotime($daylist2[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +1 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php } else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+1 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(" +1  day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a>
            		<?php } else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } ?>
					  <?php if ($l>5 && $returndate !="" && $daylist2[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+2 day"));?></strong><br><?php echo date('m-d-y',strtotime("+2 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +2 day'));
				if($returndate !="")
				{
					$daylist3=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +2 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist3[0] !="" &&  $daylist3[3] !=""){
					if($daylist3[1] != "" && $daylist3[2] !="")
					{
				 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
    <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist3[2])-strtotime($daylist3[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+2 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		
            		<?php echo date("h:i a",$k); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } 
				           } ?>
				           <?php if ($l>5 && $returndate !="" && $daylist3[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+3 day"));?></strong><br><?php echo date('m-d-y',strtotime("+3 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +3 day'));
				if($returndate !="")
				{
					$daylist4=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +3 day')));
				if($AppointmentArr['intervalBetween'] >14  && $daylist4[0] !="" &&  $daylist4[3] !=""){
					if($daylist4[1] != "" && $daylist4[2] !="")
					{
				 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist4[2])-strtotime($daylist4[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist4[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					  <?php if ($l>5 && $returndate !="" && $daylist4[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("+4 day"));?></strong><br><?php echo date('m-d-y',strtotime("+4 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +4 day'));
				if($returndate !="")
				{
					$daylist5=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +4 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist5[0] !="" &&  $daylist5[3] !=""){
					if($daylist5[1] != "" && $daylist5[2] !="")
					{
				 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
   		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
   			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist5[2])-strtotime($daylist5[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist5[3])) {
						
				 ?>
   <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 				<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +4 day'); ?>">
       
<?php echo date("h:i a",$n); ?> </a> <?php }else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <=  strtotime($daylist5[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+4 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php } else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					  <?php if ($l>5 && $returndate !="" && $daylist5[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime("+5 day"));?></strong><br><?php echo date('m-d-y',strtotime("+5 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +5 day'));
				if($returndate !="")
				{
					$daylist6=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +5 day')));
				if($AppointmentArr['intervalBetween'] >14 && $daylist6[0] !="" &&  $daylist6[3] !=""){
					if($daylist6[1] != "" && $daylist6[2] !="")
					{
				 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <  strtotime($daylist6[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
		
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist6[2])-strtotime($daylist6[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
				<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
					
					<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +5 day'); ?>">
		 
           <?php echo date("h:i a",$n); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+5 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
			
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;} ?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }
} ?>
<?php if ($l>5 && $returndate !="" && $daylist6[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime("+6 day"));?></strong><br><?php echo date('m-d-y',strtotime("+6 day"));?></div>
            	<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime( ' +6 day'));
				if($returndate !="")
				{
					$daylist7=	 $appointmentObj->appointmentShedualebydoctorId($homeRearchResult[$i]['registration_id'],date('D',strtotime( ' +6 day')));
					if($AppointmentArr['intervalBetween'] >14 && $daylist7[0] !="" &&  $daylist7[3] !=""){
					if($daylist7[1] != "" && $daylist7[2] !="")
					{
				 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <  strtotime($daylist7[1])) {
						
				 ?>
     <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a><?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist7[2])-strtotime($daylist7[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist7[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$n."&date=".strtotime(' +6 day'); ?>">
           
<?php echo date("h:i a",$n); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <=  strtotime($daylist7[3])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $homeRearchResult[$i]['registration_id'];?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
    		<?php $availabilty=$appointmentObj->checkAvilableTime($homeRearchResult[$i]['registration_id'],date('d-m-Y',strtotime("+6 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>
    			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$homeRearchResult[$i]['registration_id'].genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
  
<?php echo date("h:i a",$k); ?> </a> <?php }else {echo "N/A" ;}?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } ?>
					  <?php if ($l>5 && $returndate !="" && $daylist7[0] !="") {?>
				 	<div class="cl-time down_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head <?php echo $homeRearchResult[$i]['registration_id'];?>"><a href="javascript:"><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $homeRearchResult[$i]['registration_id'];?>" onClick="NextCalender(this)"></a></div>
             	<div style="display:none" class="up_00<?php echo $homeRearchResult[$i]['registration_id'];?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $homeRearchResult[$i]['registration_id'];?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>

        	</div>
        </div>
        <?php } else if($CheckLeftTime=="") { ?>
        <img src="<?php echo IMAGE_URL."/not-avilability.jpg" ;?>">	
     <?php   }?>
      </div>
     
      
   <div class="cls find_do_border" <?php if(count($homeRearchResult)==$i+1) {  ?> style="display:none" <?php }?> ></div>
      <div class="find_do_pd" <?php if(count($homeRearchResult)==$i+1) {?> style="display:none" <?php }?> ></div>
   <?php if(count($homeRearchResult)==$i+1) {?> <div class="cls"></div> <?php }}?>  
   <?php }
    echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks().'</div>';
   ?>
    </div>
    <?php } else { ?>
    <div class="no-result"> <strong><?php echo $Message['message_title']; ?></strong><br><?php echo $Message['message_content']; ?></div>	
  <?php   }?>
  </div>
</div>
</div>

<!--| Contant End |--> 

<?php include_once(INCLUDES_DIR."/footer.php") ; ?>