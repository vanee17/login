<div class="d-flex w-100">
    
    <?php
    require_once("c://laragon/www/login/view/head/header.php");
    if(empty($_SESSION["user"])){
        header("Location:login.php");
    }
    ?>
    <div>
            <h1 class="text-center md-4">Bienvenido <?= $_SESSION["user"] ?></h1>
            reportes
    
    <?php
    require_once("c://laragon/www/login/view/head/footer.php");
    ?>
    </div>
</div>
