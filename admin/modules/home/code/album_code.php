<?php
$settingsObj = new settings();
extract($_POST);
extract($_GET);
$pageNameMenu = "album";
$PagetypeText = "Add";

if((count($_POST)) && $pageType != "list")   // for add/edit/delete condition.
{
    $currentTimestamp = getCurrentTimestamp();
    $error = "";
    $allowedFileTypes = array("bmp","gif","jpg","jpeg","png");
    
    if($pageType == "addAlbum" && $album_id == "")      // Add Album
    {
        $PagetypeText = "Add";
        $dataArr = array(
            "album_name" => (string)(allStringValidations($album_name)?allStringValidations($album_name):""),
            "album_order_no" => (int)(allStringValidations($album_order_no)?allStringValidations($album_order_no):""),
            "album_is_active" => $activate,
            "created_date" => $currentTimestamp,
            "modified_date" => $currentTimestamp
        );
        
        if($album_source == "upload")
        {
            // Uploading file to sever.
            if(isset($_FILES['album_file']) && $_FILES['album_file']['size'])
            {
                $fileExp = explode(".", $_FILES['album_file']['name']);
                $extension = end($fileExp);
                $extension = strtolower($extension);
                if(in_array($extension, $allowedFileTypes))
                {
                    $fileName = prepareFileName($_FILES['album_file']['name'],'gallery');
                    if(strlen($fileName) && strlen($_FILES['album_file']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['album_file']['tmp_name'], GALLERY_PATH."/".$fileName);
                        $dataArr['album_image'] = $fileName;
                        $dataArr['album_image_url'] = "";
                        $dataArr['album_img_is_local'] = 1;
                    }
                }
                else
                {
                    $error .= "Error: This extension not allowed for image files.<br />";
                    $errorVar = 1;
                }
                	
            }
            else
            {
                $error .= "Error: Image file not found or size too less.<br />";
                $errorVar = 1;
            }
    	}
        else if($album_source == "ext")
        {
            $dataArr['album_image'] = "";
        	$dataArr['album_image_url'] = $ext_URL;    // add mysql(i) real excape string here.
            $dataArr['album_img_is_local'] = 0;
        }
        
        if(!isset($errorVar) && !$errorVar)     // saving into database.
        {
            $settingsObj->albumAdd($dataArr);
            
            header("location: ".ADMIN_MODULE_URL."/home/album.php");
            exit;
        }
    }
    else if($pageType == "editAlbum" && $album_id != "")    // Edit Music
    {
        $PagetypeText = "Edit";
        $dataArr = array(
            "album_name" => (string)(allStringValidations($album_name)?allStringValidations($album_name):""),
            "album_order_no" => (int)(allStringValidations($album_order_no)?allStringValidations($album_order_no):""),
            "album_is_active" => $activate,
            "modified_date" => $currentTimestamp
        );
        
        if($edit_image_file)
        {
            if($album_source == "upload")
            {
                if(isset($_FILES['album_file']) && $_FILES['album_file']['size'])
                {
                    $fileExp = explode(".", $_FILES['album_file']['name']);
                    $extension = end($fileExp);
                    $extension = strtolower($extension);
                    if(in_array($extension, $allowedFileTypes))
                    {
                        $fileName = prepareFileName($_FILES['album_file']['name'],'gallery');
                        if(strlen($fileName) && strlen($_FILES['album_file']['tmp_name']))
                        {
                            $albumDetails = $settingsObj->getAlbumById($album_id);
                            @unlink(GALLERY_PATH."/".$albumDetails['album_image']);
                            move_uploaded_file($_FILES['album_file']['tmp_name'], GALLERY_PATH."/".$fileName);
                            unset($albumDetails);
                            $dataArr['album_image'] = $fileName;
                            $dataArr['album_image_url'] = "";
                            $dataArr['album_img_is_local'] = 1;
                        }
                    }
                    else
                    {
                        $error .= "Error: This extension not allowed for image files.<br />";
                        $errorVar = 1;
                    }
                }
                else
                {
                    $error .= "Error: Image file not found or size too less.<br />";
                    $errorVar = 1;
                }
            }
            else if($album_source == "ext")
            {
                $dataArr['album_image'] = "";
                $dataArr['album_image_url'] = $ext_URL;    // add mysqli real excape string here.
                $dataArr['album_img_is_local'] = 0;
            }
        }
        else
        {
        	$settingsObj->albumUpdate($album_id,$dataArr);
            header("location: ".ADMIN_MODULE_URL."/home/album.php");
            exit;
        }
        
        if(!isset($errorVar) && !$errorVar)
        {
            $settingsObj->albumUpdate($album_id,$dataArr);
            header("location: ".ADMIN_MODULE_URL."/home/album.php");
            exit;
        }
        
        $PagetypeText = "Edit";
        $album_id = (int)allStringValidations($album_id);
        $albumDetails = $settingsObj->getAlbumById($album_id);
    }
}
else if($pageType == "list" || !isset($pageType))    // for listing.
	$albumList = $settingsObj->albumList();


if(count($_GET) && $pageType == "editAlbum" && $album_id != "")     // Edit data fetch.
{
    $PagetypeText = "Edit";
    $album_id = (int)allStringValidations($album_id);
    $albumDetails = $settingsObj->getAlbumById($album_id);
}
else if(count($_GET) && $pageType == "list" && $album_id != "" && isset($isAct))     // For act/deact
{
    $settingsObj->actDeactAlbum($album_id,$isAct);
    header("location: ".ADMIN_MODULE_URL."/home/album.php");
    exit;
}
else if(count($_GET) && $pageType == "list" && $action == "delete" && $album_id != "")
{
    $settingsObj->deleteAlbumById($album_id);
    header("location: ".ADMIN_MODULE_URL."/home/album.php");
    exit;
}
?>