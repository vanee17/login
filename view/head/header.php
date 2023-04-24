<?php
    require_once("d://laragon/www/login/view/head/head.php");
?>
<div class="container_fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if(empty($_SESSION["user"])): ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                    <a href="/login/view/home/login.php" class="button">login</a>
                    <a href="/login/view/home/signup.php" class="button">signup</a>
            </div>

            <?php else: ?>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Edit Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add reference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My account</a>
                    </li>
                </ul>
                    <a href="/login/view/home/logout.php" class="button">logout</a>
            </div>

            <?php endif ?>
        </div>
    </nav>
</div>

<div class="bd_content">

