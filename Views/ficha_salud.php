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
    <title>Ficha-salud AMFICA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body style="background-color: #F2F4F4 ;">
    <?php

    include("../model/conexion_bd.php");

    $id = $_GET['id'];

    $sql=$con->prepare("SELECT * FROM mascotas WHERE id_mascota='$id'");
    $sql->execute();
    ?>
    <div class="container text-center my-5 ">

        <?php
        $consulinfomascota = $sql->fetchAll(PDO::FETCH_OBJ);
        foreach($consulinfomascota as $infomascota)
        $img = $infomascota->foto_mascota;


        ?>
        <h3 class="my-2  mx-auto ">Ficha de Salud</h3>
        <div class="my-3 mx-auto">
            <a href="usuarios.php" class="btn btn-primary  m-2 position-absolute top-0 start-0">Volver</a>


            <div style="box-shadow: 0px 15px 8px -6px; background-image: linear-gradient(to top, aliceblue 50%,white   100%)" class="col-md-6 mb-4 mx-auto  d-sm-flex  overflow-hidden">
                <div class=" text-center my-4 ">
                    <img style=" width: 190px; height: 160px;border: 1px solid gold;" src="data:image/jpg; base64,<?php echo base64_encode($img) ?>" alt="foto mascota" class="overflow-hidden">
                </div>

                <div class="p-4 mx-auto ">
                    <p><span style="color: goldenrod;">Nombre: <strong class="d-inline-block mb-2 text-primary"><?php echo $row['nombre_mascota'] ?></strong></span></p>
                    <p><span style="color: goldenrod;"> Cédula de la mascota: </span> <?php echo $infomascota->cc_animal ?></p>
                    <p><span style="color: goldenrod;"> Especie: </span><?php echo $infomascota->especie ?></p>
                    <p><span style="color: goldenrod;"> Raza: </span> <?php echo $infomascota->raza ?></p>
                    <p><span style="color: goldenrod;"> Sexo: </span> <?php echo $infomascota->sexo ?></p>
                    <p><span style="color: goldenrod;"> Fecha de nacimiento: </span> <?php echo $infomascota->fecha_nacimiento ?></p>
                    <p><span style="color: goldenrod;">Dueño: </span><?php echo $_SESSION['usuario'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <h4 class="">Registro de Desparasitación</h4>
        <table style="border-color: goldenrod;" class="table  table-sm my-3 table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Antiparasitario</th>
                    <th scope="col">Próxima Visita</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>(fecha-actual)</td>
                    <td>(peso)</td>
                    <td>(edad)</td>
                    <td>(Antiparasitorio)</td>
                    <td>(fechaprixma)</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="container text-center my-5">
        <h4 class="">Registro de Vacunacion</h4>
        <table style="border-color: goldenrod;" class="table  table-sm my-3 table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Vacuna</th>
                    <th scope="col">Proxima Visita</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>(fecha-actual)</td>
                    <td>(peso)</td>
                    <td>(edad)</td>
                    <td>(nombre-vacuna)</td>
                    <td>(Fecharía)</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="container text-center my-5">
        <table style="border-color: goldenrod;" class="table table-sm table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $infomascota->observaciones ?></td>

                </tr>
            </tbody>
        </table>
    </div>
    <?php //cerrar la conexion a la bd.
    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
    $sql=null;

    require '../Templades/footer.php'
    ?>
