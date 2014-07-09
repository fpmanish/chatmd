<?php
extract($_POST);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new find();
$findObj = new find();
$pageObj = new pageManager();
$pageType = "myaccount";
$SpecialtyListArr=$settingsObj->SpecialtyList(1);
$ChatListArr=$pageObj->ReasonList(1);
$LanguageListArr=$pageObj->LanguageList(1);
$CountryListArr=$settingsObj->CountryList();
if(isset($_SESSION['AD_admin_user_id'])){
	$patientData=$settingsObj->getPatientById($_SESSION['AD_admin_user_id']);
	$doctorData=$settingsObj->getDoctorById($_SESSION['AD_admin_user_id']);
	
    $SpecialtyFindArr= $findObj->SpecialtyList($_SESSION['AD_admin_user_id']);
	 $LanguageFindArr= $findObj->LanguageList($_SESSION['AD_admin_user_id']);
	 $ReasonFindArr= $findObj->chatReasonList($_SESSION['AD_admin_user_id']);
	
	
	
}else{
	 header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
}

 if($Doctor_update =="1" && $submit=="Save"){
	$specilatyCheckArr=$findObj->SpecialtyList($_SESSION['AD_admin_user_id']);
	 $languageCheckArr=$findObj->LanguageList($_SESSION['AD_admin_user_id']);
	 $reasonCheckArr=$findObj->chatReasonList($_SESSION['AD_admin_user_id']);
	if(count($langauge)>0)
	{
		if(count($languageCheckArr)>0)
		{
			for($i=0;count($languageCheckArr)>$i; $i++)
			{
				if(! in_array($languageCheckArr[$i]['language_id'], $langauge)) {
					
		 		 $findObj->deleteLanguageById($languageCheckArr[$i]['language_id'],$_SESSION['AD_admin_user_id']);
					 }
					 }
	
		foreach ($langauge as $key => $value) {
			if(searchMultiArrays($value,$languageCheckArr,"language_id")==-1)
		{
	 	$dataLanguageArr=array("language_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
		 $findObj->LanguageAdd($dataLanguageArr);
		} }		
			}
else if(empty($languageCheckArr)){
	foreach ($langauge as $key => $value) {
	 	$dataLanguageArr=array("language_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
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
					
		 		 $findObj->deleteSpecialtyById($specilatyCheckArr[$i]['Specialty_id'],$_SESSION['AD_admin_user_id']);
					 }
					 }
	
		foreach ($Specialty as $key => $value) {
			if(searchMultiArrays($value,$specilatyCheckArr,"Specialty_id")==-1)
		{
	 	$dataSpecilatyArr=array("Specialty_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
		 $findObj->SpecialtyAdd($dataSpecilatyArr);
		} }		
			}
else if(empty($specilatyCheckArr)){
	foreach ($Specialty as $key => $value) {
	 	$dataSpecilatyArr=array("Specialty_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
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
					
		 		 $findObj->deleteChatReasonById($reasonCheckArr[$i]['chatReason_id'],$_SESSION['AD_admin_user_id']);
					 }
					 }
	
		foreach ($ChatReason as $key => $value) {
			if(searchMultiArrays($value,$reasonCheckArr,"chatReason_id")==-1)
		{
	 	$dataReasonArr=array("chatReason_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
		 $findObj->ChatReasonAdd($dataReasonArr);
		} }		
			}
else if(empty($reasonCheckArr)){
	foreach ($ChatReason as $key => $value) {
	 	$dataReasonArr=array("chatReason_id"=>$value,"registration_id"=>$_SESSION['AD_admin_user_id']);
		 $findObj->ChatReasonAdd($dataReasonArr);
	 }	
		
	 }
	}
 	$user_array=$settingsObj->getPatientEmailByID($email,$_SESSION['AD_admin_user_id']);
	
	 if(count($user_array)==0)
	 {
	 	$currentTimestamp = getCurrentTimestamp();

 	$date_str= strtotime($dob);  
	 if($CurrentPassword !="")
	 {
	 	$old_password=createHash($CurrentPassword);
	 if($patientData['password']==$old_password){
	 	$password=createHash($NewPassword);
	 	$dataArr=array("name"=>$FullName,"email"=>$Email,"password"=>$password,"dob"=>$date_str,
                "gender"=>$radio_1_set,"modify_date"=>$currentTimestamp,"user_type"=>'1');
				$settingsObj->updatePatient($_SESSION['AD_admin_user_id'],$dataArr);
				$newUpdateArr=array("phone"=>$Phone,"Degrees"=>$Degrees,"Experience"=>$Experience,"CountryId"=>$Country,
				"StateId"=>$State,"CityId"=>$City,"is_accepted"=>$New_1_set,"hospital"=>$hospital,"about"=>$About,"paypal_id"=>$paypal_id);
				$settingsObj->updateDoctor($_SESSION['AD_admin_user_id'],$newUpdateArr);
				unset($_SESSION['rest']);
				 header("Location: ".MODULE_URL."/doctor/dashboard.php?success=1");
						 	 exit;
	 }	
	 else {
		$error="Please enter correct password";
	 }	
	 }
	 else {
		 
		 $dataArr=array("name"=>$FullName,"email"=>$Email,"dob"=>$date_str,
                "gender"=>$radio_1_set,"modify_date"=>$currentTimestamp,"user_type"=>'1');
				$settingsObj->updatePatient($_SESSION['AD_admin_user_id'],$dataArr);
				$newUpdateArr=array("phone"=>$Phone,"Degrees"=>$Degrees,"Experience"=>$Experience,"CountryId"=>$Country,
				"StateId"=>$State,"CityId"=>$City,"is_accepted"=>$New_1_set,"hospital"=>$hospital,"about"=>$About,"paypal_id"=>$paypal_id);
				
				$settingsObj->updateDoctor($_SESSION['AD_admin_user_id'],$newUpdateArr);
				unset($_SESSION['rest']);
			 header("Location: ".MODULE_URL."/doctor/dashboard.php?success=1");
						 	 exit;	
		 
	 }
 
 }
	 else if(count($user_array) >0) {
		 $error="Email Id already exists";
	 }
 }
?>