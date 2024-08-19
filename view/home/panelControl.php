<div class="d-flex w-100">
    
    <?php
    require_once("c://laragon/www/login/view/head/header.php");
    if(empty($_SESSION["user"])){
        header("Location:login.php");
    }
    
    ?>
    <div>
        <h1 class="text-center md-4">Bienvenido <?= $_SESSION["user"] ?></h1>

        <div class="container">
            <div class="row">
                <div class="col-sm p_grid">
                    <a href="/login/view/home/cashRegister.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/caja.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Caja Registradora</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm p_grid">
                    <a href="/login/view/home/checkIn.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/facturacion.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Generar Factura</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm p_grid">
                    <a href="/login/view/home/sales.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/grafico.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Revisar Ventas</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm p_grid">
                    <a href="/login/view/home/products.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/producto.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Revisar Productos</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm p_grid">
                    <a href="/login/view/home/promotions.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/descuentos.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Revisar Promociones</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm p_grid">
                    <a href="/login/view/home/reports.php" class="text-decoration-none">
                        <div class="card" style="width: 18rem;">
                            <img src="/login/asset/img/reporte.png" class="card-img-top img_pc" alt="...">
                            <div class="card-body d-flex justify-content-center">
                                <p class="card-text">Reportes</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    
        <?php
        require_once("c://laragon/www/login/view/head/footer.php");
        ?>
    </div>
</div>