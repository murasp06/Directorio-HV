<?php

$servidor="bg5td4muhosvsmmrv8yt-mysql.services.clever-cloud.com"; //aqui va el ip o nombre del dominio
$bd="bg5td4muhosvsmmrv8yt"; //nombre de bases de datos
$usuario="uhfduzfmyczxvdbh"; //va el usuario para bd
$pass="4W8o2OwZ7muiYw8MuLci"; //clave para bd

try{
    $con=new PDO("mysql:host=$servidor;dbname=$bd;port=3306",$usuario,$pass);
}catch(Exception $ex){
    echo "error de conexion ".$ex->getMessage();
}

?>