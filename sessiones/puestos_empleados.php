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
include("../model/config.general.php")
?>

<div class="container">
    <div class="row">
        <!--listadode usuarios  -->
        <div class="text-center">
        <h1 class="position-relative">Lista de roles</h1>
            <div class="text-center overflow-scroll">


                <table class="table table-bordered sm-table-sm">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">#</th>
                            <th scope="col">rol</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        <?php
                        //foreach ($queryresultado as $row):
                        ?>
                    <tbody>
                        <?php foreach ($consult_rol as $roles){ 
                        ?>
                        <tr>
                            <th scope="row"><?php echo $roles->id_rol;?></th>
                            <td><?php echo $roles->rol;?></td>
                            <td><a class="btn btn-warning" role="button" href="actualizar.php?id= ">Asignar a</a></td>
                            <td><a class="btn btn-danger" role="button" href="../controlador/con.delete.php?id= ">Quitar a</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <?php
                    // para cerrar la conexion a la bd se asigna null a la variable que construye el pdo
         $sql=null;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>





<?php
    }
include("../Templades/footer.php")
?>
