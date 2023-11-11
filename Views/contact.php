<?php include '../model/config.general.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMFICA!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" type="image/x-icon/png">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;


        }

        ;
    </style>
</head>

<body>
    <main>
        <header>

            <!-- barra de navegacion -->

            <nav style="background-color: black; " class="navbar navbar-expand-md navbar-dark border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand text-warning fs-2 " href="/"><img style="border-radius: 50px 0px 45px 50px;" style="border-radius: 25px;" src="/image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="200" height="200" alt="L.amfica"> AMFICA!</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav  mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $ruta1;?>contact.php">Contacto</a>
                            </li>
                            <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form> -->
                            <!-- boton login -->
                            <a href="/Views/login.php" type="button" class="btn btn-outline-warning align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle align-items-center" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg> Entrar
                            </a>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <!-- espacio de logo y titulo de contacto -->
            <div style="text-align: center;" class="">
                <!-- logo -->
                <img style=" margin-top: 8%;height: 150px;border-radius: 50px;margin-right: 5px;text-align: center;" src="/image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" alt="logo AMFICA">

                <div class="my-5">
                    <!-- titulo -->
                    <h3 style=" font-size: 40px; font-weight: 700;letter-spacing: 5px;color: rgba(215, 162, 30, 0.796);">CONTACTO</h3>
                </div>
            </div>
        </div>
        <!-- contenedor de datos direccion,contacto.gmail -->
        <div style="text-align: center;justify-content: space-around;margin-top: 100px;" class="container d-flex">
            <div class="m-1 p-2">
                <!-- direccion -->
                <img style="height: 50px;width: 50px;" src="/image/location.png" alt="img-direccion">
                <h4>Dirección</h4>
                <p>Medellín-Antioquia-Colombia</p>
            </div>
            <div class="m-1 p-2">
                <!-- gmail -->
                <img style="height: 50px;width: 50px;" src="/image/gmail-logo.png" alt="img-gmail">
                <h4>Dirección De Envió</h4>
                <a style="text-decoration: none;color: black; " href="mailto:amficaonline@outlook.com">amficaonline@outlook.com</a>
            </div>
            <div class="m-1 p-2">
                <!-- wassap -->
                <img style="height: 50px;width: 50px;" src="/image/logo_wasap.png" alt="img-wasstapp">
                <h4>Hablar De Negocios</h4>
                <span>solo chat</span>
                <a style="text-decoration: none;color: black;" href="tel:+573135258750">3135258750</a>
            </div>
        </div>

        <!-- contenedor de formulario e imagen de mascota -->
        <div class="container d-flex mb-3 ">

            <!-- la imagen no se vera si es para celular -->
            <img class="d-none d-lg-block d-sm-none" style="width:30%;text-align: center;margin-left: 2%;border-radius: 5px;" src="/image/portada inicio amfica.jpg" alt="">

            <!-- fomulario de mensaje -->
            <form action="../controlador/con.form_mensajes.php" method="post" style="width:60%; padding: 1%;text-align: center;margin-left: 4%;background-color: whitesmoke;border-radius: 5px;" class="col-auto">
                <div class="mb-3 ">
                    <input type="text" class="form-control" id="validationCustom01" name="nombre" placeholder="Nombre" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3 ">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="correo" placeholder="Correo" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">No compartiremos su correo electrónico con nadie más.</div>
                </div>
                <div class="mb-3 col-lg-8">
                    <textarea name="mensaje" placeholder="Mensaje" class="col-auto" required></textarea><br>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <?php include '../Templades/footer.php' ?>
