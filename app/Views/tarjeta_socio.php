<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
	<div class="container">
        <div class="row justify-content-center ">
            <div class="col-sm-10 col-md-8">
                <div class="card" style="margin: 2% auto">
                    <div class="card-header">
                        <h5>Inscripción Socio Tarjeta Joven - OMJ Curicó</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('/nueva-tarjeta') ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="form-group mb-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juanito Castañas" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="empresa">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Ej: Completos Juanito" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Villa Altos los Pinos #447" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="telefono">Número de teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 912345678" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej: jnitocst@correo.com" required>
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
</body>
</html>