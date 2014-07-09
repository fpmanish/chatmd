<?php ini_set('display_errors', '1');
error_reporting(0);
ini_set('date.timezone', 'America/New_York');
$link = mysql_connect("localhost","km1079_chat123","chatmd@123");
$db_selected = mysql_select_db('km1079_chatmd', $link);
include_once("../../conf/config.inc.php");

 require_once 'lib/API_Config.php';
require_once 'lib/OpenTokSDK.php';
//echo "<pre>";
//print_r($_GET['accessKey']);
$chat_id = trim($_GET['accessKey']);
$chat_id = base64_decode($chat_id);

$queryForAll="select * from tbl_chat where session_num='".$chat_id."'"; 

//echo "<br>".$_SESSION['AD_admin_user_id'];
$qur=mysql_query($queryForAll);

$res = mysql_fetch_assoc($qur);

//echo "<pre>";print_r($res);die;

$time=date("h:i a",time());


	 $use_id=$res['user_id'];
	
	 $doctor_id=$res['doctor_id'];
	
	if(!isset($_SESSION['AD_admin_user_id'])){
		
		echo '<script>window.parent.location.href="'.MODULE_URL.'/home"</script>';
         exit();
		 
	}else if(isset($_SESSION['AD_admin_user_id']) && $_SESSION['AD_admin_user_id']==''){
		
		echo '<script>window.parent.location.href="'.MODULE_URL.'/home"</script>';
         exit();
	}
	
	$user_query="select name,email from  tbl_registration where patient_id=".$use_id;
	$pat_name = mysql_fetch_array(mysql_query($user_query));
    $patient_name=$pat_name['name'];
	
	$doctor_query="select name,email from  tbl_registration where patient_id=".$doctor_id;
	$doc_name = mysql_fetch_assoc(mysql_query($doctor_query));
	$doctor_name=$doc_name['name'];
	$apiKey = $res['api_key'];
	$sessionId = $res['session_id'];
	$token = $res['access_token'];
$currentDate= strtotime("now");
 $today=  date("h:i a",$currentDate);
 $diff1=strtotime($today)-strtotime($res['display_time']);
 
$dbtime=($res['intverval']*60)-$diff1;
$dbexireTime=$res['intverval'].":00";
$check_doctor_id="select doctor_id from tbl_doctor where doctor_id=".$use_id;
//$check_doctor_id="select doctor_id from tbl_doctor where registration_id=".$doctor_id;
$checkByid=mysql_fetch_array(mysql_query($check_doctor_id));
//print_r($checkByid);die;
if( $res['access_token'] =="" )
{
	 if($_GET['doctor']==$res['user_id'] && count($checkByid)==0 ) {
	 	if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
	 	 	
} if($res['doctor_id']==$_GET['doctor'] || count($checkByid)>0 ) {
if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
 }
	
	
}
	if(count($res)==0)
	{
	 if($_GET['doctor']==$res['user_id'] && count($checkByid)==0 ) {
	 	if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
 
} if($res['doctor_id']==$_GET['doctor'] || count($checkByid)>0 ) {

		if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/chatMD/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
 
 }
	
	}
require_once 'chatterEngine.php';
$startTime=$res['display_time'];
$endTime=date("h:i a",strtotime($res['display_time'])+($res['intverval']*60));
$now=date("h:i a",$currentDate);
 if($startTime <= $now && $endTime >= $now) {
         		
         		?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat MD</title>
	
	<link href="<?php echo "../../css/bootstrap.css" ; ?>" rel="stylesheet">
<link href="<?php echo "../../css/bootstrap-responsive.css"; ?> " rel="stylesheet">
<link href="<?php echo "../../css/chatterStyle.css"; ?> " rel="stylesheet">

<script src="http://code.jquery.com/jquery.js"></script> 
             	
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

<script src="<?php echo "../../js/jquery.bootstrap.js" ; ?>"></script>
<script src="<?php echo "../../js/jquery.bootstrap.min.js" ; ?>"></script>
<script src="<?php echo "../../js/jquery.tabSlideOut.v1.3.js" ; ?>"></script>
<script src="<?php echo "../../js/jquery.countdown.js" ; ?>"></script>
<script src="<?php echo "../../js/chatterScript.js" ; ?>"></script>

       
    
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

function slideTab(){
	document.getElementById("handle1").style.position="absolute";
	document.getElementById("handle1").style.right="-3px";
	return false;
}

	
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
function NextCalenderOffice(value)
{
var IDd=value.id;
$("#noAvailabliaty").remove();
var newId= IDd.split('_')[1];
var NDate=$("."+newId).parent().prev().children(".cl-row-head").html().split('<br>')[1];
$("#docTable2_"+newId).hide();
$("#uploadOffice_"+newId).append('<div id="Ajax_upload2" style="text-align: center;"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');

$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_nextOffice.php"; ?>",
  data: {  name: IDd, time: NDate  }
})
  .done(function( msg ) {

  	$("#Ajax_upload2").remove();
  	$("#docTable2_"+newId).remove();
  	$("#uploadOffice_"+newId).append(msg);
  
  });
}

