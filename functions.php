<?php

session_start();
include 'classes.php';


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
//    if ($post->updatedAt!=null){
//        $updateDate = $post->updatedAt;
//    } else {
//        $updateDate = $post->createdAt;
//    }
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