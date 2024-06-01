<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body class="d-flex flex-column min-vh-100">
	<div class="container flex-grow-1">
        <div class="row justify-content-center ">
            <div class="col-sm-10 col-md-8">
                <div class="card" style="margin: 2% auto">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="logo" style="width: 50px;">
                            </div>
                            <div class="col">
                                <h5 class="mb-0">Inscripción Socio Tarjeta Joven</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('/nuevo-socio') ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="lead">Datos del postulante</div>
                            <div class="row">
                                <div class="form-group mb-2 col-md-6 col-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juanito Castañas" required>
                                </div>
                                <div class="form-group mb-2 col-md-6 col-12">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Ej: Completos Juanito" required>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Villa Altos los Pinos #447" required>
                            </div>
                            <div class="row">
                                <div class="form-group mb-2 col-md-6 col-12">
                                    <label for="telefono">Número de teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 912345678" required>
                                </div>
                                <div class="form-group mb-2 col-md-6 col-12">
                                    <label for="correo">Correo electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej: jnitocst@correo.com" required>
                                </div>
                            </div>
                            <div class="text-end">
                              <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                              <button type="submit" class="btn btn-primary">Inscribirse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $footer ?>
</body>
</html>