function PriviousCalenderOffice(value)
{
var IDp=value.id;
$("#noAvailabliaty").remove();
var newId= IDp.split('_')[1] ;

var PDate=$("."+newId).parent().next().children(".cl-row-head").html().split('<br>')[1];

$("#docTable2_"+newId).hide();
$("#uploadOffice_"+newId).append('<div id="Ajax_upload2"><img src="<?php echo IMAGE_URL;?>/ajax_loader-2.gif" alt="Uploading...."/></div>');
$.ajax({
  type: "POST",
  url: "<?php echo MODULE_URL."/search/ajax/calende_prevOffice.php"; ?>",
  data: {  name: IDp, time: PDate  }
})
  .done(function( msg ) {
  
  	$("#Ajax_upload2").remove();
  	$("#docTable2_"+newId).remove();
  	$("#uploadOffice_"+newId).append(msg);
  
  });
}
function showDownOffice(vlaue)
{
	$(".showMore_"+vlaue).show();
	$(".up_"+vlaue).show();
	$(".down_"+vlaue).hide();
	$(".nbsp_"+vlaue).show();
}
</script>     
         <script>
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: '<?php echo "http://".$_SERVER['HTTP_HOST'];?>/images/contact_tab.png',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '134px',                               //height of tab image
                 imageWidth: '34px',                               //width of tab image    
                 tabLocation: 'right',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 300,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '144px',                                   //position from the top
                 fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
             });
         });

         </script>
         <script type="text/javascript">
