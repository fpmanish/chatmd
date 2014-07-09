<?php
/* Coder: Manish Sonwal
 * Dated: 7 Dec 2012
 * 
 * This file is responsible for all database low lavel function selection
 *  and executing the code accordingly. 
 * */

function DB_queryFunc($sql)    // Function for mysql queries
{
    global $db_link;
    if($sql != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_query($db_link,$sql);
        else
            $output = mysql_query($sql);
        
        return $output;
    }
}

function DB_numRowsFunc($result)    // Function for mysql number of rows
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_num_rows($result);
        else
            $output = mysql_num_rows($result);
        
        return $output;
    }
}

function DB_fetchObjectFunc($result)    // Function for mysql fetch object
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_fetch_object($result);
        else
            $output = mysql_fetch_object($result);
        
        return $output;
    }
}

function DB_fetchRowFunc($result)    // Function for mysql fetch row
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_fetch_row($result);
        else
            $output = mysql_fetch_row($result);
        
        return $output;
    }
}

function DB_errorFunc()    // Function for mysql error
{
    global $db_link;
    if(IS_MYSQLI_ON)
        $output = mysqli_error($db_link);
    else
        $output = mysql_error();
    
    return $output;
}

function DB_affectedRowFunc()    // Function for mysql affected rows
{
    global $db_link;
    if(IS_MYSQLI_ON)
        $output = mysqli_affected_rows($db_link);
    else
        $output = mysql_affected_rows();
    
    return $output;
}

function DB_insertIdFunc()    // Function for mysql last insert id
{
    global $db_link;
    if(IS_MYSQLI_ON)
        $output = mysqli_insert_id($db_link);
    else
        $output = mysql_insert_id();
    
    return $output;
}

function DB_fetchArrayFunc($result)    // Function for mysql fetch row
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_fetch_array($result);
        else
            $output = mysql_fetch_array($result);
        
        return $output;
    }
}

function DB_fetchAssocFunc($result)    // Function for mysql fetch row
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_fetch_assoc($result);
        else
            $output = mysql_fetch_assoc($result);
        
        return $output;
    }
}

function DB_dataSeekFunc($result)    // Function for mysql data seek
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_data_seek($result);
        else
            $output = mysql_data_seek($result);
        
        return $output;
    }
}

function DB_numFieldsFunc($result)    // Function for mysql fields count
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_field_count($db_link);
        else
            $output = mysql_num_fields($result);
        
        return $output;
    }
}

function DB_fetchFieldsFunc($result)    // Function for mysql detch fields data.
{
    global $db_link;
    if($result != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_fetch_field($result);
        else
            $output = mysql_fetch_field($result);
        
        return $output;
    }
}

function DB_closeFunc()    // Function for mysql close.
{
    global $db_link;
    if(IS_MYSQLI_ON)
        $output = mysqli_close($db_link);
    else
        $output = mysql_close();
    
    return $output;
}

function DB_realExcapeString($str)      // Function for parsing real escape string
{
    global $db_link;
    if($str != "")
    {
        if(IS_MYSQLI_ON)
            $output = mysqli_real_escape_string($db_link,$str);
        else
            $output = mysql_real_escape_string($str);
        
        return $output;
    }
}

function DB_pingFunc()      // Function for pinging database.
{
    global $db_link;
    if(IS_MYSQLI_ON)
        $output = mysqli_ping($db_link);
    else
        $output = mysql_ping();
        
    return $output;
}
?>