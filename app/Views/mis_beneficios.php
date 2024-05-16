<!DOCTYPE html>
<html lang="en">
<head>
    <?= $header; ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="col-10 flex-grow-1 mt-4" style="margin: auto;">
        <div class="row">
            <div class="border bg-light p-3 col-md-4 col-12">
                <legend><?=$socio['empresa'];?></legend>
                <div class="row">
                    <div class="col-md-4 col-5"><strong>Nombre:</strong></div>
                    <div class="col-md-8 col-7"><?=$socio['nombre'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-5"><strong>Correo:</strong></div>
                    <div class="col-md-8 col-7"><?=$socio['correo'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-5"><strong>Dirección:</strong></div>
                    <div class="col-md-8 col-7"><?=$socio['direccion'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-5"><strong>Teléfono:</strong></div>
                    <div class="col-md-8 col-7"><?=$socio['telefono'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-5"><strong>Carta convenio:</strong></div>
                    <div class="col-md-8 col-7"><a href="#">Por aplicar</a></div>
                </div>
            </div>
            <div class="border bg-light p-3 col-md-8 col-12">
                <div class="row justify-content-between pb-3">
                    <div class="col">
                        <legend>Lista de Beneficios</legend>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBeneficioModal">
                            <i class="bi bi-plus"></i> Nuevo
                        </button>
                        <form method="post" action="<?=base_url('/crear-beneficio') ?>" autocomplete="off">
                            <div class="modal fade" id="createBeneficioModal" tabindex="-1" aria-labelledby="createBeneficioLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="createBeneficioLabel">Crear beneficio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <?= csrf_field() ?>
                                        <label for="categoria">Categoría</label>
                                        <select type="text" class="form-select" id="categoria" name="categoria" required>
                                            <option value="" selected disabled> Elegir una opción</option>
                                            <option value="Salud">Salud</option>
                                            <option value="Ropa">Ropa</option>
                                            <option value="Entrenimiento">Entrenimiento</option>
                                            <option value="Educación">Educación</option>
                                            <option value="Alimentación">Alimentación</option>
                                        </select>
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control mt-2" name="descripcion" required>
                                        <input type="hidden" name="id" value="<?= $socio['id'] ?>" required>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Crear Beneficio</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <ol class="list-group list-group-numbered">
                    <?php foreach ($beneficios as $beneficio): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><?= $beneficio->descripcion?></div>
                        <?= $beneficio->categoria?>
                        </div>
                        <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteBeneficioModal<?=$beneficio->id ?>">
                            <i class="bi bi-trash bi-2x"></i>
                        </button>
                    </li>
                    <form method="post" action="<?=base_url('/eliminar-beneficio') ?>" autocomplete="off">
                        <div class="modal fade" id="deleteBeneficioModal<?=$beneficio->id ?>" tabindex="-1" aria-labelledby="deleteBeneficioLabel<?=$beneficio->id ?>" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="deleteBeneficioLabel<?$beneficio->id ?>">Eliminar beneficio <?=$beneficio->id?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <?= csrf_field() ?>
                                    <label for="confirmacion">Si desea eliminar el beneficio, escriba "ELIMINAR" en el campo de texto (ADVERTENCIA: Si elimina todos los beneficios, el colaborador cambiará su estado a "INACTIVO").</label>
                                    <input type="text" class="form-control mt-2" name="confirmacion" required>
                                    <input type="hidden" name="id" value="<?=$beneficio->id?>">
                                    <input type="hidden" name="nBeneficios" value="<?=count($beneficios);?>">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Eliminar Beneficio</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
    
    <?= $footer;?>
</body>
</html>

