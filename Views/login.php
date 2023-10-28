<?php include '../Templades/header1.php' ?>

<main class="form-signin w-100  text-center  m-auto my-auto lg-p-5">
    <?php
    // include("../model/conexion_bd.php");
    require("../controlador/con.login.php") ?>

    <form class="col-md-4 p-lg-5 mx-auto  p-5" method="post">
        <a href="/">
            <img class="mb-4 rounded-4" src="/image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" alt="" width="92" height="87">
        </a>
        <h1 class=" fs-1 h3 mb-3 fw-normal">Ingresar</h1>
        <?php
            $id= $_GET['id']; 
            if($id == 01){
            echo '<div style="background-color: rgba #a3cfbb;color: green;padding:1px;">usuario Registrado!</div>';
            }
        ?>
        <?php
        include("../model/conexion_bd.php"); ?>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floating" name="user" placeholder="name.veras" required>
            <label for="floating">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                </svg>
                Usuario
            </label>
        </div>
        <div class="form-floating my-3">
            <input type="password" class="form-control" id="floatingPassword" name="clave" placeholder="Password" required>
            <label for="floatingPassword">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
                Contraseña
            </label>
        </div>

        <!-- <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div> -->
            <input type="submit" name="btnlogin" class="btn btn-danger w-100 py-2 mb-3 btn-outline-warning fs-4" value="Loguear">
        <a href="">recuperar contraseña</a> <span>o</span> <a href="records.php">Crear cuenta</a>
    </form>

    <?php include '../Templades/footer1.php' ?>

    
