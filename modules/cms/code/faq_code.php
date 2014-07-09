<?php
extract($_GET);
$mediaObj = new media();
$settingsObj = new settings();
$cmsObj = new cms();
$pageObj = new pageManager();
$pageType = "faq";
$FAQCategory=$pageObj->faqCategoryList(1);
if($faq_id !="")
{
$FAQ=$pageObj->getfaqBycategory($faq_id);
}
else {
$FAQCat= $pageObj->getfaqByDefaultcategory();	
$FAQ=$pageObj->getfaqBycategory($FAQCat['id']);
$faq_id=$FAQCat['id'];
}


?>