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
                    <div class="card-header">
                        <h5>Editar Socio <?= $socio['id']?> - OMJ Curicó</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('/cambios-socio') ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $socio['id'] ?>">

                            <legend>Datos del Beneficiario</legend>
                            <div class="form-group mb-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $socio['nombre'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="empresa">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" value="<?=$socio['empresa'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?=$socio['direccion'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="telefono">Número de Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $socio['telefono'] ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="correo">Correo Electrónico</label>
                                <input type="text" class="form-control" id="correo" name="correo" value="<?= $socio['correo'] ?>" required>
                            </div>
                            <div class="text-end">
                              <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                              <button type="submit" class="btn btn-primary">Guardar cambios</button>
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