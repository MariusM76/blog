<?php
include 'functions.php';

var_dump($_POST);die;
$postToDelete = new Post($_POST['postId']);
$postToDelete->delete();

header('Location: ../blog-frontend/admin.php');