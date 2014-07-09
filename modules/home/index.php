<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/home/code/home_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
$(document).ready(function() {
  
    $('#Video_but').click(function () {
 document.getElementById('iframe').src = 
document.getElementById('iframe').src.replace('autoplay=0','autoplay=1');
  
        $('#video').show();
        $('#HideVidoes').show();
        
    });

    $('#HideVidoes').click(function () {
    	document.getElementById('iframe').src = 
document.getElementById('iframe').src.replace('autoplay=1','autoplay=0');
    $('#video').hide();
        $('#HideVidoes').hide();
       
    });
     $('#Save_time').click(function () {
      
        $('#myModal').modal('show');
        
    });

    $('#myModal button').click(function () {
      $('#myModal').modal('hide');
    });
     $('#Save_money').click(function () {
      
        $('#myModal1').modal('show');
        
    });

    $('#myModal1 button').click(function () {
      $('#myModal1').modal('hide');
    });
     $('#Be_safe').click(function () {
      
        $('#myModal2').modal('show');
        
    });

    $('#myModal2 button').click(function () {
      $('#myModal2').modal('hide');
    });
     <?php
      if(isset($_SESSION['Regististrstion'])){ ?>
   	 $('#myModal00').modal('show');
  <?php unset($_SESSION['Regististrstion']); }?>
  <?php if(isset($_SESSION['emailSend']) ) { ?>
	 $('#myModal33').modal('show');
<?php 
unset($_SESSION['emailSend']);
 }?>
 <?php if(isset($_SESSION['Appointment']) ) { ?>
	 $('#myModal005').modal('show');
<?php 
unset($_SESSION['Appointment']);
 }?>
 
 <?php if(isset($_SESSION['AppointmentFix']) ) { ?>
	 $('#myModal006').modal('show');
<?php 
unset($_SESSION['AppointmentFix']);
 }?>

 <?php 
  if(isset($_SESSION['PatientImage']) ) { ?>
	 $('#myModal007').modal('show');
<?php $chat_id = $_SESSION['ChatId'];
unset($_SESSION['PatientImage']);
unset($_SESSION['ChatId']);

 }
 
 ?> 
 
 <?php 
  if(isset($_SESSION['PayError']) ) { ?>
	 $('#myModal008').modal('show');
<?php 
unset($_SESSION['PayError']);
 }?>
 
 
   });
</script>
<script>
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
<!--| Content Start |-->
<div class="">
	  <div style="position:relative">
	  	<span id="HideVidoes" style="display: none; cursor: pointer" class="video-close"><img src="<?php echo IMAGE_URL;?>/close.png" alt="icon" ></span>
  <div class="video" style="display:none" id="video">
  
    <div class="video-container"  >
      <iframe class="" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/<?php  echo $videoList[0]['vidoes_embedcode']; ?>?autoplay=0" id="iframe"></iframe>
    </div>
  </div>
  </div>
  <div id="Banner">
    <div id="Image"> <img src="<?php echo IMAGE_URL;?>/home.jpg" alt="banner"> </div>
    <div class="content">
      <h1>Chat Online with a Doctor Today</h1>
      <h4>Schedule secure video appointments with qualified doctors and nutritionists anytime from the comfort of your home.</h4>
      <div id="Video_but"><a href="#"><img src="<?php echo IMAGE_URL;?>/video_but.png" width="57" height="56" alt="button"></a></div>
      <h3>Watch video</h3>
    </div>
  </div>
  <div class="Top">
    <div class="container">
    	<form action="<?php echo MODULE_URL."/search/"; ?>" method="post" name="search">
      <div class="row">
        <div class="span12">
          <h2>Find a Doctor</h2>
        </div>
        <div class="Search">
          <div class="span5 mainsel">
            <label>
              <select name="speciality">
              	<option value=""> Select a speciality</option>
                 <?php for($i=0;count($SpecialtyListArr)>$i;$i++){?>
                  			<option value="<?php echo $SpecialtyListArr[$i]['Specialty_id']; ?>" > <?php echo $SpecialtyListArr[$i]['Specialty_name']; ?> </option>
                  			<?php }?>
              </select>
            </label>
          </div>
          <div class="span5 mainsel" >
            <label>
              <select name="reason">
              	 <option selected value=""> Reason for chat ( anuresis, sickness. etc ) </option>
                <?php for($i=0;count($ReasonListArr)>$i;$i++){?>
                  			<option value="<?php echo $ReasonListArr[$i]['id']; ?>" <?php if ($chatReason ==$ReasonListArr[$i]['id']) {echo "selected=selected"; }?>  > <?php echo $ReasonListArr[$i]['chatReason']; ?> </option>
                  			<?php }?>
              </select>
            </label>
          </div>
          <div class="span2 Search_but">
            <div class="image"><img src="<?php echo IMAGE_URL;?>/Search_but.png" width="28" height="29" alt="but"></div>
            <input type="hidden" name="action" type="submit" value="HomeSearch">
            <input name="" type="submit" value="Search for Appointment">
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
  <div class="Bottom">
    <div class="container">
      <div class="row">
        <div class="span4 Box">
          <h2><?php echo $SAVE_TIME['page_title']; ?></h2>
          <div class="image"><img src="<?php echo  ADMIN_MODULE_URL."/cms/Image/".$SAVE_TIME['image']; ?>" width="60" height="68" alt="watch"></div>
          <div class="text"><?php  $timestring=$SAVE_TIME['page_description']; $timestring1=$SAVE_TIME['short_description'];
          $strLen= strlen($SAVE_TIME['short_description']); if($strLen >200){ echo substr($timestring1,0,200); ?> <strong><a href="#"  id="Save_time" >Read more...</a></strong>
          
          <?php } else {
          	echo $SAVE_TIME['short_description'];
          }?></div>
        </div>
        <div class="span4 Box">
          <h2><?php echo $SAVE_MONEY['page_title']; ?></h2>
          <div class="image"><img src="<?php echo  ADMIN_MODULE_URL."/cms/Image/".$SAVE_MONEY['image']; ?>" width="77" height="68" alt="Piggybank"></div>
          <div class="text"><?php  $moneytring=$SAVE_MONEY['page_description']; $moneytring1=$SAVE_MONEY['short_description'];
          $strLen= strlen($SAVE_MONEY['page_description']); if($strLen >200){ echo substr($moneytring1,0,200); ?> <strong><a href="#" id="Save_money"> Read more...</a></strong><?php } else {
          	echo $SAVE_MONEY['short_description'];
          }?></div>
        </div>
        <div class="span4 Box">
          <h2><?php echo $BE_SAFE['page_title']; ?></h2>
          <div class="image"><img src="<?php echo  ADMIN_MODULE_URL."/cms/Image/".$BE_SAFE['image']; ?>" width="87" height="59" alt="Be_safe"></div>
          <div class="text"> <?php  $savetring=$BE_SAFE['page_description']; $savetring1=$BE_SAFE['short_description'];
          $strLen= strlen($BE_SAFE['page_description']); if($strLen >200){ echo substr($savetring1,0,200); ?> <strong><a href="#" id="Be_safe"> Read more...</a></strong><?php } else {
          	echo $BE_SAFE['short_description'];
          }?></div>
        </div>
      </div>
    </div>
  </div>
  
    <!--| SAVE TIME Model |--> 
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $SAVE_TIME['page_title']; ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo  $SAVE_TIME['page_description'];?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
   
  </div>
