<?php
include 'functions.php';

$publishedPost =  new Post($_POST['postId']);
$publishedPost->published = 'Y';
$publishedPost->save();


header('Location: ../blog-frontend/admin.php');