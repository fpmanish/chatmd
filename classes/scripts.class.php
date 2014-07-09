<?php
/*
 * This class is responsible for all javascript files inclusion on pages.
 * 
 * Coder: Manish Sonwal
 * Dated: 12-Dec 2012
 */

class jscripts
{
    // constructor
    public function jscripts(){}
    
    public static function script($file = "")
    {
        if($file != "" && file_exists(JS_PATH."/".$file))
            return "<script type='text/javascript' src='".JS_URL."/".$file."'></script>";
    }
    
    /**** jQuery Section ****/
    
    // function for main jquery inclusion. (only production versions allowed)
    // parameter: version number for particular inclusion, "latest" for latest one.
    public static function jQuery($ver="latest")
    {
        $allVersionsFound = array();
        $versionNameMappingArr = array();
        
        if($ver == "latest")
        {
            // find all jquery libs present in system.
            if($handleFunc = opendir(JS_PATH))
            {
                while(false !== ($entry = readdir($handleFunc)))
                    if(preg_match("/\b^(jquery-)[0-9]\.[0-9]\.[0-9](\.min\.js)$\b/",$entry))
                    {
                        $version = str_replace("jquery-", "", $entry);
                        $version = str_replace(".min.js", "", $version);
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
                return jscripts::script($versionNameMappingArr[$jQueryKey]["url"]);
            }
        }
        else
        {
            $file = "jquery-".$ver.".min.js";
            if(file_exists(JS_PATH."/".$file))
                return jscripts::script($file);
        }
        
        // No conditions satisfied, but afterall we have to include jQuery to run our project properly.
        // Hence we use jQuery CDN to provide us latest jQuery production version.
        return "<script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script>";
    }

    /** jQuery UI Library **/
    // include jQuery UI library into page.
    public static function jQueryUI($ver="latest")
    {
        $allVersionsFound = array();
        $versionNameMappingArr = array();
        $latestVerNow = "1.9.2";
        
        if($ver == "latest")
        {
            // find all jquery libs present in system.
            if($handleFunc = opendir(JS_PATH))
            {
                while(false !== ($entry = readdir($handleFunc)))
                    if(preg_match("/\b^(jquery-ui-)[0-9]\.[0-9]\.[0-9](\.custom.min\.js)$\b/",$entry))
                    {
                        $version = str_replace("jquery-ui-", "", $entry);
                        $version = str_replace(".custom.min.js", "", $version);
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
                return jscripts::script($versionNameMappingArr[$jQueryKey]["url"]);
            }
        }
        else
        {
            $file = "jquery-ui-".$ver.".custom.min.js";
            if(file_exists(JS_PATH."/".$file))
                return jscripts::script($file);
        }
        
        // including jQuery UI from google CDN.
        return "<script src='//ajax.googleapis.com/ajax/libs/jqueryui/".$latestVerNow."/jquery-ui.min.js'></script>";
    }
    
    // This function will include the minified version of jquery RTE.
    // This library is not present on any CDN yet.
    public static function jQRTE()
    {
        if(file_exists(JS_PATH."/jquery.juirte.min.js"))
            return jscripts::script("jquery.juirte.min.js");
    }
    
    // Function for jQuery Forms plugin for including AJAX features in html forms.
    public static function jQForm()
    {
        if(file_exists(JS_PATH."/jquery.form.min.js"))
            return jscripts::script("jquery.form.min.js");
        else
            return "<script type='text/javascript' src='http://malsup.github.com/jquery.form.js'></script>";
    }
}
?>