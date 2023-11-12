<?php

// $id_usuario = $_POST['id_usuario'];
$user = $_POST['user'];
$clave = $_POST['clave'];
$clave1 = $_POST['clave1'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$documento = $_POST['documento'];
$ciudad = $_POST['ciudad'];
$num_celular = $_POST['num_celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

// $foto_user=$_POST['foto_user'];

if ($clave == $clave1) {
    require('../model/conexion_bd.php');
    $sql = $con->prepare("INSERT INTO usuarios (user,clave,nombre,apellidos,edad,documento,ciudad,num_celular,correo,direccion,id_rol,activo) 
     VALUES ('$user','$clave1','$nombre','$apellidos','$edad','$documento','$ciudad','$num_celular','$correo','$direccion',DEFAULT,DEFAULT)");
    $sql->execute();

    if ($sql) {
        header("location: ../Views/login.php?id=01");
    } else {
        echo '<div style="background-color: rgba(240, 44, 44, 0.277);color: red;padding:1px;">Usuario no registrado intente de nuevo en 30seg!</div>';
    }
} else {
    header("location: ../Views/registros.php?id=02");
    //echo '<div style="background-color: rgba(240, 44, 44, 0.277);color: red;padding:1px;">Las contaseñas no son iguales!</div>';
}
//cerrar la conexion a la bd.
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
 $sql=null;
?>
