<?php
	/*==================================================================*\
	#   Coder: Chandra Bhan
	\*==================================================================*/
	//Get Page Name..
	function getPageName() {
		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
    
    // get random password
    // function genRandomPass($length = 8) {
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $string = "";
//         
        // for ($p = 0; $p < $length; $p++) {
            // $string .= $characters[mt_rand(0, strlen($characters))];
        // }
        // return $string;
    // }
    // get random nouber
   function genRandomPass($length = 8)
{
$pass = "";

// possible password chars.
$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
"k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
"u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");

for($i=0 ; $i < $length ; $i++)
{
$pass .= $chars[mt_rand(0, count($chars) -1)];
}

return $pass;
}
   
    // is email valid
    function is_valid_email($email)
    {
        $result = TRUE;
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result = FALSE;
        }
        return $result;
    }
    
    // is valid URL
    function isValidURL($url)
    {
        if($url != "")
        {
            return filter_var($url, FILTER_VALIDATE_URL);
        }
    }
    
    // Allow only numbers
    function onlyNumValidation($number)
    {
        if($number != "")
        {
            return is_int($number);
        }
    }
    
    // Allow only chars
    function onlyCharValidation($string)
    {
        if($string != "")
        {
            return preg_match('/^[A-Z][a-zA-Z -]+$/',$string);
        }
    }

    function allStringValidations($string)      // hard filter function for strings.
    {
        if(strlen($string))
        {
            $string = strip_tags($string);
            $string = htmlspecialchars($string);
            $string = trim($string);
            //$string = DB_realExcapeString($string);
            //$string = htmlentities($string);
            $string = escapeshellcmd($string);
            //$string = escapeshellarg($string);
            
            if(strlen($string))
                return $string;
        }
    }
    
    function softStringValidations($string,$allowedTags="")      // soft filter function for strings.
    {
        if(strlen($string))
        {
            $string = strip_tags($string,$allowedTags);
            $string = htmlspecialchars($string);
            $string = trim($string);
            //$string = DB_realExcapeString($string);
            //$string = htmlentities($string);
            $string = escapeshellcmd($string);
            //$string = escapeshellarg($string);
            
            if(strlen($string))
                return $string;
        }
    }
    
    // Create hash from string (SHA512)
    function createHash($string)
    {
        if($string != "")
        {
            return hash(DEFAULT_HASH_ALGO, $string);
        }
    }
    
    
    // count total words
    function am_countWords($string)
    {
        $word_count = 0;
        $string = eregi_replace(" +", " ", $string);
        $string = eregi_replace("\n+", " ", $string);
        $string = eregi_replace(" +", " ", $string);
        $string = explode(" ", $string);
    
        while (list(, $word) = each ($string)) {
            if (eregi("[0-9A-Za-z�-��-��-�]", $word)) {
                $word_count++;
            }
        }
        return $word_count;
    }
    
    function searchMultiArrays($needle,$haystack,$nextIndex)    // Function useful in finding the key from multidimentional arrays.
    {
        if($needle != "" && $haystack != "")
        {
            for($i=0;$i<count($haystack);$i++)
            {
                if($haystack[$i][$nextIndex] == $needle)
                    return $i;
            }
            return -1;
        }
    }
    
    function actInactSwitch($actLink="",$deactLink="",$value = 0)   // activate/deactivate function.
    {
        $mainStr = "";
        if($value)
        {
            $mainStr .= "<img src='".ADMIN_IMAGE_URL."/icon_status_green.gif' />&nbsp;&nbsp;&nbsp;&nbsp;";
            $mainStr .= "<a href='".$deactLink."'><img src='".ADMIN_IMAGE_URL."/icon_status_red_light.gif' /></a>";
        }
        else
        {
            $mainStr .= "<a href='".$actLink."'><img src='".ADMIN_IMAGE_URL."/icon_status_green_light.gif' /></a>&nbsp;&nbsp;&nbsp;&nbsp;";
            $mainStr .= "<img src='".ADMIN_IMAGE_URL."/icon_status_red.gif' />";
        }
        return $mainStr;
    }
    
    function removeLastNChars($str,$n)  // remove last n chars from string.
    {
        $retval="";
        // check if the string's length is greater than the number 
        // of characters you want to remove  
        if(strlen($str)>$n)
        $retval=substr($str,0,strlen($str)-$n);

        return $retval;
    }
    
    function prepareFileName($fileName = "",$filetype = "music")
    {
        $mediaObj = new media();
        $currentTimestamp = getCurrentTimestamp();
        $expFl = explode(".", $fileName);
        $extension = end($expFl);
        $fileName = removeLastNChars($fileName,strlen($extension));
        $fileName = str_replace(" ", "_", $fileName);
        $fileName = str_replace("#", "_", $fileName);
        $fileName = str_replace("%", "_", $fileName);
        $fileName = str_replace("&", "", $fileName);
        $fileName = str_replace("'", "", $fileName);
        $fileName = str_replace('"', "", $fileName);
        $fileName = str_replace(';', "", $fileName);
        $fileName = str_replace('=', "-", $fileName);
        $fileName = str_replace('/', "", $fileName);
        $fileName = str_replace('\\', "", $fileName);
        $fileName = str_replace('`', "", $fileName);
        $fileName = str_replace('!', "", $fileName);
        $fileName = str_replace('?', "", $fileName);
        $fileName = str_replace(',', "", $fileName);
        $fileName = str_replace('<', "", $fileName);
        $fileName = str_replace('>', "", $fileName);
        $fileName = str_replace('^', "", $fileName);
        $fileName = str_replace('.', "", $fileName);
        $fileName = strtolower($fileName);
        
        switch($filetype)
        {
            case "music": $fileName = strlen($fileName)?($mediaObj->searchDuplicateMusic($fileName.".".$extension)?$currentTimestamp:$fileName):$currentTimestamp;
            break;
            case "video": $fileName = strlen($fileName)?($mediaObj->searchDuplicateVideo($fileName.".".$extension)?$currentTimestamp:$fileName):$currentTimestamp;
            break;
            case "gallery": $fileName = strlen($fileName)?($mediaObj->searchDuplicateGallery($fileName.".".$extension)?$currentTimestamp:$fileName):$currentTimestamp;
        }
        
        return $fileName.".".$extension;
    }
    
    function showErrorText($string)
    {
        if(strlen($string))
            return "<div style='color:#ff0000; padding: 5px;'>".$string."</div>";
    }
    
    function featuredSwitch($actLink="",$value = 0)   // featured function.
    {
        $mainStr = "";
        if($value)
            $mainStr .= "<div class='mws-ic ic-bullet-yellow' style='height:32px;'></div>";
        else
            $mainStr .= "<a href='".$actLink."'><div class='mws-ic ic-bullet-black' style='height:32px;'></div></a>";
        
        return $mainStr;
    }
    function archiveSwitch($actLink="",$deactLink="",$value = 0)   // featured function.
    {
        $mainStr = "";
        if($value==1)
		{
            
            $mainStr .= "<a href='".$deactLink."'><img src='".ADMIN_IMAGE_URL."/featured-on.png' /></a>";
			
			
		}
        elseif($value==0)
		{
          $mainStr .= "<a href='".$actLink."'><img src='".ADMIN_IMAGE_URL."/featured-off.png' /></a>";
           
		}
        
        return $mainStr;
    }
    function getYoutubeVideoId($htmlStr)
    {
        $YTvideoId = "";
        if(strlen($htmlStr))
        {
            if(preg_match('/.?(iframe|embed)/', $htmlStr))
            {
                $regex = '!(src=\'?"?)(.*?)(\'?\"?>|\'?\"?\s.*?>)!is';
                preg_match($regex, $htmlStr, $matches);
                $YTvideoId = $matches[2];
                $YTvideoId = explode("/",$YTvideoId);
                $YTvideoId = end($YTvideoId);
            }
            else
            {
                preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $htmlStr, $matches);
                $YTvideoId = $matches[0];
            }
            return $YTvideoId;
        }
    }
	function showOnlyFirstVarChars($string,$charLen=20) // Used in reports to strip long names.
	{
		
		$string .= "";
		if(!empty($string))
		{
			$string = stripslashes($string);
			if(strlen($string)>$charLen)
			{
				$string = substr($string,0,$charLen-3);
			}
		}
		return $string;
	}
	//
	function doctorRatting($ratting) // Used in reports to strip long names.
	{
		
		if($ratting==1 || $ratting==0)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/grey-star.png"><img src="'.IMAGE_URL.'/grey-star.png"><img src="'.IMAGE_URL.'/grey-star.png">';	
		}
		if($ratting==2)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/half-star.png"><img src="'.IMAGE_URL.'/grey-star.png"><img src="'.IMAGE_URL.'/grey-star.png">';	
		}
		if($ratting==3)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/grey-star.png"><img src="'.IMAGE_URL.'/grey-star.png">';	
		}
		if($ratting==4)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/half-star.png"><img src="'.IMAGE_URL.'/grey-star.png">';	
		}
		if($ratting==5)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/grey-star.png">';	
		}
		if($ratting==6)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/half-star.png">';	
		}
		if($ratting==7)
		{
		$string='<img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png"><img src="'.IMAGE_URL.'/yellow-star.png">';	
		}
		return $string;
	}
?>