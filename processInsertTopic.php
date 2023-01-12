<?php
include 'functions.php';

$newTopic = new Topic();
$newTopic->name = $_POST['name'];
$newTopic->save();

header('Location: ../blog-frontend/admin.php');
