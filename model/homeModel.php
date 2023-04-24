<?php

    class homeModel{
        private $PDO;
        public function __construct(){
            require_once("d://laragon/www/login/config/db.php");
            $pdo = new db();
            $this->PDO = $pdo->connection();
        }
        public function addNewUser($email, $passwords){
            $statement = $this->PDO->prepare("INSERT INTO login.users (email, password) VALUES ( ?, ?)");
            $statement->bindParam(1, $email);
            $statement->bindParam(2, $passwords);
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function getPassword($email){
            $statement = $this->PDO->prepare("SELECT password FROM login.users WHERE email = ?");
            $statement->bindParam(1, $email);
            try {
                $statement->execute();
                return $statement->fetch()["password"];
            } catch (PDOException $e) {
                return false;
            }
        }
    }