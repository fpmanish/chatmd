<?php extract($_POST);
include_once("../../../../conf/config.inc.php");

$settingsObj = new settings();
$State_array=$settingsObj->getStateByCountryId($id);

 ?>


 <div class="mws-form-row" id="stateDiv">
                    				<label>State </label>
                    				<div class="mws-form-item small" >
                    					<select class="chzn-select validate[required]"  name="State" id="state" onchange="stateChange(this.value)">
                  		<option  value=""> Select Your state </option>
                  		<?php for($i=0;count($State_array)>$i;$i++){?>
                  			<option value="<?php echo $State_array[$i]['regionID']; ?>"> <?php echo $State_array[$i]['regionName']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>