<?php
// llamaos la conexion a la bd
include("conexion_bd.php");

// consulta a bd en la tabla de usuarios toda la informacion
$sql=$con->prepare("SELECT * FROM usuarios;");
$sql->execute();
$consul_usuarios=$sql->fetchAll(PDO::FETCH_OBJ);


//consulta a la tb de roles
$sql=$con->prepare("SELECT * FROM roles;");
$sql->execute();
$consult_rol=$sql->fetchAll(PDO::FETCH_OBJ);

// consulta para la cantidad de usuarios registrados
$sql=$con->prepare("SELECT count(1) FROM usuarios");
$sql->execute();
$cantidad_user=$sql->fetchColumn();

// consulta para la cantidad de mascotas registradas
$sql=$con->prepare("SELECT count(1) FROM mascotas");
$sql->execute();
$cantidad_pets=$sql->fetchColumn();

// consulta para la cantidad de veterinarias registradas
// $sql=$con->prepare("SELECT count(1) FROM veterinarias");
// $sql->execute();
// $cantidad_veter=$sql->fetchColumn();

define("KEY_TOKEN","PAR.dri-082~*");
define("MONEDA","COP $");

//consulta para administrador absoluto
$sql=$con->prepare("SELECT * FROM usuarios WHERE id_usuario=1;");
$sql->execute();
$admin=$sql->fetchAll(PDO::FETCH_OBJ);

// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql=null; 
?>