<?php
require('../model/conexion_bd.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];



$sql=$con->prepare("INSERT INTO  formulario_contacto (nombre,correo,mensaje); 
VALUES ('$nombre','$correo','$mensaje')");
$sql->execute();

if($sql){
    header("location: /");
}else{
    echo '<script>alert("tu mensaje no se pudo enviar");  </script>';
}

 //cerrar la conexion a la bd.
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql=null;

?>