<?php
session_start();
$varsesion = $_SESSION['usuario'];
$id_usuario=$_GET['id'];

if ($_SESSION['id'] == 1) {

    include("/workspaces/PWA_AMFICA_V.0.1/model/conexion_bd.php");
    $sql=$con->prepare("UPDATE usuarios SET activo=0 WHERE id_usuario='$id_usuario'");
    $sql->execute();

    if ($sql) {
        $_SESSION['id']==1;
        $_SESSION['rol']==1;
        //echo '<div class="alert alert-success" role="alert"> Eliminado con exito!</div>';
        
        header("location: ../admin/");
    } else {
        //echo "error al eliminar";
        echo'<div class="alert alert-danger" role="alert"> El usuario no fue eliminado!</div>';
    }
}else{
    // session_destroy();
    // exit;
    include("/workspaces/PWA_AMFICA_V.0.1/model/conexion_bd.php");

    $sql =$con->prepare("UPDATE usuarios SET activo=0 WHERE id_usuario='$id_usuario'");
    $sql->execute();

    if ($sql) {
       
        header("location: ../index.php");
    } else {
        //echo "error al eliminar";
        echo'<div class="alert alert-danger" role="alert"> El usuario no fue eliminado!</div>';
    }
}
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
$sql=null;
?>
