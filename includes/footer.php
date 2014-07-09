 <div class="Foot">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="span6 Navi3"> <a href="<?php echo MODULE_URL."/home"; ?>" class="<?php if($pageType=="home") {  echo "select";}?>">Home</a> 
          	<a class="<?php if($pageType=="findDoctor") {  echo "select";}?>" href="<?php echo MODULE_URL."/search"; ?>">Find a Doctor</a> 
          <a class="<?php if($pageType=="blog") {  echo "select";}?>" href="<?php echo MODULE_URL."/blog/index.php"; ?>">Patient & Doctor Blog</a> <a class="<?php if($pageType=="About_us") {  echo "select";}?>" href="<?php echo MODULE_URL."/cms/about_us.php"; ?>">About Us</a>
           <a href="<?php echo MODULE_URL."/cms/faq.php"; ?>" class="<?php if($pageType=="faq") {  echo "select";}?>">FAQs</a>
            <div class="cls"></div>
          </div>
          <div class="span6 Copyright">© 2013 Chat MD All Rights Reserved.</div>
        </div>
      </div>
    </div>
    <div class="cls"></div>
  </div>
</div>
<!--| Content End |--> 

</body>
</html>