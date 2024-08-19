<?php

    class suppliersModel{
        private $PDO;
        public function __construct(){
            require_once("c://laragon/www/login/config/db.php");
            $pdo = new db();
            $this->PDO = $pdo->connection();
        }
        
        //funciones de proveedores
        public function get_suppliers() {
            $statement = $this->PDO->prepare("SELECT * FROM inventa_system.prv_proveedores");
            try {
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        //filtrado de busqueda
        public function filterSuppliers(){
            $query = "SELECT * FROM inventa_system.prv_proveedores ";
            $salida = array();
        
            if(isset($_POST["search"]["value"])){
                $query .= 'WHERE prv_nombre_empresa LIKE "%'.$_POST["search"]["value"].'%" ';
                $query .= 'OR prv_nombre_encargado LIKE "%'.$_POST["search"]["value"].'%" ';
            }
        
            if(isset($_POST["order"])){
                $query .= 'ORDER BY ' . $_POST['order'][0]['column'] . ' ' . $_POST['order'][0]['dir'] . ' ';
            } else {
                $query .= 'ORDER BY prv_id DESC ';
            }
        
            if (isset($_POST["length"]) && $_POST["length"] != -1){
                $query .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
            }
        
            try {
                $stmt = $this->PDO->prepare($query); 
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                return $resultado;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
                return array();
            }
        }
        
        
        //funcion crear proveedor
        
        public function updateSupplier($empresa, $encargado, $direccion, $telEmpresa, $telEncargado, $idSupplier){
            if ($_POST["operacion"] == "crear") {
                $statement = $this->PDO->prepare("INSERT INTO inventa_system.prv_proveedores (prv_nombre_empresa, prv_nombre_encargado, prv_direccion, prv_telefono_1, prv_telefono_2) VALUES (?, ?, ?, ?, ?)");

                $statement->bindParam(1, $empresa);
                $statement->bindParam(2, $encargado);
                $statement->bindParam(3, $direccion);
                $statement->bindParam(4, $telEmpresa);
                $statement->bindParam(5, $telEncargado);

                $result = $statement->execute();

                if ($result) {
                    echo 'Registro creado exitosamente';
                } else {
                    echo 'Error al crear el registro';
                }
            }
            elseif ($_POST["operacion"] == "editar") {
                $statement = $this->PDO->prepare("UPDATE inventa_system.prv_proveedores SET prv_nombre_empresa = ?, prv_nombre_encargado = ?, prv_direccion = ?, prv_telefono_1 = ?, prv_telefono_2 = ? WHERE prv_id = ?");
            
                // Asegúrate de vincular los parámetros en el orden correcto
                $statement->bindParam(1, $empresa);
                $statement->bindParam(2, $encargado);
                $statement->bindParam(3, $direccion);
                $statement->bindParam(4, $telEmpresa);
                $statement->bindParam(5, $telEncargado);
                $statement->bindParam(6, $idSupplier);
            
                $result = $statement->execute();
            
                if ($result) {
                    echo 'Registro editado exitosamente';
                } else {
                    echo 'Error al editar el registro';
                }
            }
            else{
                echo "info no detectada";
            }
            
        }
        //funcion editar proveedor
        public function viewEditSupplier(){
            if(isset($_POST["id_prov"])){
                $statement = $this->PDO->prepare("SELECT * FROM inventa_system.prv_proveedores WHERE prv_id = '".$_POST["id_prov"]."' LIMIT 1");
                $statement->execute();
                return $resultado = $statement->fetchAll();
            }
        }
        //funcion eliminar proveedor
        public function deleteSupplier($idSupplier){
            if (isset($_POST["id_prov"])) {
                $statement = $this->PDO->prepare("DELETE FROM inventa_system.prv_proveedores WHERE prv_id = ?");
                $statement->bindParam(1, $idSupplier);
                $result = $statement->execute();

                if ($result) {
                    echo 'Registro eliminado exitosamente';
                } else {
                    echo 'Error al eliminar el registro';
                }
            }
        }
    }

