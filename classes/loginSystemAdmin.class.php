<?php
class LoginSystemAdmin
{
    var $db_host=MAINDB_HOST;
    var $db_name=MAINDB_NAME;
    var $db_user=MAINDB_USER;
    var $db_password=MAINDB_PASS;
    var $user_table = TABLE_ADMIN;
    
    var $connection,
        $username,
        $password;
        
    /**  * Constructor   */
    function LoginSystemAdmin(){}
    
    /** * Check if the user is logged in, redirect if not. */
    function isLoggedIn()
    {
        @session_start();
        if( !isset($_SESSION['IS_admin_LoggedIn']))
        {
            header("location:".ADMIN_MODULE_URL."/login/login.php?err=1");
            exit;
        }
       
        return false;
    }
    
    /** * Check username and password against DB *
     * @return true/false */
    function doLogin($username, $password,$remember_me)
    {
        global $db;
        $utilityObj = new utility();
        $this->connect();
        $this->username = $username;
        $this->password = $password;
        $this->remember_me = $remember_me;
        // check db for user and pass here.
        $sql = $utilityObj->am_createSelectAllQuery($this->user_table,"admin_username='".$this->clean($this->username)."' and admin_password= '".createHash($this->password)."'");
        
        $result = $db->query($sql);
        
        // If no user/password combo exists return false
        if($db->numRows($result) != 1)
        {
            ob_start();
            header("location:".ADMIN_MODULE_URL."/login/login.php?err=1");
            exit;
        }
        else // matching login ok
        {
            $row = DB_fetchArrayFunc($result);
            @session_start();
			if( $this->remember_me !="")
			{
				setcookie('username',  $this->username,time()+ 3600);        // Sets the cookie username
                setcookie('password', $this->password, time()+ 3600);    // Sets the cookie password
			}
            // more secure to regenerate a new id.
            if(isset($_SESSION['IS_admin_LoggedIn']) && $_SESSION['IS_admin_LoggedIn'] == true){
                ob_start();
                header("location:".ADMIN_MODULE_URL."/home/home.php");
                exit;
            }
            //set session vars up
            $_SESSION['IS_admin_LoggedIn'] = true;
            $_SESSION['MAIN_admin_user_id'] = $row['admin_id'];
            $_SESSION['MAIN_admin_user_name'] = $row['admin_username'];
            
            header("location:".ADMIN_MODULE_URL."/home/home.php");
            exit;
        }
    }
    
    
    /**  * Destroy session data/Logout.  */
    function logout()
    {
        @session_start();
        $_SESSION['IS_admin_LoggedIn'] = false;
        unset($_SESSION['IS_admin_LoggedIn']);
        unset($_SESSION['MAIN_admin_user_id']);
        unset($_SESSION['MAIN_admin_user_name']);
        @session_destroy();
    }
    
    /**  * Connect to the Database * 
     * @return true/false    */
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
    
    /**  * Cleans a string for input into a MySQL Database.
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