$(document).ready(function(){
	
	var austDay = '<?php echo $dbtime;?>';
	var url ='<?php echo "http://".$_SERVER['HTTP_HOST'];?>';
	//$('#defaultCountdown').countdown({ 
    //until: austDay, onTick: watchCountdown,expiryUrl :url}); 
 
 $('#defaultCountdown').countdown({ 
    until: austDay, onTick: watchCountdown,onExpiry :showScheduleBtn}); 
    
function watchCountdown(periods) { 
    $('#defaultCountdown').text(periods[5] + 
        ' : ' + periods[6] ); 
}

function showScheduleBtn(){
			
			session.disconnect();
			hide('disconnectLink');
			hide('pubControls');
		    hide('newvideoPanel');
			hide('unpubControls');
			hide('deviceManagerControls');
			
			hide('but_bar');
			show('officeAppoint');
		}

});
</script>
<!--slide-tab-->
	<style type="text/javascript">
		input {
			display: inline-block;
		}
		
	</style>
	<script src="http://static.opentok.com/v1.1/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
	 var apiKey    = '<?php echo $apiKey; ?>';// Replace with your API key. See https://dashboard.tokbox.com/projects
  var sessionId = '<?php echo $sessionId;?>';// Replace with your own session ID. See https://dashboard.tokbox.com/projects 
  var token     = '<?php echo $token; ?>';// Replace with a generated token. See https://dashboard.tokbox.com/projects

		

        var subscribers = {};
        var publisher;
		var session;

		var deviceManager;

		// Un-comment either of the following to set automatic logging and exception handling.
		// See the exceptionHandler() method below.
		// TB.setLogLevel(TB.DEBUG);
		TB.addEventListener("exception", exceptionHandler);

		if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) {
			alert("You don't have the minimum requirements to run this application."
				  + "Please upgrade to the latest version of Flash.");
		} else {
			session = TB.initSession(sessionId);

			// Add event listeners to the session
			session.addEventListener("sessionConnected", sessionConnectedHandler);
			session.addEventListener("streamCreated", streamCreatedHandler);
			session.addEventListener("streamDestroyed", streamDestroyedHandler);
			session.addEventListener("streamPropertyChanged", streamPropertyChangedHandler);
		}

		//--------------------------------------
		//  OPENTOK EVENT HANDLERS
		//--------------------------------------
        function sessionConnectedHandler(event) {
            subscribeToStreams(event.streams);

			deviceManager = TB.initDeviceManager(apiKey);

			show('disconnectLink');
			show('pubControls');
			show('deviceManagerControls');
			hide('connectLink');
        }

        function streamCreatedHandler(event) {
            subscribeToStreams(event.streams);
        }

        function streamDestroyedHandler(event) {
			var publisherContainer = document.getElementById("opentok_publisher");
			var videoPanel = document.getElementById("newvideoPanel");
			for (var i = 0; i < event.streams.length; i++) {
				var stream = event.streams[i];
				if (stream.connection.connectionId == session.connection.connectionId) {
					videoPanel.removeChild(publisherContainer);
				} else {
					var streamContainerDiv = document.getElementById("streamContainer" + stream.streamId);
					if(streamContainerDiv) {
						videoPanel = document.getElementById("newvideoPanel")
						videoPanel.removeChild(streamContainerDiv);
					}
				}
			}
        }
		
		function streamPropertyChangedHandler(event)
		{
			var stream = event.stream;
			var audioControls = document.getElementById(stream.streamId + "-audioControls");
			if (audioControls && event.changedProperty == "hasAudio") {
				if (event.newValue == true) {
					audioControls.style.display = "block";
				} else {
					audioControls.style.display = "none";
				}
			} else if (audioControls && event.changedProperty == "hasVideo") {
				if (event.newValue == true) {
					audioControls.style.display = "block";
				} else {
					audioControls.style.display = "none";
				}
			}
		}

		function exceptionHandler(event) {
			alert("Exception: " + event.code + "::" + event.message);
		}

		//--------------------------------------
		//  LINK CLICK HANDLERS
		//--------------------------------------

		/*
		If testing the app from the desktop, be sure to check the Flash Player Global Security setting
		to allow the page from communicating with SWF content loaded from the web. For more information,
		see http://www.tokbox.com/opentok/docs/js/tutorials/helloworld.html#localTest
		*/
		function connect() {
			session.connect(apiKey, token);
			show('but_bar');
		
		}

		function disconnect() {
			session.disconnect();
			hide('disconnectLink');
			hide('pubControls');
		    hide('newvideoPanel');
			hide('unpubControls');
			hide('deviceManagerControls');
			
			hide('but_bar');
			show('officeAppoint');
			
		}
		
		

		// Called when user wants to start publishing to the session
		function startPublishing() {
			if (!publisher) {
				var containerDiv = document.createElement('div');
				containerDiv.className = "subscriberContainer";
				containerDiv.setAttribute('id', 'opentok_publisher');
				containerDiv.style.float = "left";
				var videoPanel = document.getElementById("newvideoPanel");
				videoPanel.appendChild(containerDiv);
				
				var publisherDiv = document.createElement('div'); // Create a div for the publisher to replace
				publisherDiv.setAttribute('id', 'replacement_div')
				containerDiv.appendChild(publisherDiv);
				
				var publisherProperties = new Object();
				var publisherProperties = {width: 215, height:138};
				if (document.getElementById("pubAudioOnly").checked) {
					publisherProperties.publishVideo = false;
				}
				if (document.getElementById("pubVideoOnly").checked) {
					publisherProperties.publishAudio = false;
				}
				
				publisher = TB.initPublisher(apiKey, publisherDiv.id, publisherProperties);
				session.publish(publisher); 
													// Pass the replacement div id to the publish method
				var publisherControlsDiv = getPublisherControls();
				publisherControlsDiv.style.display = "block";
				containerDiv.appendChild(publisherControlsDiv);

				show('unpubControls');
				show('newvideoPanel');
				hide('pubControls');
			}
		}

		function stopPublishing() {
		
			if (publisher) {
				session.unpublish(publisher);
			}
			publisher = null;
			hide('newvideoPanel');
			show('pubControls');
			hide('unpubControls');
		}


		//--------------------------------------
		//  HELPER METHODS
		//--------------------------------------
        function subscribeToStreams(streams) {
			for (var i = 0; i < streams.length; i++) {
                var stream = streams[i];
                if (stream.connection.connectionId == session.connection.connectionId) {
						pubAudioOnly = document.getElementById("pubAudioOnly");
						pubVideoOnly = document.getElementById("pubVideoOnly"); 
                        if (pubVideoOnly.checked) {
							show("audioOn");
						} else {
							show("audioOff");
						}
                        if (pubAudioOnly.checked) {
							show("videoOn");
						} else {
	                        show("videoOff");
						}
                        return;
                }

                var containerDiv = document.createElement('div'); // Create a container for the subscriber and its controls
				containerDiv.className = "subscriberContainer";
                var divId = stream.streamId;    // Give the div the id of the stream as its id
                containerDiv.setAttribute('id', 'streamContainer' + divId);
				var videoPanel = document.getElementById("videoPanel");
                videoPanel.appendChild(containerDiv);

				var subscriberDiv = document.createElement('div'); // Create a replacement div for the subscriber
                subscriberDiv.setAttribute('id', divId);
				subscriberDiv.style.cssFloat = "bottom";
				containerDiv.appendChild(subscriberDiv);
				 var subscriberProps = {width: 576, 
                                            height: 370, 
                                            };
                subscribers[stream.streamId] = session.subscribe(stream, divId,subscriberProps);

				var actionDiv = document.createElement('div');
				var streamId = stream.streamId
                actionDiv.setAttribute('id', 'action-'+streamId);
				actionDiv.style.float = "bottom";
                actionDiv.style.borderStyle = "solid 1px black";
				
				var audioControlsDisplay;
				if (stream.hasAudio) {
					audioControlsDisplay = "block";
				} else {
					audioControlsDisplay = "none";
				}
				var videoControlsDisplay;
				if (stream.hasVideo) {
					videoControlsDisplay = "block";
				} else {
					videoControlsDisplay = "none";
				}
                // actionDiv.innerHTML = 
					// '<span id="' + streamId +'-audioControls" style="display:' + audioControlsDisplay + '"> \
					// <a href="#" id="'+streamId+'-audioOff" onclick="turnOffHerAudio(\''+streamId+'\');" style="display:block">Turn off audio<\/a>\
				   // <a href="#" id="'+streamId+'-audioOn" onclick="turnOnHerAudio(\''+streamId+'\')" style="display:none">Turn on audio<\/a>\
				   // <\/span> \
					// <span id="' + streamId +'-videoControls" style="display:' + videoControlsDisplay + '"> \
				   // <a href="#" id="'+streamId+'-videoOff" onclick="turnOffHerVideo(\''+streamId+'\')" style="display:block">Turn off video<\/a>\
				   // <a href="#" id="'+streamId+'-videoOn" onclick="turnOnHerVideo(\''+streamId+'\')" style="display:none">Turn on video<\/a>\
				   // <\/span>';

                containerDiv.appendChild(actionDiv);
            }
        }

		function getPublisherControls() {
			sessionControlsDiv = document.createElement('div');
        	// sessionControlsDiv.innerHTML = 
				// '<a href="#" id="audioOff" onClick="turnOffMyAudio(); return false;" style="display:none;">Turn off my audio<\/a>' +
        		// '<a href="#" id="audioOn" onClick="turnOnMyAudio(); return false;" style="display:none;">Turn on my audio<\/a>' +
        		// '<a href="#" id="videoOff" onClick="turnOffMyVideo(); return false;" style="display:none;">Turn off my video<\/a>' +
        		// '<a href="#" id="videoOn" onClick="turnOnMyVideo(); return false;" style="display:none;">Turn on my video<\/a>'
			return sessionControlsDiv;
		}
        function turnOffHerVideo(streamId) {
                var subscriber = subscribers[streamId];
                subscriber.subscribeToVideo(false);

                hide(streamId+"-videoOff");
                show(streamId+"-videoOn");
        }

        function turnOnHerVideo(streamId) {
                var subscriber = subscribers[streamId];
                subscriber.subscribeToVideo(true);

                hide(streamId+"-videoOn");
                show(streamId+"-videoOff");
        }

        function turnOffHerAudio(streamId) {
                var subscriber = subscribers[streamId];
                subscriber.subscribeToAudio(false);

                hide(streamId+"-audioOff");
                show(streamId+"-audioOn");
        }

        function turnOnHerAudio(streamId) {
                var subscriber = subscribers[streamId];
                subscriber.subscribeToAudio(true);

                hide(streamId+"-audioOn");
                show(streamId+"-audioOff");
        }

        function turnOffMyVideo() {
            publisher.publishVideo(false);

            hide("videoOff");
            show("videoOn");
        }

        function turnOnMyVideo() {
            publisher.publishVideo(true);

            hide("videoOn");
            show("videoOff");
        }

        function turnOffMyAudio() {
            publisher.publishAudio(false);

            hide("audioOff");
            show("audioOn");
        }

        function turnOnMyAudio() {
            publisher.publishAudio(true);

            hide("audioOn");
            show("audioOff");
        }

		function toggleMicSettings() {
			deviceManager.showMicSettings = !deviceManager.showMicSettings;
		}

		function toggleCamSettings() {
			deviceManager.showCamSettings = !deviceManager.showCamSettings;
		}

		//--------------------------------------
		//  UTILITY METHODS
		//--------------------------------------
		function show(id) {
			document.getElementById(id).style.display = 'block';
		}

		function hide(id) {
			document.getElementById(id).style.display = 'none';
		}

    </script>
    <script>
    	$(document).ready(function(){
    		$("#emailNote").submit(function(e){
    var postData = $(this).serialize();
   $.ajax({
        type: 'POST',
        url: '<?php echo MODULE_URL."/chatMD_vid/ajax/send_email.php";?>',
        data: postData,
        success: function(response){
        	
            $('#suceeSend').html(response);
        },
        error: function(){
            alert('error');
        }
    });
    e.preventDefault();
   
    	});
    	});
    </script>
