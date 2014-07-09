<?php
include_once("../../conf/config.inc.php");
include_once(MODULES_PATH."/doctor/code/blog_code.php");
include_once(INCLUDES_DIR."/header.php");
?>
<script>
function deleteConfirmation(url)
{

	if(url.length && confirm("Are you sure to delete this Blog?"))
		location.href = url;
}
  function submitCall()
     {
     	document.getElementById("AccessId").submit();
     }
$(document).ready(function(){ 	$( "#chatDoc" ).click(function() {	$("#myModal005").modal('show');	});	    
	$("#AccessId").submit(function(event) {
          		var accesskey=$("#accessvalue").val();
          		var id=$("#enterid").val();
          		if(!$("#AccessId").validationEngine('validate')){
         event.preventDefault();
          }
          if(accesskey != ""){
          $.ajax({
         type: "POST",
  url: "<?php echo MODULE_URL."/doctor/ajax/check_token.php"; ?>" ,
  data: { access: accesskey, id:id }
          }).done(function(msg) {
          	if(msg=='0'){
         $("#erro").show();
        
    	 $("#erro").html("Access Key is not valid");
    	 $("#erro").fadeOut(8000, function() {
  
  });
    event.preventDefault();
  }
  else if(msg=='1')
  {
 submitCall();
  }

});
 
        }
          
  
  	 return false;	
 
   
     });
   
     });
   
     </script>

<!--| Contant Start |-->
<div class="container">
  <div class="row">
    <div class="span12 edit-pro-bar">
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/dashboard.php"; ?>">Profile</a></div>
      <div class="span2"><a href="<?php echo MODULE_URL."/doctor/Appointment.php"; ?>">Appointments</a></div>
       <div class="span2 active" style="border:none;"><a href="#">Blogs</a></div>
      <div class="span2 " ><a href="<?php echo MODULE_URL."/doctor/Accounts.php"; ?>">Accounts</a></div>
      <div class="cls"></div>
    </div>
    <div class="span12 past-app top_do_bg_contant_box">
    	<div class="edit_blog"><a href="<?php echo MODULE_URL."/doctor/form/blog_form.php"; ?>" class="publish_but">Add Blog</a></div>
        <div class="cls"></div>
        <div class="app-info">
            	<table width="100%" class="top_doctor">
          <tr class="top_doctor">
            <th class="top_doctor" width="60%"><strong><span class="hide_480">Title</span><span class="show_480">Title</span></strong></th>
            <th class="top_doctor" width="20%"><strong><span class="hide_480">Action</span><span class="show_480">Action</span></strong></th>
            
          </tr>
          <?php for($i=0;count($bogList_Arr)>$i;$i++) { ?>
          <tr class="top_doctor">
            <td class="top_doctor" width="60%"><strong><a href="#" class="acolor"><?php echo $bogList_Arr[$i]['blog_title'];?></a></strong></td>
            <td class="top_doctor wb" width="20%"><strong><a href="<?php echo MODULE_URL."/doctor/form/blog_form.php?id=".$bogList_Arr[$i]['blog_id']; ?>"><i class="icon-pencil"></i></a> &nbsp; &nbsp;
            	<a href="javascript:" onclick="deleteConfirmation('<?php echo MODULE_URL."/doctor/blog.php?delete_id=".$bogList_Arr[$i]['blog_id']; ?>')"><i class="icon-remove"></i></a></strong></td>
          </tr>
         <?php }?>
        </table>
            </div>
      <div class="cls"></div>
    </div>
  </div>
</div>
</div>
<!--| Contant End |--> 
<?php include_once(INCLUDES_DIR."/footer.php") ; ?>