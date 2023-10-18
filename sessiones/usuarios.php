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
     if($id_admin == 1 and $id_rol == 1){?>

<?php include("../Templades/header.php");?>

<div class="container">
    <div class="row">
        <!--listadode usuarios  -->
        <div class="text-center">
            <h1 class="position-relative">Lista Usuarios</h1>

            <div class="container ">
                <!-- boton agrgar -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#user">
                    Registrar new user
                </button>
                <div class="modal fade e" id="user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Usuarios </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.853) -15%, goldenrod 50%);@media screen and (max-width:1074px){ .container{ px-4 py-5 my-5}}" class="container px-4 py-5 my-0.1">
                                    <img style="border-radius: 15px;" class="mb-4" src="../img/logo.jpg" alt="" width="72" height="57">
                                    <h3 class="h3 mb-3 fw-normal">Crear cuenta AMFICA!</h3>
                                    <form class="row g-3 needs-validation" action="../controlador/con.insert.php" method="post" novalidate>
                                        <div class="col-md-4">
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Usuario" name="user" required>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="validationCustom03" placeholder="Clave" name="clave" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Nombre" name="nombre" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="Apellidos" name="apellidos" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Edad" name="edad" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="validationCustom03" placeholder="N°Documento" name="documento" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Ciudad" name="ciudad" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="validationCustom03" placeholder="N°Celular" name="num_celular" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo" name="correo" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Direccion" name="direccion" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label style="color: white; font-weight: 600;" class="form-check-label" for="invalidCheck">Terminos y condiciones</label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-warning" type="submit">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center overflow-scroll">

                <table class="table table-bordered sm-table-sm ">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">#Id</th>
                            <th scope="col">User</th>
                            <th scope="col">clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Edad</th>
                            <th scope="col">N°Documento</th>
                            <th scope="col">Foto</th>
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
                        ?>
                    <tbody>
                        <?php
                            include("../model/funciones.php");
                            foreach ($consul_usuarios as $usuario) {
                            $img = $usuario->foto_user;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $usuario->id_usuario; ?></th>
                                <td><?php echo $usuario->user; ?></td>
                                <td><?php echo $usuario->clave; ?></td>
                                <td><?php echo $usuario->nombre; ?></td>
                                <td><?php echo $usuario->apellidos; ?></td>
                                <td><?php echo $usuario->edad; ?></td>
                                <td><?php echo $usuario->documento; ?></td>
                                <td><?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($img) . '"alt="SinFoto" width="90" height="90">'; ?></td>
                                <td><?php echo $usuario->ciudad; ?></td>
                                <td><?php echo $usuario->num_celular; ?></td>
                                <td><?php echo $usuario->correo; ?></td>
                                <td><?php echo $usuario->direccion; ?></td>
                                <td><?php echo $usuario->activo; ?></td>
                                <td><a class="btn btn-warning" role="button" href="actualizar.php?id=<?php echo $usuario->id_usuario;?>">Editar</a></td>
                                <td><a class="btn btn-danger" role="button" href="../controlador/con.delete.php?id=<?php echo $usuario->id_usuario; ?>">Eliminar</a></td>
                            </tr>



                        <?php
                        }
                        ?>

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