</div>
  <!--| SAVE Monery Model |--> 
    <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $SAVE_MONEY['page_title']; ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo  $SAVE_MONEY['page_description'];?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
   
  </div>
</div>
  <!--|  BE SAFE Model |--> 
    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $BE_SAFE['page_title']; ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo  $BE_SAFE['page_description'];?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
   
  </div>
</div>
<!-- Modal -->
<div class="modal hide fade" id="myModal00" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $RegMessage['message_title']; ?></h4>
      </div>
      <div class="modal-body">
      <?php echo $RegMessage['message_content']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal hide fade" id="myModal33" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $Message['message_title']; ?></h4>
      </div>
      <div class="modal-body">
  <?php echo $Message['message_content']; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal hide fade" id="myModal005" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $confirm['message_title']; ?></h4>
      </div>
      <div class="modal-body">
  <?php echo $confirm['message_content']; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Office Appointment POPUP -->
<div class="modal hide fade" id="myModal006" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo 'Appointment Confirm'; ?></h4>
      </div>
      <div class="modal-body">
  <?php echo 'Your Office Appointment has been confirmed'; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal hide fade" id="myModal007" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $confirm['message_title']; ?></h4>
      </div>
      <div class="modal-body" style="overflow:hidden;">
      	<?php echo $confirm['message_content']; ?>
      	<br /><br />
          <form action="<?php echo MODULE_URL."/Appointment/patient-image.php"; ?>" method="post" name="patient_imade_form" id="patient_imade_form" enctype="multipart/form-data">
      		<div class="span12 error" id="erorr"> <?php //echo $error_message;?> </div>
            <div class="name">Upload Images Display During Chat :</div>
            <div class="ragi-input">
				<input name="patient_image[]" type="file" value="" class="validate[required]" multiple="multiple">
			</div>
			<div class="cls"></div>
             <div class="ragi-but" style="margin-left:5px;">
             <input type="hidden" name="action" value="insert" />
             <input type="hidden" name="chat_id"  value="<?php echo $chat_id;?>"/>
             <input type="submit" class="process" value="save" name="" >
             </div>
             <div class="cls"></div>
           </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal hide fade" id="myModal008" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo 'Payment Not Completed'; ?></h4>
      </div>
      <div class="modal-body">
  <?php echo 'Your Appointment not confirm now ,Please Try again!'; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include_once(INCLUDES_DIR."/footer.php") ; ?>