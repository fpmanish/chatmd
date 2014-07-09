<?php extract($_POST);
include_once("../../../conf/config.inc.php");

$settingsObj = new settings();
$State_array=$settingsObj->getStateByCountryId($id);

 ?>
<div class="name" id="stateRemove">State :</div>
<div class="ragi-input" id="stateDiv">
				<div class="mainsel">
              	<label>
                	<select class="validate[required]" name="State" id="state" data-errormessage-value-missing="state is required!" onchange="stateChange(this.value)">
                  		<option selected="" value=""> Select Your State </option>
                  		<?php for($i=0;count($State_array)>$i;$i++){?>
                  			<option value="<?php echo $State_array[$i]['regionID']; ?>"> <?php echo $State_array[$i]['regionName']; ?> </option>
                  			<?php }?>
                	</select>
              	</label>
            	</div>
			</div>

