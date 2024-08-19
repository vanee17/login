<?php

class checkinModel {
    private $PDO;
    public function __construct(){
        require_once("c://laragon/www/login/config/db.php");
        $pdo = new db();
        $this->PDO = $pdo->connection();
    }
    public function filterCustomers($cedula) {
        $query = "SELECT * FROM inventa_system.clt_clientes ";
        $params = array();
    
        if (!empty($cedula)) {
            $query .= "WHERE clt_cedula = :cedula";
            $params['cedula'] = $cedula;
        }
    
        try {
            $stmt = $this->PDO->prepare($query); 
            $stmt->execute($params);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return array();
        }
    }

    public function viewProducts(){
        $resultado = array();
        $statement = $this->PDO->prepare("SELECT * FROM inventa_system.prd_productos");
        $statement->execute();
        return $resultado = $statement->fetchAll();
    }
    public function viewProductId($idProducto){
        $resultado = array();
        $statement = $this->PDO->prepare("SELECT * FROM inventa_system.prd_productos WHERE prd_id = :id");
        $statement->bindParam(':id', $idProducto, PDO::PARAM_INT);
        $statement->execute();
        return $resultado = $statement->fetchAll();
    }
    
}

// $prb = new checkinModel();
// print_r($prb->viewProducts());