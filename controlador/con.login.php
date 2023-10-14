<?php

require('../model/conexion_bd.php');

if(!empty($_POST["btnlogin"])){
if (empty($_POST['user']) and empty($_POST['clave'])) {
    echo '<div style="background-color: rgba(240, 44, 44, 0.277);color: red;padding:1px;">
    <div>
      Debes completar los campos
    </div>
  </div>';
} else {
    $user = $_POST['user'];
    $clave = $_POST['clave'];
    $sql = $con->prepare("SELECT * FROM usuarios WHERE user='$user' AND clave ='$clave' ");
    $sql->execute();
    $registros = $sql->fetchAll(PDO::FETCH_OBJ);
    foreach ($registros as $dato);
    //$rol=$dato->id_rol;
    if($dato->id_rol == 5 AND $dato->activo == 1 ) {    
      session_start();
      $_SESSION['id']=$dato->id_usuario;
      $_SESSION['usuario']=$dato->nombre." ".$dato->apellidos;
      header("location: ../views/usuarios.php");
      
    }elseif($dato->id_rol == 1 AND $dato->activo == 11){
      session_start();
      $_SESSION['id']=$dato->id_usuario;
      $_SESSION['rol']=$dato->id_rol;
      header("location: ../admin/");
    }elseif($dato->id_rol == 5 and $dato->activo == 0){
      // debemos comprovar que exista la cuenta para poder mirar el activo
        echo'<div style="background-color: rgba(240, 44, 44, 0.277);color: red;padding:1px;">Eliminaste tu cuenta</div>';
    }else{
      echo'<div style="background-color: rgba(240, 44, 44, 0.277);color: red;padding:1px;">ACCESO DENEGADO</div>';

    }
}
}
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql=null;
?>

