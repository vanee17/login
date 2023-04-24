<?php

    require_once("d://laragon/www/login/controller/homeController.php");
    session_start();
    $obj = new homeController();
    $email = $obj->clearEmail($_POST['email']);
    $passwords = $obj ->clearString($_POST['password']);
    $flag = $obj->verifyUser($email, $passwords);

    if ($flag) {
        $_SESSION["user"] = $email;
        $response = 1;
        //header("Location:panelControl.php");
    }else{
        $response = 0;
        //header("Location:login.php?error=".$error);
    }

    echo $response;