</head>
<body>
	<!--| Nav Start |-->
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      
      <a class="brand" href="<?php echo DEFAULT_URL;?>"><img src="<?php echo IMAGE_URL;?>/logo.png" width="150" height="29" alt="logo"></a>
      <div id="Navi2">
        <ul class="menu">
        	
          <li class="first"><a href="<?php echo MODULE_URL."/Login/logout.php";?>"><span class="hide767">Logout</span><span class="show767"><img style="margin:0;" src="<?php echo IMAGE_URL;?>/key.png" width="21" height="20" alt="key_icon"></span></a></li>
          <?php if($_GET['usertype']==1)
		{?>
          <li><a href="<?php echo MODULE_URL."/patient/dashboard.php";?>"><span class="hide767">My Account</span><span class="show767"><img src="<?php echo IMAGE_URL;?>/lock.png" width="16" height="20" alt="Lock_icon"></span></a></li>
       <?php } ?>
        <?php if($_GET['usertype']==2)
		{?>
          <li><a href="<?php echo MODULE_URL."/doctor/dashboard.php";?>"><span class="hide767">My Account</span><span class="show767"><img src="<?php echo IMAGE_URL;?>/lock.png" width="16" height="20" alt="Lock_icon"></span></a></li>
       <?php } ?>
        </ul>
      </div>
      <button style="background:none; box-shadow:none; border:none" type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <img src="<?php echo IMAGE_URL;?>/Icon_menu.png" alt="icon"></button>
      
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="home-icon-hide"><a href="<?php echo IMAGE_URL;?>" style=" padding: 6px 9px 9px 10px;margin: 0 14px 0 0;"> <img src="<?php echo IMAGE_URL;?>/Home_icon_inner.png" width="16" height="17" alt="icon"></a></li>
          <li><a href="<?php echo MODULE_URL."/search";?>">Find a Doctor</a></li>
          <li><a href="<?php echo MODULE_URL."/blog/index.php";?>">Patient & Doctor Blog</a></li>
          <li><a href="<?php echo MODULE_URL."/cms/about_us.php";?>">About Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--| Nav End |--> 
	
   <!--| Contant Start |-->

