<?php

include_once("../../conf/config.inc.php");

include_once(MODULES_PATH."/media/code/music_code.php");

include_once(INCLUDES_DIR."/header.php");

?>

<script>

  function getPlayer(movieName)
{
if (navigator.appName.indexOf("Microsoft") != -1)
{
return window[movieName];
}
else
{
return document[movieName];
}
}

function play1()
{
getPlayer('player1').playMusic();
}

</script>

<section>

      <div class="PaddATL50">

        <div>

          <div>

            <div class="font22">Music</div>

            <div class="line MarT5"></div>

          </div>

			  
		
          <div>

              <?php
 // Create the pagination object
          $pagination = new pagination($musicList, (isset($_GET['page']) ? $_GET['page'] : 1), 5);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
           $productPages = $pagination->getResults();
              for($i=0;$i<count($productPages);$i++)

              {

                  $albumName = $settingsObj->getAlbumById($productPages[$i]['album_id']);
             $music_id=$mediaObj->getMusicById($productPages[$i]['music_id']) ;
              ?>

            <div>

              <div class="pdTB20" id="player_section_<?php echo $i; ?>">

                <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$settingsObj->getAlbumImageById($albumName['album_id']); ?>&w=220&h=148&q=100" /></div>

                <div class="fl width600" style=" width: 900px; text-align: justify">

                <div><?php echo $productPages[$i]['music_name']; ?><br>

                <div class="fl player MarT27" style="float: right; width: 380px; height:30px; padding-left:10px;">

                                
                    </div>

                </div>

                    Album: <strong><?php echo $albumName['album_name']; ?></strong><br>

                    <br>

                  </div>

                   <div><?php echo $productPages[$i]['music_description']; ?></div> 
                </div>

                <div class="cls"></div>

              </div>
 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="30" height="30" id="player1">
<PARAM NAME=movie VALUE="<?php echo Uploads_URL."/music/audioplay.swf"; ?>?playerid=xxx">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=wmode VALUE="transparent">
<PARAM NAME="allowScriptAccess" value="always" />

<embed src="<?php echo Uploads_URL."/music/audioplay.swf"; ?>?file=<?php echo Uploads_URL."/music/".$music_id['music_file'];  ?>&auto=no&sendstop=yes&repeat=1
&buttondir=<?php echo IMAGE_URL; ?>/buttons/classic&
bgcolor=0x507050&mode=playpause&usebgcolor=yes&mastervol=" bgcolor=#507050 quality=high width="30" height="30" align=""
TYPE="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" ></embed>
</object>
              <div class="line"></div>

            </div>

            <?php

            }

            ?>
 <div style="float:right"> <?php echo $pageNumbers = $pagination->getLinks($_GET) ?> </div>
          </div>

        </div>

      </div>

    </section>

    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>