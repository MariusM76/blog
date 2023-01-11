<?php


session_start();

if (isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views'] + 1;
else
    $_SESSION['views'] = 1;

echo "views = " . $_SESSION['views'];


//////session_start();
////
////if (isset($_SESSION['views']))
////    $_SESSION['views'] = $_SESSION['views'] + 1;
////else
////    $_SESSION['views'] = 1;
////
////echo "views = " . $_SESSION['views'];
//
//
////include "functions.php";
//
//  $host="127.0.0.1:3306";
//  $username="root";
//  $password="";
//  $databasename="blog-learning";
//
//  $connect = mysqli_connect('127.0.0.1:3306', 'root', '', 'blog-learning');
//  $db=new mysqli("blog-learning");
//
//  // gets the user IP Address
//  $user_ip=$_SERVER['REMOTE_ADDR'];
//
////  var_dump($user_ip);die;
//
//  $check_ip = mysql_query("select userip from pageview where page='yourpage' and userip='$user_ip'");
//  if(mysql_num_rows($check_ip)>=1)
//  {
//
//  }
//  else
//  {
//    $insertview = mysql_query("insert into pageview values('','yourpage','$user_ip')");
//	$updateview = mysql_query("update totalview set totalvisit = totalvisit+1 where page='yourpage' ");
//  }
//?>
<!---->
<!--<html>-->
<!--<head>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--  --><?php
//    $stmt = mysql_query("select totalvisit from totalview where page='yourpage' ");
//  ?>
<!---->
<!--  <p>This page is viewed --><?php //echo mysql_num_rows($stmt);?><!-- times.</p>-->
<!---->
<!--</body>-->
<!--</html>-->


