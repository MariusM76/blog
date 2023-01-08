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
