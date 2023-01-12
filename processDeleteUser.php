<?php
include 'functions.php';


$userToDelete = new User($_POST['userId']);
$userToDelete->delete();

header('Location: ../blog-frontend/admin.php');
var_dump($_POST);die;