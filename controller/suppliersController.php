<?php

    class suppliersController {

        private $MODEL;
        public function __construct() {
            require_once("c://laragon/www/login/model/suppliersModel.php");
            $this->MODEL = new suppliersModel();
        }
        //funciones de proveedores
        public function drawSuppliers() {
            $resultado = $this->MODEL->filterSuppliers();
            $datos = array();
            $filtered_rows = count($resultado);

            foreach ($resultado as $fila) {
                $subArray = array();
                $subArray[] = $fila["prv_nombre_empresa"];
                $subArray[] = $fila["prv_nombre_encargado"];
                $subArray[] = $fila["prv_direccion"];
                $subArray[] = '<div>' . $fila["prv_telefono_1"] .'<br>'.$fila["prv_telefono_2"].'</div>' ;
                $subArray[] = '<button type="button" name="editar" id="' . $fila["prv_id"] . '" class="btn btn-xs editar bcolor2">Editar</button>';
                $subArray[] = '<button type="button" name="borrar" id="' . $fila["prv_id"] . '" class="btn btn-danger btn-xs borrar">Borrar</button>';
                $datos[] = $subArray;
            }

            $salida = array(
                "draw" => intval($_POST["draw"]),
                "recordsTotal" => $filtered_rows,
                "recordsFiltered" => $this->MODEL->get_suppliers(),
                "data" => $datos
            );

            echo json_encode($salida);
        }

        public function updateSuppliers(){
            $empresa = $_POST['empresa'];
            $encargado = $_POST['encargado'];
            $direccion = $_POST['direccion'];
            $telEmpresa = $_POST['telEmpresa'];
            $telEncargado = $_POST['telEncargado'];
            $idSupplier = $_POST['id_prov'];

            return $this->MODEL->updateSupplier($empresa, $encargado, $direccion, $telEmpresa, $telEncargado, $idSupplier);
        }

        public function viewEditSuppliers(){
            $resultado = $this->MODEL->viewEditSupplier();
            $salida = array();
            // print_r($resultado);
            // exit();
            $proveedor = array();
            foreach ($resultado as $fila) {
                
                $proveedor["empresa"] = $fila["prv_nombre_empresa"];
                $proveedor["encargado"] = $fila["prv_nombre_encargado"];
                $proveedor["direccion"] = $fila["prv_direccion"];
                $proveedor["telEmpresa"] = $fila["prv_telefono_1"];
                $proveedor["telEncargado"] = $fila["prv_telefono_2"];
        
                $salida[] = $proveedor;
            }
        
            echo json_encode($salida);
        }

        public function deleteSuppliers(){
            $idSupplier = $_POST['id_prov'];
            return $this->MODEL->deleteSupplier($idSupplier);
        }

        public function drawNamesSuppliers(){
            $resultado = $this->MODEL->get_suppliers();
            echo json_encode($resultado);
        }
        
    }




    $prub = new suppliersController();
    if (isset($_GET["f"])) {
        $function_act = $_GET["f"];
        switch ($function_act) {
            case "drawsuppliers":
                $prub->drawSuppliers();
                break;

            case "updatesuppliers":
                $prub->updateSuppliers();
                break;

            case "vieweditsuppliers":
                $prub->viewEditSuppliers();
                break;
            
            case "deletesuppliers":
                $prub->deleteSuppliers();
                break;

            case "drawnamessuppliers":
                $prub->drawNamesSuppliers();
                break;

            default:
                break;
        }
    } else {
        echo "La variable no está presente en el POST.";
    }
    
