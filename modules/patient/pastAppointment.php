<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/patient/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");

?>

<script>
function deleteConfirmation(url)
{

	if(url.length && confirm("Are you sure to delete this Appointment?"))
		location.href = url;
}
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
function submitCall()
     {
     	document.getElementById("AccessId").submit();
     }
$(document).ready(function(){ 
	$( "#chatDoc" ).click(function() {
	$("#myModal005").modal('show');
	});
 
       $("#AccessId").submit(function(event) {
          		var accesskey=$("#accessvalue").val();
          		var id=$("#enterid").val();
          	
          		if(!$("#AccessId").validationEngine('validate')){
         event.preventDefault();
          }
          if(accesskey != ""){
          $.ajax({
         type: "POST",
  url: "<?php echo MODULE_URL."/patient/ajax/check_token.php"; ?>" ,
  data: { access: accesskey,id:id }
          }).done(function(msg) {
          
          	if(msg=='0'){
         $("#erro").show();
        
    	 $("#erro").html("Access Key is not valid");
    	 $("#erro").fadeOut(8000, function() {
  
  });
    event.preventDefault();
  }
  else if(msg=='1')
  {
 submitCall();
  }

});
 
        }
          
  
  	 return false;	
 
   
     });
        
          
	});
</script>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
     
      <div class="span4 active"><a href="#"> Appointments</a></div>
      <div class="span4" style="border:none;"><a href="<?php echo MODULE_URL."/patient/dashboard.php"; ?>">Edit Profile</a></div>
      <div class="cls"></div>
    </div>
    <div class="span12 past-app top_do_bg_contant_box">
      <div class="span9">
      	
        <div class="bs-docs-example">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a data-toggle="tab" href="#Appointment">Appointment</a></li>
               <li class=""><a data-toggle="tab" href="#OfficeAppointment"><span class="hide_480">Office Appointment</span><span class="show_480">Office Appointment</span></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div id="Appointment" class="tab-pane fade active in">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
           
             <th class="top_doctor" width="10%"><strong><span class="hide_480">Chat</span><span class="show_480">Ch</span></strong></th>
               <th class="top_doctor" width="10%"><strong><span class="hide_480">Action</span><span class="show_480">Action</span></strong></th>
          </tr>
          <?php 
            $pagination = new pagination($doctorData, (isset($_GET['page']) ? $_GET['page'] : 1), 20);
          	   $doctorData = $pagination->getResults();
          for($i=0;count($doctorData)>$i; $i++) { 
          	
          	?>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong><?php $doctorName=$chatObj->getDoctorName($doctorData[$i]['doctor_id']);
            	echo $doctorName['name'] ?></strong></td>
            <td class="top_doctor wb" width="20%"><strong><?php echo $doctorData[$i]['display_date']; ?></strong></td>
            <td class="top_doctor" width="20%"><strong><?php echo $doctorData[$i]['display_time']; ?></strong></td>
                       <td class="top_doctor" width="20%"><strong>
                       	<?php 
                       	$stattimeforChat=strtotime($doctorData[$i]['display_time']);
						$nowtineforchat =strtotime("now")-($doctorData[$i]['intverval']*60);
						
                       	if($doctorData[$i]['display_date']==date('d-m-Y') && $stattimeforChat >=$nowtineforchat ) {
                       		$chat_id = base64_encode($doctorData[$i]['session_num']);
							 ?>
                       		
                       		<a style="color:white" href="<?php echo MODULE_URL."/chatMD_vid/chatStart.php?doctor=".$_SESSION['AD_admin_user_id']."&accessKey=".$chat_id."&usertype=1";?>" class="pa-info-but">Chat</a>
                       	<?php }?>
                       </strong></td>
                        <td class="top_doctor wb" width="20%"><strong> &nbsp; &nbsp;
            	<a href="javascript:" onclick="deleteConfirmation('<?php echo MODULE_URL."/patient/pastAppointment.php?delete_id=".$doctorData[$i]['session_num']; ?>')"><i class="icon-remove"></i></a></strong></td>
          </tr>
      <?php } ?>
      <tr> <td colspan="4"> <?php  echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks().'</div>';?></td></tr>
        </table>
            </div>
              </div>
              
              <!-- Sandeep 26-03-14 -->
            <div id="OfficeAppointment" class="tab-pane fade">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
               <th class="top_doctor" width="10%"><strong><span class="hide_480">Action</span><span class="show_480">Action</span></strong></th>
          </tr>
          <?php 
            $pagination = new pagination($officeAppointmentData, (isset($_GET['page']) ? $_GET['page'] : 1), 20);
          	   $officeAppointmentData = $pagination->getResults();
			   
			  
          for($i=0;count($officeAppointmentData)>$i; $i++) { 
          	
          	?>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong><?php $doctorName=$chatObj->getDoctorName($officeAppointmentData[$i]['doctor_id']);
            	echo $doctorName['name'] ?></strong></td>
            <td class="top_doctor wb" width="20%"><strong><?php echo $officeAppointmentData[$i]['display_date']; ?></strong></td>
            <td class="top_doctor" width="20%"><strong><?php echo $officeAppointmentData[$i]['display_time']; ?></strong></td>
                       
                        <td class="top_doctor wb" width="20%"><strong> &nbsp; &nbsp;
            	<a href="javascript:" onclick="deleteConfirmation('<?php echo MODULE_URL."/patient/pastAppointment.php?delete_id=".$officeAppointmentData[$i]['session_num']; ?>')"><i class="icon-remove"></i></a></strong></td>
          </tr>
      <?php } ?>
      <tr> <td colspan="4"> <?php  echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks().'</div>';?></td></tr>
        </table>
            </div>
              </div>
            <!-- END  -->
            
            
              <div id="Treatment" class="tab-pane fade">
                ter
              </div>
              <div id="Prescription" class="tab-pane fade">
                opdodps
              </div>
              <div id="Bills" class="tab-pane fade">
                bill
              </div>
            </div>
          </div>
      </div>
      <div class="span3">
        <div class="inner-main-bg">
          <div class="inner_heading_bg">Doctors</div>
          <div class="past-app-sidebar">
          <ul>
          	<?php for($j=0; count($latestDoctor)>$j;$j++) { 
          		
				 $doctorDetails=$settingsObj->getDoctorById($latestDoctor[$j]['doctor_id']) ;
			
		$rgistrationDeatlis=$settingsObj->getDoctorByRegisterId($latestDoctor[$j]['doctor_id']) ;
		
          		?>
            <li class="dr_info">
          	<div class="span1"><?php if($doctorDetails['image'] !="") {?><img src="<?php  echo MODULE_URL."/doctor/upload_file/".$doctorDetails['image']; ?>" alt="picture"><?php }
      	else { ?>
      	<img src="<?php  echo IMAGE_URL."/No_Photo_Available.png"; ?>" alt="picture">	
      <?php 	}?></div>
      		<div class="span3">
        		<div class="do_name"><?php echo $rgistrationDeatlis['name'];?></div>
        		<div class="star"><?php echo  doctorRatting($doctorDetails['Ratting']); ?></div>
        		<div class="do_post"><?php echo $doctorDetails['hospital'];?></div>
        		<div class="do_dis">Specialties : <strong><?php $specilityFindid=$findObj->SpecialtyList($rgistrationDeatlis['patient_id']); 
		for($k=0;count($specilityFindid)>$k;$k++)
		{
			$speciltyName=$pageObj->getSpecialtyById($specilityFindid[$k]['Specialty_id']);
		echo $speciltyName['Specialty_name'];
		if(count($specilityFindid)==$k+1){
			
		}else {
			echo ", ";
		}
		}
		
		 ?></strong></div>
        		<div class="bookonline_but">
        			  <a href="<?php echo MODULE_URL."/search/ajax/makeAppointment.php"; ?>?my_id=<?php echo  $rgistrationDeatlis['patient_id']; ?>" data-toggle="modal"><input type="submit" name="" value="Book Now" class="process"></a>
          			
        	</div>
      		</div>
            </li>
            <?php }?>
          
            </ul>
        	<div class="cls"></div>
          </div>
        </div>
      </div>
    </div>
      	
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<div class="modal hide fade" id="myModal005" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Chat With Doctor</h4>
      </div>
      <div class="modal-body">
 <form action="<?php echo MODULE_URL."/chatMD_vid/chatStart.php"; ?>" method="post" id="AccessId">
 	 <div class="upload_form">
           
           
            <div class="name">Access Keys :</div>
            <div>
              <input name="accessvalue"  id="accessvalue" type="text" class="validate[required]" maxlength="43" data-prompt-position="bottomRight" data-errormessage-value-missing="Access Key requried!"><span></span>
            </div>
             
          
            <div class="name"></div>
            <div><span id="erro" style="display:none;color:red;word-wrap:break-word;margin-left: 154px;"></span></div>
            <div class="name">&nbsp;</div>
            <div>
            	<input type="hidden"  name="payment" value="1">
            	<input type="hidden"  name="doctor" value="<?php echo $_SESSION['AD_admin_user_id'];?>" id="enterid">
          	<input class="process" type="submit" value="Process" name="sub"></span>
        	</div>
            <div class="cls"></div>
         
          
          </div>
 	
 </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>