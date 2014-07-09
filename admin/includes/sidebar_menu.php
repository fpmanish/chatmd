<div id="mws-sidebar">
 <!-- sectio code-->

            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                	<li <?php if($pageNameMenu == "patient"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/patient" ?>" class="mws-i-24 i-admin-user">Patient's</a></li>
                	<li <?php if($pageNameMenu == "doctor"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/doctor" ?>" class="mws-i-24 i-doctor">Doctor's</a></li>
                   <li <?php if($pageNameMenu == "Language"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/Language" ?>" class="mws-i-24 i-document">Language</a></li>
                	<li <?php if($pageNameMenu == "Specialty"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/Specialty" ?>" class="mws-i-24 i-news">Specialty</a></li>
                	<li <?php if($pageNameMenu == "Reason"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/chatReason" ?>" class="mws-i-24 i-document">Chat Reason</a></li>
                	 <li <?php if($pageNameMenu == "faqCategory"){ ?>class="active" <?php } ?> <?php if($pageNameMenu == "faq"){ ?>class="active" <?php } ?>>
                    	<a href="#" class="mws-i-24 i-question">FAQ's</a>
                        <ul>
                        	 <li ><a href="<?php echo ADMIN_MODULE_URL."/faqCategory" ?>" >FAQ Category</a></li>
                   <li ><a href="<?php echo ADMIN_MODULE_URL."/cms/faqManager.php" ?>" >FAQ</a></li>
                        </ul>
                    </li>
                  
                    <li <?php if($pageNameMenu == "pageMa"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/cms/pageManager.php" ?>" class="mws-i-24 i-new-releases">Page Manager</a></li>
                    <li <?php if($pageNameMenu == "Message"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/message" ?>" class="mws-i-24 i-speech-bubbles-2">Message Template</a></li>
                    <li <?php if($pageNameMenu == "Template"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/emailTemplate" ?>" class="mws-i-24 i-message">Email Tempalate</a></li>
                    <li <?php if($pageNameMenu == "Meta"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/MetaTag" ?>" class="mws-i-24 i-meta">Meta Tag</a></li>
                    <li <?php if($pageNameMenu == "video"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/media/video.php" ?>" class="mws-i-24 i-video">Video</a></li>
                  <li <?php if($pageNameMenu == "BlogCat"){ ?>class="active" <?php } ?> <?php if($pageNameMenu == "Blog"){ ?>class="active" <?php } ?>>
                    	<a href="#" class="mws-i-24 i-list ">Blog's</a>
                        <ul>
                        	 <li ><a href="<?php echo ADMIN_MODULE_URL."/blogCategory" ?>" >Blog Category</a></li>
                    <li ><a href="<?php echo ADMIN_MODULE_URL."/blog" ?>" >Blog</a></li>
                        </ul>
                    </li>
                  <li <?php if($pageNameMenu == "annual_fee"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/home/annual_fee.php" ?>" class="mws-i-24 i-settings">Doctor's Annual Fee</a></li>
                    <li <?php if($pageNameMenu == "settings"){ ?>class="active" <?php } ?>><a href="<?php echo ADMIN_MODULE_URL."/home/settings.php" ?>" class="mws-i-24 i-settings">Settings</a></li>
                 </ul>
            </div>            
        </div>
        

