<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
    <div class="container pt-2">
		<form method="get" action="<?= base_url('/panel')?>">
			<div class="row mb-2 text-end">
				<div class="col">
	                <label for="filtro" class="col-form-label">Filtrar por estado</label>
	            </div>
	            <div class="col-3">
	                <select class="form-select" id="filtro" name="filtro_estado" required>
	                    <option value="1" <?= ($estado == 1)? 'selected' : '' ?>>Nuevo</option>
	                    <option value="2" <?= ($estado == 2)? 'selected' : '' ?>>Solicitante</option>
	                    <option value="3" <?= ($estado == 3)? 'selected' : '' ?>>Inscrito</option>
	                    <option value="4" <?= ($estado == 4)? 'selected' : '' ?>>Todos</option>
	                </select>
	            </div>
				 <div class="col">
	                <label for="busqueda" class="col-form-label">Buscar por nombre o RUT</label>
	            </div>
	            <div class="col-3">
	                <input class="form-control" type="text" id="busqueda" name="busqueda" placeholder="<?= $busqueda; ?>" value="<?= $busqueda; ?>">
	            </div>
	            <div class="col-1">
	                <button type="submit" class="btn btn-primary btn-block">Buscar</button>
	            </div>
            </div>
	    </form>
    	
	    <div class="table-responsive">
	        <table class="table table-bordered">
	            <thead class="">
	                <tr>
	                    <th scope="col">ID</th>
	                    <th scope="col">Nombre</th>
	                    <th scope="col">Estado</th>
	                    <th scope="col">RUT</th>
	                    <th scope="col">Dirección</th>
	                    <th scope="col">Nacimiento</th>
	                    <th scope="col">Teléfono</th>
	                    <th scope="col">Correo</th>
	                    <th scope="col">Compromiso</th>
	                    <th scope="col">Tarjeta</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php foreach($registros as $registro): ?>
	                	<tr>
	                		<td><?= $registro->id; ?></td>
		                	<td><?= $registro->nombre; ?></td>
		                	<td><?= $registro->estado; ?></td>
		                	<td><?= $registro->rut; ?></td>
		                	<td><?= $registro->direccion; ?></td>
		                	<td><?= $registro->nacimiento; ?></td>
		                	<td><?= $registro->telefono; ?></td>
		                	<td><?= $registro->correo; ?></td>

		                	<td>
		                		<?php if(isset($registro->compromiso)): ?> 
		                			<a href="">Ver archivo</a>
		                		<?php else: ?>
		                			<?= form_open_multipart('/guardar-pdf') ?>
		                				<?= csrf_field() ?>
			                			<a class="btn btn-sm btn-info" href="" data-bs-toggle="modal" data-bs-target="#pdfModal">Subir PDF</a>
			                			<!-- Modal -->
										<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h1 class="modal-title fs-5" id="pdfModalLabel">Subir carta de compromiso</h1>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
									        	<input type="hidden" name="id" value="<?= $registro->id ?>">
				                                <input type="hidden" name="filtro_estado" value="<?=$estado?>">
				                                <input type="hidden" name="busqueda" value="<?=$busqueda?>">
				                                <label for="archivo">Archivo</label>
                                				<input type="file" class="form-control-file" name="archivo" accept=".pdf" id="archivo" required>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
										        <button type="submit" class="btn btn-primary">Confirmar</button>
										      </div>
										    </div>
										  </div>
										</div>
									<?= form_close() ?>
		                		<?php endif; ?>
		                	</td>
		                	<td>
		                		<?php if(isset($registro->compromiso)): ?>
		                			<?php if(isset($registro->tarjeta)): ?> 
		                				<a href="">Ver tarjeta</a>
		                			<?php else: ?>
		                				<a class="btn btn-sm btn-info" href="">Subir Tarjeta</a>
		                			<?php endif; ?>
		                		<?php else: ?>
		                			-
		                		<?php endif; ?>
		                	</td>
	                	</tr>
	                	
	               	<?php endforeach; ?>
	            </tbody>
	        </table>
	    </div>
	</div>

	
</body>
</html>