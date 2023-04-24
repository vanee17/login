<?php
    require_once("d://laragon/www/login/view/head/header.php");
    if(empty($_SESSION["user"])){
        header("Location:login.php");
    }
?>
    <h1 class="text-center md-4">Bienvenido <?= $_SESSION["user"] ?></h1>
<?php
    require_once("d://laragon/www/login/view/head/footer.php");
?>