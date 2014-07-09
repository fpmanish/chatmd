<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/events_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<section>
      <div class="PaddATL50">
        <div>
          <div>
            <div class="font22">Events</div>
            <div class="line MarT5"></div>
          </div>
          <div class="PdTop15">
            <div>
              <div class="fr width800" style="border-left:#263339 1px solid; padding-left:30px;">
                  <?php
                  for($i=0;$i<count($eventsGrouped);$i++)
                  {
                  ?>
                <div>
                  <div>
                    <div class="fl font18"><?php echo $eventsGrouped[$i]['monthName']; ?></div>
                    <div class="fl border1"></div>
                    <div class="cls"></div>
                  </div>
                  <?php
                  for($j=0;$j<count($eventsGrouped[$i]['data']);$j++)
                  {
                  ?>
                  <div class="MarT10">
                    <div class="fl eventsbg"><?php echo $eventsGrouped[$i]['data'][$j]['date']; ?></div>
                    <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getEventImageById($eventsGrouped[$i]['data'][$j]['event_id'])."&w=220&h=148&q=100"; ?>" alt=""></div>
                    <div class="fl width600">
                      <div class="font12col"><?php echo $eventsGrouped[$i]['data'][$j]['heading']; ?><br>
                        <br>
                      </div>
                      <div><?php echo $eventsGrouped[$i]['data'][$j]['content']; ?></div>
                    </div>
                    <div class="cls"></div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <?php
                }
                ?>
              </div>
            
              <div class="fl width225" >
                <div class="font18 ">Recent events</div>
                <?php
                for($i=0;$i<count($eventsGrouped);$i++)
                {
                    for($j=0;$j<count($eventsGrouped[$i]['data']);$j++)
                    {
                ?>
                <div class="MarT10">
                  <div class="width220"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getEventImageById($eventsGrouped[$i]['data'][$j]['event_id'])."&w=220&h=148&q=100"; ?>" alt=""></div>
                  <div class="font12col PdTop5 tc"><?php echo $eventsGrouped[$i]['data'][$j]['heading']; ?></div>
                </div>
                <?php
                    }
                }
                ?>
              </div>
            
              <div class="cls"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--| End Section |--> 
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>