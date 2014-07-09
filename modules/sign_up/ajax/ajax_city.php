<?php extract($_POST);
include_once("../../../conf/config.inc.php");

$settingsObj = new settings();
$City_array=$settingsObj->getCityByStateId($id);

 ?>
<div class="name" id="cityRemove">City :</div>
<div class="ragi-input" id="cityDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="City" id="City" data-errormessage-value-missing="City is required!">
                  		<option selected="" value=""> Select Your City </option>
                  		<?php for($i=0;count($City_array)>$i;$i++){?>
                  			<option value="<?php echo $City_array[$i]['cityID']; ?>"> <?php echo $City_array[$i]['cityName']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>

