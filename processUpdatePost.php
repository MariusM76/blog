<?php
include 'functions.php';

$updatedPost = new Post($_POST['postId']);
$imageData = $_FILES;

if ($imageData['image']['tmp_name']!=NULL){
    copy ($imageData['image']['tmp_name'],'../blog-frontend/images/'.$imageData['image']['name']);
}

$image = new Image($updatedPost->imageId);
if  ($imageData['image']['name']==NULL){
    $image->file = 'generic.png';
} else {
    $image->file = $imageData['image']['name'];
}

$image->save();

$time = date('D, d M Y H:i:s');

$updatedPost->userId = $_POST['userId'];
$updatedPost->topicId = $_POST['topicId'];
$updatedPost->title = $_POST['title'];
$updatedPost->body = $_POST['body'];
$updatedPost->updatedAt = $time;
$updatedPost->imageId = $image->getId();
$updatedPost->save();

//var_dump($image);die;

header('Location: ../blog-frontend/admin.php');
