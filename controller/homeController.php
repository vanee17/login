<?php

class homeController {

    private $MODEL;

    public function __construct() {
        require_once("c://laragon/www/login/model/homeModel.php");
        $this->MODEL = new homeModel();
    }
    //funcion utilizada para guardar el nuevo registro
    public function saveUser($name, $email, $passwords) {
        $valor = $this->MODEL->addNewUser($this->clearString($name), $this->clearEmail($email), $this->encryptPassword($this->clearString($passwords)));
        return $valor;
    }

    public function clearEmail($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function clearString($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function encryptPassword($passwords) {
        return password_hash($passwords, PASSWORD_DEFAULT);
    }

    public function verifyUser($email, $passwords) {
        $keydb = $this->MODEL->getPassword($email);
        return(password_verify($passwords, $keydb)) ? true : false;
    }
    public function getUserInfo($email){
        $userdata = $this->MODEL->getUser($email);
        return $userdata;
    }

}