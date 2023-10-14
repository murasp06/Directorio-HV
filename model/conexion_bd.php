<?php

$servidor="app-03fdae2e-66d6-43e9-9c9a-a5d44d83e8c2-do-user-14624445-0.b.db.ondigitalocean.com:25060"; //aqui va el ip o nombre del dominio
$bd="amfica-db?sslmode=require"; //nombre de bases de datos
$usuario="amfica-db"; //va el usuario para bd
$pass="AVNS_jYehb3WG8oe0PJ_S_3f"; //clave para bd

try{
    $con=new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$pass);
}catch(Exception $ex){
    echo "error de conexion ".$ex->getMessage();
}

?>