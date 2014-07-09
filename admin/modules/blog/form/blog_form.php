<link href="<?php echo ADMIN_CSS_URL; ?>/fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_URL; ?>/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_CSS_URL; ?>/elrte.full.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_URL; ?>/elfinder.css" rel="stylesheet" type="text/css" />
<?php echo jscripts::script("jquery.form.min.js"); ?>
<?php echo jscripts::script("jQuery.fileinput.js"); ?>
<?php echo jscripts::script("jquery.validationEngine-en.js"); ?>
<?php echo jscripts::script("jquery.validationEngine.js"); ?>
<?php echo jscripts::script("elrte.min.js"); ?>
<!-- Main Container Start -->
<script>
    $(document).ready(function(){
        
     
	var availableTags = [ <?php for ($k=0; $k<count($DoctorName); $k++) {
		$doctorTbaleArr=$blogObj->getDoctorByRegistrationId($DoctorName[$k]['patient_id']);
		
		$doctorcountryArr=$blogObj->getCountryNameByCountryId($doctorTbaleArr['CountryId']);
		$doctorstateArr=$blogObj->getStateByStateId($doctorTbaleArr['StateId']);
		?>
		"<?php echo $DoctorName[$k]['name']."/".$doctorcountryArr['countryName']."/".$doctorstateArr['regionName'];?>",
		<?php }?>
	];
	$( ".mws-autocomplete" ).autocomplete({
		source: availableTags
	});
        
        $("#media_form").validationEngine("attach",{binded:false});
        $("#elrte").elrte({toolbar: 'compact',allowSource:false,width:410,height:150});
        $("#newrel_date").datepicker({"dateFormat":'d M y'});
    });
</script>
    <div id="mws-container" class="clearfix">
    <div class="container">
        <div style="float: right;margin: 0 10px 10px 0;"><a style="text-decoration: none;" href="<?php echo ADMIN_MODULE_URL."/blog/index.php?pageType=list" ?>" class="mws-button blue">View Blog List</a></div>
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-new-releases">Blog <?php echo $PagetypeText; ?></span>
            </div>
            <div class="mws-panel-body">
                <div class="mws-datatable mws-table">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-body">
                        <form id="media_form" class="mws-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" value="<?php echo $_GET['pageType'] != ""?$_GET['pageType']:$pageType; ?>" name="pageType" />
                            <input type="hidden" value="<?php echo $_GET['blog_id'] != ""?$_GET['blog_id']:($blogData['blog_id']!=""?$blogData['id']:$blog_id); ?>" name="edit_id" />
                            <div class="mws-form-inline">
                                <?php echo showErrorText($error); ?>                             
                                <div class="mws-form-row">
                                    <label>Blog Title</label>
                                    <div class="mws-form-item small">
                                        <input class="mws-textinput validate[required]" type="text" name="blog_title" placeholder="Enter The Blog Title" value="<?php echo $blogData['blog_title']; ?>">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                    				<label>Category</label>
                    				<div class="mws-form-item small">
                    					<select class="chzn-select validate[required]" name="category">
                    						<option value="">Select a category</option>
                    						<?php for($i=0;count($blogCatergoryList)>$i; $i++) { ?>
                    						<option value="<?php echo $blogCatergoryList[$i]['id']; ?>" <?php if($blogCatergoryList[$i]['id']==$blogData['blogcategory_id']) {echo "selected='selected'";}?> ><?php echo $blogCatergoryList[$i]['blog_categoryName']; ?></option>
                    						<?php }?>
                    					</select>
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                                    <label>Blog  Description</label>
                                    <div class="mws-form-item small">
<textarea id="elrte" class="validate[required]" name="blog_content"><?php echo $blogData['blog_description']; ?></textarea>
</div>
                                </div>
                               
				 
                              <div class="mws-form-row">
                                	<label>Autocomplete</label>
                                	<div class="mws-form-item ">
                                    	<input type="text" class="mws-autocomplete mws-textinput validate[required]" name="DoctorAuotName" value="<?php  $name =$blogObj->getNameByPatientID($blogData['id']); 
										 $countryID =$blogObj->getCountryByDoctorID($blogData['id']); 
										 $counrteyName=$blogObj->getCountryNameByCountryId($countryID['CountryId']);
										  $stateName=$blogObj->getStateByStateId($countryID['StateId']);
										  if($name['name'] !=""){
                                    	echo $name['name']."/".$counrteyName['countryName']."/".$stateName['regionName'];  } ?>" />
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label>Activate?</label>
                                    <div class="mws-form-item large">
                                        <ul class="mws-form-list">
                                            <li><input <?php if($blogData['is_active']){ ?> checked="checked" <?php } ?> id="active_yes" type="radio" name="activate" class="validate[required]" value="1" /> <label for="active_yes">Yes</label></li>
                                            <li><input <?php if(!$blogData['is_active']){ ?> checked="checked" <?php } ?> id="active_no" type="radio" name="activate" class="validate[required]" value="0" /> <label for="active_no">No</label></li>
                                        </ul>
                                        <label for="activate" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <?php if(empty($blogData)) {?>
                                <input type="submit" value="Save" class="mws-button red" />
                                <?php }else {?>
                                	 <input type="submit" value="Edit" class="mws-button red" />
                                	<?php }?>
                            </div>
                        </form>
                    </div>      
                </div>
                </div>
            </div>
            <style type="text/css">
              #change_image_file  {
                    float: none;
    margin: 0;
    padding: 0 0 5px 0;
                }
            </style>
            </div>
    
    </div>
    <?php include_once(ADMIN_INCLUDE_PATH."/copyright.php"); ?>
    </div>
    <!-- Main Container End -->