<?php
class miscUtilityFunctions
{
	public function filterIntField($strValue)
	{
		if($strValue != "")
		{
			$strValue = str_replace("$","",$strValue);
			$strValue = str_replace(",","",$strValue);
			$strValue = str_replace("%","",$strValue);
			$strValue = floatval($strValue);
			return $this->remove_non_numeric($strValue);
		}
	}
	
	public function remove_non_numeric($string)
	{
		$finalString = '';
		
		$ret = explode(".",$string);
		
		for($i=0;$i<count($ret);$i++)
		{
			$ret[$i] =  preg_replace('/\D/', '', $ret[$i]);
			if($i == count($ret)-1 && $i != 0)
			{
				$ret[$i] = $ret[$i] != ""? $ret[$i]:"0";
				$finalString .= ".".$ret[$i];
			}
			else
			{
				$finalString .= $ret[$i];
			}
		}
		return $finalString;
	}
	
	public function curPageName()
	{
		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	public function setSession($sesName,$sesValue)
	{
		if($sesName != "" && $sesValue != "")
		{
			$_SESSION[$sesName] = $sesValue;
			return true;
		}
		return false;
	}
}
?>