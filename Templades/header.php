<!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel-Admin-AMFICA!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="shortcut icon" href="../image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" type="image/x-icon/png">
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
            }
        </style>
    </head>

    <body>
        <header>
            
            <!-- menu lateral -->
            <div  style="background-color: black;" class="navbar fixed navbar-dark ">
                <div class="container">
                    <!-- <a href="#" class="navbar-brand text-start  d-flex"> -->
                        <button class="btn d-flex " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <img style="border-radius: 50px 0px 45px 50px;" src=" /image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="70" height="70" alt="L.amfica">
                            <h3 class="text-warning">AMFICA!System</h3>
                        </button>
                    <!-- </a> -->
                    <div style="background-color:#1c1c1c;" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 style="color: white;" class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menú</h5>
                            <button style="background-color: white;" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <a style="color: white;" href="<?php echo $ruta;?>empleados.php" class="dropdown-item" type="button">Trabajadores</a>
                            <a style="color: white;" href="<?php echo $ruta;?>puestos_empleados.php" class="dropdown-item" type="button">Puestos</a>
                            <a style="color: white;" href="<?php echo $ruta;?>usuarios.php" class="dropdown-item" type="button">Usuarios</a>
                            <a style="color: white;" href="/admin/index.php" class="dropdown-item" type="button">Suite</a>
                            <a style="color: white;" href="<?php //echo $ruta;?>#" class="dropdown-item" type="button">Foro</a>
                            <!-- <li><button class="dropdown-item" type="button"></button></li> -->
                        </div>
                    </div>
                    <!-- ................... -->


                    <!-- menu de cabezera -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse  justify-content-end text-end" id="navbarHeader">
                        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li class="nav-item px-2 text-white "><a class="nav-link active"></a></li>
                        </ul> -->
                        <select style="background-color: #1c1c1c;color:white" name="idioma" id="">
                            <option value=""><a href="#" class="nav-link px-2 text-white">Español</a></option>
                            <option value=""><a href="#" class="nav-link px-2 text-white">Ingles</a></option>
                        </select>
    
                        <a href="/Views/ed_cuenta.php" class="nav-link px-2 text-white m-2">Cuenta</a>
                        <a href="../controlador/cerrar_sesion.php?id=<?php echo $id = $_SESSION['id']; ?>" class="btn btn-warning">Cerrar sesion</a>
                </div>
            </div>
        </header>
