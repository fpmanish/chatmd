<?php 

extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$mailObj = new PHPMailer();
$pageType = "sign";
$EmailCount=$settingsObj->getPatientByName($email);
$SpecialtyListArr=$settingsObj->SpecialtyList(1);
$CountryListArr=$settingsObj->CountryList();
 $EmailTemplate=$pageObj->getEmailById(1);
 $loginObj= new LoginSystem();
$findObj = new find();
//$_SESSION['tmp_name'] =$full_name;
	//$_SESSION['tmp_email'] =$email;
	//$_SESSION['tmp_password'] =$password;
	//$_SESSION['tmp_gender'] =$radio_1_set;
	//$_SESSION['tmp_phone'] =$phone;
	//$_SESSION['tmp_countryid'] =$Country;
	//	$_SESSION['tmp_stateidid'] =$State;
	//	$_SESSION['tmp_cityid'] =$City;
	//	$_SESSION['tmp_about'] =$About ;
if(isset($_SESSION['AD_admin_LoggedIn'])) {
	
	 header("location:".MODULE_URL."/home");
                exit;
}
$CountryList=$settingsObj->CountryList();
$TERM_OF_USE = $pageObj->getpageByIdAct(8,1);
if($doctor_reg=="save_doctor" && $doc_submit !=""){

$currentTimestamp = getCurrentTimestamp();
$password=createHash($password);
if(count($EmailCount)==0)
{
	
		
	
$dataArr=array("name"=>$full_name,"email"=>$email,"password"=>$password,"gender"=>$radio_1_set,
                "add_date"=>$currentTimestamp,"modify_date"=>$currentTimestamp,"is_active"=>1,"user_type"=>1);
  
  $sucess=$settingsObj->patientAdd($dataArr);
 //echo "-------------" ;
 //die ;
 if($sucess>0){
 	//echo "here" ;
 	$newArr=array("phone"=>$phone,"registration_id"=>$sucess,"CountryId"=>$Country,"StateId"=>$State,"CityId"=>$City,"is_active"=>1,"about"=>$About);
	 $dataSpecilatyArr=array("Specialty_id"=>$Specialty,"registration_id"=>$sucess);
		 $findObj->SpecialtyAdd($dataSpecilatyArr);
	 $sucessdoc=$settingsObj->DoctorInfoAdd($newArr);
	 $diffNum=genRandomPass(3);
	 $diffNum2=genRandomPass(2);
	 $phrase  = $EmailTemplate['template_content'];
	 $url= MODULE_URL.'/Login/index.php?sueccess='.$diffNum.$sucess.$diffNum2;
$find = array("%username%", "%URL%");
$repalce   = array(ucfirst($full_name),$url);

$newphrase = str_replace($find, $repalce, $phrase);
$_SESSION['new_phrase'] = $newphrase ;
$_SESSION['doctor_email'] = $email  ;
$_SESSION['doc_name'] = $full_name ;
$_SESSION['payer_email'] = "satyanarayan@futureprofilez.com" ;
$_SESSION['register_id'] =$sucess ;
	 if($sucessdoc>0){
	 	
	 	header("Location: ".MODULE_URL."/sign_up/checkform.php");
						 	 exit;
 	                $mailObj->IsHTML(true);
					$mailObj->AddAddress($email);
					$mailObj->From = "info@chat-md.com";
					$mailObj->FromName = "Chat-MD";
					$mailObj->Subject = 'Welcome to ChatMD';
                    
					$mailObj->Body ='<html >
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
					if(!$mailObj->Send()) {

$error_message="Mailer Error: " . $mailObj->ErrorInfo; 

}
					 else {
					 	$_SESSION['Regististrstion']="Regististrstion";
						$_SESSION['registration_id']=$sucess ;
						$_SESSION['name'] = $full_name ;
						 header("Location: ".MODULE_URL."/sign_up/code/process.php");
						 	 exit;
						 
					 }
	 }
 }
}
else if(count($EmailCount)>0)
{
	$error="Email Already Exists";
}
}

?>
<?php
if (isset($_POST["txn_id"]) && isset($_POST["txn_type"])) {
	
//	echo "here" ;
	//echo "<pre>" ;
	//echo $_SESSION['doctor_email'] ;

	 $doc_email = $_SESSION['doctor_email'] ;
	//print_r($_POST);
	//die ;
	$newphrase=$_SESSION['new_phrase'];
	$data_arr = array(
	'payer_id'=>$_POST['payer_id'],
	'payment_date'=>$_POST['payment_date'],
	'payment_status'=>$_POST['payment_status'],
	'first_name'=>$_POST['first_name'],
	'registeration_id'=>$_POST['custom'],
	'business'=>$_POST['business'],
	'verify_sign'=>$_POST['verify_sign'],
	'txn_id'=>$_POST['txn_id'],
	'item_name1'=>$_POST['item_name1'],
	'receiver_email'=>$_POST['receiver_email'],
	'payment_gross'=>$_POST['payment_gross'],
	'auth'=>$_POST['auth'],
	);
	$paypal_id=$settingsObj->doc_paypal_info_add($data_arr);
	$created_date = time();
	
	$end_date = strtotime('+1 year', $created_date);
	$data_arr1 = array(
	
	'registration_id'=>$_POST['custom'],
	
	
	'token_id'=>$_POST['txn_id'],
	'name'=>$_POST['item_name1'],
	'paypal_id'=>$paypal_id,
	'created_date'=>$created_date,
	'end_date'=>$end_date
	);
	
	$registration_id1=$settingsObj->doc_registration_info_add($data_arr1);
	$dataArr = array("is_verfiy"=>1);
	$settingsObj->updatePatient($_POST['custom'],$dataArr);
	 header("Location: ".MODULE_URL."/home");
	exit;
	  if($registration_id1>0)
	  {
	  $mailObj->IsHTML(true);
					//$mailObj->AddAddress($email);
					$mailObj->From = "info@chat-md.com";
					$mailObj->addAddress($doc_email);
					$mailObj->FromName = "Chat-MD";
					$mailObj->Subject = 'Welcome to ChatMD';
                    
					$mailObj->Body ='<html >
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
//echo $mailObj->Body ;
					if(!$mailObj->Send()) {

$error_message="Mailer Error: " . $mailObj->ErrorInfo; 
						echo $error_message ;
						//echo "i was here" ;

}
					 else {
				$_SESSION['Regististrstion']="Regististrstion";
						 header("Location: ".MODULE_URL."/home");
						 	 exit;
						 
				 }
					// echo "die die" ;
	die ;
	}
}
?>
 	
	
