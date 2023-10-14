<?php
 session_start();
 $var_id = $_SESSION['id'];
 $varsesion = $_SESSION['usuario'];
 if ($varsesion == null || $varsesion == '') {
     echo 'usted no tiene autorizacion';
     header("location: ../index.php");
     die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar información de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    require('../model/conexion_bd.php');
    $sql = $con->prepare("SELECT * FROM usuarios WHERE id_usuario='$var_id'");
    $sql->execute();
    $consul_usuarios = $sql->fetchAll(PDO::FETCH_OBJ);
    foreach ($consul_usuarios as $infousuario){
        $img = $infousuario->foto_user;

    ?>
        <a class="btn btn-primary m-3" href="usuarios.php">Volver</a>
        <div style="text-align: center;" class="">
            <img style=" margin-top: 1%;height: 150px;border-radius: 80px;margin-right: 5px;text-align: center;" src="../img/config amfica.png" alt="logo configuracion AMFICA">
        </div>
        <div class="container mt-5">

            <h3 class="mb-2">Actualizacion de datos de usuario <strong style="color: goldenrod;"><?php echo $infousuario->documento ?></strong> </h3>
            <form action="../controlador/con.update.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_usuario" value="<?php echo $infousuario->id_usuario ?>">
                <input type="text" class="form-control mb-1" name="user" placeholder="User" value="<?php echo $infousuario->user ?>" disabled readonly>
                <input type="password" class="form-control mb-1" name="clave" placeholder="Clave" value="<?php echo $infousuario->clave ?>" disabled readonly>
                <input type="text" class="form-control mb-1" name="nombre" placeholder="Nombre" value="<?php echo $infousuario->nombre ?>">
                <input type="text" class="form-control mb-1" name="apellidos" placeholder="Apellidos" value="<?php echo $infousuario->apellidos ?>">
                <input type="text" class="form-control mb-1" name="edad" placeholder="Edad" value="<?php echo $infousuario->edad ?>">
                <input type="text" class="form-control mb-1" name="documento" placeholder="Numero de Documento" value="<?php echo $infousuario-> documento ?>" disabled readonly>
                <input type="text" class="form-control mb-1" name="ciudad" placeholder="Ciudad" value="<?php echo $infousuario->ciudad ?>">
                <input type="text" class="form-control mb-1" name="num_celular" placeholder="Numero de Celular" value="<?php echo $infousuario->num_celular ?>">
                <input type="text" class="form-control mb-1" name="correo" placeholder="Correo" value="<?php echo $infousuario->correo ?>">
                <input type="text" class="form-control mb-1" name="direccion" placeholder="Direccion" value="<?php echo $infousuario-> direccion ?>">
                <div class="d-lg-flex mb-2 d-block">
                    <div>
                        <label for="foto_mascota" class="form-label"><strong>subir o actualizar</strong> foto del usuario</label><br>
                        <input type="file" class="col-auto" id="foto_user" name="foto_user"><br>
                    </div>
                    <div class="text-center">
                        <img style=" width: 190px; height: 160px;border: 1px solid gold;" src="data:image/jpg; base64,<?php echo base64_encode($img) ?>" alt="foto usuario" class="overflow-hidden">
                        <span>foto actual</span>
                    </div>

                </div>
                <input type="submit" class="btn btn-primary btn-block" value="actualizar">
            </form>
        <?php } 
        // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
        $sql=null;
        ?>
        </div>
        <hr>
        <div class="container mt-3 mb-3">
            <h3>Configuracion de cuenta</h3>
            <p><strong>NOTA:</strong> Eliminar tu cuenta <b>no conlleva consecuencias</b>.<br>En caso de que quieras abrir tu cuenta otra vez debes comunicarte con notrotros a travez de la pagina de contacto </p>
            <a class="btn btn-danger " href="../controlador/con.delete.php?id=<?php echo $_GET['id'] ?>">Eliminar cuenta</a>
        </div>
        

        <?php include '../Templades/footer.php' ?>