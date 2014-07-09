<?php extract($_POST);
include_once("../../../../conf/config.inc.php");

$settingsObj = new settings();
$City_array=$settingsObj->getCityByStateId($id);

 ?>

<div class="mws-form-row" id="cityRemove">
                    				<label>City </label>
                    				<div class="mws-form-item small" >
                    					<select class="chzn-select validate[required]"  name="City" id="City">
                  		<option  value=""> Select Your City </option>
                  		<?php for($i=0;count($City_array)>$i;$i++){?>
                  			<option value="<?php echo $City_array[$i]['cityID']; ?>"> <?php echo $City_array[$i]['cityName']; ?> </option>
                  			<?php }?>
                    					</select>
                    				</div>
                    			</div>