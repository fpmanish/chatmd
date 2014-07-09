<?php
include_once("../../conf/config.inc.php");
extract($_GET);
$mediaObj = new media();
if($file !="")
{
	$file = $mediaObj->getMusicById($file);
$mediaObj->force_download(MUSIC_PATH."/".$file['music_file']);

exit;
}

?>


