<?php
    require_once("d://laragon/www/login/controller/homeController.php");
    $obj = new homeController();
    $email = $_POST["email"];
    $passwords = $_POST["passwords"];
    $confirmPassword = $_POST["confirmPassword"];


    if (empty($email) || empty($passwords) || empty($confirmPassword)) {
        $status =  0;
    }else{
        if ($passwords === $confirmPassword) {
            if($obj->saveUser($email, $passwords) == false){
                $status =  2;
            }else{
                $status = 1;
            }
        }else{
            $status =  3;
        }
    }

    echo $status;
