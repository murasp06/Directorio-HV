<?php
 session_start();
 $id_admin=$_SESSION['id'];
 $id_rol=$_SESSION['rol'];
 if ($id_admin == null || $id_rol == '') {
     echo 'usted no tiene autorizacion';
     header("location: ../index.php");
     session_destroy();
     die();
 }else
     if($id_admin == 1 and $id_rol == 1){

include("../Templades/header.php");
$id_usuario = $_GET['id'];
// if ($_SESSION['admin'] == 1) { 

require('../model/funciones.php');
// para actualizaciones de datos del usuario desde con el rol del admid
$sql = $con->prepare("SELECT * FROM usuarios WHERE id_usuario=$id_usuario");
$sql->execute();
$datos_user = $sql->fetchAll(PDO::FETCH_OBJ);   
//foreach ($queryresultado as $row):
foreach ($datos_user as $datos) {
        $img = $datos->foto_user;

?>
    <a class="btn btn-primary m-3" href="usuarios.php">Volver</a>
    <div class="container mt-5">
        <h3>Actualización de datos de usuario <strong style="color: goldenrod;"><?php echo $datos->documento ?></strong> </h3>
        <form action="../controlador/con.update.php" method="POST">
            <input type="hidden" name="id_usuario" value="<?php echo $datos->id_usuario ?>">
            <input type="text" class="form-control mb-1" name="user" placeholder="User" value="<?php echo $datos->user; ?>">
            <input type="text" class="form-control mb-1" name="clave" placeholder="Clave" value="<?php echo $datos->clave ?>">
            <input type="text" class="form-control mb-1" name="nombre" placeholder="Nombre" value="<?php echo $datos->nombre?>">
            <input type="text" class="form-control mb-1" name="apellidos" placeholder="Apellidos" value="<?php echo $datos->apellidos ?>">
            <input type="text" class="form-control mb-1" name="edad" placeholder="Edad" value="<?php echo $datos->edad ?>">
            <input type="text" class="form-control mb-1" name="documento" placeholder="Numero de Documento" value="<?php echo $datos->documento ?>">
            <input type="text" class="form-control mb-1" name="ciudad" placeholder="Ciudad" value="<?php echo $datos->ciudad ?>">
            <input type="text" class="form-control mb-1" name="num_celular" placeholder="Numero de Celular" value="<?php echo $datos->num_celular ?>">
            <input type="text" class="form-control mb-1" name="correo" placeholder="Correo" value="<?php echo $datos->correo ?>">
            <input type="text" class="form-control mb-1" name="direccion" placeholder="Direccion" value="<?php echo $datos->direccion ?>">
            <input type="text" class="form-control mb-1" name="activo" placeholder="Activo" value="<?php echo $datos->activo ?>">
            <input type="submit" class="btn btn-primary btn-block" value="actualizar">
        </form>
    <?php }
// para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
    $sql=null;
    $con=null;
    ?>

   
    <?php
    }
    include("../Templades/footer.php");
    ?>