<div class="container">
  <div class="row">
    <div class="span12 top_do_bg">
      <div class="span4" style="border:none">Dr. <?php echo $doctor_name; ?></div>
      <div class="span4 hide767" style="border:none"></div>
      <div class="span4 active" style="border:none;">Welcome : <?php echo $patient_name; ?></div>
      <div class="cls"></div>
    </div>
    <div class=" span12 top_do_bg_contant_box">
      <div class="span12 upload_image_head">Video Calling</div>
       <div class="chat">
       	 <div class="span8">
         	<div class="video_box" >
         		<div id="sessionControls">
       	<input type="button" class="publish_but" value="Connect" id ="connectLink" onClick="connect()" style="display:block" />
       	
	</div>
	<div id ="pubControls" style="display:none">
        <form id="publishForm"> 
           <div class="publish"> <input type="button" class="publish_but" value="Start Publishing" onClick="startPublishing()" /></div>
             <!-- <div class="on-off-audio ohyes"><a href="#">Turn On Audio</a></div>
                <div class="on-off-video ohno"><a href="#">Turn On Video</a></div> -->
            <div class="chat_redio" style="display:none">
           
           <div class="fl"><input type="radio" id="pubAV" name="pubRad" class="regular-radio" checked="checked"><label for="radio-1-1"></label></div><div class="fl mr-right20"></div>
					<div class="fl"><input type="radio" id="pubAudioOnly" name="pubRad"  class="regular-radio"><label for="radio-1-2"></label></div><div class="fl mr-right20"></div>
                    <div class="fl"><input type="radio" id="pubVideoOnly" name="pubRad" class="regular-radio"><label for="radio-1-3"></label></div><div></div>
             <div class="cls"></div>
            </div>
        </form>
    </div>
            	
              
            	  <div id ="unpubControls" style="display:none">
        <input type="button" value="Stop Publishing" onClick="stopPublishing()" class="publish_but" style="display:block"/>
    </div>
    <div id="deviceManagerControls" style="display:none">
		<form id="dmForm">
			<label for="showMic"></label><input type="checkbox" id="showMic" name="showMic" checked="checked" onclick="toggleMicSettings();" />
			<label for="showCam"></label><input type="checkbox" id="showCam" name="showCam" checked="checked" onclick="toggleCamSettings();" />
		</form>
	</div> 
	 <div class="second_vedio" id="newvideoPanel" style="display:none">
                	
                </div>
                <div class="chat_vedio" id="videoPanel" style="display:block">
                	
                </div>
               
                <div class="cls"></div>
            </div>
           <div class="but_bar" id="but_bar" style="display:none">
           	<div class="end_call"><input type="button" class="end_call_but" value="Leave" id ="disconnectLink" onClick="disconnect()" style="display:none" /></div>
            <div class="countdown" ><span id="defaultCountdown">0:00 </span><span>/<?php echo $dbexireTime; ?></span></div>
            <div class="cls"></div>
           </div>
           
           <div class="officeAppoint" style="padding:10px;">
           	<a href="<?php echo MODULE_URL."/search/ajax/makeofficeAppointment.php"; ?>?my_id=<?php echo  $res['doctor_id']; ?>" data-toggle="modal"><input type="button" class="end_call_but" value="Schedule in-office time with the doctor now" id ="officeAppoint"  style="display:none" /></a>
           </div>
           
		   <div class="chat_box">
       	    <div class="date"> <?php  echo date('d-M-Y',strtotime("now")); ?> </div>
           
             <ul id="chatMessageList" class="chatMessageList class="show_chat"></ul>
	
	<form action="chatterEngine.php" method="post" id="formPostChat">
		<fieldset>
			<label for="postUsername"></label>
			<input type="hidden" id="postUsername" value="<?php  if($_GET['doctor']==$res['user_id'] ) {echo $patient_name;}
			if($res['doctor_id']==$_GET['doctor']) {echo $doctor_name; }?>" />
			<input type="hidden" id="pu" value="<?php echo $res['user_id']; ?>" >
			<input type="hidden" id="du" value="<?php echo $res['doctor_id']; ?>" >
		</fieldset>
		<fieldset>
			<textarea id="postText" cols="" rows="" placeholder="type your message"></textarea>
		</fieldset>
		<fieldset>
			<input type="submit" value="Reply" class="reply-but" />
			<span class="errorMessage" id="postError"></span>
		</fieldset>
	</form>
             
             <div class="chat-but">
             	<form action="tcpdf/examples/example_006.php" method="post" id="download">
             		<input type="hidden" name="du" value="<?php echo $res['doctor_id']; ?>" >
                      <input type="submit" name="" value="Download Chat" class="process" >
            </form>
            </div>
            
            <div class="chat-but">
            <?php 
           $chatobj=new chat();
	       $data=	$chatobj->GetPatientimage($res['session_num']);
		  //echo "<pre>";print_r($data);
		  
	       for($i=1,$counter =count($data); $i<count($data);$i++)
	    {
		?>
		<a class="group" href="<?php echo DEFAULT_URL ;?>/upload/<?php echo $data[$i]['images']; ?>" title=""></a>

            
            <?php }if($counter>0){
		?>
		<div class="span1"><a class="group" href="<?php echo DEFAULT_URL ;?>/upload/<?php echo $data[0]['images']; ?>" title=""><input type="button" name="" value="View Images" class="publish_but" style="padding:7px;"></a></div>
           
           <?php } ?>   	
           
            </div>
            
            <div class="cls"></div>
           </div>
           
         </div>
       </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<!--slide-tab-->
