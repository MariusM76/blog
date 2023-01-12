<?php
include 'functions.php';

$updatedTopic = new Topic($_POST['topicId']);
$updatedTopic->name = $_POST['topicName'];
$updatedTopic->save();


header('Location: ../blog-frontend/admin.php');