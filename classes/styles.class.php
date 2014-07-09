<?php
/*
 * This class is responsible for all css files inclusion on pages.
 * 
 * Coder: Manish Sonwal
 * Dated: 20-Dec 2012
 */

class styles
{
    // Constructor
    public function styles(){}
    
    // Inclusion main function.
    public static function style($file = "")
    {
        if($file != "" && file_exists(CSS_PATH."/".$file))
            return '<link href="'.CSS_URL."/".$file.'" rel="stylesheet" type="text/css" />';
    }
    
    // Include main jQuery UI CSS.
    public static function jQUICSS($ver = "latest")
    {
        $allVersionsFound = array();
        $versionNameMappingArr = array();
        $latestVerNow = "1.9.2";
        
        if($ver == "latest")
        {
            // find all jquery libs present in system.
            if($handleFunc = opendir(CSS_PATH))
            {
                while(false !== ($entry = readdir($handleFunc)))
                    if(preg_match("/\b^(jquery-ui-)[0-9]\.[0-9]\.[0-9](\.custom.min\.css)$\b/",$entry))
                    {
                        $version = str_replace("jquery-ui-", "", $entry);
                        $version = str_replace(".custom.min.css", "", $version);
                        $version = explode(".",$version);
                        
                        for($i=0;$i<count($version);$i++)
                        {
                            $version[$i] = $version[$i] != ""?$version[$i]:0;
                        }
                        
                        if(count($version)<3)
                            $version[] = 0;
                        
                        $version = implode("",$version);
                        $allVersionsFound[] = $version;
                        
                        $versionNameMappingArr[] = array(
                            "url" => ($entry),
                            "version" => $version
                        );
                    }
    
                $latestVer = max($allVersionsFound);    // getting latest version.
                
                // getting url.
                $jQueryKey = searchMultiArrays($latestVer,$versionNameMappingArr,"version");
                return styles::style($versionNameMappingArr[$jQueryKey]["url"]);
            }
        }
        else
        {
            $file = "jquery-ui-".$ver.".custom.min.css";
            if(file_exists(CSS_PATH."/".$file))
                return styles::style($file);
        }
        
        // including jQuery UI from google CDN.
        return "<script src='//ajax.googleapis.com/ajax/libs/jqueryui/".$latestVerNow."/themes/base/jquery.ui.base.css'></script>";
    }
    
    // This function wil include the css of jQuery RTE.
    // Its CSS is not available on any CDN yet.
    public static function jQRTECSS()
    {
        if(file_exists(CSS_PATH."/jquery.juirte.min.css"))
            return styles::style("jquery.juirte.min.css");
    }
    
    // This function is useful for including jQuery datatable css.
    public static function jQdataTableCSS()
    {
        if(file_exists(CSS_PATH."/jquery.juirte.min.css"))
            return styles::style("jquery.juirte.min.css");
    }
}


?>