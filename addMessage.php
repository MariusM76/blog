<?php
include 'functions.php';

$message = $_POST;
$message = ObjFromArray($message);

$newMessage = new Message();
$newMessage->fromArray($message);
$newMessage->save();

header("Location: ../blog-frontend/post.php?postId=$newMessage->postId");
