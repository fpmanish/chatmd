<?php include_once("../../../conf/config.inc.php");
$settingsObj = new settings();
$calendraObj = new calendar();
$doctorDetails=$settingsObj->getDoctorById($_GET['my_id']) ;
$ByPTDetails=$settingsObj->getPatientById($_GET['my_id']);
	$pageObj = new pageManager();
$calendraObj = new calendar();
$appointmentObj = new appointment();
$findObj = new find();
	$dateFormCurrnt= date("m-d-y");
	$test1=$_GET['my_id'];
	 $AppointmentArr=  $appointmentObj->appointmentListbydoctorId($test1);
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
        	 <div class="star"><?php echo  doctorRatting($doctorDetails['Ratting']); ?></div>
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
<div id="uploadApp_<?php echo $test1;?>">
	<div class="calender" id="docTable1_<?php echo $test1;?>">
        	<div class="cl-row">
	<div class="cl-row-head <?php echo $test1;?>" ><?php if(strtotime("now") !=time()) {?><a href="javascript:">
        			<img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $test1;?>" onClick="PriviousCalenderApp(this)" >
        			</a><?php } ?></div>            	

        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime("now"));?></strong><br><?php echo date('m-d-y',strtotime("now"));?></div>
        		<?php  $returndate=isBetweenDate($AppointmentArr['start_date'],$AppointmentArr['end_date'],strtotime("now"));
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">
            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
            					<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime("now"); ?>">

            	<?php echo date("h:i a",$n); ?>
            	</a>
            	<?php }?>
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime("now"); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
			
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +1 day '); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +1 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php } ?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(" +1  day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a>
            		<?php } ?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +2 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php }?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +2 day'); ?>">

            		
            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $test1;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($test1,date('d-m-Y',strtotime("+3 day")),date("h:i a",$k));
	
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +3 day'); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
   			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +4 day'); ?>">
       
<?php echo date("h:i a",$n); ?> </a> <?php } ?></div>
            	
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
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +4 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
		
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php } ?></div>
            	
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
					
					<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +5 day'); ?>">
		 
           <?php echo date("h:i a",$n); ?> </a> <?php }?></div>
            	
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
			
			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +5 day'); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php } ?></div>
            	
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
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
   
<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
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
 			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$n."&date=".strtotime(' +6 day'); ?>">
           
<?php echo date("h:i a",$n); ?> </a> <?php }?></div>
            	
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
    			<a title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$test1.genRandomPass(2)."&Time=".$k."&date=".strtotime(' +6 day'); ?>">
  
<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
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
        		<div class="cl-row-head <?php echo $test1;?>"><a href="javascript:"><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $test1;?>" onClick="NextCalenderapp(this)"></a></div>
             	<div style="display:none" class="up_00<?php echo $test1;?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $test1;?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>

        	</div>
        </div>
        </div>
</div>
<div class="modal-footer">
</div>

