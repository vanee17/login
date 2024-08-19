<div class="d-flex w-100">
    
    <?php
    require_once("c://laragon/www/login/view/head/header.php");
    if(empty($_SESSION["user"])){
        header("Location:login.php");
    }
    ?>
    <div>
<div class="container">
        <h1 class="text-center">Mis Productos</h1>
        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <button type="button" class="btn w-100 bcolor2" data-bs-toggle="modal" data-bs-target="#modalProd" id="crearProd">
                        <i class="bi bi-plus-circle-fill"></i>  Crear
                    </button>
                </div>
            </div>
        </div>
        <br>
        <br>
        
        <div class="table-responsive">
            <table id="datos_prod" class="table table-bordered table-striped" style="width: 950px;">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th>Detalles</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    
<!--    modal-->

    <div class="modal fade" id="modalProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header comb1">
                    <h5 class="modal-title" id="exampleModalLabel">Crea un nuevo producto</h5>
                    <button type="button" class="btn-close bcolor2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formularioProd">
                    <div class="modal-content">
                        <div class="modal-body color1">
                            <label>Codigo Serial</label>
                            <input type="text" name="serial" id="serial" class="form-control form-prov">
                            <br>
                            
                            <label>Nombre de Producto</label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-prov">
                            <br>
                            
                            <label>Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control form-prov">
                            <br>

                            <label class="form-label">Selecciona un Proveedor</label>
                            <select class="form-control" required id="proveedor" name="proveedor">
                            </select>
                            <br>
                            
                            <label>Peso</label>
                            <input type="text" name="peso" id="peso" class="form-control form-prov">
                            <br>

                            <label>Cantidad</label>
                            <input type="text" name="cantidad" id="cantidad" class="form-control form-prov">
                            <br>

                            <label>Valor Bruto</label>
                            <input type="text" name="valorBruto" id="valorBruto" class="form-control form-prov">
                            <br>

                            <label>Valor Neto</label>
                            <input type="text" name="valorNeto" id="valorNeto" class="form-control form-prov">
                            <br>

                            <label>Valor Venta</label>
                            <input type="text" name="valorVenta" id="valorVenta" class="form-control form-prov">
                            <br>
                        </div>
                        <div class="modal-footer color1">
                            <input type="hidden" name="id_prod" id="id_prod">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn1">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php
    require_once("c://laragon/www/login/view/head/footer.php");
    ?>
    </div>
</div>
