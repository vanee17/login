<div class="d-flex w-100">

    <?php
    require_once("c://laragon/www/login/view/head/header.php");
    if (empty($_SESSION["user"])) {
        header("Location:login.php");
    }
    ?>
    <div class="checkin">
        <div class="container mt-3">
            <h3>Cliente</h3>
            <form id="formularioFact">
                <div class="row">
                    <div class="col-md-6">
                        <label for="cedula" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" oninput="valNumber(event)">
                    </div>
                    <div class="col-md-6">
                        <label for="telefonoClt" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefonoClt" name="telefonoClt"
                            oninput="valNumber(event)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombreClt" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreClt" name="nombreClt">
                    </div>
                    <div class="col-md-6">
                        <label for="correoClt" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="correoClt" name="correoClt">
                    </div>
                </div>
        </div>
        <div class="container mt-5">
            <h3>Productos</h3>
            <div class="row">
                <div class="col-md-3">
                    <label for="productoVnt" class="form-label">Producto</label>
                    <select class="form-control" required id="producto" name="producto">
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad">
                </div>
                <div class="col-md-3">
                    <label for="valorUnt" class="form-label">Valor Unitario</label>
                    <input type="text" class="form-control" id="valorUnt" name="valorUnt" readonly>
                </div>
                <div class="col-md-3">
                    <label for="valorTtl" class="form-label">Valor Total</label>
                    <input type="text" class="form-control" id="valorTtl" name="valorTtl">
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-primary">Añadir Producto</button>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Promo/Dcto</label>
                    <select class="form-control" required id="descuento" name="descuento">
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="iva" class="form-label">IVA</label>
                    <input type="number" class="form-control" id="iva" name="iva">
                </div>
                <div class="col-md-4">
                    <label for="subtotal" class="form-label">SubTotal</label>
                    <input type="text" class="form-control" id="subtotal">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Vendedor</label>
                    <select class="form-control" required id="vendedor" name="vendedor">
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Metodo de Pago</label>
                    <select class="form-control" required id="medPago" name="medPago">
                        <option value="">Seleccione</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="credito">Credito</option>
                        <option value="debito">Debito</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" class="form-control" id="total">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Generar factura</button>
            </form>
        </div>
        <?php
        require_once("c://laragon/www/login/view/head/footer.php");
        ?>
    </div>
</div>