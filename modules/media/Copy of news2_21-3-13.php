<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/news_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<section>

<script>
  $(document).ready(function() { //waits until the DOM has finished loading
    if ($('a.lightboxTrigger').length){ //checks to see if there is a lightbox trigger on the page
        $('a.lightboxTrigger').each(function(){ //for every lightbox trigger on the page...
            var url = $(this).attr("href"); // sets the link url as the target div of the lightbox
            $(url).hide(); //hides the lightbox content div
            $(this).colorbox({
                 inline:true, // so it knows that it's looking for an internal href
                 href:url, // tells it which content to show
                 width:"70%",
                 onOpen:function(){ //triggers a callback when the lightbox opens
                    $(url).show(); //when the lightbox opens, show the content div
                 },
                 onCleanup:function(){
                    $(url).hide(); //hides the content div when the lightbox closes
                 }
            }).attr("href","javascript:void(0)"); //swaps the href out with a javascript:void(0) after it's saved the href to the url variable to stop the browser doing anything with the link other than launching the lightbox when clicked
              //you could also use "return false" for the same effect but I proffered that way
        })
     }
});
</script>

      <div class="PaddATL50">
        <div>
          <div>
          <div>
            <div class="font22 " style="float:left;"><a href="news.php" alt="" <?php if(!$page){ ?> style="color:#FFF;" <?php } ?>>News </a></div>
            
            <div class="font22 " style="float:left; padding-left:50px;"><a href="news.php?page=archieve" <?php if($page){ ?> style="color:#FFF;" <?php } ?> alt="">Archive </a></div>
           
           
            </div>
            <div style="clear:both"></div>
            <div class="line MarT5"></div>
          </div>
          <div>
              <?php
			
              for($i=0;$i<count($Newsnullarch);$i++)
              {
                  //$albumName = $settingsObj->getAlbumById($NewsList[$i]['album_id']);
              ?>
            <div>
              <div class="pdTB20" id="player_section_<?php echo $i; ?>">
                <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getNewsImageById($Newsnullarch[$i]['news_id'])."&h=148&w=220&q=100"; ?>" /></div>
                <div class="fl width600" style="width:913px;text-align:justify;">
                  <div><strong><?php  echo $Newsnullarch[$i]['news_headlines']; ?></strong><br>
                    <br>

                   
                  </div>
                   <div>
				   <?php  
				   $string=htmlspecialchars_decode(stripslashes($Newsnullarch[$i]['news_content']));
				   
				   if (strlen($string) > 800) {

    // truncate string
	 
    $stringCut = substr($string, 0, 800);
	$ext = strrchr($stringCut,'.');
	   $length=strlen($ext) ;
	  $retunnstring=800-$length; 
	   $stringCut = substr($string, 0, $retunnstring);
	   $rep=str_repeat(".", 10);
		echo  $stringCut; echo $rep;
?>
<div style="text-align: right;" >

<a class="lightboxTrigger" href="#lightboxContent_<?php echo $i; ?>"><img src="<?php echo IMAGE_URL; ?>/read-more-button.png"; ></a>
<div id="lightboxContent_<?php echo $i; ?>" class="lightboxContent_<?php echo $i;?>" style="color:#000; display:none;"> <!-- the class is just to make it easier to style with css if you have multiple lightboxes on the same page -->
   <p> <?php echo $string ; ?> </p>
</div>
</div>
<?php
} 
else
{
	echo $string;
} ?></div> 
                  <div class="fl player MarT27" id="player_cls_<?php echo $i; ?>" style="display: none;">
                  <?php
                  //echo  $musicList[$i]['music_file'];
                  ?>
                  <div class="cls"></div>
                </div>
                </div>
                <div class="cls"></div>
              </div>
              <div class="line"></div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>