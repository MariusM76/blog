<?php
include 'functions.php';

$reply = new Reply();
$postId = $reply->getPostId();

if ($_POST['body']==''){
    header("Location: ../blog-frontend/post.php?postId=$postId");
}

//var_dump($_POST);die;
if (isset($_POST['userId'])){
    $user = new User($_POST['userId']);
    $reply->name = $user->username;
} else {
    $reply->name = $_POST['userName'];
}

$reply->body = $_POST['body'];
$reply->messageId = $_POST['messageId'];
$reply->save();

$postId = $reply->getPostId();

header("Location: ../blog-frontend/post.php?postId=$postId");