<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/music_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
    $(document).ready(function(){
        var masterHolder = "false"; 
        $("[id^=player_section_]").mouseover(function(){
            if(masterHolder == "false")
            {
                var idVal = $(this).attr("id");
                idVal = idVal.replace("player_section_","");
                //alert("sdv asd");
                $("[id^=player_cls_]").hide();
                $("#player_cls_"+idVal).show();
            }
        });
        
        $("[id^=player_section_]").mouseout(function(){
            if(masterHolder == "false")
            {
                $("[id^=player_cls_]").hide();
            }
        });
        
        $("[id^=player_cls_]").click(function(){
            var thisId = $(this).attr("id");
            thisId = thisId.replace("player_cls_","");
            
            if(thisId == masterHolder)
                masterHolder = "false";
            else if(masterHolder == "false")
                masterHolder = thisId;
        });
    });
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
              for($i=0;$i<count($musicList);$i++)
              {
                  $albumName = $settingsObj->getAlbumById($musicList[$i]['album_id']);
              ?>
            <div>
              <div class="pdTB20" id="player_section_<?php echo $i; ?>">
                <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$settingsObj->getAlbumImageById($albumName['album_id']); ?>&w=220&h=148&q=100" /></div>
                <div class="fl width600" style=" width: 900px; text-align: justify">
                <div><?php echo $musicList[$i]['music_name']; ?><br>
                <div class="fl player MarT27" style="float: right; width: 380px; height:30px; padding-left:10px;">
                                  <div id="player_cls_<?php echo $i; ?>" style="display: none;">
                        <?php
                          echo $musicList[$i]['music_file'];
                        ?>
                    </div>
                </div>
                    Album: <strong><?php echo $albumName['album_name']; ?></strong><br>
                    <br>
                  </div>
                   <div><?php echo $musicList[$i]['music_description']; ?></div> 
                  
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