<?php
include_once("../../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/blog_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>

$(document).ready(function()
{
	    $("#blog").validationEngine('attach', {binded :false,autoHidePrompt:true,autoHideDelay:3000,autoPositionUpdate:true,promptPosition : "centerRight", scroll: false});

});
</script>
<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12">
    <div class="inner-main-bg">
      <div class="inner_heading_bg">Edit Blog</div>
      <div class="ragister_box">
      	<form name="Blog" id="blog" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      	<div class="span5">
        
        	<div class="name">Blog Titel :</div>
            <div class="ragi-input">
				<input name="blog_title" type="text" class=" validate[required]" value="<?php echo $blogData['blog_title'];?>">
			</div>
            <div class="name">Category :</div>
            <div class="ragi-input">
            	<div class="mainsel">
              	<label>
                	<select name="blogcategory_id" class=" validate[required]">
                  		<option selected="" value=""> Select Your Category </option>
                  		<?php 
                  	
                  		for($i=0;count($blogCatergoryList)>$i; $i++) { ?>
                    						<option value="<?php echo $blogCatergoryList[$i]['id']; ?>" <?php if($blogCatergoryList[$i]['id']==$blogData['blogcategory_id']) {echo "selected='selected'";}?> ><?php echo $blogCatergoryList[$i]['blog_categoryName']; ?></option>
                    						<?php }?>
                	</select>
              	</label>
            	</div>
			</div>
            <div class="name">Blog Content :</div>
            <div class="ragi-input">
			    <textarea name="blog_content" class="my_textaea validate[required]" name="" cols="" rows=""  ><?php echo  $blogData['blog_description']; ?></textarea>
			</div>
            
            <div class="ragi-but">
            	<input type="hidden" name="action" value="<?php if($_GET['id']=="") { echo "Add"; } else { echo "Edit"; }?>">
            	<?php  if($_GET['id'] !="") { ?>
            		<input type="hidden" name="Edit_id" value="<?php echo $_GET['id'];?>">
            		<?php }?>
            <input type="submit" class="process" value="Submit" name="submit" >
            </div>
            <div class="cls"></div>
        </div>
        </form>
        <div class="span4"><img src="<?php echo IMAGE_URL ;?>/add-blog.png" alt="image"></div>
		<div class="cls"></div>
      </div>
      </div>
    </div>
  </div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>