<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/blog/code/blog_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 blog">
      <div class="span9">
        <div class="inner-main-bg">
        <div class="inner_heading_bg">Best Doctors Blogs</div>
          <div class="blog-box">
          	<ul class="blogs">
          		<?php for ($i=0; $i < count($bogArr); $i++) { 
					  
				 ?>
            	<li>
          			<div class="blog-head"><?php echo $bogArr[$i]['blog_title'];?></div>
            		<div class="blog-dis">
            			<span><?php 
            			$imageName=$blogObj->getImageByDoctorID($bogArr[$i]['id']);
            			if($imageName['image'] !="") { ?><img src="<?php echo MODULE_URL."/doctor/upload_file/".$imageName['image']; ?>" alt="image"><?php }?></span>
                		<div class="blog-text"> <?php
                		$description=$bogArr[$i]['blog_description'];
                		$strLen= strlen($description);
						
						if($strLen >1000){
							echo showOnlyFirstVarChars($description,1000);
						
                		} else {
                			echo $description;
                		}?> </div>
                		<div class="like">
                  		<div class="fb"><div class="fb-like" data-href="http://phpdemo.internetbusinesssolutionsindia.com/chatMD/search/DoctorProfile.php?my_id=<?php echo $bogArr[$i]['id']; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></div>
                 		<div class="tweet"><a href="https://twitter.com/share http://phpdemo.internetbusinesssolutionsindia.com/chatMD/search/DoctorProfile.php?my_id=<?php echo $bogArr[$i]['id']; ?>" class="twitter-share-button" data-url="http://phpdemo.internetbusinesssolutionsindia.com/chatMD/search/DoctorProfile.php?my_id=<?php echo $bogArr[$i]['id']; ?>" data-via="your_screen_name" data-lang="en">Tweet</a>
                 			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                 		</div>
                	</div>
                	<div class="dr-more">
                  	<div class="dr"><?php $name =$blogObj->getNameByPatientID($bogArr[$i]['id']); echo $name['name'];?></div>
                  	<div class="more"><?php if($strLen > 1000){?><a href="viewAll.php?id=<?php echo $bogArr[$i]['blog_id']; ?>"><strong>Read more...</strong></a> <?php }?></div>
               	 	</div>
            		</div>
            	</li>
            	<?php }?>
              
            </ul>
            <div class="cls"></div>
          </div>
        </div>
      </div>
      <div class="span3">
        <div class="inner-main-bg">
          <div class="inner_heading_bg">Recent Post</div>
          <div class="blog-sidebar">
          	<ul class="blog-menu">
          		<?php for ($j=0; $j<count($bogCatArr); $j++){ 
          			  $checkidArr=$blogObj->getBlogBycatergoyId($bogCatArr[$j]['id']);
            		if(count($checkidArr) >0)
					{?>
            	<li><a href="<?php echo  MODULE_URL."/blog/AllCategory.php?id=".$bogCatArr[$j]['id']; ?>">
			<?php	echo	$bogCatArr[$j]['blog_categoryName']	;
					
            		?></a></li>
               <?php }} ?>
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