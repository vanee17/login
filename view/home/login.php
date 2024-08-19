<?php
    require_once("c://laragon/www/login/view/head/head.php");
    if(!empty($_SESSION["user"])){
        header("Location:panelControl.php");
    }
?>
<div class="content_login">
    <div class="mt-0 title text-center">
        Inicia sesion en Inventa System
    </div>
    <form id="loginForm" class="col-4 login" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="box_eye">
                <button type="button" class="show_pass" onclick="showPassword('password','eye-password')">
                    <i id="eye-password" class="fas fa-eye change_password"></i>
                </button>
            </div>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn button">Submit</button>
        </div>
    </form>
    <div class="col-4 login mt-4">
        No tienes una cuenta? <a href="signup.php" class="links">Registrate ahora</a>
    </div>
</div>

<?php
    require_once("c://laragon/www/login/view/head/footer.php");
?>