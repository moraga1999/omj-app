<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
    <section>
        <div class="container-fluid pt-3 pb-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/images/tarjeta-ejemplo.jpg'); ?>" class="img-fluid">
                </div>
                <div class="col-lg-5 pt-2" style="padding: 3rem;">
                    <h2>Tarjeta joven</h2>
                    <p class="lead">
                    	Para acceder a los beneficios de la tarjeta joven, primero debes inscribirte al beneficio. Una vez completado, se te enviará un correo para que acudas a nuestras oficinas, para firmar la entrega del beneficio. Finalmente, te enviaremos tu tarjeta a través del correo. Para hacer válido tu beneficio, solo debes presentar el código ante alguna de las empresas afiliadas al beneficio.
                    </p>
                    <div class="list-group">
					  <a href="<?= base_url('/nueva-tarjeta');?>" class="list-group-item list-group-item-action list-group-item-dark">Quiero inscribirme al beneficio</a>
					  <a href="#listaSocios" class="list-group-item list-group-item-action list-group-item-dark">Listado de socios</a>
					  <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Recuperación de tarjeta joven</a>
					  <a href="<?= base_url('/nuevo-socio');?>" class="list-group-item list-group-item-action list-group-item-dark">Quiero ser socio</a>
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
</body>
</html>