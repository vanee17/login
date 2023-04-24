<?php
    require_once("d://laragon/www/login/view/head/head.php");
    if(!empty($_SESSION["user"])){
        header("Location:panelControl.php");
    }
?>

<div class="content_login">
    <div class="icon">
        <a href="/login/index.php">
        <i class="fas fa-cat cat-icon"></i>
        </a>
    </div>
    <div class="title">
        Registrate en IntegraTech
    </div>
    <form id="signupForm" class="col-4 login" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="box_eye">
                <button type="button" onclick="showPassword('password','eye-password')">
                    <i id="eye-password" class="fas fa-eye change_password"></i>
                </button>
            </div>
            <input type="password" name="passwords" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Repeat Password</label>
            <div class="box_eye">
                <button type="button" onclick="showPassword('confirmPassword','eye-password2')">
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
        Tienes una cuenta? <a href="login.php">Inicia Sesion</a>
    </div>
</div>

<?php
    require_once("d://laragon/www/login/view/head/footer.php");
?>