<?php

include 'functions.php';

$userPass = md5($_POST['password']);
$time = date('D, d M Y H:i:s');


$userData = new User();
$userData->fromArray($_POST);
$userData->password = $userPass;
$userData->role = 'User';
$userData->createdAt = $time;
$userData->save();


header('Location: ../blog-frontend/home.php');