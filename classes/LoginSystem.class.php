<?php
class LoginSystem
{
	var	$db_host=MAINDB_HOST;
	var $db_name=MAINDB_NAME;
	var	$db_user=MAINDB_USER;
	var	$db_password=MAINDB_PASS;
    var $user_table = TABLE_PATIENT;
	
	var	$connection,
		$email,
		$password,
		$check;
        
	/**	 * Constructor	 */
	function LoginSystem(){}
	
	/** * Check if the user is logged in, redirect if not. */
	function isLoggedIn()
	{
		@session_start();
		if(!isset($_SESSION['AD_admin_LoggedIn']))
		{
			header("location: ".MODULE_URL."/Login/index.php");
			exit;
		}
	}
	
	/** * Check username and password against DB *
	 * @return true/false */
	function doLogin($email, $password,$check)
	{
	    global $db;
        $utilityObj = new utility();
        $this->connect();
		$this->email = $email;
		$this->password = $password;
		$this->check = $check;
		 // check db for user and pass here.
        $sql = $utilityObj->am_createSelectAllQuery(TABLE_PATIENT,"email='".$this->clean($this->email)."' and password= '".createHash($this->password)."' and is_active = 1 and is_verfiy =1");

		$result = $db->query($sql);
        
		// If no user/password combo exists return false
		if($db->numRows($result) != 1)
		{
            ob_start();
         
			if($this->check=="")
				{
			   header("location:".MODULE_URL."/Login/index.php?err=1");
			exit;
				}
				elseif ($this->check !="") {
			 header("location:".MODULE_URL."/Appointment/patient-detail.php?err=1");
			exit;
				}
               
		}
		else // matching login ok
		{
			$row = DB_fetchArrayFunc($result);
			
			@session_start();
			// more secure to regenerate a new id.
			if($row['user_type']=='0'){
			if(isset($_SESSION['AD_admin_LoggedIn']) && $_SESSION['AD_admin_LoggedIn'] == true && $_SESSION['AD_is_patient'] == '0'){
                ob_start();
				if($this->check=="")
				{
				header("location:".MODULE_URL."/patient/dashboard.php");
                exit;
				}
				elseif ($this->check !="") {
				 header("location:".MODULE_URL."/Appointment/payment.php");
                exit;	
				}
               
			}
			//set session vars up
            $_SESSION['AD_admin_LoggedIn'] = true;
            $_SESSION['AD_is_patient'] = $row['user_type'];
			$_SESSION['AD_admin_user_id']=$row['patient_id'];
			$_SESSION['AD_admin_user_name']=$row['name'];
			if($this->check=="")
				{
				header("location:".MODULE_URL."/patient/dashboard.php");
                exit;
				}
				elseif ($this->check !="") {
				 header("location:".MODULE_URL."/Appointment/payment.php");
                exit;	
				}
			}
			elseif ($row['user_type']=='1') {
				if(isset($_SESSION['AD_admin_LoggedIn']) && $_SESSION['AD_admin_LoggedIn'] == true && $_SESSION['AD_is_doctor'] == '1'){
                ob_start();
              
				if($this->check=="")
				{
			    header("location:".MODULE_URL."/doctor/dashboard.php");
                exit;
				}
				elseif ($this->check !="") {
				 header("location:".MODULE_URL."/Appointment/payment.php");
                exit;	
				}
              
			}
			//set session vars up
            $_SESSION['AD_admin_LoggedIn'] = true;
             $_SESSION['AD_is_doctor'] = $row['user_type'];
			 $_SESSION['AD_admin_user_id']=$row['patient_id'];
			 $_SESSION['AD_admin_user_name']=$row['name'];
			if($this->check=="")
				{
			    header("location:".MODULE_URL."/doctor/dashboard.php");
                exit;
				}
				elseif ($this->check !="") {
				 header("location:".MODULE_URL."/Appointment/payment.php");
                exit;	
				}
			}
		}
	}
	
	
	/**	 * Destroy session data/Logout.	 */
	function logout()
	{
		@session_start();
		$_SESSION['AD_LoggedIn'] = false;
		unset($_SESSION['AD_LoggedIn']);
		unset($_SESSION['AD_is_doctor']);
		unset($_SESSION['AD_is_patient']);
		unset($_SESSION['AD_admin_user_id']);
		unset($_SESSION['AD_admin_user_name']);
		@session_destroy();
	}
	
	/**	 * Connect to the Database * 
	 * @return true/false	 */
	function connect()
	{
        if(!DB_pingFunc()){
            $this->connection = mysql_connect($this->db_host, $this->db_user, $this->db_password) or die("Unable to connect to MySQL");
            mysql_select_db($this->db_name, $this->connection) or die("Unable to select DB!");
    		
    		// Valid connection object? everything ok?
    		if($this->connection)
    		{
    			return true;
    		}
    		else return false;
        }
	}
	
	/** * Disconnect from the db */
	function disconnect()
	{
		DB_closeFunc($this->connection);
	}
	
	/**	 * Cleans a string for input into a MySQL Database.
	 * Gets rid of unwanted characters/SQL injection etc. * 
	 * @return string */
	 
	function clean($str)
	{
		// Only remove slashes if it's already been slashed by PHP
		if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
		// Let MySQL remove nasty characters.
		$str = DB_realExcapeString($str);
		
		return $str;
	}
}
?>