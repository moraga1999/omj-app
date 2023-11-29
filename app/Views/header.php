<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMJ Curicó</title>

    <!-- Bootstrap y custom css -->
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/custom-css/custom-bootstrap.css') ?>" rel="stylesheet">
    <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <nav class="navbar navbar-expand-lg color-pri">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
          <img src="<?= base_url('/images/omjlogoblk.png'); ?>" alt="logo" style="width: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php if(isset($_SESSION['usuario'])): 
              $usuario = $_SESSION['usuario'];
              if($usuario['tipo'] == 1):?>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('/panel');?>">Tarjeta joven</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('/horarios');?>">Horarios</a>
                </li>
              <?php elseif($usuario['tipo'] == 2): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('/mis_horarios');?>">Mis horarios</a>
                </li>
              <?php endif; ?>
                <li class="nav-item">
                    <a href="<?=base_url('/logout') ?>" class="btn btn-outline-primary">Cerrar sesión</a>
                </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/nosotros');?>">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/servicios');?>">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/nueva-tarjeta');?>">Inscripción</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contacto">Contacto</a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('/login') ?>" class="btn btn-outline-primary">Iniciar sesión</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
</head>
</html>