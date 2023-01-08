<?php
include 'functions.php';


$loginData = $_POST;

$loginEmail = $loginData['email'];
$loginpass = md5($loginData['pass']);

$userEmail = User::findBy('email',$loginEmail);
$userPass = User::findBy('password',$loginpass);


//
//var_dump($dbUser);die;
if ($userEmail!=null) {
    $dbUser = new User($userEmail[0]->getId());
    if ($loginEmail==$userEmail[0]->email && $loginpass== $dbUser->password) {
        $_SESSION['authUser'] = $dbUser->username;
        $_SESSION['role'] = $dbUser->role;
        $_SESSION['id'] = $dbUser->getId();
//        var_dump($_SESSION['authUser']);die;

        if ($_SESSION['role']=='admin'){
            header('Location: admin.php');
        } else {
            header('Location: main.php');
        }
    } else {
        echo '.<div>"Incorrect password. Please try again";</div>.';
        header('Location: ../blog-frontend/login.php');
    }
}


header('Location: ../blog-frontend/home.php');