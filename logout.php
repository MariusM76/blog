<?php
session_start();
session_destroy();
header('Location: ../blog-frontend/home.php');
?>