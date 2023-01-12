<?php
include "functions.php";

$messageToUpdate = new Message($_GET['messageId']);
$messageToUpdate->fromArray($_POST);
$messageToUpdate->save();

header('Location: ../blog-frontend/admin.php');

