<?php

$servidor=""; //aqui va el ip o nombre del dominio
$bd=""; //nombre de bases de datos
$usuario=""; //va el usuario para bd
$pass=""; //clave para bd

try{
    $con=new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$pass);
}catch(Exception $ex){
    echo "error de conexion ".$ex->getMessage();
}

?>