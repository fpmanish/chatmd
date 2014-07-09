<?php
$loginObj = new LoginSystemAdmin();
if(isset($_SESSION['IS_admin_LoggedIn']))
{
    header("location: ".ADMIN_MODULE_URL."/home/dashboard.php");
    exit;
}

if(count($_POST))   // will run only if some data is being posted to the login form.
{
    extract($_POST);
   $loginObj->doLogin($username,$password,$remember_me);
}

?>