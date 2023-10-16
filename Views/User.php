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
                    <img class=" rounded-4" src=" /image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="95" height="65" alt="">
                    <h3 class="text-warning">AMFICA!System</h3>
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

                    <a href="#" class="nav-link px-2 text-white m-2">Cuenta</a>
                    <a type="button" class="btn btn-outline-warning align-top" href="../controlador/cerrar_sesion.php?id=">Cerrar sesion</a>
                </div>
                <!-- ------------ -->
            </div>
        </div>
    </header>
    <div class="container">
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                ¡¡Bienvenido <strong><?php echo $_SESSION['usuario'] ?></strong>!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- secion donde se muestran las mascotas -->
    <h3 style="color: goldenrod; margin: 2%;">MIS AMIGOS FIELES</h3>
    <section class="container-fluid d-flex d-sm-row  ">
        <!-- para cambiar el color del fondo del cuadro es en el estyle que sigue-->
        <div style=" background-color: purple; padding: 15px;border-start-end-radius: 35px; border-end-end-radius: 35px; justify-content: center;" class=" row   mb-3 text-center d-lg-col-8 col align-self-start me-1">

            <?php
            $id = $_SESSION['id'];
            require('../model/funciones.php');
            //consulta a la tb de mascotas 
            $sql = $con->prepare("SELECT * FROM mascotas WHERE id_usuario='$id' LIMIT 4");
            $sql->execute();
            $consulinfomascota = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>
            <!-- boton del registro de mascotas -->
            <button style="color: black; border:1px solid gainsboro; background-color:gold;" type="button" class="btn btn-warning mb-5 col-auto " data-bs-toggle="modal" data-bs-target="#registro_mascota">
                Añadir amigo fiel
            </button>
            <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">

                <!-- Modal - donde esta el formulario-->
                <div class="modal fade" id="registro_mascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registro Amig@s Fieles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container text-center">
                                    <div style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.853) -15%, goldenrod 50%);@media screen and (max-width:1074px){ .container{ px-4 py-5 my-5}}" class="container px-4 py-5 my-0.1">

                                        <h2>Registrar Amig@ Fiel</h2>
                                        <form class="row g-3 needs-validation" action="../controlador/con.insertmas.php" method="post" enctype="multipart/form-data">

                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="validationCustom03" name="nombre_mascota" placeholder="Nombre" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="validationCustom01" name="especie" placeholder="Especie" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="validationCustom02" name="raza" placeholder="Raza" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="validationCustom03" name="sexo" placeholder="Sexo" required>

                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="validationCustom03" name="fecha_nacimiento" placeholder="Fecha de nacimineto de la mascota" required>

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

                <?php
                foreach ($consulinfomascota as $infomascota) {
                    //header("Content-type: image/jpg");
                    $imgmasco = $infomascota->foto_mascota;
                ?>

                    <div class="col mx-auto ">
                        <div class="col-md-7 bg-light mb-3 ">
                            <div style="box-shadow: 0px 15px 8px -6px;" class="card-body ">
                                <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgmasco) . '"alt="foto mascotaa" width="90" height="90">'; ?>
                                <h5 style="color: goldenrod;" class="p-3 card-title pricing-card-title"><?php echo $infomascota->nombre_mascota; ?></h5>
                                <a style="color: white;" href="ficha_salud.php?id=<?php echo $infomascota->id_mascota ?>" class="btn btn-info ">ver info</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>


            <!-- mostrar todas las mascotas con un modal -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-auto" data-bs-toggle="modal" data-bs-target="#vermascotas">
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
                        <div style=" background-color: purple;" class="modal-body text-center">
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
                                <div class="col mx-auto ">
                                    <div class="col-md-7 bg-light mb-3 ">
                                        <div style="box-shadow: 0px 15px 8px -6px;" class="card-body ">
                                            <!-- <div  style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" width="90" height="90"> <?php // echo $img; 
                                                                                                                                                            ?></div> -->
                                            <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgmasco) . '"alt="foto mascotaa" width="90" height="90">'; ?>
                                            <!-- <img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="<?php //echo $row['foto_mascota']
                                                                                                                                        ?>" alt="foto mascotaa" width="90" height="90"> -->
                                            <h5 style="color: goldenrod;" class="p-3 card-title pricing-card-title"><?php echo $infomascota->nombre_mascota ?></h5>
                                            <a style="color: white;" href="ficha_salud.php?id=<?php echo $infomascota->id_mascota ?>" class="btn btn-info ">ver info</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-none d-sm-block">
            <img class="mx-end-end" style="width: 350px; height: 520px; border-radius: 70px; padding: 8%;" src="../img/8962397.jpg" alt="Imagen de Freepik">
        </div>
    </section>

    <!--secion de noticias  -->
    <div class=" container-fluid text-center mt-4">
        <h3 style="color: goldenrod; margin: 2%;" class="text-center m-0">Noticias</h3>
        <?php
        $sql = $con->prepare("SELECT * FROM noticias WHERE destacar=1 LIMIT 2");
        $sql->execute();
        $consulinfonoticias = $sql->fetchAll(PDO::FETCH_OBJ);
        ?>
        <section class="d-flex d-sm-row ms-0">
            <div class="d-none d-sm-block">
                <img style="width: 350px; height: 350px; border-radius: 70px; padding: 8%;" src="../img/8796021.jpg" alt="">
            </div>

            <div style=" background-color: purple; padding: 15px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;" class="row   mb-3 text-center d-lg-col-8 col align-self-end ms-1">

                <?php
                foreach ($consulinfonoticias as $infonoticias) {
                    //header("Content-type: image/jpg");
                    $imgnoti = $infonoticias->foto_noticia;
                ?>
                    <div class="col mx-auto">
                        <div class="col-md-7 bg-light mb-3">
                            <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgnoti) . '"alt="foto noticia" width="auto" height="100">'; ?>
                            <div style="box-shadow: 0px 15px 8px -6px;" class="card-body">
                                <h5 class="p-3 card-title pricing-card-title"><?php echo $infonoticias->titulo ?></h5>
                                <small><?php echo $infonoticias->fecha ?></small> <br><br>
                                <a style="color: white;" href="noticia-destacada.php?id=<?php echo $infonoticias->id_noticia ?>" class="btn btn-primary ">leer mas..</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </section>
    </div>

    <!-- secion de consejos -->
    <h3 style="color: goldenrod; margin: 2%;">Consejos para la interacion con tu mascota</h3>
    <section class="container-fluid d-flex d-sm-row  ">

        <div style=" background-color: purple; padding: 15px;border-start-end-radius: 35px; border-end-end-radius: 35px; justify-content: center;" class=" row   mb-3 text-center d-lg-col-8 col align-self-start me-1">
            <?php
            $sql = $con->prepare("SELECT * FROM consejos LIMIT 2");
            $sql->execute();
            $consulinfoconsejos = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>


            <?php
            foreach ($consulinfoconsejos as $infoconsejos) {
                //header("Content-type: image/jpg");
                $imgconsejos = $infoconsejos->img_consejo;
            ?>

                <div class="col mx-auto">
                    <div class="col-md-7 bg-light mb-3">
                        <div style="box-shadow: 0px 15px 8px -6px;" class="card-body">
                            <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgconsejos) . '"alt="foto noticia" width="220" height="140">'; ?>
                            <h5 class="p-3 card-title pricing-card-title"><?php echo $infoconsejos->titulo ?></h5>
                            <small><?php echo $infoconsejos->especie ?></small><br>
                            <small><?php echo $infoconsejos->fecha ?></small><br><br>
                            <a style="color: white;" href="consejos.php?id=<?php echo $infoconsejos->id_consejos ?>" class="btn btn-primary ">leer mas...</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <?php //cerrar la conexion a la bd.
        // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
        $sql = null;
        ?>
        <div class="d-none d-sm-block">
            <img class="mx-end-end" style="width: 350px; height: 400px; border-radius: 70px; padding: 8%;" src="../img/29762171_7617417.jpg" alt="Imagen de Freepik"><!--Imagen de <a href="https://www.freepik.es/vector-gratis/silueta-perro-gato-diseno-plano_42111627.htm#query=perro%20y%20gato%20siluetas&position=14&from_view=search&track=ais">Freepik</a>-->
        </div>
    </section>


    <?php include("../Templades/footer.php") ?>