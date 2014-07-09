<?php
$mediaObj = new media();
$settingsObj = new settings();

$blogObj = new blog();
$pageType = "blog";

$bogArr= $blogObj->blogList(1);
$bogCatArr=$blogObj->blogCategoryList(1);
 

?>