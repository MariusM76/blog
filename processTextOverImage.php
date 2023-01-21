<?php
include "functions.php";
// (A) OPEN IMAGE
$rgb = hexToRGB($_POST['colorId']);
$image = new Image($_POST['imageId']);
$font = $_POST['font'];
$imageName = $image->file;
if (intval($_POST['fontSize'])<=0){
    $fSize = 20;
} else {
$fSize = intval($_POST['fontSize']);
}

$img = imagecreatefrompng("../blog-frontend/images/$image->file");
$text = $_POST['text'];
// (B) WRITE TEXT
$txt = "$text";
$fontFile = "C:/Windows/Fonts/$font"; // CHANGE TO YOUR OWN!
$fontSize = $fSize;
$fontColor = imagecolorallocate($img, $rgb['r'], $rgb['g'], $rgb['b']);
$posX = intval($_POST['posX']);
$posY = intval($_POST['posY']);
$angle = intval($_POST['angle']);
imagettftext($img, $fontSize, $angle, $posX, $posY, $fontColor, $fontFile, $txt);
// (C) OUTPUT IMAGE
// (C1) DIRECTLY SHOW IMAGE
ob_clean();
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
// (C2) OR SAVE TO A FILE
// $quality = 9; // 0 to 100
// imagepng($img, "demo.png", $quality);


//error_reporting(E_ALL);
//echo '<img src="data:image/png;base64,'.$img.'/>';

