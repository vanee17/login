<?php
    require_once("c://laragon/www/login/view/head/head.php");
?>
<?php if(empty($_SESSION["user"])): ?>
<div class="content_login">
    <div class="div_title text-center">
        <img src="/login/asset/img/clr3200.png" alt="logo">
        <h1 class="title">Inventa System</h1>
    </div>
        <div class="div_button text-center">
        <a href="/login/view/home/login.php" type="button" class="button">Inicia Sesion</a>
        <a href="/login/view/home/signup.php" type="button" class="button">Registrate</a>
    </div>
</div>

<?php else: ?>
    <div class="flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 w-100 sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Inventa System</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 mt-5 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/login/view/home/panelControl.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login/view/home/cashRegister.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-cash-coin color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Caja</span>
                        </a>
                    </li>
                    <li>
                        <a href="/login/view/home/checkIn.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-building-fill-check color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Facturar</span> </a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-clipboard2-data-fill color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Movimientos</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="/login/view/home/sales.php" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Ventas</span></a>
                            </li>
                            <li>
                                <a href="/login/view/home/promotions.php" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Promociones</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-card-checklist color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Inventario</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li>
                                <a href="/login/view/home/customers.php" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Clientes</span></a>
                            </li>
                            <li class="w-100">
                                <a href="/login/view/home/products.php" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Productos</span></a>
                            </li>
                            <li>
                                <a href="/login/view/home/suppliers.php" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Proveedores</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi bi-person-lines-fill color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">Administrar</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Perfil Usuario</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline l_navbar">Perfil administrador</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/login/view/home/reports.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi bi-journal-check color2"></i> <span class="ms-1 d-none d-sm-inline l_navbar">reportes</span></a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1 l_navbar">
                            <?= $_SESSION["user"] ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="/login/view/home/logout.php">logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="bd_content w-100">
 
