<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$appointmentObj = new appointment();
$doctor_id=explode("_",$name);
$id= $doctor_id[1];


$date1 = str_replace('-', '/', $time);

 $startDate=strtotime($date1);
 $endDate=strtotime($date1 . "+6 days");
 $AppointmentArr=$appointmentObj->NextCalendarList($id);




?>
   	<div class="calender" id="docTable_<?php echo $id;?>">
        	<div class="cl-row">
	<div class="cl-row-head <?php echo $id;?>" ><a href="javascript:">
        			<img src="<?php echo IMAGE_URL;?>/table_arrow_left.png" alt="arrow" id="doctorPre_<?php echo $id;?>" onClick="PriviousCalender(this)" >
        			</a></div>            	

        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+1 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+1 day"));?></div>
        		<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime($date1 ."+1 day"));
				if($returndate !="")
				{
				$daylist1=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime($date1 ."+1 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist1[0] !="" &&  $daylist1[3] !=""){
					if($daylist1[1] != "" && $daylist1[2] !="")
					{
				 $k=strtotime($daylist1[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
						
				 ?>
				 
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>			
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+1 day"); ?>">
            		<?php echo date("h:i a",$k); ?> </a>
            		<?php }?>
            		</div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist1[2])-strtotime($daylist1[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist1[3])) {
						
				 ?>
				 
            	<div class="cl-time">
            		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
            					<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+1 day"); ?>">

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
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+1 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +1 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+1 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }  } ?>
					  <?php if ($l+$x>5 && $returndate !="" && $daylist1[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+2 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+2 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+2 day"));
				if($returndate !="")
				{
					$daylist2=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime( $date1 ."+2 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist2[0] !="" &&  $daylist2[3] !=""){
					if($daylist2[1] != "" && $daylist2[2] !="")
					{
				 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <  strtotime($daylist1[1])) {
				
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+2 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +2 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+2 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist2[2])-strtotime($daylist2[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+2 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>		
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +2 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+2 day"); ?>">

            		<?php echo date("h:i a",$n); ?> </a> <?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist2[0]);     $l=0;
					while ($k <=  strtotime($daylist2[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+2 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +2 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+2 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } ?>
					  <?php if ($l+$x>5 && $returndate !="" && $daylist2[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+3 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+3 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+3 day"));
				if($returndate !="")
				{
					$daylist3=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime( $date1 ."+3 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist3[0] !="" &&  $daylist3[3] !=""){
					if($daylist3[1] != "" && $daylist3[2] !="")
					{
				 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <  strtotime($daylist3[1])) {
						
				 ?>
    <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+3 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +3 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+3 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a>
            		<?php }?>
            		</div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist3[2])-strtotime($daylist3[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+3 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +3 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+3 day"); ?>">

            		<?php echo date("h:i a",$n); ?> </a>
            		<?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist3[0]);     $l=0;
					while ($k <=  strtotime($daylist3[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+3 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +3 day')))  { echo "class='time_active'"; }?>		 title="Appointment Time" href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+3 day"); ?>">

            		
            		<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } 
				           } ?>
				         <?php if ($l+$x>5 && $returndate !="" && $daylist3[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+4 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+4 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+4 day"));
				if($returndate !="")
				{
					$daylist4=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime($date1 ."+4 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist4[0] !="" &&  $daylist4[3] !=""){
					if($daylist4[1] != "" && $daylist4[2] !="")
					{
				 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <  strtotime($daylist4[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+4 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +4 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+4 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist4[2])-strtotime($daylist4[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist4[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+4 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>				
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +4 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+4 day"); ?>">

            		<?php echo date("h:i a",$n); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist4[0]);     $l=0;
					while ($k <=  strtotime($daylist4[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+4 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>		
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +4 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+4 day"); ?>">

            		<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					<?php if ($l+$x>5 && $returndate !="" && $daylist4[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+5 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+5 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+5 day"));
				if($returndate !="")
				{
					$daylist5=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime( $date1 ."+5 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist5[0] !="" &&  $daylist5[3] !=""){
					if($daylist5[1] != "" && $daylist5[2] !="")
					{
				 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <  strtotime($daylist5[1])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
   	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+5 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>		
   			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +5 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+5 day"); ?>">
   
<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist5[2])-strtotime($daylist5[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist5[3])) {
						
				 ?>
   <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		  	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+5 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
 			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +5 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+5 day"); ?>">
       
<?php echo date("h:i a",$n); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist5[0]);     $l=0;
					while ($k <=  strtotime($daylist5[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 	  	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+5 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +5 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+5 day"); ?>">

<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }} ?>
					<?php if ($l+$x>5 && $returndate !="" && $daylist5[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+6 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+6 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+6 day"));
				if($returndate !="")
				{
					$daylist6=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime($date1 ."+6 day")));
				if($AppointmentArr['intervalBetween'] >14 && $daylist6[0] !="" &&  $daylist6[3] !=""){
					if($daylist6[1] != "" && $daylist6[2] !="")
					{
				 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <  strtotime($daylist6[1])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
		  	<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+6 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +6 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+6 day"); ?>">

<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist6[2])-strtotime($daylist6[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+6 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>		
					<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +6 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+6 day"); ?>">
		 
           <?php echo date("h:i a",$n); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist6[0]);     $l=0;
					while ($k <=  strtotime($daylist6[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
			<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+6 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +6 day')))  { echo "class='time_active'"; }?>		 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+6 day"); ?>">

<?php echo date("h:i a",$k); ?> </a> <?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  }
} ?>
<?php if ($l+$x>5 && $returndate !="" && $daylist6[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a title="Show More" onclick="return showDown(this.id);" id="00<?php echo $id;?>11"> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        	<div class="cl-row-head"><strong><?php echo date('D',strtotime($date1 ."+7 day"));?></strong><br><?php echo date('m-d-y',strtotime($date1 ."+7 day"));?></div>
            	<?php  $returndate=isBetweenDate($startDate,$AppointmentArr['end_date'],strtotime( $date1 ."+7 day"));
				if($returndate !="")
				{
					$daylist7=	 $appointmentObj->appointmentShedualebydoctorId($id,date('D',strtotime( $date1 ."+7 day")));
					if($AppointmentArr['intervalBetween'] >14 && $daylist7[0] !="" &&  $daylist7[3] !=""){
					if($daylist7[1] != "" && $daylist7[2] !="")
					{
				 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <  strtotime($daylist7[1])) {
						
				 ?>
     <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 			<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+7 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
 			<a title="Appointment Time" <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +7 day')))  { echo "class='time_active'"; }?> href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+7 day"); ?>">
   
<?php echo date("h:i a",$k); ?> </a><?php }?></div>
	          	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}
					$breakinterval=strtotime($daylist7[2])-strtotime($daylist7[1]);
					 $n=$k+$breakinterval;     
					while ($n <=  strtotime($daylist7[3])) {
						
				 ?>
 <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
 		<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+7 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
 			<a title="Appointment Time"   <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +7 day')))  { echo "class='time_active'"; }?>	 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$n."&date=".strtotime($date1 ."+7 day"); ?>">
           
<?php echo date("h:i a",$n); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $n=$n+($AppointmentArr['intervalBetween']*60);
					}
					}
					else{
					 $k=strtotime($daylist7[0]);     $l=0;
					while ($k <=  strtotime($daylist7[3])) {
						
				 ?>
       <div class="cl-time<?php if ($l>5) {?> showMore_00<?php echo $id;?>11<?php }?>" <?php if ($l>5) {?> style="display:none"  <?php }?> >
    			<?php $availabilty=$appointmentObj->checkAvilableTime($id,date('d-m-Y',strtotime($date1 ."+7 day")),date("h:i a",$k));
			if(count($availabilty)==0) {?>	
    			<a title="Appointment Time"   <?php if($_SESSION['AppTime']==$k && date("m-d-y",  $_SESSION['AppDate'])==date("m-d-y",  strtotime($date1 .' +7 day')))  { echo "class='time_active'"; }?>	 href=" <?php echo MODULE_URL."/Appointment/DoctorProfile.php?test=".genRandomPass(3).$id.genRandomPass(2)."&Time=".$k."&date=".strtotime($date1 ."+7 day"); ?>">
  
<?php echo date("h:i a",$k); ?> </a><?php }?></div>
            	
            	<?php 
					$l++;
  $k=$k+($AppointmentArr['intervalBetween']*60);
					}	
					}
					  } } 

 if ($l+$x>5 && $returndate !="" && $daylist7[0] !="") { ?>
				 	<div class="cl-time down_00<?php echo $id;?>11"><a> More </a></div> <?php }?>
        	</div>
            <div class="cl-row">
        		<div class="cl-row-head <?php echo $id;?>"><a href="javascript:"><img src="<?php echo IMAGE_URL;?>/table_arrow_right.png" alt="arrow" id="doctorNext_<?php echo $id;?>" onClick="NextCalender(this)"></a></div>
             	<div style="display:none" class="up_00<?php echo $id;?>11"><a title="Show Less" onclick="return showUp(this.id);" id="00<?php echo $id;?>11" ><img class="up_arrow" src="<?php echo IMAGE_URL;?>/table_arrow_up.png" alt="arrow"></a></div>

        	</div>
        	  
        </div>
      <?php 
        if($returndate =="")
{
	?>
	<div class="not_ava" id="noAvailabliaty">
		 <img src="<?php echo IMAGE_URL."/not-avilability.jpg" ;?>">
	</div>
		
	<?php
}?>
     
     