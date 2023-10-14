<?php
require('../model/conexion_bd.php');


// $id_usuario = $_POST['id_usuario'];
$user = $_POST['user'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellidos= $_POST['apellidos'];
$edad = $_POST['edad'];
$documento= $_POST['documento'];
$ciudad= $_POST['ciudad'];
$num_celular = $_POST['num_celular'];
$correo= $_POST['correo'];
$direccion= $_POST['direccion'];
// $foto_user=$_POST['foto_user'];

$sql =$con->prepare("INSERT INTO usuarios (user,clave,nombre,apellidos,edad,documento,ciudad,num_celular,correo,direccion,id_rol,activo) 
VALUES ('$user','$clave','$nombre','$apellidos','$edad','$documento','$ciudad','$num_celular','$correo','$direccion',DEFAULT,DEFAULT)");
$sql->execute();

if($sql){
    header("location: ../views/login.php");
}else{
    echo 'no registro..';
}

 //cerrar la conexion a la bd.
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql=null;


?>