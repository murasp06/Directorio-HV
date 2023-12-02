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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <div class="container text-center" style="background-color: white;">
            <?php
            require('../model/funciones.php');
            ?>
            <div class="d-flex justify-content-center ">
                <h5>Consejos</h5>
            </div>
            <p class="text-start border-bottom"><?php fecha_actual() ?><!--Ultima publicación:--><span class="text-danger"><?php hora_actual(); ?></span></p>
            <h1 style="font-family:'flatory serif'" class="display-3   border-bottom border-danger border-3 text-center"><img style="border-radius: 50px 0px 45px 50px;" src="../img/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="65" height="65" alt="L.amfica"> Consejos!</h1>


            <?php
            $id = $_GET['id'];
            $sql = $con->prepare("SELECT * FROM consejos WHERE id_consejos='$id'");
            $sql->execute();
            $consulinfoconsejos = $sql->fetchAll(PDO::FETCH_OBJ);

            foreach ($consulinfoconsejos as $infoconsejos) {
                //header("Content-type: image/jpg");
                $img = $infoconsejos->img_consejo;
                $fecha = $infoconsejos->fecha;
            ?>
                <!-- repetir -->
                <hr>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                    <div class="col mx-auto ">
                        <div class="card shadow-sm ">
                            <?php echo '<img style="border: 1px solid gold; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($img) . '"alt="foto noticia" width="100%" height="270">'; ?>

                            <div class="card-body">
                                <div>
                                    <small><?php echo fecha($fecha); ?></small>
                                </div>
                                <h1><?php echo $infoconsejos->titulo ?></h1>
                                <p class="card-text"><?php echo $infoconsejos->descripcion_concejo  ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">nice</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">comentar</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
            $sql = null;
            ?>
            <a href="blog.php" class="btn btn-primary  m-2 ">Ver mas Consejos</a>

        </div>

        <?php include("../Templades/footer.php") ?>