<?php include '/workspaces/PWA_AMFICA_V.0.1/Templades/header1.php'?>

    <main  class="form-signin w-100 m-auto text-center  lg-p-5">
        <form class="col-md-6 p-lg-5 mx-auto  p-5">
            <a href="/">
                <img class="mb-4 rounded-4" src="/image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" alt="" width="92" height="87">
            </a>
            <h1 class=" fs-1 h3 mb-3 fw-normal">Ingresar</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floating" placeholder="name.veras">
                <label for="floating">Usuario</label>
            </div>
            <div class="form-floating my-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>

            <!-- <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div> -->
            <button class="btn btn-danger w-100 py-2 mb-3 btn-outline-warning fs-4" type="submit">loguear</button>
            <a  href="">recuperar contraseña</a> <span>o</span> <a href="records.php">Crear cuenta</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; AMFICA 2022-2023</p>
        </form>

<?php include '/workspaces/PWA_AMFICA_V.0.1/Templades/footer1.php' ?>