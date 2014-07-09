<?php
$mediaObj = new media();
$settingsObj = new settings();

$blogObj = new blog();
$pageType = "blog";

$bogArr= $blogObj->getBlogByCatId($_GET['id']);

$bogCatArr=$blogObj->blogCategoryList(1);
 

?>