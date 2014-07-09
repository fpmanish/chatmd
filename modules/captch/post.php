<?php ob_start();
	session_start();
	
	//include('dbcon.php');
	
	
	if(@strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
	{
		
		// insert your name , email and text message to your table in db
		//echo "valid";
		echo 1;// submitted 
		
	}
	else
	{
		//echo "invalid";exit;
		echo 0; // invalid code
		
	}
	?>
