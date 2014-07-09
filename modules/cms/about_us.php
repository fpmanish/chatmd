<?php

include_once("../../conf/config.inc.php");

include_once(MODULES_PATH."/cms/code/Aboutus_code.php");

include_once(INCLUDES_DIR."/header.php");

?>




<!--| Contant Start |-->

<div class="container">

  <div class="row">

    <div class="span12">

      <div class="inner-main-bg">

        <div class="inner_heading_bg"> <?php echo $ABOUT_US['page_title']; ?>  </div>

        <div class="about_contant_box">

          <div class="about_text"><img class="about_image" src="<?php echo  ADMIN_MODULE_URL."/cms/Image/".$ABOUT_US['image']; ?>" alt="image">	<?php echo $ABOUT_US['page_description']; ?> </div>

          <div class="clearfix"></div>

        </div>

      </div>

        <div class="clearfix"></div>

    </div>

  </div>

</div>

<!--| Contant End |--> 

    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>