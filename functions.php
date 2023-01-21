<?php

session_start();
include 'classes.php';

$frontEndDir ='../blog-frontend';

$mysql = mysqli_connect('127.0.0.1:3306', 'root', '', 'blog-learning');


function query($sql)
{
    global $mysql;
    $query = mysqli_query($mysql, $sql);
    if ($query === true) {
        return true;
    }
    if ($query === false) {
        die('Error on: ' . $sql);
    }
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function getAuthUser(){
    if (isset($_SESSION['authUser'])) {
        return $_SESSION['authUser'];
    } else {
        return false;
    }
}

function searchArray($array,$needle){
    $result = [];
    foreach ($array as $key => $value)
    {
        if (strpos($key,$needle)!== FALSE)
        {
            $result[]= $value;
        }
    }
    return $result;
}

function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
//    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}

function lastUpdateShow($id){
    $post = new Post($id);

    $date1 = new DateTime("now");
    $date2 = new DateTime($post->createdAt);
    $interval = $date1->diff($date2);
    return format_interval($interval);

}

function ObjFromArray($array){
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = ObjFromArray($value);
        }
        $object->$key = $value;
    }
    return $object;
}

function hexToRgb($hex, $alpha = false) {
    $hex      = str_replace('#', '', $hex);
    $length   = strlen($hex);
    $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
    $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
    $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
    if ( $alpha ) {
        $rgb['a'] = $alpha;
    }
    return $rgb;
}

//function hexToRGB($hex){
//    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
//    echo $rgb=[$r] -> $r;
//        $r => $r,
//        $g => $g,
//        $b => $b,
//    ];
//    return $rgb;
////    return "$hex -> $r $g $b";
//}



/*
 Create a Responsive Grid Image Gallery From All Images in a Directory With PHP
 http://www.beliefmedia.com/code/php-snippets/image-grid-gallery-php
*/

function beliefmedia_grid_gallery($dir = 'images/', $columns = '4', $url = false, $width = '450,560,960')
{

  /* Viewport width */

  $width = explode(',', $width);

  /* Transient */

  $transient = md5(serialize(func_get_args()));

  $style = '
<style>

    .bm-grid-' . $transient . ' {

      background: #ffffff;
      
      -webkit-column-count: 1;

      -webkit-column-gap: 10px;

      -webkit-column-fill: auto;

      -moz-column-count: 1;

      -moz-column-gap: 10px;

      -moz-column-fill: auto;

      column-count: 1;

      column-gap: 15px;

      column-fill: auto;

    }

 
    .bm-grid-item-' . $transient . ' {

      display: inline-block;

      background: #F8F8F8;

      margin: 0 0 10px;

      padding: 15px;

      padding-bottom: 5px;

      -webkit-column-break-inside: avoid;

      -moz-column-break-inside: avoid;

      column-break-inside: avoid;

    }

 
    .bm-hr-grid-' . $transient . ' {

      display: block;

      height: 1px;

      border: 0;

      border-top: 1px solid #ccc;

      margin: .5em 10px;

      padding: 0;

    }

 
    .bm-grid-img-' . $transient . ' {

      width: 100%

   }

 
    .bm_p_grid-' . $transient . ' {

      margin: 10px;

      font-size: .8em;

      font-family: arial;

      line-height: 1.5em;

    }

 
    @media (min-width: ' . $width['0'] . 'px) {

      .bm-grid-' . $transient . ' {

        -webkit-column-count: 2;

        -moz-column-count: 2;

        column-count: 2;

      }

    }

 
    @media (min-width: ' . $width['1'] . 'px) {

      .bm-grid-' . $transient . ' {

        -webkit-column-count: 3;

        -moz-column-count: 3;

        column-count: 3;

      }

    }

 
    @media (min-width: ' . $width['2'] . 'px) {

      .bm-grid-' . $transient . ' {

        -webkit-column-count: ' . $columns . ';

        -moz-column-count: ' . $columns . ';

        column-count: ' . $columns . ';

      }

    }

    </style>';



  /* Scan all images in the image directory */

//  $image_array = glob(rtrim($dir, '/') . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
  $images = Image::findAll();
    $return ='';

  foreach ($images as $image) {

    $image = ($url !== false) ? rtrim($url, '/') . '/' . basename($image) : $image;

    $return .= '<div class="bm-grid-item-' . $transient . '"><img decoding="async" class="bm-grid-img-' . $transient . '" src="'.$image->file.'"></div>';

  }

  $return = '<div class="bm-grid-' . $transient . '">' . $style . $return . '</div>';



 return $return;

}

/* Usage */

//echo beliefmedia_grid_gallery();

function scanDirToArrayForTTF($path)
{
    $all_files = scandir("$path");
    $selected_files = array();
    $selectedFilesObj = ObjFromArray($all_files);

    foreach ($all_files as $file) {
        $tmp = explode(".", $file);
        if ($tmp[1] == "ttf") {
            $result = array_push($selected_files, $file);
        }
    }
//    $selectedFilesObj = ObjFromArray($selected_files);
//    var_dump($selected_files);die;
    return $selected_files;
}

?>

