<?php
session_start();
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
  // echo 'usted no tiene autorizacion';
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
  <title>AMFIblog!</title>
  <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="shortcut icon" href="../image/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" type="image/x-icon/png">
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body style="background-color: rgba(238, 238, 238,1);">
  <main>

    <button class="btn btn-primary m-1 dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
      opc.regreso
    </button>
    <ul class="dropdown-menu">
      <li><a class="btn btn-primary  m-1 btn-sm " href="Users.php">Suite</a></li>
      <li><a class="btn btn-primary  m-1 btn-sm " href="blog.php">Mural</a></li>
    </ul>

    <!-- <a class="btn btn-primary  m-1 btn-sm " href="usuarios.php">Regresar</a> -->
    <div style="background-color: #ffff;" class="container mt-1">
      <?php
      require('../model/funciones.php');
      $sql = $con->prepare("SELECT * FROM noticias ORDER BY `noticias`.`id_noticia` DESC");
      $sql->execute();
      $consulinfonoticias = $sql->fetchAll(PDO::FETCH_OBJ);
      ?>

      <p class="text-start border-bottom"><?php fecha_actual() ?><!--Ultima publicación:--><span class="text-danger"><?php hora_actual(); ?></span></p>
      <h1 class="display-3  fw-bold border-bottom border-danger border-3">Mural <img style="border-radius: 50px 0px 45px 50px;" src="../img/WhatsApp Image 2023-10-01 at 5.45.47 PM.jpeg" width="65" height="65" alt="L.amfica"> de Noticias</h1>

      <?php
      foreach ($consulinfonoticias as $infonoticias) {
        $imgnoti = $infonoticias->foto_noticia;
        $fecha = $infonoticias->fecha
      ?>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 ">
          <div class="col p-4 d-flex flex-column position-static">
            <strong style="color:goldenrod" class="d-inline-block mb-2 text-emphasis">Amigos del mundo</strong>
            <h3 class="mb-0"><?php echo $infonoticias->titulo ?></h3>
            <div class="mb-1 text-body-secondary"><?php fecha1($fecha); ?></div>
            <!-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p> -->
            <div style="max-width: 600px;" class="card-text mb-auto d-inline-block text-truncate border-box"><?php echo $infonoticias->descripcion_noticia ?></div>
            <a href="noticia-destacada.php?id=<?php echo $infonoticias->id_noticia ?>" class="icon-link gap-1 icon-link-hover link">
              Continuar lectura
              <svg class="bi">
                <use xlink:href="#chevron-right" />
              </svg>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <?php echo '<img  src="data:image/jpg; base64,' . base64_encode($imgnoti) . '"alt="foto noticia" width="200" height="250">'; ?>
          </div>
        </div>
      <?php } ?>

      <!-- previsualizacion a los tres o cuatro ultimos consejos publicados -->

      <div style="max-width: 50%;">
        <h4 class="fst-italic text-danger">Concejos Recientes</h4>
        <ul class="list-unstyled">
          <?php
          $sql = $con->prepare("SELECT * FROM consejos ORDER BY consejos.id_consejos DESC LIMIT 6 ");
          $sql->execute();
          $consulinfoconsejos = $sql->fetchAll(PDO::FETCH_OBJ);
          ?>

          <?php
          foreach ($consulinfoconsejos as $infoconsejos) {
            //header("Content-type: image/jpg");
            $imgconsejos = $infoconsejos->img_consejo;
            $fecha = $infoconsejos->fecha;

          ?>

            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="consejos.php?id=<?php echo $infoconsejos->id_consejos ?>">

                <!-- <rect width="100%" height="100%" fill="#777" /> -->
                <?php echo '<img style="border: 1px solid gold;border-radius: 15px; box-sizing: content-box;" src="data:image/jpg; base64,' . base64_encode($imgconsejos) . '"alt="foto noticia" width="100%" height="98">'; ?>

                <div class="col-lg-8">
                  <h6 class="mb-0"><?php echo $infoconsejos->titulo ?></h6>
                  <small class="text-body-secondary"><?php /*echo $infoconsejos->fecha;*/ fecha($fecha); ?> <!--(January 15, 2023)--></small>
                </div>
              </a>
            </li>

          <?php } ?>

        </ul>
      </div>
    </div>
    <?php include '../Templades/footer.php' ?>