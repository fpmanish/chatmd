<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/media_code.php");
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
                 width:"50%",
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
            <div class="font22">Videos</div>
            <div class="line MarT5"></div>
          </div>
          <div>
              <?php
              for($i=0;$i<count($videoList);$i++)
              {
				  $videoImage = $mediaObj->getVideoImageById($videoList[$i]['video_id']);
                  $albumName = $settingsObj->getAlbumById($videoList[$i]['album_id']);
              ?>
            <div>
              <div class="pdTB20">
                 </div>
                 <div class="fr">
                 <a class="lightboxTrigger" href="#lightboxContent_<?php echo $i; ?>"><img src="<?php echo Uploads_URL."/image.php?src=".$videoImage."&w=220&h=148&q=100"; ?>" alt=""></a>
<div id="lightboxContent_<?php echo $i; ?>" class="lightboxContent_<?php echo $i;?>" style="color:#000; display:none; margin-left:10px;" > <!-- the class is just to make it easier to style with css if you have multiple lightboxes on the same page -->
   <p> <?php echo  $mediaObj->getVideoCodeById($videoList[$i]['video_id'],315,560); ?> </p>
</div>
</div>
                <div class="fl width600">
                  <div><?php echo $videoList[$i]['video_name']; ?><br>
                    Album: <strong><?php echo $albumName['album_name']; ?></strong><br>
                    <br>
                  </div>
                   <div><?php $vedioDetails=$mediaObj->getVideoById($videoList[$i]['video_id']); echo $vedioDetails['vedio_description']; ?>
                   </div> 
                </div>
                <div class="cls"></div>
              </div>
              <div class="line"></div>
              <?php
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>