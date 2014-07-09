<?php
session_start();

$string = '';

for ($i = 0; $i <5; $i++) {
	$string .= rand(1, 5);
}

$_SESSION['random_number'] = $string;

$dir = 'fonts/';

$image = imagecreatetruecolor(118,40);

// random number 1 or 2
$num = rand(1,2);
if($num==1)
{
	$font = "Molot.otf";
	//$font = "Capture it 2.ttf"; // font style
}
else
{
	$font = "Molot.otf";// font style
}

// random number 1 or 2
$num2 = rand(1,2);
if($num2==1)
{
	$color = imagecolorallocate($image, 102, 204, 255);// color
}
else
{
	$color = imagecolorallocate($image, 102, 204, 255);// color
}

//$white = imagecolorallocate($image, 255, 255, 255); // background color white
	$Orange = imagecolorallocate($image, 0, 0, 0);  //background orange
imagefilledrectangle($image,0, 0,500,99,$Orange);

imagettftext ($image, 30, 0, 10, 40, $color, $dir.$font, $_SESSION['random_number']);

header("Content-type: image/png");
imagepng($image);

?>