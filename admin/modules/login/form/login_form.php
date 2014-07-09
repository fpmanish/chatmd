<div id="mws-login-wrapper">
  <center>
    <?php if(isset($_GET['err'])){ ?>
	<span style="color:#F00">please enter correct user name and password </span>
<?php	
}
?></center>
        <div id="mws-login">
      
            <h1>Login</h1>
            <div class="mws-login-lock"><img src="<?php echo ADMIN_IMAGE_URL; ?>/icons/24/locked-2.png" alt="" /></div>
            <div id="mws-login-form">
                <form class="mws-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <input type="text" name="username" class="mws-login-username mws-textinput required" placeholder="username" value="<?php echo $_COOKIE['username'];?>"  />
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <input type="password" name="password" class="mws-login-password mws-textinput required" placeholder="password" value="<?php echo $_COOKIE['password'];?>"  />
                        </div>
                    </div>
                    <div class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                             <li><input id="remember_me" name="remember_me" type="checkbox"  value="1" <?php if($_COOKIE['username'] !="" && $_COOKIE['password'] !="" ) { echo "checked=checked"; }?>/> <label for="remember_me">Remember me</label></li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Login" class="mws-button green mws-login-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php unset($_SESSION['error']);?>