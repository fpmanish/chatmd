<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/gallery_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<section>
<?php
     if($albm_id=="")
{ ?>
 <div class="font22">Albums</div>
<?php for($i=0;$i<count($albmlist);$i++)
                  { ?>


                    <?php $albumName = $settingsObj->getAlbumById($albmlist[$i]['album_id']); ?>
                    
                    
                    <div class="fl width20A Mar20TL">
                    <div><a href="gallery.php?albm_id=<?php echo $albmlist[$i]['album_id']; ?>"><img src="<?php echo Uploads_URL."/image.php?src=".$settingsObj->getAlbumImageById($albmlist[$i]['album_id'])."&w=220&h=148&q=100";; ?>" alt=""></a></div>
                    <div class="tc width20A hight35"><?php echo $albumName['album_name']; ?></div>
                    </div>
                    
                
                  <?php } }else { 
				  
				  // Create the pagination object
          $pagination = new pagination($galleryGrouped, (isset($_GET['page']) ? $_GET['page'] : 1), 16);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
           $productPages = $pagination->getResults();
				  ?>
      <div class="PaddATL50">
        <div>
          <div>
            <div class="font22">Gallery</div>
            <div class="line MarT5"></div>
          </div>
                   
          <div class="PdTop15">
          
            <div>
            
                <div class="fl width800" style="width: 100%">
                 
                <div>
                  <div>
                    <div class="fl font18" style="padding-top: 20px;"> <?php 
					$albumName = $settingsObj->getAlbumById($albm_id);
					echo $albumName['album_name']; ?></div>
                    <div class="fl border1" style="margin: 0px;width: 100%"></div>
                    <div class="cls"></div>
                  </div>
               
          <?php
                  for($i=0;$i<count($productPages);$i++)
                  {
					  
                      $albumName = $settingsObj->getAlbumById($productPages[$i]['album_id']);
                  ?>
         
                  
                    <div class="MarT10" style="float: left">
                    
                        <div class="fl width220"><a href="<?php echo $mediaObj->getImageCodeById($productPages[$i]['image_id'])?>" class="group1"><img src="<?php echo Uploads_URL."/image.php?src=".$mediaObj->getImageCodeById($productPages[$i]['image_id'])."&w=220&h=148&q=100"; ?>" alt=""> </a></div>
                    <div class="fl width600" style="width: auto">
                      <div class="font12col" style="width:68px;">
                          <div class="fl gallerybg"><?php echo convertTimestampToDate($productPages[$i]['image_date']) ; ?></div>
                          <div class="cls"></div>
                          <?php echo $productPages[$i]['image_name']; ?><br>
                        <br>
                      </div>
                      <div><?php echo $productPages[$i]['content']; ?></div>
                    </div>
                  
                    <div class="cls"></div>
                     
                  </div>
                <?php
              
			    }              
				?>
                </div>
                
              </div>
               
              <div class="cls"></div>
              
                
             
                
          </div>
        </div>
        
              <div style="float:right"> <?php echo $pageNumbers = $pagination->getLinks($_GET) ?> </div></div>
                 <?php
				    }
 
                ?>
      </div>
    </section>
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>