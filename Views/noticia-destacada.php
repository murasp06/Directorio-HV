<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
    // echo 'usted no tiene autorizacion';
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
    <title>AMFIblog!</title>
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="../image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" type="image/x-icon/png">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body style="background-color: rgba(238, 238, 238,1);">
    <main>
        <button class="btn btn-primary m-1 dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
            opc.regreso
        </button>
        <ul class="dropdown-menu">
            <li><a class="btn btn-primary  m-1 btn-sm " href="Users.php">Suite</a></li>
            <li><a class="btn btn-primary  m-1 btn-sm " href="blog.php">Mural</a></li>
        </ul>
        <div style="background-color: #ffff;" class="container mt-1 text-center">
            <?php
            require('../model/funciones.php');
            $sql = $con->prepare("SELECT * FROM noticias ORDER BY `noticias`.`id_noticia` DESC");
            $sql->execute();
            $consulinfonoticias = $sql->fetchAll(PDO::FETCH_OBJ);
            ?>

            <p class="text-start border-bottom"><?php fecha_actual() ?><!--Ultima publicación:--><span class="text-danger"><?php hora_actual(); ?></span></p>
            <h1 style="font-family:'flatory serif'" class="display-3   border-bottom border-danger border-3 text-center"><img style="border-radius: 50px 0px 45px 50px;" src="../img/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="65" height="65" alt="L.amfica">Noticias!</h1>
            <?php
            require('../model/conexion_bd.php');
            $id = $_GET['id'];
            $sql = $con->prepare("SELECT * FROM noticias WHERE id_noticia='$id'");
            $sql->execute();
            $consulinfonoticias = $sql->fetchAll(PDO::FETCH_OBJ);
            foreach ($consulinfonoticias as $infonoticias) {
                //header("Content-type: image/jpg");
                $img = $infonoticias->foto_noticia;
                $fecha = $infonoticias->fecha;

            ?>
                <!-- repetir -->
                <hr>
                <h3 style="color:goldenrod; font-family:'dejavu serif'" class="text-center"><?php echo $infonoticias->titulo ?></h3>
                <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3 text-center justify-content-center">
                    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                        <!-- <img src="" alt="imagen noticia"> -->
                        <?php echo '<img style="box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($img) . '"alt="foto noticia">'; ?>

                    </div>
                    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="my-3 p-3">
                            <small><?php echo fecha($fecha); ?></small>
                            <p class="lead"><i class="fa-duotone fa-user">Amigos del mundo</i></p>
                        </div>
                        <div class="shadow-sm mx-auto p-2 bg-opacity-75" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; font-family:'dejavu serif'; background-color:white"><?php echo $infonoticias->descripcion_noticia ?></div>
                    </div>
                </div>
            <?php } ?>
            <a href="blog.php" class="btn btn-primary  m-2 ">ir al muro de noticias</a>
        </div>









        <?php include '../Templades/footer.php' ?>