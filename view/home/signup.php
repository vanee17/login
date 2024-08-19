<?php
    require_once("c://laragon/www/login/view/head/head.php");
    if(!empty($_SESSION["user"])){
        header("Location:panelControl.php");
    }
?>

<div class="content_login">
    <div class="mt-0 title text-center">
        Registrate en Inventa System
    </div>
    <form id="signupForm" class="col-4 login" autocomplete="off">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Clave</label>
            <div class="box_eye">
                <button type="button" class="show_pass" onclick="showPassword('password','eye-password')">
                    <i id="eye-password" class="fas fa-eye change_password"></i>
                </button>
            </div>
            <input type="password" name="passwords" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Repetir Clave</label>
            <div class="box_eye">
                <button type="button" class="show_pass" onclick="showPassword('confirmPassword','eye-password2')">
                    <i id="eye-password2" class="fas fa-eye change_password"></i>
                </button>
            </div>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn button">Create</button>
        </div>
    </form>
    <div class="col-4 login mt-4">
        Tienes una cuenta? <a href="login.php" class="links">Inicia Sesion</a>
    </div>
</div>

<?php
    require_once("c://laragon/www/login/view/head/footer.php");
?>