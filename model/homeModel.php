<?php

    class homeModel{
        private $PDO;
        public function __construct(){
            require_once("c://laragon/www/login/config/db.php");
            $pdo = new db();
            $this->PDO = $pdo->connection();
        }
        
        public function searchEmail($email){
            $statement = $this->PDO->prepare("SELECT usr_correo FROM inventa_system.usr_usuarios WHERE usr_correo = ?");
            $statement->bindParam(1, $email);

            $statement->execute();

            $rowCount = $statement->rowCount();

            return $rowCount;
        }
        
        public function addNewUser($name, $email, $passwords){
            $statement = $this->PDO->prepare("INSERT INTO inventa_system.usr_usuarios (usr_nombre, usr_correo, usr_clave) VALUES ( ?, ?, ?)");
            $statement->bindParam(1, $name);
            $statement->bindParam(2, $email);
            $statement->bindParam(3, $passwords);
            
            if($this->searchEmail($email) == 0){
                $statement->execute();
                return true;
            }else{
                return false;
            }
        }
        public function getPassword($email){
            $statement = $this->PDO->prepare("SELECT usr_clave FROM inventa_system.usr_usuarios WHERE usr_correo = ?");
            $statement->bindParam(1, $email);
            try {
                $statement->execute();
                return $statement->fetch()["usr_clave"];
            } catch (PDOException $e) {
                return false;
            }
        }
        
        public function getUser($email){
            $statement = $this->PDO->prepare("SELECT * FROM inventa_system.usr_usuarios WHERE usr_correo = ?");
            $statement->bindParam(1, $email);
            try {
                $statement->execute();
                return $statement->fetch();
            } catch (PDOException $e) {
                return false;
            }
        }
        
//        funciones de proveedores
            public function get_suppliers() {
        $statement = $this->PDO->prepare("SELECT * FROM inventa_system.prv_proveedores");
        try {
            $statement->execute();
            return $statement->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }
        
        public function filterSuppliers(){
            $query = "";
            $salida = array();
            $query = "SELECT * FROM inventa_system.prv_proveedores ";
            
            if(isset($_POST["search"]["value"])){
                $query .= 'WHERE prv_nombre_empresa LIKE "%'.$_POST["search"]["value"].'%" ';
                $query .= 'OR prv_nombre_encargado LIKE "%'.$_POST["search"]["value"].'%" ';
            }
            
            if(isset($_POST["order"])){
                $query .='ORDER BY' . $_POST['oder'][0]['column'] . ' ' . $_POST['order'][0]['dir'] . ' ';
            }else{
                $query .= 'ORDER BY prv_id DESC ';
            }
            
            if ($_POST["length"] != -1){
                $query .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
            }
            $stmt = $this->PDO->prepare($query); 
            $stmt->execute();
            return $resultado = $stmt->fetchAll();
        }
    }