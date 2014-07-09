<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/cms/code/term_code.php");
include_once(INCLUDES_DIR."/header.php");
?>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="inner-main-bg">
        <div class="inner_heading_bg"> <?php echo $TERM_OF_USE['page_title']; ?> </div>
        <div class="about_contant_box">
          <div class="span8 about_text"> 
          	<?php echo $TERM_OF_USE['page_description']; ?>
    </div>
          <div class="span3 about_image"><img src="<?php echo IMAGE_URL;?>/history.png" alt="image"></div>
          <div class="clearfix"></div>
        </div>
      </div>
        <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--| Contant End |--> 


    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>