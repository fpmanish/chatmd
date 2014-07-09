<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/media/code/events_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<section>
      <div class="PaddATL50">
        <div>
          <div>
          <div>
            <div class="font22 " style="float:left;"><a href="events.php" alt="" <?php if(!$page){ ?> style="color:#FFF;" <?php } ?>>Events </a></div>
            
            <div class="font22 " style="float:left; padding-left:50px;"><a href="events.php?page=archieve" <?php if($page){ ?> style="color:#FFF;" <?php } ?> alt="">Archive </a></div>
           
           
            </div>
            <div style="clear:both"></div>
            <div class="line MarT5"></div>
          </div>
          <?php if($page =="")
		  {?>
          <div class="PdTop15">
            <div>
              <div class="fr width800" style="border-left:#263339 1px solid; padding-left:30px;">
                  <?php
                  for($i=0;$i<count($eventsGrouped);$i++)
                  {
                  ?>
                <div style="display:none" id="monthdate_<?=$i?>">
                  <div>
                    <div class="fl font18"><?php echo $eventsGrouped[$i]['monthName']; ?></div>
                    <div class="fl border1"></div>
                    <div class="cls"></div>
                  </div> 
                  <?php
		for($j=0;$j<count($eventsGrouped[$i]['data']);$j++)
                  {
					  $fromdate =strtotime($eventsGrouped[$i]['data'][$j]['date']);
					if ($today>=$todate && $todate<=$fromdate)
                      {
                     $mothArr[]=$eventsGrouped[$i]['monthName'];
                  ?>
                 <script type="text/javascript">
documnet_id = '#monthdate_<?=$i?>';
$(documnet_id).show();
</script>
                  <div class="MarT10">
                    <div class="fl eventsbg"><?php echo $eventsGrouped[$i]['data'][$j]['date']; ?></div>
                    <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getEventImageById($eventsGrouped[$i]['data'][$j]['event_id'])."&w=220&h=148&q=100"; ?>" alt=""></div>
                    <div class="fl width600">
                      <div class="font12col"><?php echo $eventsGrouped[$i]['data'][$j]['heading']; ?><br>
                        <br>
                      </div>
                      <div><?php echo htmlspecialchars_decode($eventsGrouped[$i]['data'][$j]['content']); ?></div>
                    </div>
                    <div class="cls"></div>
                  </div>
                  <?php
                  }}
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
						 $fromdate =strtotime($eventsGrouped[$i]['data'][$j]['date']);
					if ($today>=$todate && $todate<=$fromdate)
{
                ?>
                <div class="MarT10">
                  <div class="width220"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getEventImageById($eventsGrouped[$i]['data'][$j]['event_id'])."&w=220&h=148&q=100"; ?>" alt=""></div>
                  <div class="font12col PdTop5 tc"><?php echo $eventsGrouped[$i]['data'][$j]['heading']; ?></div>
                </div>
                <?php
                    }
                }}
                ?>
              </div>
            
              <div class="cls"></div>
            </div>
          </div>
          <?php }elseif($page !="")
		  {?>
          <div class="PdTop15 fl">
            <div>
             
                  <?php
				  $monthArr=array();
				  //echo '<pre>';
				  //print_r($eventsGrouped);
                  for($i=0;$i<count($eventsGrouped);$i++)
                  {
					  $monthArr[]=$eventsGrouped[$i]['monthName'];
                  ?>
                <div style="display:none" id="monthdate_<?=$i?>">
                     <div>
                    <div class="fl font18"><?php echo $eventsGrouped[$i]['monthName']; ?></div>
                    <div class="fl border2"></div>
                    <div class="cls"></div>
                  </div>
               
                  <?php
                  for($j=0;$j<count($eventsGrouped[$i]['data']);$j++)
                  {

					 $fromdate =strtotime($eventsGrouped[$i]['data'][$j]['date']);
					if ($fromdate<=$todate)
{
  ?>
<script type="text/javascript">
documnet_id = '#monthdate_<?=$i?>';
$(documnet_id).show();
</script>
               
                  <div class="MarT10">
                    <div class="fl eventsbg"><?php echo $eventsGrouped[$i]['data'][$j]['date']; ?></div>
                    <div class="fl width220 MarL10"><img src="<?php echo Uploads_URL."/image.php?src=".$cmsObj->getEventImageById($eventsGrouped[$i]['data'][$j]['event_id'])."&w=220&h=148&q=100"; ?>" alt=""></div>
                    <div class="fl width900">
                      <div class="font12col"><?php echo $eventsGrouped[$i]['data'][$j]['heading']; ?><br>
                        <br>
                      </div>
                      <div><?php echo $eventsGrouped[$i]['data'][$j]['content']; ?></div>
                    </div>
                    <div class="cls"></div>
                  </div>
                  <?php
                  }}
                  ?>
                </div>
                <?php
                }
                ?>
              </div>
            
              
            
             
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>
    <!--| End Section |--> 
    <?php include_once(INCLUDES_DIR."/footer.php") ; ?>