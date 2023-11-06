<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMJ Curicó</title>
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/custom-css/custom-bootstrap.css') ?>" rel="stylesheet">
    <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>"></script>
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
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('/nosotros');?>">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('/servicios');?>">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contacto">Contacto</a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('/login') ?>" class="btn btn-outline-primary">Iniciar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <style>
        .bg-main {
            background: rgb(255,255,255);
            background: radial-gradient(circle, rgba(255,255,255,1) 50%, rgba(215,214,215,1) 100%);
        }
    </style>
</head>
</html>