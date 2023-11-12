<?php
session_start();
$varsesion = $_SESSION['usuario'];
$id_usuario = $_SESSION['id'];
if ($varsesion == null || $varsesion == '') {
    // echo 'usted no tiene autorizacion';
    header("location: ../index.php");
    die();
}

$nombre_mascota = $_POST['nombre_mascota'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$foto_mascota = $_FILES['foto_mascota'];
$nombre_imagen = $_FILES['foto_mascota']['name'];
$tipo_imagen = $_FILES['foto_mascota']['type'];
$tamano_imagen = $_FILES['foto_mascota']['size'];
date_default_timezone_set('America/Bogota');
$fecha_registro=date('Y-m-d H:i:s');
if (isset($_FILES['foto_mascota'])) {
    $check = getimagesize($_FILES["foto_mascota"]["tmp_name"]);
    if ($check !== false) {
        $foto_mascota = $_FILES['foto_mascota']['tmp_name'];
        $foto_mascotaConten = addslashes(file_get_contents($foto_mascota));
        if ($tamano_imagen <= 3000000) {
            if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                require('../model/conexion_bd.php');
                // echo $id_usuario, $cc_animal, $especie, $fecha_nacimiento, $foto_mascota, $raza, $sexo, $nombre_mascota;
                $sql =$con->prepare( "INSERT INTO mascotas (nombre_mascota,doc_animal,especie,raza,sexo,fecha_nacimiento,id_usuario,foto_mascota,fecha_registro)
                VALUES ('$nombre_mascota',default,'$especie','$raza','$sexo','$fecha_nacimiento','$id_usuario','$foto_mascotaConten','$fecha_registro');");
                $sql->execute();
                if ($sql) {
                    header("location: ../Views/User.php");
                } else {
                    echo 'no registro..';
                }
            } else {
                echo 'solo se pueden subir imagenes jpeg,jpg,png,';
            }
        }
    }
} else {
    require('../model/conexion_bd.php');
    // echo $id_usuario, $cc_animal, $especie, $fecha_nacimiento, $foto_mascota, $raza, $sexo, $nombre_mascota;
    $sql =$con->prepare("INSERT INTO mascotas (nombre_mascota,doc_animal,especie,raza,sexo,fecha_nacimiento,id_usuario,fecha_registro)
   VALUES ('$nombre_mascota',default,'$especie','$raza','$sexo','$fecha_nacimiento','$id_usuario','$fecha_registro')");
    $sql->execute();
    if ($sql) {
        // echo '<script> document.write("registro exitoso"); </script>';
        header("location: ../Views/User.php");
    } else {
        echo 'no registro..';
    }
}



//cerrar la conexion a la bd.
$sql=null;
?>
