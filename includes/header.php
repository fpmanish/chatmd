<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Chat MD</title>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo CSS_URL; ?>/bootstrap.css" rel="stylesheet">
<link href="<?php echo CSS_URL; ?>/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo CSS_URL ;?>/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo CSS_URL ;?>/jquery-ui-1.9.2.custom.min.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo CSS_URL ;?>/chosen.css" type="text/css"/>


<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<?php echo jscripts::jQuery(); ?>
<?php echo jscripts::jQueryUI(); ?>
<?php echo jscripts::script("jquery.bootstrap.js"); ?>
<?php echo jscripts::script("jquery.bootstrap.min.js"); ?>
<?php echo jscripts::script("jquery.validationEngine-en.js"); ?>
<?php echo jscripts::script("jquery.validationEngine.js"); ?>
<?php echo jscripts::script("jquery.form.js"); ?>

<?php echo jscripts::script("chosen.jquery.js"); ?>

</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144963992347808";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--| Nav Start |-->
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container"> <a class="brand" href="<?php echo MODULE_URL."/home"; ?>"><img src="<?php echo IMAGE_URL;?>/logo.png" width="150" height="29" alt="logo"></a>
      <div id="Navi2">
        <ul class="menu">
        	<?php if(isset($_SESSION['AD_is_patient'])){?>
        		          <li class="<?php if($pageType=="login") {  echo "select";}?> first"><a href="<?php echo MODULE_URL."/Login/logout.php"; ?>"><span class="hide767">Logout</span><span class="show767"><img style="margin:0;" src="<?php echo IMAGE_URL;?>/key.png" width="21" height="20" alt="key_icon"></span></a></li>
                         <li class="<?php if($pageType=="myaccount") {  echo "select";}?>"><a href="<?php echo MODULE_URL."/patient/dashboard.php"; ?>"><span class="hide767">My Account</span><span class="show767"><img src="<?php echo IMAGE_URL;?>/lock.png" width="16" height="20" alt="Lock_icon"></span></a></li>
            <?php }else if(isset($_SESSION['AD_is_doctor'])) {?>
            	   <li class="<?php if($pageType=="login") {  echo "select";}?> first"><a href="<?php echo MODULE_URL."/Login/logout.php"; ?>"><span class="hide767">Logout</span><span class="show767"><img style="margin:0;" src="<?php echo IMAGE_URL;?>/key.png" width="21" height="20" alt="key_icon"></span></a></li>
                         <li class="<?php if($pageType=="myaccount") {  echo "select";}?>"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>"><span class="hide767">My Account</span><span class="show767"><img src="<?php echo IMAGE_URL;?>/lock.png" width="16" height="20" alt="Lock_icon"></span></a></li>
        <?php } else {?>
         <li class="<?php if($pageType=="login") {  echo "select";}?> first"><a href="<?php echo MODULE_URL."/Login"; ?>"><span class="hide767">Login</span><span class="show767"><img style="margin:0;" src="<?php echo IMAGE_URL;?>/key.png" width="21" height="20" alt="key_icon"></span></a></li>
          <li class="<?php if($pageType=="sign") {  echo "select";}?>"><a href="<?php echo MODULE_URL."/sign_up"; ?>"><span class="hide767">Sign up</span><span class="show767"><img src="<?php echo IMAGE_URL;?>/lock.png" width="16" height="20" alt="Lock_icon"></span></a></li>
        <?php }?>
        </ul>
      </div>
      <button style="background:none; box-shadow:none; border:none" type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>--> 
      <img src="<?php echo IMAGE_URL;?>/Icon_menu.png" alt="icon"></button>
      <div class="nav-collapse collapse">
        <ul class="nav">
          
          <li class="<?php if($pageType=="findDoctor") {  echo "active";}?>"><a href="<?php echo MODULE_URL."/search"; ?>">Find a Doctor</a></li>
     
          <li class="<?php if($pageType=="blog") {  echo "active";}?>"><a href="<?php echo MODULE_URL."/blog/index.php"; ?>">Patient & Doctor Blog</a></li>
          <li class="<?php if($pageType=="About_us") {  echo "active";}?>"><a href="<?php echo MODULE_URL."/cms/about_us.php"; ?>">About Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--| Nav End |<li class="<?php if($pageType=="home") {  echo "active";}?> home-icon-hide" style="background:none;"><a href="<?php echo MODULE_URL."/home"; ?>" style=" padding: 6px 9px 9px 10px;margin: 0 14px 0 0;"> <img src="<?php echo IMAGE_URL;?>/Home_icon_inner.png" width="16" height="17" alt="icon"></a></li>--> 