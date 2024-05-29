<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMJ Curicó</title>

    <!-- Bootstrap y custom css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link href="<?= base_url('assets/custom-css/custom-bootstrap.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
          <img src="<?= base_url('assets/images/omjlogoblk.png'); ?>" alt="logo" style="width: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <?php if(isset($_SESSION['usuario'])): 
                $usuario = $_SESSION['usuario'];
                if($usuario['tipo'] == 1):?>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/panel');?>">Tarjeta joven</a>
                  </li>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/socios');?>">Colaboradores</a>
                  </li>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/reportes');?>">Reportes</a>
                  </li>
                <?php elseif($usuario['tipo'] == 2): ?>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/mis-beneficios');?>">Mis Beneficios</a>
                  </li>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/validar-qr');?>">Validar Tarjeta</a>
                  </li>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/mis-ventas');?>">Mis Ventas</a>
                  </li>
                  <?php elseif($usuario['tipo'] == 3): ?>
                  <li class="nav-item ms-auto">
                    <a class="nav-link" href="<?=base_url('/mi-tarjeta');?>">Mi tarjeta</a>
                  </li>
                <?php endif; ?>
                <li class="nav-item ms-auto ps-4">
                    <a href="<?=base_url('/logout') ?>" class="btn btn-outline-light">Cerrar sesión</a>
                </li>
              <?php else: ?>
                <li class="nav-item ms-auto ps-4">
                    <a href="<?=base_url('/login') ?>" class="btn btn-outline-light">Iniciar sesión</a>
                </li>
              <?php endif; ?>
            </ul>
        </div>
      </div>
    </nav>
</head>
</html>