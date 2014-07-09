<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$chatObj = new chat();
$chat_array=$chatObj->ChatListByAccessTokenfordoctor($access,$id);

if(count($chat_array) !=0)
{
	echo "1";
}
else{
	echo "0";
}
