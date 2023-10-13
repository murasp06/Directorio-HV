<?php

session_start();


if ($_SESSION['id'] == 1) {

    $id_usuario = $_GET['id'];
    require('/workspaces/PWA_AMFICA_V.0.1/model/conexion_bd.php');

    $id_usuario = $_POST['id_usuario'];
    $user = $_POST['user'];
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $documento = $_POST['documento'];
    $ciudad = $_POST['ciudad'];
    $num_celular = $_POST['num_celular'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $activo = $_POST['activo'];


    $sql = $con->prepare(" UPDATE usuarios SET user='$user',clave='$clave',nombre='$nombre',apellidos='$apellidos',edad='$edad',documento='$documento',ciudad='$ciudad',num_celular='$num_celular',correo='$correo',direccion='$direccion',activo='$activo' WHERE id_usuario='$id_usuario' ");
    $sql->execute();
    if ($sql) {
        $sql = null;
        //echo '<div class="alert alert-success" role="alert"> Datos actualizados con exito!</div>';
        header("location: ../admin/");
    } else {
        $sql = null;
        echo '<div class="alert alert-danger" role="alert"> No se hizo la actualizacion!</div>';
    }

    //cerrar la conexion a la bd.
    //mysqli_close($con);
} else {
    require('/workspaces/PWA_AMFICA_V.0.1/model/conexion_bd.php');

    $id_usuario = $_POST['id_usuario'];
    // $user = $_POST['user'];
    // $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $ciudad = $_POST['ciudad'];
    $num_celular = $_POST['num_celular'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $foto_user = $_FILES['foto_user'];

      $nombre_imagen = $_FILES['foto_user']['name'];
      $tipo_imagen = $_FILES['foto_user']['type'];
      $tamano_imagen = $_FILES['foto_user']['size'];
      $check = $_FILES["foto_user"]["tmp_name"];
      $foto_user = $_FILES['foto_user']['tmp_name'];
      $foto_userConten = addslashes($foto_user);


    if ($check != false) {
        $sql = $con->prepare(" UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',edad='$edad',ciudad='$ciudad',num_celular='$num_celular',correo='$correo',direccion='$direccion',foto_user='$foto_userConten',activo= DEFAULT  WHERE id_usuario='$id_usuario' ");
        $sql->execute();
        if ($sql) {
            // $id_usuario = $_POST['id_usuario'];
            // // $user = $_POST['user'];
            // // $clave = $_POST['clave'];
            // $nombre = $_POST['nombre'];
            // $apellidos = $_POST['apellidos'];
            // $edad = $_POST['edad'];
            // $ciudad = $_POST['ciudad'];
            // $num_celular = $_POST['num_celular'];
            // $correo = $_POST['correo'];
            // $direccion = $_POST['direccion'];
            // $foto_user = $_FILES['foto_user'];
            //  $tmp_foto=$_FILES["tmp_name"];
            //  $direcion_destino="../img/user";


            //   $nombre_imagen = $_FILES['foto_user']['name'];
            //   $tipo_imagen = $_FILES['foto_user']['type'];
            //   $tamano_imagen = $_FILES['foto_user']['size'];
            // $check = $_FILES["foto_user"]["tmp_name"];
            //   $foto_user = $_FILES['foto_user']['tmp_name'];
            //   $foto_userConten = addslashes($foto_user);


            if ($check != false) {
                $sql = $con->prepare(" UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',edad='$edad',ciudad='$ciudad',num_celular='$num_celular',correo='$correo',direccion='$direccion',foto_user= '$foto_userConten',activo= DEFAULT  WHERE id_usuario='$id_usuario' ");
                $sql->execute();
                if ($sql) {
                    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                    $sql = null;
                    //echo '<div class="alert alert-success" role="alert"> Datos actualizados con exito!</div>';
                    session_start();
                    $varsesion = $_SESSION['usuario'];
                    header("location: ../views/usuarios.php");
                }else {
                    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                    $sql = null;
                    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                    $sql = null;
                    echo '<div class="alert alert-success" role="alert"> Datos actualizados con exito!</div>';
                    session_start();
                    $varsesion = $_SESSION['usuario'];
                    header("location: ../views/usuarios.php");
                }//else{
                // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                // $sql=null;
                // echo'<div class="alert alert-danger" role="alert"> No se pudo actualizar!</div>';
                // }
            }
        
        } else {

            $sql = $con->prepare(" UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',edad='$edad',ciudad='$ciudad',num_celular='$num_celular',correo='$correo',direccion='$direccion',foto_user= '$foto_userConten' ,activo= DEFAULT  WHERE id_usuario='$id_usuario' ");
            $sql->execute();
            if ($sql) {
                // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                $sql = null;
                echo '<div class="alert alert-success" role="alert"> Datos actualizados con exito!</div>';
                session_start();
                $varsesion = $_SESSION['usuario'];
                header("location: ../views/usuarios.php");
            } else {
                // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
                $sql = null;
                echo '<div class="alert alert-danger" role="alert"> no se púdo actualizar su informacion!</div>';
            }
        }
    }
}


// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql = null;

