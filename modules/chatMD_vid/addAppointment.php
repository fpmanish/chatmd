<?php
include_once("../../conf/config.inc.php");
extract($_POST);

if(  !isset($_SESSION['email']))
{
if(!isset($_SESSION['AD_admin_LoggedIn']) ) {
	
	 header("location:".MODULE_URL."/home");
                exit;
}
}
$chatObj=new chat();
$mailObj = new PHPMailer();
$mail = new PHPMailer();
$pageObj = new pageManager();
$EmailTemplate=$pageObj->getEmailById(6);
$settingsObj = new settings();
$userDetalis=$settingsObj->getPatientById($_SESSION['AD_admin_user_id']);



if($payment==1){
	$doctor=$_SESSION['doctorAppointmentId'];
	//$display_date=strtotime($date);
	
	//$display_time=strtotime($time);
	//$intverval=strtotime($timeinterval);
	$currentTimestamp = date("U");
	require_once 'lib/API_Config.php';
	require_once 'lib/OpenTokSDK.php';
	// Creating an OpenTok Object
	$apiObj = new OpenTokSDK( API_Config::API_KEY, API_Config::API_SECRET );
	
	// Creating Simple Session object, passing IP address to determine closest production server
	// Passing IP address to determine closest production server
	//$session = $apiObj->createSession( $_SERVER["REMOTE_ADDR"] );
	//$session = $apiObj->createSession();
	//$sessionId = $session->getSessionId();
	//echo $sessionId;
	//echo "\n";
	// Creating Simple Session object 
	// Enable p2p connections
	$session = $apiObj->createSession(null, array(SessionPropertyConstants::P2P_PREFERENCE=> "enabled"));
	
	// Getting sessionId from Sessions
	// Option 1: Call getSessionId()
	$sessionId = $session->getSessionId();
	// $token = $apiObj->generate_token($sessionId);
	// echo $sessionId."<br>";
	// Option 2: Return the object itself
	// echo $token."<br>";
	$role = RoleConstants::PUBLISHER;
	$expTime = time() + (30*24*60*60);
	$connData = "hello world!";
	//$token = $apiObj->generateToken($sessionId, $role, $expTime, $connData );
	
	$access_token=genRandomPass(15);
	$CheckAccess=$chatObj->CheckAccessToken($access_token);
	if(count($CheckAccess)==0)
	{
		
	
	$dataArr=array("session_id"=>$sessionId,"role"=>$role,"api_key"=>API_Config::API_KEY,"created_date"=>$currentTimestamp,"user_id"=>$_SESSION['AD_admin_user_id']
	,"display_date"=>trim($date),"display_time"=>trim($time),"intverval"=>$timeinterval,"access_token"=>$access_token,"doctor_id"=>$doctor);
	$docDetalis=$settingsObj->getPatientById($doctor);
	$success=$chatObj->ChatAdd($dataArr);
	$phrase  = $EmailTemplate['template_content'];
    $find = array("%username%", "%token%","%date%","%time%","%duration%");
    $repalce   = array(ucfirst($_SESSION['AD_admin_user_name']),$access_token,$date,$time,$timeinterval);
    $replaceDoc=array(ucfirst($docDetalis['name']),$access_token,$date,$time,$timeinterval);
     $newphrase = str_replace($find, $repalce, $phrase);
	  $docphrase = str_replace($find, $replaceDoc, $phrase);
	$mag= '<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>Chat MD</title>

<!-- Hotmail ignores some valid styling, so we have to add this -->
<style type="text/css">

/* iPad Text Smoother */
/* This is the color to change the all the mind green content:  #bd6b6b; */

.ReadMsgBody
{width: 100%; background-color: #f8f8f8;}
.ExternalClass
{width: 100%; background-color: #f8f8f8;}

html
{width: 100%; }

@media only screen and (max-width: 640px) 
		   {
		body{width:auto!important;}
		
		
		table[class=scaleForMobile]		{width: 440px!important; clear: both; }
		table[class=fullWidth]			{width: 100%!important; clear: both;}
		table[class=mobileCenter]		{width: 100%!important; text-align: center!important; clear: both;}
		td[class=mobileCenter]			{width: 440px !important; text-align: center!important; clear: both; }
		span[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=TopTextHeadline]		{width: 100%; font-size: 34px!important; line-height: 38px!important; padding-left: 30px!important; padding-right: 30px!important;}
		td[class=TopText]				{width: 100%; font-size: 16px!important; line-height: 22px!important; padding-left: 30px!important; padding-right: 30px!important;}
		table[class=tableScale1]		{width: 100%!important;}
		td[class=round]					{width: 8%!important;}
		td[class=pad2]					{width: 10px!important;}
		table[class=columnScale]		{width: 400px!important; clear: both;}
		table[class=imageScale1]		{margin-bottom: 20px!important; float: left!important;}				
		table[class=imageScale4]		{width: 160px!important; padding: 0px!important; margin-bottom: 20px; margin-left: 0px!important; text-align: center!important; float: left!important; clear: both;}
		.imageScale4 img 				{padding: 0px!important; text-align: center!important;}
		table[class=tableTextScale]		{width: 400px!important; padding-left: 20px!important; clear: both;}
		table[class=imageScale2]		{margin-bottom: 20px!important; float: left!important;}
		table[class=imageScale3]		{margin-bottom: 20px!important;}		
		td[class=font1]					{padding-left: 5px; padding-right: 5px;}
		table[class=devider]			{width: 440px!important; clear: both;}	
		table[class=textCentered]		{width: 440px; padding-left: 20px; padding-right: 20px;}
		table[class=footerColumn]		{width: 30%!important; padding-left: 5px; clear: both;}
		table[class=footerColumn2]		{width: 30%!important; padding-left: 5px; clear: both;}
		span[class=extaTextForMobile]	{display: none!important;}
		img[class=shadowScale]			{width: 442px!important;}
		table[class=tableTextScale2]	{width: 400px!important; padding-left: 20px!important;}
		.erase {display: none;}
		
		td[class=pad1]					{height: 25px;}
		a[class=navPadLeft]				{margin-right: 20px!important; margin-left: 10px; }
		a[class=navPadMiddle]			{margin-right: 20px!important; margin-left: 20px; }
		a[class=navPadRight]			{margin-right: 10px!important; margin-left: 20px; }
		
		}
		


@media only screen and (max-width: 479px) 
		   {
		body{width:auto!important;}
		
		table[class=scaleForMobile]		{width: 280px!important; }
		table[class=fullWidth]			{width: 100%!important;}
		table[class=mobileCenter]		{width: 100%!important; text-align: center!important; }
		td[class=mobileCenter]			{width: 280px!important; text-align: center!important; }
		span[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=tableScale1]		{width: 240px!important; padding-top: 15px;}
		td[class=round]					{width: 14%!important;}
		table[class=columnScale]		{width: 200px!important;}
		table[class=imageScale1]		{margin-bottom: 20px!important;}
		table[class=tableTextScale]		{width: 200px!important; padding-left: 20px!important; clear: both;}
		table[class=imageScale2]		{margin-bottom: 20px!important;}
		table[class=imageScale3]		{margin-bottom: 20px!important; }
		td[class=font1]					{padding-left: 10px; padding-right: 10px;}
		table[class=devider]			{width: 280px!important;}
		table[class=imageScale1]		{padding-left: 18px!important;}
		img[class=image2]				{width: 236px!important; margin-right: 18px; margin-bottom: 6px;}
		table[class=textCentered]		{width: 280px; padding-left: 20px; padding-right: 20px;}
		table[class=footerColumn]		{width: 100%!important; padding-left: 0px; margin-bottom: 20px; text-align: center!important; clear: both;}
		table[class=footerColumn2]		{width: 100%!important; padding-left: 0px; margin-top: 0px; text-align: center!important; clear: both;}
		span[class=extaTextForMobile]	{display: inherit!important;}
		img[class=shadowScale]			{width: 282px!important;}
		table[class=tableTextScale2]	{width: 240px!important; padding-left: 20px!important;}
		table[class=imageScale4]		{width: 200px!important; padding-left: 20px!important; }
		.erase 							{display: none;}
		td[class=dev]					{width: 40px!important;}
		
		td[class=pad1]					{height: 10px;}
		a[class=navPadLeft]				{margin-right: 15px!important; margin-left: 10px; font-size: 14px!important; }
		a[class=navPadMiddle]			{margin-right: 15px!important; margin-left: 15px; font-size: 14px!important; }
		a[class=navPadRight]			{margin-right: 10px!important; margin-left: 15px; font-size: 14px!important; }
		
		}


</style>
</head>
<body style=" background:#373737;width: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased; padding-bottom:40px;">
<!-- End Wrapper 1 -->
<table width="100%" border="0" cellspacing="0"  cellpadding="0">
<table width="100%" cellspacing="0"  cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;line-height:16px; margin:10px 0px;">
    <tr>
      <td style="padding: 10px 0 10px;text-align: center;"><a href="#" style="font-size:40px; font-family:Arial, Helvetica, sans-serif; color:#f17c00; text-decoration:none;"><img style="padding:0; margin:0; border:none;" src="http://design.fpdemo.com/IR/chatmd/images/logo.png" width="150" height="29" alt="Chat MD"></a></td>
    </tr>
  </table>
<!-- Wrapper 2 (Header) -->
<table cellpadding="0" cellspacing="0" style="border-top:7px solid #E97D01;  border-bottom:7px solid #E97D01;" align="center">
<tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="2">
	<tr>
		<td width="100%" valign="top">		
			
			<!-- Header -->
			<table bgcolor="#fff" width="592" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
            <tr>
            	<td><img style="padding:0; margin:0; border:none;" src="'.IMAGE_URL.'/Banner.jpg" width="100%" height="100%" alt="" /></td>
            </tr>
			</table>
			
		</td>
	</tr>
</table><!-- End Wrapper 2 -->
<!-- Wrapper 4 (Headline) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="4">
	<tr>
		<td width="100%" valign="top">
			
			<!-- Wrapper -->
			<table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" class="scaleForMobile" style="border-left: 1px solid #e9e9e9; border-right: 1px solid #e9e9e9;">
				<tr>
					<td width="590">
						
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
							<tr>
								<td height="20">									
								</td>
							</tr>
						</table>
						
						<!-- Header Text -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
							<tr>
								<td width="20"></td>
								<td width="550" style="font-size: 15px; color: #333333; font-weight: bold; text-align: left; font-family:Arial, sans-serif; line-height: 24px; vertical-align: top;" class="font1">
														
								</td>
								<td width="20"></td>
							</tr>
							<tr>
								<td width="20" height="10"></td>
								<td width="550" height="10"></td>
								<td width="20" height="10"></td>
							</tr>
							<tr>
								<td width="20"></td>
								<td colspan="2" width="550" style="font-size: 13px; color: #000; font-weight: 100; text-align: left; font-family:Arial, Helvetica, sans-serif; line-height: 18px; vertical-align: top;" class="font1">
									'.$newphrase.'
								</td>
						</table>
						
						<!-- Space -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="scaleForMobile">
							<tr>
								<td width="100%" height="20"></td>
							</tr>
						</table>
						
					</td>
				</tr>
                <tr>
                	<td style="text-align:left; padding:20px 0 15px 20px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"></td>
                </tr>
			</table>
						
		</td>
	</tr>
</table><!-- End Wrapper 4 -->

<!-- Wrapper 8 (Devider) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="8">
	<tr>
		<td width="100%" valign="top">
		
			<!-- Wrapper -->
			<table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" class="scaleForMobile" style="border-left: 1px solid #e9e9e9; border-right: 1px solid #e9e9e9; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
					<td width="590">
						
						<!-- Devider -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="devider">
							<tr>
								<td width="20" height="1" class="dev"></td>
								<td width="550" height="1" bgcolor="#e8e8e8"></td>
								<td width="20" height="1" class="dev"></td>
							</tr>
							<tr>
								<td width="20"></td>
								<td width="550" height="10" style="padding: 5px 0; color:#000;"></td>
								<td width="20"></td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
						
		</td>
	</tr>
</table>
</td>
</tr>
</table>
<table width="592" border="0" cellpadding="0" cellspacing="0" bgcolor="#979797" align="center" class="scaleForMobile" style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
					<td width="">
						
						<!-- Devider -->
						<table width="592" border="0" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td bgcolor="#f1f1f1" style="padding:10px 0px;">© 2013 Chat MD All Rights Reserved.</td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
            
 </table>
<!-- End Wrapper -->
</body>
</html>';
$Docmag= '<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>Chat MD</title>

<!-- Hotmail ignores some valid styling, so we have to add this -->
<style type="text/css">

/* iPad Text Smoother */
/* This is the color to change the all the mind green content:  #bd6b6b; */

.ReadMsgBody
{width: 100%; background-color: #f8f8f8;}
.ExternalClass
{width: 100%; background-color: #f8f8f8;}

html
{width: 100%; }

@media only screen and (max-width: 640px) 
		   {
		body{width:auto!important;}
		
		
		table[class=scaleForMobile]		{width: 440px!important; clear: both; }
		table[class=fullWidth]			{width: 100%!important; clear: both;}
		table[class=mobileCenter]		{width: 100%!important; text-align: center!important; clear: both;}
		td[class=mobileCenter]			{width: 440px !important; text-align: center!important; clear: both; }
		span[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=TopTextHeadline]		{width: 100%; font-size: 34px!important; line-height: 38px!important; padding-left: 30px!important; padding-right: 30px!important;}
		td[class=TopText]				{width: 100%; font-size: 16px!important; line-height: 22px!important; padding-left: 30px!important; padding-right: 30px!important;}
		table[class=tableScale1]		{width: 100%!important;}
		td[class=round]					{width: 8%!important;}
		td[class=pad2]					{width: 10px!important;}
		table[class=columnScale]		{width: 400px!important; clear: both;}
		table[class=imageScale1]		{margin-bottom: 20px!important; float: left!important;}				
		table[class=imageScale4]		{width: 160px!important; padding: 0px!important; margin-bottom: 20px; margin-left: 0px!important; text-align: center!important; float: left!important; clear: both;}
		.imageScale4 img 				{padding: 0px!important; text-align: center!important;}
		table[class=tableTextScale]		{width: 400px!important; padding-left: 20px!important; clear: both;}
		table[class=imageScale2]		{margin-bottom: 20px!important; float: left!important;}
		table[class=imageScale3]		{margin-bottom: 20px!important;}		
		td[class=font1]					{padding-left: 5px; padding-right: 5px;}
		table[class=devider]			{width: 440px!important; clear: both;}	
		table[class=textCentered]		{width: 440px; padding-left: 20px; padding-right: 20px;}
		table[class=footerColumn]		{width: 30%!important; padding-left: 5px; clear: both;}
		table[class=footerColumn2]		{width: 30%!important; padding-left: 5px; clear: both;}
		span[class=extaTextForMobile]	{display: none!important;}
		img[class=shadowScale]			{width: 442px!important;}
		table[class=tableTextScale2]	{width: 400px!important; padding-left: 20px!important;}
		.erase {display: none;}
		
		td[class=pad1]					{height: 25px;}
		a[class=navPadLeft]				{margin-right: 20px!important; margin-left: 10px; }
		a[class=navPadMiddle]			{margin-right: 20px!important; margin-left: 20px; }
		a[class=navPadRight]			{margin-right: 10px!important; margin-left: 20px; }
		
		}
		


@media only screen and (max-width: 479px) 
		   {
		body{width:auto!important;}
		
		table[class=scaleForMobile]		{width: 280px!important; }
		table[class=fullWidth]			{width: 100%!important;}
		table[class=mobileCenter]		{width: 100%!important; text-align: center!important; }
		td[class=mobileCenter]			{width: 280px!important; text-align: center!important; }
		span[class=eraseForMobile]		{width: 0; display:none !important;}
		td[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=eraseForMobile]		{width: 0; display:none !important;}
		table[class=tableScale1]		{width: 240px!important; padding-top: 15px;}
		td[class=round]					{width: 14%!important;}
		table[class=columnScale]		{width: 200px!important;}
		table[class=imageScale1]		{margin-bottom: 20px!important;}
		table[class=tableTextScale]		{width: 200px!important; padding-left: 20px!important; clear: both;}
		table[class=imageScale2]		{margin-bottom: 20px!important;}
		table[class=imageScale3]		{margin-bottom: 20px!important; }
		td[class=font1]					{padding-left: 10px; padding-right: 10px;}
		table[class=devider]			{width: 280px!important;}
		table[class=imageScale1]		{padding-left: 18px!important;}
		img[class=image2]				{width: 236px!important; margin-right: 18px; margin-bottom: 6px;}
		table[class=textCentered]		{width: 280px; padding-left: 20px; padding-right: 20px;}
		table[class=footerColumn]		{width: 100%!important; padding-left: 0px; margin-bottom: 20px; text-align: center!important; clear: both;}
		table[class=footerColumn2]		{width: 100%!important; padding-left: 0px; margin-top: 0px; text-align: center!important; clear: both;}
		span[class=extaTextForMobile]	{display: inherit!important;}
		img[class=shadowScale]			{width: 282px!important;}
		table[class=tableTextScale2]	{width: 240px!important; padding-left: 20px!important;}
		table[class=imageScale4]		{width: 200px!important; padding-left: 20px!important; }
		.erase 							{display: none;}
		td[class=dev]					{width: 40px!important;}
		
		td[class=pad1]					{height: 10px;}
		a[class=navPadLeft]				{margin-right: 15px!important; margin-left: 10px; font-size: 14px!important; }
		a[class=navPadMiddle]			{margin-right: 15px!important; margin-left: 15px; font-size: 14px!important; }
		a[class=navPadRight]			{margin-right: 10px!important; margin-left: 15px; font-size: 14px!important; }
		
		}


</style>
</head>
<body style=" background:#373737;width: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased; padding-bottom:40px;">
<!-- End Wrapper 1 -->
<table width="100%" border="0" cellspacing="0"  cellpadding="0">
<table width="100%" cellspacing="0"  cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;line-height:16px; margin:10px 0px;">
    <tr>
      <td style="padding: 10px 0 10px;text-align: center;"><a href="#" style="font-size:40px; font-family:Arial, Helvetica, sans-serif; color:#f17c00; text-decoration:none;"><img style="padding:0; margin:0; border:none;" src="http://design.fpdemo.com/IR/chatmd/images/logo.png" width="150" height="29" alt="Chat MD"></a></td>
    </tr>
  </table>
<!-- Wrapper 2 (Header) -->
<table cellpadding="0" cellspacing="0" style="border-top:7px solid #E97D01;  border-bottom:7px solid #E97D01;" align="center">
<tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="2">
	<tr>
		<td width="100%" valign="top">		
			
			<!-- Header -->
			<table bgcolor="#fff" width="592" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
            <tr>
            	<td><img style="padding:0; margin:0; border:none;" src="'.IMAGE_URL.'/Banner.jpg" width="100%" height="100%" alt="" /></td>
            </tr>
			</table>
			
		</td>
	</tr>
</table><!-- End Wrapper 2 -->
<!-- Wrapper 4 (Headline) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="4">
	<tr>
		<td width="100%" valign="top">
			
			<!-- Wrapper -->
			<table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" class="scaleForMobile" style="border-left: 1px solid #e9e9e9; border-right: 1px solid #e9e9e9;">
				<tr>
					<td width="590">
						
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
							<tr>
								<td height="20">									
								</td>
							</tr>
						</table>
						
						<!-- Header Text -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="scaleForMobile">
							<tr>
								<td width="20"></td>
								<td width="550" style="font-size: 15px; color: #333333; font-weight: bold; text-align: left; font-family:Arial, sans-serif; line-height: 24px; vertical-align: top;" class="font1">
														
								</td>
								<td width="20"></td>
							</tr>
							<tr>
								<td width="20" height="10"></td>
								<td width="550" height="10"></td>
								<td width="20" height="10"></td>
							</tr>
							<tr>
								<td width="20"></td>
								<td colspan="2" width="550" style="font-size: 13px; color: #000; font-weight: 100; text-align: left; font-family:Arial, Helvetica, sans-serif; line-height: 18px; vertical-align: top;" class="font1">
									'.$docphrase.'
								</td>
						</table>
						
						<!-- Space -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="scaleForMobile">
							<tr>
								<td width="100%" height="20"></td>
							</tr>
						</table>
						
					</td>
				</tr>
                <tr>
                	<td style="text-align:left; padding:20px 0 15px 20px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"></td>
                </tr>
			</table>
						
		</td>
	</tr>
</table><!-- End Wrapper 4 -->

<!-- Wrapper 8 (Devider) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobileCenter" name="8">
	<tr>
		<td width="100%" valign="top">
		
			<!-- Wrapper -->
			<table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" class="scaleForMobile" style="border-left: 1px solid #e9e9e9; border-right: 1px solid #e9e9e9; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
					<td width="590">
						
						<!-- Devider -->
						<table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="devider">
							<tr>
								<td width="20" height="1" class="dev"></td>
								<td width="550" height="1" bgcolor="#e8e8e8"></td>
								<td width="20" height="1" class="dev"></td>
							</tr>
							<tr>
								<td width="20"></td>
								<td width="550" height="10" style="padding: 5px 0; color:#000;"></td>
								<td width="20"></td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
						
		</td>
	</tr>
</table>
</td>
</tr>
</table>
<table width="592" border="0" cellpadding="0" cellspacing="0" bgcolor="#979797" align="center" class="scaleForMobile" style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
					<td width="">
						
						<!-- Devider -->
						<table width="592" border="0" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td bgcolor="#f1f1f1" style="padding:10px 0px;">© 2013 Chat MD All Rights Reserved.</td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
            
 </table>
<!-- End Wrapper -->
</body>
</html>';
if(count($docDetalis)>0)
{
  $mailObj->IsHTML(true);
					$mailObj->AddAddress($docDetalis['email']);
					$mailObj->From = "noreplay@ifo.com";
					$mailObj->FromName = $docDetalis['name'];
					$mailObj->Subject = $EmailTemplate['template_title'];
                    
					$mailObj->Body =$Docmag;
						if(!$mailObj->Send()) {

$error_message="Mailer Error: " . $mailObj->ErrorInfo; 

}	
}				
	if($success>0)
	{
	                $mail->IsHTML(true);
					$mail->AddAddress($userDetalis['email']);
					$mail->From ="noreplay@ifo.com";;
					$mail->FromName = $_SESSION['AD_admin_user_name'];
					$mail->Subject = $EmailTemplate['template_title'];
                    
					$mail->Body =$mag;
						if(!$mail->Send()) {

$error_message="Mailer Error: " . $mailObj->ErrorInfo; 

}
					 else {
					 	$_SESSION['Appointment']="confirm";
						 header("Location: ".MODULE_URL."/home");
						 	 exit;
						 
					 }	
	}


}
}
?>