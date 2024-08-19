<?php
    class ProductsModel{
        private $PDO;
        public function __construct(){
            require_once("c://laragon/www/login/config/db.php");
            $pdo = new db();
            $this->PDO = $pdo->connection();
        }

        //funciones de productos
        public function get_products() {
            $statement = $this->PDO->prepare("SELECT prd.*, prv.prv_nombre_empresa FROM inventa_system.prd_productos as prd LEFT JOIN inventa_system.prv_proveedores as prv ON prv.prv_id = prd.prd_prv_id");
            try {
                $statement->execute();
                return $statement->fetchAll();
            }catch (PDOException $e) {
                return false;
            }
        }

        public function filterProducts(){
            $query = "SELECT prd.*, prv.prv_nombre_empresa FROM inventa_system.prd_productos as prd LEFT JOIN inventa_system.prv_proveedores as prv ON prv.prv_id = prd.prd_prv_id ";
            $salida = array();
        
            if(isset($_POST["search"]["value"])){
                $query .= 'WHERE prd_serial LIKE "%'.$_POST["search"]["value"].'%" ';
                $query .= 'OR prd_nombre LIKE "%'.$_POST["search"]["value"].'%" ';
            }
        
            if(isset($_POST["order"])){
                $query .= 'ORDER BY ' . $_POST['order'][0]['column'] . ' ' . $_POST['order'][0]['dir'] . ' ';
            } else {
                $query .= 'ORDER BY prd_id DESC ';
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
                return array(); // Devuelve un array vacío en caso de error.
            }
        }

        public function updateProducts($serial, $proveedor, $nombre, $descripcion, $peso, $cantidad, $valorBruto, $valorNeto, $valorVenta, $idProduct){
            if ($_POST["operacion"] == "crear") {
                $statement = $this->PDO->prepare("INSERT INTO inventa_system.prd_productos (prd_serial, prd_prv_id, prd_nombre, prd_descripcion, prd_peso, prd_cantidad, prd_valor_bruto, prd_valor_neto, prd_valor_venta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $statement->bindParam(1, $serial);
                $statement->bindParam(2, $proveedor);
                $statement->bindParam(3, $nombre);
                $statement->bindParam(4, $descripcion);
                $statement->bindParam(5, $peso);
                $statement->bindParam(6, $cantidad);
                $statement->bindParam(7, $valorBruto);
                $statement->bindParam(8, $valorNeto);
                $statement->bindParam(9, $valorVenta);

                $result = $statement->execute();

                if ($result) {
                    echo 'Registro creado exitosamente';
                } else {
                    echo 'Error al crear el registro';
                }
            }
            elseif ($_POST["operacion"] == "editar") {
                $statement = $this->PDO->prepare("UPDATE inventa_system.prd_productos SET prd_serial = ?, prd_prv_id = ?, prd_nombre = ?, prd_descripcion = ?, prd_peso = ?, prd_cantidad = ?, prd_valor_bruto = ?, prd_valor_neto = ?, prd_valor_venta = ? WHERE prd_id = ?");
            
                $statement->bindParam(1, $serial);
                $statement->bindParam(2, $proveedor);
                $statement->bindParam(3, $nombre);
                $statement->bindParam(4, $descripcion);
                $statement->bindParam(5, $peso);
                $statement->bindParam(6, $cantidad);
                $statement->bindParam(7, $valorBruto);
                $statement->bindParam(8, $valorNeto);
                $statement->bindParam(9, $valorVenta);
                $statement->bindParam(10, $idProduct);
            
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

        //funcion editar producto
        public function viewEditProducts(){
            if(isset($_POST["id_prod"])){
                $statement = $this->PDO->prepare("SELECT prd.*, prv.prv_nombre_empresa FROM inventa_system.prd_productos as prd LEFT JOIN inventa_system.prv_proveedores as prv ON prv.prv_id = prd.prd_prv_id WHERE prd.prd_id = '".$_POST["id_prod"]."' LIMIT 1");
                $statement->execute();
                return $resultado = $statement->fetchAll();
            }
        }


        public function deleteProducts($idProduct){
            if (isset($_POST["id_prod"])) {
                $statement = $this->PDO->prepare("DELETE FROM inventa_system.prd_productos WHERE prd_id = ?");

                $statement->bindParam(1, $idProduct);

                $result = $statement->execute();

                if ($result) {
                    echo 'Registro eliminado exitosamente';
                } else {
                    echo 'Error al eliminar el registro';
                }
            }
        }
    }

    $prb = new ProductsModel();
    $prb->viewEditProducts();