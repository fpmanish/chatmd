<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/gallery_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<section>
      <div class="PaddATL50">
        <div>
          <div>
            <div class="font22">Gallery</div>
            <div class="line MarT5"></div>
          </div>
          <div class="PdTop15">
            <div>
                <div class="fl width800" style="width: 100%">
                  <?php
				  /*echo '<pre>';
				  print_r($galleryGrouped);
				  echo '</pre>';
				  die;*/
				
                  for($i=0;$i<count($galleryGrouped[$i+1]['page_data']);$i++)
                  {
				   
				 for($j=0;$k<count($galleryGrouped[$i+1]['page_data']);$j++)
                  {
					  $albumName = $settingsObj->getAlbumById($galleryGrouped[$i+1]['page_data'][$j]['album_id']);
                  ?>
                <div>
                  <div>
                    <div class="fl font18"><?php echo $albumName['album_name']; ?></div>
                    <div class="fl border1" style="margin: 0px;width: 100%"></div>
                    <div class="cls"></div>
                  </div>
                  <?php
				 
                  for($k=0;$k<count($galleryGrouped[$i+1]['page_data'][$j]['data']);$k++)
                  {
					
                      //echo $mediaObj->getImageCodeById($galleryGrouped[$i]['data'][$j]['image_id']);
                  ?>
                    <div class="MarT10" style="float: left">
                        <div class="fl width220 MarL10"><a href="<?php echo $mediaObj->getImageCodeById($galleryGrouped[$i+1]['page_data'][$j]['data'][$k]['image_id'])?>" class="group1"><img src="<?php echo Uploads_URL."/image.php?src=".$mediaObj->getImageCodeById($galleryGrouped[$i+1]['page_data'][$j]['data'][$k]['image_id'])."&w=220&h=148&q=100"; ?>" alt=""> </a></div>
                    <div class="fl width600" style="width: auto">
                      <div class="font12col">
                          <div class="fl gallerybg"><?php echo $galleryGrouped[$i+1]['page_data'][$j]['data'][$k]['date']; ?></div>
                          <div class="cls"></div>
                          <?php echo $galleryGrouped[$i+1]['page_data'][$j]['data'][$k]['heading']; ?><br>
                        <br>
                      </div>
                      <div><?php echo $galleryGrouped[$i+1]['page_data'][$j]['data'][$k]['content']; ?></div>
                    </div>
                    <div class="cls"></div>
                  </div>
                 
                </div>
             </div>
                <?php
                } }  }
                ?>
              <div class="cls"></div>
             
            </div>
            
          </div>
          
        </div>
      </div>
    </section>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>