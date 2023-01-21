<?php
include "functions.php";

foreach ($_POST as $class => $id){
    $className = ucfirst($class);
    $object = new $className($id);
    $object->delete();
}

header('Location: '.$frontEndDir.'/admin.php');