<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php if (session()->has('mensaje')): ?>
        <div class="alert alert-success m-4" role="alert">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>
    <section class="flex-grow-1">
        <div class="container-fluid pt-3 pb-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/images/tarjeta-ejemplo.jpg'); ?>" class="img-fluid">
                </div>
                <div class="col-lg-5 pt-2">
                    <div class="p-4 rounded">
                        <h2 class="mb-4">Tarjeta joven</h2>
                        <p class="lead mb-4">
                            Para acceder a los beneficios de la tarjeta joven, primero debes inscribirte al beneficio. Una vez completado, se te enviará un correo para que acudas a nuestras oficinas, para firmar la entrega del beneficio. Finalmente, te enviaremos tu tarjeta a través del correo. Para hacer válido tu beneficio, solo debes presentar el código ante alguna de las empresas afiliadas al beneficio.
                        </p>
                        <div class="btn-group-vertical d-flex align-items-center justify-content-center">
                            <a href="<?= base_url('/nueva-tarjeta');?>" class="btn btn-success">Quiero inscribirme al beneficio</a>
                            <a href="#listaSocios" class="btn btn-info">Listado de socios</a>
                            <a href="#" class="btn btn-danger">Recuperación de tarjeta joven</a>
                            <a href="<?= base_url('/nuevo-socio');?>" class="btn btn-warning">Quiero ser socio</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container" id="listaSocios">
            <div class="row">
                <div class="mb-2"><h2>Nuestros socios</h2> </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($listaSocios as $socio): ?>
                        <li class="list-group-item">
                            <div class="fw-bold lead"><?= $socio->empresa;?> - <?=$socio->direccion;?></div>
                            <p class="lead"><?= $socio->descripcion;?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?= $footer ?>
</body>
</html>