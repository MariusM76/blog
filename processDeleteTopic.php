<?php
include 'functions.php';

var_dump($_POST);die;
$topicToDelete = new Topic($_POST['topicId']);
$topicToDelete->delete();

header('Location: ../blog-frontend/admin.php');