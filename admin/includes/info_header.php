<div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="<?php echo IMAGE_URL; ?>/logo.png" alt="mws admin" />
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
                <!-- Username and Functions -->
                <div id="mws-user-functions" style="margin: 0px 4px 0px 10px;">
                    <div id="mws-username">
                        Hello, <?php echo $_SESSION['MAIN_admin_user_name'];?>
                    </div>
                    <ul>
                        <li><a href="<?php echo ADMIN_MODULE_URL."/home/settings.php" ?>">Change Settings</a></li>
                        <li><a href="<?php echo ADMIN_MODULE_URL."/home/logout.php"; ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>