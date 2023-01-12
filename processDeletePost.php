<?php
include 'functions.php';


$postToDelete = new Post($_POST['postId']);
$imageToDelete = new Image($postToDelete->imageId);
$imageToDelete->delete();
$postToDelete->delete();

header('Location: ../blog-frontend/admin.php');