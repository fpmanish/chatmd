<?php extract($_POST);
extract($_GET);
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$pageNameMenu = "doctor";
$PagetypeText = "Add";
$settingObj = new settings();
 $pageObj = new pageManager();
 $mailObj = new PHPMailer();
$doctorList = $settingObj->doctorList();
$SpecialtyListArr=$settingObj->SpecialtyList(1);
$LanguageListArr=$pageObj->LanguageList(1);
$ChatListArr=$pageObj->ReasonList(1);
$CountryListArr=$settingObj->CountryList();
 $currentTimestamp = getCurrentTimestamp();
 $findObj = new find();
if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
if($pageType == "addDoctor" && $Patient_id == "")      // Add Page
    {
    	
    	$EmailTemplate=$pageObj->getEmailById(5);
    	 $PagetypeText = "Add";
		  $date_str=convertDateToTimestamp($dob); 
		 $epassword=createHash($password);
  /*$dataArr=array("name"=>$name,"email"=>$email,"password"=>$epassword,"dob"=>$date_str,
                "gender"=>$gender,"add_date"=>$currentTimestamp,
                "modify_date"=>$currentTimestamp,"is_active"=>$activate,"user_type"=>'1', "paypal_id"=>$paypal_id);
   * */
  $dataArr=array("name"=>$name,"email"=>$email,"password"=>$epassword,"dob"=>$date_str,
                "gender"=>$gender,"add_date"=>$currentTimestamp,
                "modify_date"=>$currentTimestamp,"is_active"=>$activate,"user_type"=>'1');

 $sucess=$settingObj->PatientAdd($dataArr);
 				$newArr=array("phone"=>$Phone,"Degrees"=>$Degrees,"Experience"=>$Experience,"registration_id"=>$sucess,"is_accepted"=>$New_1_set,
 				"Ratting"=>$ratting,"hospital"=>$hospital,"CountryId"=>$Country,"StateId"=>$State,"CityId"=>$City,);
 if(count($langauge)>0)
	{
		
	 foreach ($langauge as $key => $value) {
	 
	 	$dataLanguageArr=array("language_id"=>$value,"registration_id"=>$sucess);
		 $findObj->LanguageAdd($dataLanguageArr,$value);
	 }
	}
	if(count($Specialty)>0)
	{
	  foreach ($Specialty as $key => $value) {
	 	$dataSpecilatyArr=array("Specialty_id"=>$value,"registration_id"=>$sucess);
		 $findObj->SpecialtyAdd($dataSpecilatyArr);
	 }
	}
	if(count($ChatReason)>0)
	{
		foreach ($ChatReason as $key => $value) {
	 	$dataReasonArr=array("chatReason_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->ChatReasonAdd($dataReasonArr);
	 }	
		
	 }
	 $sucessdoc=$settingObj->DoctorInfoAdd($newArr);
     $diffNum=genRandomPass(3);
	 $diffNum2=genRandomPass(2);
	 $phrase  = $EmailTemplate['template_content'];
	 $url= MODULE_URL.'/Login/index.php?sueccess='.$diffNum.$sucess.$diffNum2;
$find = array("%username%", "%URL%","%Email%","%password%");
$repalce   = array(ucfirst($name),$url,$email,$password);

$newphrase = str_replace($find, $repalce, $phrase);
	if($sucess>0){
		 $mailObj->IsHTML(true);
					$mailObj->AddAddress($email);
					$mailObj->From = $email;
					$mailObj->FromName = $name;
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
				 header("location: ".ADMIN_MODULE_URL."/doctor/index.php");
         exit();
						 
					 }
	
	 
	}
	 

}
 else if($pageType == "editDoctor" && $doctor_id != "")    // Edit page
    {
    	
	 $date_str=convertDateToTimestamp($dob); 
	
  $PagetypeText = "Edit";
  
	$specilatyCheckArr=$findObj->SpecialtyList($doctor_id);
	 $languageCheckArr=$findObj->LanguageList($doctor_id);
	 $reasonCheckArr=$findObj->chatReasonList($doctor_id);
	if(count($langauge)>0)
	{
		if(count($languageCheckArr)>0)
		{
			for($i=0;count($languageCheckArr)>$i; $i++)
			{
				if(! in_array($languageCheckArr[$i]['language_id'], $langauge)) {
					
		 		 $findObj->deleteLanguageById($languageCheckArr[$i]['language_id'],$doctor_id);
					 }
					 }
	
		foreach ($langauge as $key => $value) {
			if(searchMultiArrays($value,$languageCheckArr,"language_id")==-1)
		{
	 	$dataLanguageArr=array("language_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->LanguageAdd($dataLanguageArr);
		} }		
			}
else if(empty($languageCheckArr)){
	foreach ($langauge as $key => $value) {
	 	$dataLanguageArr=array("language_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->LanguageAdd($dataLanguageArr);
	 }	
		
		
	}
	}
	if(count($Specialty)>0)
	{
		 
		if(count($specilatyCheckArr)>0)
		{
			for($i=0;count($specilatyCheckArr)>$i; $i++)
			{
				if(! in_array($specilatyCheckArr[$i]['Specialty_id'], $Specialty)) {
					
		 		 $findObj->deleteSpecialtyById($specilatyCheckArr[$i]['Specialty_id'],$doctor_id);
					 }
					 }
	
		foreach ($Specialty as $key => $value) {
			if(searchMultiArrays($value,$specilatyCheckArr,"Specialty_id")==-1)
		{
	 	$dataSpecilatyArr=array("Specialty_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->SpecialtyAdd($dataSpecilatyArr);
		} }		
			}
else if(empty($specilatyCheckArr)){
	foreach ($Specialty as $key => $value) {
	 	$dataSpecilatyArr=array("Specialty_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->SpecialtyAdd($dataSpecilatyArr);
	 }	
}
	  
	}
	if(count($ChatReason)>0)
	{
		if(count($reasonCheckArr)>0)
		{
			for($i=0;count($reasonCheckArr)>$i; $i++)
			{
				if(! in_array($reasonCheckArr[$i]['chatReason_id'], $ChatReason)) {
					
		 		 $findObj->deleteChatReasonById($reasonCheckArr[$i]['chatReason_id'],$doctor_id);
					 }
					 }
	
		foreach ($ChatReason as $key => $value) {
			if(searchMultiArrays($value,$reasonCheckArr,"chatReason_id")==-1)
		{
	 	$dataReasonArr=array("chatReason_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->ChatReasonAdd($dataReasonArr);
		} }		
			}
else if(empty($reasonCheckArr)){
	foreach ($ChatReason as $key => $value) {
	 	$dataReasonArr=array("chatReason_id"=>$value,"registration_id"=>$doctor_id);
		 $findObj->ChatReasonAdd($dataReasonArr);
	 }	
		
	 }
	}

  if($password !=""){
  	$password=createHash($password);
	 
	  $dataArr=array("name"=>$name,"email"=>$email,"dob"=>$date_str,"password"=>$password,
                "gender"=>$gender,"add_date"=>$currentTimestamp,
                "modify_date"=>$currentTimestamp,"is_active"=>$activate,"user_type"=>'1');
				$newUpdateArr=array("phone"=>$Phone,"Degrees"=>$Degrees,"Experience"=>$Experience,"is_accepted"=>$New_1_set,
				"Ratting"=>$ratting,"hospital"=>$hospital,"CountryId"=>$Country,"StateId"=>$State,"CityId"=>$City);
  }else{
  	 $dataArr=array("name"=>$name,"email"=>$email,"dob"=>$date_str,
                "gender"=>$gender,"add_date"=>$currentTimestamp,
                "modify_date"=>$currentTimestamp,"is_active"=>$activate,"user_type"=>'1');
				$newUpdateArr=array("phone"=>$Phone,"Degrees"=>$Degrees,"Experience"=>$Experience,"is_accepted"=>$New_1_set,"hospital"=>$hospital,
				"Ratting"=>$ratting,"CountryId"=>$Country,"StateId"=>$State,"CityId"=>$City, );
  }

	  $settingObj->updateDoctor($doctor_id,$newUpdateArr);
      $settingObj->updatePatient($doctor_id,$dataArr);
	  header("location: ".ADMIN_MODULE_URL."/doctor/index.php");
         exit();
	
	}
	
}
if(count($_GET) && $pageType == "editDoctor" && $page_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $page_id = (int)allStringValidations($page_id);
  $patientData=$settingObj->UpdatePatientById($page_id);
  $doctorData=$settingObj->getDoctorById($page_id);
    $SpecialtyFindArr= $findObj->SpecialtyList($doctorData['registration_id']);
	 $LanguageFindArr= $findObj->LanguageList($doctorData['registration_id']);
	  $ReasonFindArr= $findObj->chatReasonList($doctorData['registration_id']);
}

	
else if($isAct !="" && $id != "") {
		
		$settingObj->actDeactPatient($id,$isAct);
	    header("location: ".ADMIN_MODULE_URL."/doctor/index.php");
		exit();
	}	
else if($isDoctorAct !="" && $id != "") {
		
		$settingObj->actDeactuser($id,$isDoctorAct);
	    header("location: ".ADMIN_MODULE_URL."/doctor/index.php");
		exit();
	}	
	
		else if(count($_GET) && $pageType == "list" && $action == "delete" && $delete_id != "")
{
	
    $settingObj->deletePatientById($delete_id);
	 $settingObj->deleteDoctorById($delete_id);
 header("location: ".ADMIN_MODULE_URL."/doctor/index.php");    
 exit;
}


?>