<?php

include 'functions.php';
$imageData = $_FILES;

if ($imageData['image']['tmp_name']!=NULL){
    copy ($imageData['image']['tmp_name'],'../blog-frontend/images/'.$imageData['image']['name']);
    $image = new Image();
    $image->file = $imageData['image']['name'];
//    $image->save();
} else {
    $image = new Image();
    $image->file = 'generic.png';
}
$image->save();


$time = date('D, d M Y H:i:s');

//var_dump($image->getId());die;

$newPost = new Post();
$newPost->userId = $_SESSION['id'];
$newPost->title = $_POST['title'];
$newPost->imageId = $image->getId();
$newPost->createdAt = $time;
$newPost->topicId = $_POST['topicId'];
$newPost->body = $_POST['body'];

$newPost->save();

//var_dump($newPost);die;

header('Location: ../blog-frontend/admin.php');