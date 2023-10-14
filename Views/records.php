<?php include '../Templades/header1.php' ?>

<main class=" m-auto  ">
    
    
    <div class="text-center mb-5">
        <a class="text-decoration-none" href="/">
            <img style=" margin-top: 8%;height: 150px;border-radius: 50px;margin-right: 5px;text-align: center;" src="/image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" alt="logo AMFICA">
        </a>
        <a href="login.php" class="text-warning ms-5 end">Iniciar session</a>
    </div>
    <div class="container">

        <!-- formulario de registro -->
        <form class="col-md-7 m-auto row g-3 needs-validation" action="../controlador/con.insert.php" method="post" novalidate>

            <div class=" col-md form-floating mb-3">
                <input type="text" class="form-control" id="nombres" placeholder="Jhon" required>
                <label for="nombres">Nombres</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="text" class="form-control" id="apellidos" placeholder="Asprilla" required>
                <label for="apellidos">Apellidos</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="number" class="form-control" id="edad" placeholder="21" required>
                <label for="edad">Edad</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class=" form-floating mb-3">
                <input type="number" class="form-control" id="documento" placeholder="1234567890" required>
                <label for="documento">Documento</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="text" class="form-control" id="usuario" placeholder="jhon_asprilla" required>
                <label for="usuario">Usuario</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
                <label for="contrasena">Contraseña</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="password" class="form-control" id="ccontrasena" placeholder="Contraseña" required>
                <label for="ccontrasena">Confirmar Contraseña</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>
            <div class=" form-floating mb-3">
                <input type="text" class="form-control" id="direccion" placeholder="Cra.12 #45-67 calle principal" required>
                <label for="direccion">Direccion</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>
            <div class="col-md form-floating mb-3">
                <input type="text" class="form-control" id="ciudad" placeholder="Medellin" required>
                <label for="ciudad">Ciudad</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="number" class="form-control" id="celular" placeholder="3123456789" required>
                <label for="celular">Numero Celular</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

            <div class="col-md form-floating mb-3">
                <input type="email" class="form-control" id="correo" placeholder="tu_correo@gmail.com" required>
                <label for="correo">Correo</label>
                <div class="valid-feedback">
                    Se ve bien!
                </div>
            </div>

           

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Acepto terminos y condiciones!
                    </label>
                    <div class="invalid-feedback">
                        Debes aceptar antes de enviar.
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-danger w-100 py-2 mb-3 btn-outline-warning fs-4" type="submit">Registrarme!</button>
            </div>
        </form>
    </div>
    <?php include '../Templades/footer.php' ?>