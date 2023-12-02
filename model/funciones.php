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


//funcion para fecha de forma: Wednesday 07 de June del 2023 12:00 am -la utilizamos con variables
function fecha($fecha)
{
    
    echo str_replace('-', ',', date('l d \d\e F \d\e\l Y  g:i a', strtotime($fecha)));
}

//funcion para fecha de forma1: 07 de June del 2023,12:00 am -la utilizamos con variables
function fecha1($fecha)
{
    echo str_replace('-', ',', date(' d \d\e F \d\e\l Y\- g:i a', strtotime($fecha)));
}


// funcion para fecha actual -sin varibles
function fecha_actual(){
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date('Y-m-d');
    echo str_replace('-', ',', date('l d \d\e F-Y \| ', strtotime($fecha_actual)));
}
// funcion para hora actual -sin varibles
function hora_actual(){
    date_default_timezone_set('America/Bogota');
    $hora_actual=date('H:i:s');
    echo str_replace('-', ',', date(' g:i a', strtotime($hora_actual)));
}



    // establecer la zona horaria
// date_default_timezone_set('America/Bogota');

        // funciones de ensayo o originales

    // funcion para mostrar la hora actual en formato español dd/mm/aa
//$fecha_registro=date('Y-m-d H:i:s');
// echo $fecha;
?>