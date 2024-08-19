<?php

class CheckinController{
    private $MODEL;
    public function __construct() {
        require_once("c://laragon/www/login/model/checkinModel.php");
        $this->MODEL = new checkinModel();
    }

    public function drawCustomer() {
        $cedula = $_POST["cedula"];
        $resultado = $this->MODEL->filterCustomers($cedula);
        if(!empty($resultado)){
            echo json_encode($resultado);
        }else{
            echo "vacio";
        }
    }

    public function viewProduct(){
        $resultado = $this->MODEL->viewProducts();
        echo json_encode($resultado);
    }
    public function viewProdId(){
        $idProducto = $_POST['idProducto'];
        $resultado = $this->MODEL->viewProductId($idProducto);
        echo json_encode($resultado);
    }
}



$prub = new checkinController();
if (isset($_GET["f"])) {
    $function_act = $_GET["f"];
    switch ($function_act) {
        case "drawcustomer":
            $prub->drawCustomer();
            break;

        case "viewproduct":
            $prub->viewProduct();
            break;

        case "viewprodid":
            $prub->viewProdId();
            break;
        
        // case "deletesuppliers":
        //     $prub->deleteSuppliers();
        //     break;

        // case "drawnamessuppliers":
        //     $prub->drawNamesSuppliers();
        //     break;

        default:
            break;
    }
} else {
    echo "La variable no está presente en el POST.";
}