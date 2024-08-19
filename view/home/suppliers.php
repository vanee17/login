<div class="d-flex w-100">

    <?php
    require_once ("c://laragon/www/login/view/head/header.php");
    if (empty($_SESSION["user"])) {
        header("Location:login.php");
    }
    ?>
    <div>
        <div class="container">
            <h1 class="text-center">Mis Proveedores</h1>
            <div class="row">
                <div class="col-2 offset-10">
                    <div class="text-center">
                        <button type="button" class="btn w-100 bcolor2" data-bs-toggle="modal"
                            data-bs-target="#modalProv" id="crearProv">
                            <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="table-responsive">
                <table id="datos_prov" class="table table-bordered table-striped" style="width: 950px;">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Encargado</th>
                            <th>Direccion</th>
                            <th>Telefonos</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!--    modal-->

        <div class="modal fade" id="modalProv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header comb1">
                        <h5 class="modal-title" id="exampleModalLabel">Crea un nuevo proveedor</h5>
                        <button type="button" class="btn-close bcolor2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" id="formularioProv">
                        <div class="modal-content">
                            <div class="modal-body color1">
                                <label>Nombre de Empresa</label>
                                <input type="text" name="empresa" id="empresa" class="form-control form-prov">
                                <br>

                                <label>Nombre de Encargado</label>
                                <input type="text" name="encargado" id="encargado" class="form-control form-prov">
                                <br>

                                <label>Direccion de Empresa</label>
                                <input type="text" name="direccion" id="direccion" class="form-control form-prov">
                                <br>

                                <label>Telefono de Empresa</label>
                                <input type="text" name="telEmpresa" id="telEmpresa" class="form-control form-prov">
                                <br>

                                <label>Telefono de Encargado</label>
                                <input type="text" name="telEncargado" id="telEncargado" class="form-control form-prov">
                                <br>
                            </div>
                            <div class="modal-footer color1">
                                <input type="hidden" name="id_prov" id="id_prov">
                                <input type="hidden" name="operacion" id="operacion">
                                <input type="submit" name="action" id="action" class="btn btn1">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        require_once ("c://laragon/www/login/view/head/footer.php");
        ?>
    </div>
</div>