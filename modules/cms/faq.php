<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/cms/code/faq_code.php");
include_once(INCLUDES_DIR."/header.php");
?>


<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 blog">
      <div class="span9">
        <div class="inner-main-bg">
      <div class="inner_heading_bg">Questions and Answers</div>
      <div class="contant_box">
      	<div class="faq">
        	<?php for($i=0;count($FAQ)>$i;$i++)
        	{ ?>
            <div><span>Q.</span></div>
            <div class="que"><?php echo $FAQ[$i]["faq_title"]; ?></div>
            <div><span>A.</span></div>
            <div class="ans"><?php echo $FAQ[$i]["faq_description"]; ?></div>
            
            <?}?>
            
        </div>
        <div class="cls"></div>
      </div>
      </div>
      </div>
      <div class="span3">
        <div class="inner-main-bg">
          <div class="inner_heading_bg">category</div>
          <div class="blog-sidebar">
          	<ul class="cate-menu">
          		<?php for($j=0; $j<count($FAQCategory); $j++) {?>
            	<li class="<?php if($FAQCategory[$j]['id']==$faq_id) {  echo "cat-select";}?>"><a  href="<?php echo MODULE_URL."/cms/faq.php?faq_id=".$FAQCategory[$j]['id']; ?>"><?php echo $FAQCategory[$j]['category_name']; ?></a></li>
                <?php }?>
            </ul>
        	<div class="cls"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--| Contant End |--> 
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>