<?php
include "functions.php";

$messageToDelete = new Message($_POST['messageId']);
$messageToDelete->delete();


header('Location: ../blog-frontend/admin.php');