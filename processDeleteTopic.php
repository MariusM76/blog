<?php
include 'functions.php';


$topicToDelete = new Topic($_POST['topicId']);
$topicToDelete->delete();

header('Location: ../blog-frontend/admin.php');