<div class="slide-out-div" id="handle1">
	<form name="emailNote" method="post" id="emailNote" action="">
	<div class="tab_inner">
    	<a class="handle" href="#">Content</a>
        <h3>Impotant Notes<span style="float:right;color:red" id="suceeSend"> </span></h3>
        <p><input name="email" type="text" readonly="readonly" value="<?php   if($_GET['doctor']==$res['user_id'] ) {echo $pat_name['email'];} if($res['doctor_id']==$_GET['doctor']) {echo $doc_name['email']; } ?>" ></p>
        <p><textarea name="notes" cols="" rows="" placeholder="Enter Your message"></textarea></p>
        <p><input name="" type="submit" value="Send"></p>
    </div>
    </form>
</div>
<!--slide-tab-->  

    <!--| footer Start |-->
<div class="Foot">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="span6 Navi3"> <a href="<?php echo DEFAULT_URL;?>">Home</a> <a href="<?php echo MODULE_URL."/search";?>">Find a Doctor</a>  
          	<a href="<?php echo MODULE_URL."/blog/index.php";?>">Patient & Doctor Blog</a> <a href="<?php echo MODULE_URL."/doctor/about_us.php";?>">About Us</a>
            <div class="cls"></div>
          </div>
          <div class="span6 Copyright">© 2013 Chat MD All Rights Reserved.</div>
        </div>
      </div>
    </div>
    <div class="cls"></div>
  </div>
<!--| footer End |--> 

<!-- Colorbox -->

<script src="<?php echo JS_URL; ?>/jquery.colorbox.js"></script>

 <script>
$(document).ready(function(){
	$(".group").colorbox({rel:'group'});
});
</script>
 <link rel="stylesheet" href="<?php echo CSS_URL; ?>/colorbox.css" type="text/css" />
<!-- End Colorbox -->


</body>
</html>
 <?php } else {
	  if($_GET['doctor']==$res['user_id'] && count($checkByid)==0 ) {
	  if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
 } if($res['doctor_id']==$_GET['doctor'] || count($checkByid)>0 ) {
if($_GET['usertype']==2)
		{
			 header("location:http://chat-md.com/modules/doctor/Accounts.php?dsett=1");
                exit;	
		}
		else if($_GET['usertype']==1)
			{
				header("location:http://chat-md.com/modules/patient/pastAppointment.php?psett=1");
                exit;
			}
 }
 	
 	
 }?>