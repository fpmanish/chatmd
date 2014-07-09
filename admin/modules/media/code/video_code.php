<?php
$loginObj = new LoginSystemAdmin();
$loginObj->isLoggedIn();
$mediaObj = new media();
$settingsObj = new settings();
extract($_POST);
extract($_GET);
$pageNameMenu = "video";
$PagetypeText = "Add";
$videoList = $mediaObj->videoList();

if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
    $currentTimestamp = getCurrentTimestamp();
    $error = "";
    $allowedFileTypes = array("mp4");
    $allowedImageFileTypes = array("bmp","gif","jpg","jpeg","png");
  
    if($pageType == "editVideo" && $video_id != "")    // Edit Music
    {
        $PagetypeText = "Edit";
     $vid = $mediaObj->MakeAutoLink($embed_code);  
 
if($vid !="")
{
        $dataArr = array(
            "vidoes_name" => (string)(allStringValidations($video_name)?allStringValidations($video_name):""),
            "vidoes_embedcode" => $vid,
            "video_is_active" =>1,
        );
        
        $mediaObj->videoUpdate($video_id,$dataArr);
    
        header("location: ".ADMIN_MODULE_URL."/media/video.php");
        exit;
}
	else
		{
			$error=" You have Entered Invalid url";
		}
        // $dataArr = array(
            // "video_name" => (string)(allStringValidations($video_name)?allStringValidations($video_name):""),
            // "album_id" => $album_id,
            // "video_order_no" => (int)(allStringValidations($video_order_no)?allStringValidations($video_order_no):""),
            // "video_is_active" => $activate,
            // "modified_date" => $currentTimestamp
        // );

        // if($edit_video_file)
        // {
            // if($video_source == "upload")
            // {
                // if(isset($_FILES['video_file']) && $_FILES['video_file']['size'])
                // {
                    // $fileExp = explode(".", $_FILES['video_file']['name']);
                    // $extension = end($fileExp);
                    // $extension = strtolower($extension);
                    // if(in_array($extension, $allowedFileTypes))
                    // {
                        // $fileName = prepareFileName($_FILES['video_file']['name'],'video');
                        // if(strlen($fileName) && strlen($_FILES['video_file']['tmp_name']))
                        // {
                            // $videoDetails = $mediaObj->getVideoById($video_id);
                            // @unlink(VIDEO_PATH."/".$videoDetails['video_file']);
                            // move_uploaded_file($_FILES['video_file']['tmp_name'], VIDEO_PATH."/".$fileName);
                            // unset($videoDetails);
                            // $dataArr['video_file'] = $fileName;
                            // $dataArr['video_embed_code'] = "";
                            // $dataArr['video_is_local'] = 1;
                        // }
                    // }
                    // else
                    // {
                        // $error .= "Error: This extension not allowed for video files.<br />";
                        // $errorVar = 1;
                    // }
                // }
                // else
                // {
                    // $error .= "Error: Video file not found or size too less.<br />";
                    // $errorVar = 1;
                // }
            // }
            // else if($video_source == "embed")
            // {
                // $dataArr['video_file'] = "";
            	// $dataArr['video_embed_code'] = $embed_code;    // add mysqli real excape string here.
                // $dataArr['video_is_local'] = 0;
            // }
        // }
        // else
        // {
        	// $mediaObj->videoUpdate($video_id,$dataArr);
            // header("location: ".ADMIN_MODULE_URL."/media/video.php");
            // exit;
        // }

        // if(!isset($errorVar) && !$errorVar)
        // {
            // $mediaObj->videoUpdate($video_id,$dataArr);
            // header("location: ".ADMIN_MODULE_URL."/media/video.php");
            // exit;
        // }

        // $PagetypeText = "Edit";
        // $video_id = (int)allStringValidations($video_id);
        // $videoDetails = $mediaObj->getVideoById($video_id);
    }
}



if(count($_GET) && $pageType == "editVideo" && $video_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $video_id = (int)allStringValidations($video_id);
    $videoDetails = $mediaObj->getVideoById($video_id);
}
else if(count($_GET) && $pageType == "list" && $video_id != "" && isset($isAct))     // For act/deact
{
    $mediaObj->actDeactVideo($video_id,$isAct);
    header("location: ".ADMIN_MODULE_URL."/media/video.php");
    exit;
}
else if(count($_GET) && $pageType == "list" && $action == "delete" && $video_id != "")
{
    $mediaObj->deleteVideoById($video_id);
    header("location: ".ADMIN_MODULE_URL."/media/video.php");
    exit;
}

?>