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

    include ("/workspaces/PWA_AMFICA_V.0.1/Templades/header.php");
?>

<div class="container">
    <div class="row">
        <!--listadode usuarios  -->
        <div class="text-center">
            <h1 class="position-relative">Lista Trabajadores</h1>
            <div class="text-center overflow-scroll">


                <table class="table table-bordered sm-table-sm">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Edad</th>
                            <th scope="col">N°Documento</th>
                            <th scope="col">Fecha_ingreso</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">N°Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">activo</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        <?php
                        //foreach ($queryresultado as $row):
                            include("../../model/config.php")
                        ?>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>nombre</td>
                            <td>clave</td>
                            <td>nombre</td>
                            <td>apellidos</td>
                            <td>edad</td>
                            <td>documento</td>
                            <td>fecha de ingrso</td>
                            <td>ciudad</td>
                            <td>num celular</td>
                            <td>correo</td>
                            <td>dierecion</td>
                            <td>activo</td>
                            <td><a class="btn btn-warning" role="button" href="actualizar.php?id= ">Editar</a></td>
                            <td><a class="btn btn-danger" role="button" href="../controlador/con.delete.php?id= ">Eliminar</a></td>
                        </tr>
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
include("/workspaces/PWA_AMFICA_V.0.1/Templades/footer.php")
?>