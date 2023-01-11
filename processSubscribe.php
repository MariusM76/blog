<?php

include "functions.php";

$newSubscribe = new Subscribe();
$newSubscribe->email = $_POST['email'];
$newSubscribe->save();

header('Location: ../blog-frontend/home.php');