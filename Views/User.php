<?php
session_start();
$varsesion = $_SESSION['id'];
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
    echo 'usted no tiene autorizacion';
    header("location: ../index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal-AMFICA!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="" type="image/x-icon,png">
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
        <div style="background-color: black;" class="navbar fixed navbar-dark ">
            <div class="container">
                <!-- <a href="#" class="navbar-brand text-start  d-flex"> -->
                <button class="btn d-flex " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <img style="border-radius: 50px 0px 45px 50px;" class=" rounded-4" src=" /image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="95" height="65" alt="">
                    <h3 class="text-warning">AMFICA!</h3>
                </button>
                <!-- </a> -->
                <div style="background-color:#1c1c1c;" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 style="color: white;" class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menú</h5>
                        <button style="background-color: white;" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a style="color: white;" href="" class="dropdown-item" type="button">Tienda</a>
                        <a style="color: white;" href="" class="dropdown-item" type="button">Noticias_blog</a>
                        <!-- <a style="color: white;" href="" class="dropdown-item" type="button">Citas</a> -->
                        <!-- <a style="color: white;" href="" class="dropdown-item" type="button">Foro</a> -->
                        <a style="color: white;" href="<?php //echo $ruta;
                                                        ?>#" class="dropdown-item" type="button">Foro</a>
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

                    <a href="ed_cuenta.php?id=<?php echo $id = $_SESSION['id']; ?>" class="nav-link px-2 text-white m-2">Cuenta</a>
                    <a type="button" class="btn btn-outline-warning align-top" href="../controlador/cerrar_sesion.php?id=<?php echo $id = $_SESSION['id']; ?>">Cerrar sesion</a>
                </div>
                <!-- ------------ -->
            </div>
        </div>
    </header>
    <div>

        <!-- alerta de bienvenida -->
        <div class="container">
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    ¡¡Bienvenido <strong><?php echo $_SESSION['usuario'] ?></strong>!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>



        <!-- secion donde se muestran las mascotas -->
        <!-- secion donde se muestran las mascotas -->
        <h3 style="color: goldenrod; " class="text-center fs-2 p-2 fw-bold">MIS AMIGOS FIELES</h3>
        <section class="container  d-sm-row  text-center">
            <?php
            $id = $_SESSION['id'];
            require('../model/funciones.php');
            //consulta a la tb de mascotas
            $sql = $con->prepare("SELECT * FROM mascotas WHERE id_usuario='$id' LIMIT 3");
            $sql->execute();
            $consulinfomascota = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>

            <div class="d-sm-flex justify-content-evenly">
                <?php
                foreach ($consulinfomascota as $infomascota) {
                    //header("Content-type: image/jpg");
                    $imgmasco = $infomascota->foto_mascota;

                ?>
                    <div class="row ">
                        <div class="col-lg-8 m-4 ">

                            <div class="mx-auto p-2 " style="width:200px; height:200px">
                                <?php echo '<img style="border-radius: 0px 80px 80px 90px" class="card-img-top border border-danger" src="data:image/jpg; base64,' . base64_encode($imgmasco) . '"alt="foto mascotaa" width="100%" height="100%">'; ?>
                            </div>
                            <h2 style="color: goldenrod;" class="text-uppercase fw-medium"><?php echo $infomascota->nombre_mascota; ?></h2>
                            <p>la fecha y hora de la proxima visita es el dia (15) mes (11) año (2023) a las (09:02)</p>
                            <!-- <p><a class="btn btn-secondary" href="#">Ver Detalles &raquo;</a></p> -->
                            <a type="button" class="btn btn-outline-danger align-top" href="ficha_salud.php?id=<?php echo $infomascota->id_mascota ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                    <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z" />
                                </svg> Ver Detalles
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div class="mt-4">

                <!-- modal para registrar macotas -->

                <!-- boton del modal para registro de mascotas -->
                <button class="btn align-top mb-4 col-auto  btn-outline-dark me-4" type="button" class="btn btn-warning mb-5 col-auto " data-bs-toggle="modal" data-bs-target="#registro_mascota">
                    Añadir amigo fiel
                </button>

                <!-- modal para registro de mascotas registro de mascota -->
                <div class="modal fade" id="registro_mascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registro Amig@s Fieles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="container text-center">
                                    <div style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.853) -15%, goldenrod 50%);" class="container px-4 py-5 my-0.1">

                                        <h2>Registrar Amig@ Fiel</h2>
                                        <form class="row g-3 needs-validation" action="../controlador/con.insertmas.php" method="post" enctype="multipart/form-data">

                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="1" name="nombre_mascota" placeholder="Nombre" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="2" name="especie" placeholder="Especie" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="3" name="raza" placeholder="Raza" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="4" name="sexo" placeholder="Sexo" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="5" name="fecha_nacimiento" placeholder="Fecha de nacimiento de la mascota" required>

                                            </div>
                                            <div class="col-auto overflow-auto ">
                                                <label style="color: white;" for="foto_mascota" class="form-label">monte una foto de la mascota</label><br>
                                                <input style="color: white;" type="file" class="col-auto" id="foto_mascota" name="foto_mascota"><br>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-warning" type="submit">Registrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- fin delmodal -->



                <!-- modal para ver todas las mascotas  -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-dark align-top mb-4 col-auto " data-bs-toggle="modal" data-bs-target="#vermascotas">
                    Ver todos
                </button>
                <!-- Modal -->
                <div class="modal fade" id="vermascotas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tod@s Tus Amigos Fieles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div style="background-color: #f8f9fa;" class="modal-body text-center ">
                                <div class="text-center ms-auto">
                                    <?php
                                    //consulta a la tb de mascotas
                                    $sql = $con->prepare("SELECT * FROM mascotas WHERE id_usuario='$id'");
                                    $sql->execute();
                                    $consulinfomascota = $sql->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php
                                    foreach ($consulinfomascota as $infomascota) {
                                        //header("Content-type: image/jpg");
                                        $imgmasco = $infomascota->foto_mascota;
                                    ?>
                                        <div class="row ">
                                            <div class="col-lg-8 m-4 ">

                                                <div class="mx-auto p-2 " style="width:200px; height:200px">
                                                    <?php echo '<img style="border-radius: 0px 80px 80px 90px" class="card-img-top border border-danger" src="data:image/jpg; base64,' . base64_encode($imgmasco) . '"alt="foto mascotaa" width="100%" height="100%">'; ?>
                                                </div>
                                                <h2 style="color: goldenrod;" class="text-uppercase fw-medium"><?php echo $infomascota->nombre_mascota; ?></h2>
                                                <p>la fecha y hora de la proxima visita es el dia (15) mes (11) año (2023) a las (09:02)</p>
                                                <!-- <p><a class="btn btn-secondary" href="#">Ver Detalles &raquo;</a></p> -->
                                                <a type="button" class="btn btn-outline-danger align-top" href="ficha_salud.php?id=<?php echo $infomascota->id_mascota ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                                        <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                                        <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                                        <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z" />
                                                    </svg> Ver Detalles
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin del modal -->
            </div>
        </section>


        <!-- secion de noticias -->

        <div class="container text-center mt-4 border-top ">
            <h3 style="color: goldenrod;" class="text-center mt-5 mb-4">Noticias</h3>
            <?php
            $sql = $con->prepare("SELECT * FROM noticias WHERE destacar=1 LIMIT 2");
            $sql->execute();
            $consulinfonoticias = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>
            <section class="">


                <div class="row mb-2">
                    <?php
                    foreach ($consulinfonoticias as $infonoticias) {
                        //header("Content-type: image/jpg");
                        $imgnoti = $infonoticias->foto_noticia;
                    ?>
                        <div class="col-md-6 ">
                            <div class="row g-0 border text-bg-light rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static border-box">
                                    <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                                    <h3 class="mb-0 "><?php echo $infonoticias->titulo ?></h3>
                                    <div class="mb-1 text-body-secondary">Nov 12/<?php echo $infonoticias->fecha ?></div>
                                    <div style="max-width: 260px;" class="card-text mb-auto d-inline-block text-truncate border-box p-1"><?php echo $infonoticias->descripcion_noticia ?></div>
                                    <a href="noticia-destacada.php?id=<?php echo $infonoticias->id_noticia ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                                        Continuar lectura...
                                        <svg class="bi">
                                            <use xlink:href="#chevron-right" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <?php echo '<img  src="data:image/jpg; base64,' . base64_encode($imgnoti) . '"alt="foto noticia" width="200" height="250">'; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </section>
        </div>


        <!-- session de consejos  -->

        <div class=" container-fluid text-center mt-4 border-top ">
            <h3 style="color: goldenrod; margin: 2%;" class="text-center mt-4">Concejos para la interaccion con tu mascota</h3>
            <?php
            $sql = $con->prepare("SELECT * FROM consejos LIMIT 2");
            $sql->execute();
            $consulinfoconsejos = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>
            <section class="d-flex d-sm-row ms-0">
                <div class="d-none d-sm-block">
                    <img style="width: 350px; height: 350px; border-radius: 70px; padding: 8%;" src="../image/29762171_7617417.jpg" alt="">
                </div>

                <div style=" background-color: black; padding: 15px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;" class="row   mb-3 text-center d-lg-col-8  col align-self-end ms-1 border border-start-0 border-4 border-warning border-end-0">

                    <?php
                    foreach ($consulinfoconsejos as $infoconsejos) {
                        //header("Content-type: image/jpg");
                        $imgconsejos = $infoconsejos->img_consejo;
                    ?>

                        <div class="col text-center">
                            <div class="col-md-5 bg-light mb-3 rounded-top-4 border-box">
                                <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgconsejos) . '"alt="foto noticia" width="100%" height="240">'; ?>
                                <div style="box-shadow: 0px 15px 8px -6px;" class="card-body p-2">
                                    <h5 class="p-3 card-title pricing-card-title"><?php echo $infoconsejos->titulo ?></h5>
                                    <small><?php echo $infoconsejos->especie ?></small><br>
                                    <small><?php echo $infoconsejos->fecha ?></small><br><br>
                                    <a style="color: white;" href="consejos.php?id=<?php echo $infoconsejos->id_consejos ?>" class="btn btn-primary ">leer mas...</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </section>
        </div>



    </div>
    <?php //cerrar la conexion a la bd.
    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
    $con = null;
    $sql = null;
    $consulinfoconsejos = null;
    $consulinfonoticias = null;
    $consulinfomascota = null;

    ?>

    <?php include("../Templades/footer.php") ?>