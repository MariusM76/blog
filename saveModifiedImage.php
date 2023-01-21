<?php
include "functions.php";
//var_dump($_POST);die;
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
//var_dump($rgb['r']);die;

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
//ob_clean();
//header("Content-type: image/png");
//imagepng($img);
//imagedestroy($img);
// (C2) OR SAVE TO A FILE

$quality = 9; // 0 to 100 for jpeg OR 1 to 9 for png
$saveFile = imagepng($img, "$image->file", $quality);


ob_clean();
header("Content-disposition: attachment;filename =".imagepng($img, "$image->file", $quality).".png");

//ob_start();
//imagepng($img);
//$data = ob_get_clean();
//file_put_contents('$image->file',$data);

//exit();