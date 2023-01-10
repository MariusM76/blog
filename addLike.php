<?php
include 'functions.php';

$newLike = new Post($_GET['postId']);
$newLike->likes = $newLike->likes + 1;
$newLike->save();
$postId=$newLike->getId();

header("Location: ../blog-frontend/post.php?postId=$postId");