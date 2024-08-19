<?php
    class ProductsController{
        private $MODEL;
        private $MODEL_S;
        public function __construct() {
            require_once("c://laragon/www/login/model/productsModel.php");
            $this->MODEL = new productsModel();
        }

        public function drawProducts() {
            $resultado = $this->MODEL->filterProducts();
            $datos = array();
            $filtered_rows = count($resultado);

            foreach ($resultado as $fila) {
                $subArray = array();
                $subArray[] = $fila["prd_serial"];
                $subArray[] = $fila["prd_nombre"];
                $subArray[] = $fila["prv_nombre_empresa"];
                $subArray[] = $fila["prd_cantidad"];
                $subArray[] = $fila["prd_valor_venta"];
                $subArray[] = '<button type="button" name="detalles" id="' . $fila["prd_id"] . '" class="btn btn-xs detalles bcolor2">Detalles</button>';
                $subArray[] = '<button type="button" name="borrar" id="' . $fila["prd_id"] . '" class="btn btn-danger btn-xs borrarPrd">Borrar</button>';
                $datos[] = $subArray;
            }

            $salida = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => $this->MODEL->get_products(),
                "data" => $datos
            );

            echo json_encode($salida);
        }

        public function updateProduct(){

            $serial = $_POST['serial'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $proveedor = $_POST['proveedor'];
            $peso = $_POST['peso'];
            $cantidad = $_POST['cantidad'];
            $valorBruto = $_POST['valorBruto'];
            $valorNeto = $_POST['valorNeto'];
            $valorVenta = $_POST['valorVenta'];
            $idProduct = $_POST['id_prod'];
            return $this->MODEL->updateProducts($serial, $proveedor, $nombre, $descripcion, $peso, $cantidad, $valorBruto, $valorNeto, $valorVenta, $idProduct);
        }

        public function viewEditProduct(){
            $resultado = $this->MODEL->viewEditProducts();
            $salida = array();
            $producto = array();
            foreach ($resultado as $fila) {
                
                $producto["serial"] = $fila["prd_serial"];
                $producto["nombre"] = $fila["prd_nombre"];
                $producto["descripcion"] = $fila["prd_descripcion"];
                $producto["proveedor"] = $fila["prd_prv_id"];
                $producto["peso"] = $fila["prd_peso"];
                $producto["cantidad"] = $fila["prd_cantidad"];
                $producto["valorBruto"] = $fila["prd_valor_bruto"];
                $producto["valorNeto"] = $fila["prd_valor_neto"];
                $producto["valorVenta"] = $fila["prd_valor_venta"];
        
                $salida[] = $producto;
            }
            echo json_encode($salida);
        }
        public function deleteProduct(){
            $idProduct = $_POST['id_prod'];
            return $this->MODEL->deleteProducts($idProduct);
        }
    }

    $prub = new ProductsController();
    if (isset($_GET["f"])) {
        $function_act = $_GET["f"];
        switch ($function_act) {
            case "drawproducts":
                $prub->drawProducts();
                break;

            case "updateproduct":
                $prub->updateProduct();
                break;

            case "vieweditproduct":
                $prub->viewEditProduct();
                break;

            case "deleteproduct":
                $prub->deleteProduct();
                break;
            
            // case "deletesuppliers":
            //     $prub->deleteSuppliers();
            //     break;

            default:
                break;
        }
    } else {
        // Código a ejecutar si la variable no está presente en el POST
        echo "La variable no está presente en el POST.";
    }