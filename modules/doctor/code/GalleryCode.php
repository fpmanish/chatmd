<?php include_once("../../../conf/config.inc.php"); // Main config file. 
extract($_POST);
$settingsObj = new settings();

$doctorData=$settingsObj->getDoctorById($_SESSION['AD_admin_user_id']);
if($_FILES['myfile']['name']!=""){
 list($width, $height)=getimagesize($_FILES['myfile']['tmp_name']);
	if($width >130 && $height > 140)
	{
		
		if($_FILES['myfile']['size'] <2000000)
		{
	if (file_exists(MODULES_PATH.'/doctor/upload_file/'.$doctorData['image']) && $doctorData['image'] !="") {
   $file_name = $_SESSION['AD_admin_user_id']."_".$_FILES['myfile']['name'];
    $file_size =$_FILES['myfile']['size'];
    $file_tmp =$_FILES['myfile']['tmp_name'];
    $file_type=$_FILES['myfile']['type'];

				
			$url = MODULES_PATH.'/doctor/upload_file/'.$file_name;	
			if(unlink(MODULES_PATH.'/doctor/upload_file/'.$doctorData['image']) )
			{
   $handle = new upload($_FILES['myfile']);
  if( $handle->allowed = array('image/*'))
  {
 if ($handle->uploaded) {
	$handle->file_name_body_pre=$_SESSION['AD_admin_user_id']."_";
	$handle->file_safe_name = true; 
    $handle->image_resize   = true;
     $handle->image_ratio     = true;
	  $handle->image_ratio_fill     = true;
	 $handle->file_max_size  ='2M';
    $handle->image_x   = 215; //destination image width
   $handle->image_y  =212 ; //destination image height
     $handle->process(MODULES_PATH.'/doctor/upload_file/');
    if ($handle->processed) {
        $dataArry = array(
				 "image"=>$file_name
				);
 $reult=$settingsObj->updateDoctor($_SESSION['AD_admin_user_id'],$dataArry);
				$id =$_SESSION['AD_admin_user_id']; 
          $handle->clean();
       } else {
          echo 'error : ' . $handle->error;
       }
  }  

					 
	?>
				
				<img alt="prifile-image" src="<?php echo MODULE_URL.'/doctor/upload_file/'.$file_name?>">
                <?php
  }
			
			}
} else {
   

    $file_name = $_SESSION['AD_admin_user_id']."_".$_FILES['myfile']['name'];
    $file_size =$_FILES['myfile']['size'];
    $file_tmp =$_FILES['myfile']['tmp_name'];
    $file_type=$_FILES['myfile']['type'];

				$dataArry = array(
				 "image"=>$file_name
				);
			$url = MODULES_PATH.'/doctor/upload_file/'.$file_name;	
			
			   $handle = new upload($_FILES['myfile']);
  if( $handle->allowed = array('image/*'))
  {
 if ($handle->uploaded) {
	$handle->file_name_body_pre=$_SESSION['AD_admin_user_id']."_";
	$handle->file_safe_name = true; 
    $handle->image_resize   = true;
    $handle->image_x   = 215; //destination image width
   $handle->image_y   =212 ; //destination image height
     $handle->process(MODULES_PATH.'/doctor/upload_file/');
    if ($handle->processed) {
        $dataArry = array(
				 "image"=>$file_name
				);
 $reult=$settingsObj->updateDoctor($_SESSION['AD_admin_user_id'],$dataArry);
				$id =$_SESSION['AD_admin_user_id']; 
          $handle->clean();
       } else {
          echo 'error : ' . $handle->error;
       }
  }  

					 
	?>
				
				<img alt="prifile-image" src="<?php echo MODULE_URL.'/doctor/upload_file/'.$file_name?>">
                <?php
  }
			

}
}
else {
	echo "<span style='color:red'>Image Dimension must be equal 200X200 </span>" ;
}
}
else {
	echo "<span style='color:red'>Image Dimension must be equal to or greater than 130X140 </span>" ;
}
}

?>