<?php
extract($_POST);

if(isset($action) && $action=='insert')
{

	 	for($i=0;$i<count($_FILES['patient_image']['name']);$i++)
			{
			    $time = time();	
				
				move_uploaded_file($_FILES["patient_image"]["tmp_name"][$i], "../../upload/" .$time.'_'. $_FILES["patient_image"]["name"][$i]);
				
				$chatobj=new chat();
				
				$dataArr = array(
				'images'=>$time.'_'.$_FILES["patient_image"]["name"][$i],
				'chat_id'=>$chat_id
				);
				
		        $chatobj->insertpatientimage($dataArr);
				
				
			}
		
		echo '<script>window.parent.location.href="'.MODULE_URL.'/home"</script>';
        exit();  
	
}
?>