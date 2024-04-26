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
                        <fieldset class="m-2"> <legend>Beneficio asociado</legend>
							<div class="row">
						        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
						          Categoría
						        </div>
						        <div class="col-md-3 col-8 border">
					            <?= $beneficio['categoria']?>
						        </div>
						        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
					            Descripción
						        </div>
						        <div class="col-md-5 col-8 border">
					          	<?= $beneficio['descripcion']?>
						        </div>
						    </div>
						</fieldset>
                        
                        <div class="text-end">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalBeneficio<?=$socio['id'] ?>">Eliminar Beneficio</button>
                            <form method="post" action="<?=base_url('/eliminar-beneficio') ?>" autocomplete="off">
                                <div class="modal fade" id="modalBeneficio<?=$socio['id'] ?>" tabindex="-1" aria-labelledby="modalBeneficioLabel<?=$socio['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalBeneficioLabel<?$socio['id'] ?>">Eliminar beneficio socio <?=$socio['id']?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-start">
                                            <?= csrf_field() ?>
                                            <label for="confirmacion">Si desea eliminar el beneficio, escriba "ELIMINAR" en el campo de texto (ADVERTENCIA: Si elimina el beneficio asociado, el socio deberá ser evaluado con una nueva propuesta de beneficio).</label>
                                            <input type="text" class="form-control mt-2" name="confirmacion" required>
                                            <input type="hidden" name="id" value="<?=$socio['id'] ?>">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar Beneficio</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $footer ?>
</body>
</html>