<?php
include 'functions.php';

$time = date('D, d M Y H:i:s');

$userToUpdate = new User($_GET['userId']);
$userToUpdate->fromArray($_POST);
$userToUpdate->updatedAt = $time;
$userToUpdate->save();

header('Location: ../blog-frontend/home.php');

