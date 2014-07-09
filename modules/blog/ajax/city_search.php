<?php extract($_POST);
include_once("../../../conf/config.inc.php");
$settingsObj = new settings();
$cityArr=$settingsObj->CityList($id); ?>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" 
style="display: block; top: 40px;z-index: 999; ">
	<?php
if(count($cityArr)>0)
{
for($i=0;count($cityArr)>$i; $i++)	
{
	$stateArr=$settingsObj->getStateByStateId($cityArr[$i]['regionID']);
	$countryArr=$settingsObj->getCountryNameByCountryId($cityArr[$i]['countryID']);
	
	?><li class="ui-menu-item" role="presentation">
		<a id="<?php echo $i+1; ?>_auto" class="ui-corner-all" tabindex="-1" style="cursor:pointer" onclick="return auto(this.id);">
		<?php
		$str=$cityArr[$i]['cityName'].",";
		if(!empty($stateArr))
		{
			$str .=$stateArr['regionName'];
			 echo $str;
		}
	
	
	?>
	</a>
	</li>
	<?php
	
}
}
?></ul>
