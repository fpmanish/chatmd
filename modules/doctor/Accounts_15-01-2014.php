<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/patient/code/appointment_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
  function submitCall()
     {
     	document.getElementById("AccessId").submit();
     }
$(document).ready(function(){ 	$( "#chatDoc" ).click(function() {	$("#myModal005").modal('show');	});	    
	$("#AccessId").submit(function(event) {
          		var accesskey=$("#accessvalue").val();
          		var id=$("#enterid").val();
          		if(!$("#AccessId").validationEngine('validate')){
         event.preventDefault();
          }
          if(accesskey != ""){
          $.ajax({
         type: "POST",
  url: "<?php echo MODULE_URL."/doctor/ajax/check_token.php"; ?>" ,
  data: { access: accesskey, id:id }
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
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/Appointment.php"; ?>">Appointments</a></div>
      <div class="span2" style="border:none;"><a href="#">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <div class="span12 past-app top_do_bg_contant_box">
      <div class="bs-docs-example">
            <ul class="nav nav-tabs" id="myTab">
              <li class=""><a data-toggle="tab" href="#Patients"><span class="hide_480">Patients List</span><span class="show_480">Pre</span></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div id="Billing" class="tab-pane fade active in">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
            <th class="top_doctor" width="10%"><strong><span class="hide_480">Status</span><span class="show_480">St</span></strong></th>              <th class="top_doctor" width="10%"><strong><span class="hide_480">Chat</span><span class="show_480">St</span></strong></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Hugo Rosero</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="20%"><strong>Cancel</strong></td>             <td class="top_doctor" width="20%"><strong><button   id="chatDoc">Chat</button></strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Maurice Rachko</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Joseph Tawil</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="10%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Edward Bernaski</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
        </table>
            </div>
              </div>
              <div id="Transactions" class="tab-pane fade">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
            <th class="top_doctor" width="10%"><strong><span class="hide_480">Status</span><span class="show_480">St</span></strong></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Hugo Rosero</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="20%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Maurice Rachko</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Joseph Tawil</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="10%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Edward Bernaski</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
        </table>
            </div>
              </div>
              <div id="Patients" class="tab-pane fade">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
            <th class="top_doctor" width="10%"><strong><span class="hide_480">Status</span><span class="show_480">St</span></strong></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Hugo Rosero</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="20%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Maurice Rachko</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Joseph Tawil</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="10%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Edward Bernaski</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
        </table>
            </div>
              </div>
              <div id="Payments" class="tab-pane fade">
                <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="30%"><strong><span class="hide_480">Doctor's Name</span><span class="show_480">Dr Name</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Date</span><span class="show_480">App Date</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Appointment Time</span><span class="show_480">App Time</span></strong></th>
            <th class="top_doctor" width="10%"><strong><span class="hide_480">Status</span><span class="show_480">St</span></strong></th>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Hugo Rosero</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="20%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Maurice Rachko</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Joseph Tawil</strong></td>
            <td class="top_doctor wb" width="20%"><strong>22.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>10:30 am</strong></td>
            <td class="top_doctor" width="10%"><strong>Cancel</strong></td>
          </tr>
          <tr class="top_doctor">
            <td class="top_doctor" width="30%"><strong>Dr. Edward Bernaski</strong></td>
            <td class="top_doctor wb" width="20%"><strong>25.11.2013</strong></td>
            <td class="top_doctor" width="20%"><strong>07:30 pm</strong></td>
            <td class="top_doctor" width="10%"><strong>Confirm</strong></td>
          </tr>
        </table>
            </div>
              </div>
            </div>
          </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> <div class="modal fade" id="myModal005" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  <div class="modal-dialog">    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
	<h4 class="modal-title" id="myModalLabel">Chat With Doctor</h4>      </div>      
	<div class="modal-body"> <form action="<?php echo MODULE_URL."/chatMD_vid/chatStart.php"; ?>" method="post" id="AccessId"> 	 
		<div class="upload_form">                                  
			<div class="name">Access Keys :</div>            <div>              
			<input name="accessvalue" id="accessvalue" type="text" class="validate[required]" maxlength="43" data-prompt-position="bottomRight" data-errormessage-value-missing="Access Key requried!">
			</div>   
			                              
			<div class="name"></div>            
			<div><span id="erro" style="display:none;color:red;word-wrap:break-word;margin-left: 154px;"></span>  </div>  
			      
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
			 		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>           </div>    </div><!-- /.modal-content -->  </div><!-- /.modal-dialog --></div><!-- /.modal -->

<?php include_once(INCLUDES_DIR."/footer.php") ; ?>