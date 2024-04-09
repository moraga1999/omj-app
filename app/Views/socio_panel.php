<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
    <div class="container pt-2">
    	<div class="row lead">Solicitantes</div>
	    <div class="table-responsive">
	        <table class="table table-bordered">
	            <thead class="">
	                <tr>
	                    <th scope="col">ID</th>
	                    <th scope="col">Nombre</th>
	                    <th scope="col">Empresa</th>
	                    <th scope="col">Dirección</th>
	                    <th scope="col">Acciones</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php foreach($registros as $registro): ?>
	                	<tr>
	                		<td><?= $registro->id; ?></td>
		                	<td><?= $registro->nombre; ?></td>
		                	<td><?= $registro->empresa; ?></td>
		                	<td><?= $registro->direccion; ?></td>
		                	<?php if($registro->activo == 0):?>
		                	<td>
		                		<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#evaluarModal<?=$registro->id;?>" onclick="cargarDatosEvaluar(<?=$registro->id;?>)">Evaluar</button>
		                		<!-- Modal -->
								<div class="modal fade" id="evaluarModal<?=$registro->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								  	<form method="post" action="<?=base_url('/aprobar-socio')?>" autocomplete="off">
								  		<?= csrf_field() ?>
									    <div class="modal-content">
									      <div class="modal-header">
									        <h1 class="modal-title fs-5" id="exampleModalLabel">Evaluar nuevo socio <?=$registro->id ;?></h1>
									        <input type="hidden" name="id" value="<?= $registro->id?>">
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									      	<div class="form-group mb-2 col-12">
			                                    <label for="categoria">Categoría</label>
			                                    <input type="text" class="form-control" id="evaluarCategoria" name="categoria" value="" readonly>
			                                </div>
			                                <div class="form-group mb-2 col-12">
			                                    <label for="beneficio">Propuesta de beneficio</label>
			                                    <input type="text" class="form-control" id="evaluarDescripcion" name="beneficio" value="" readonly>
			                                </div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
									        <button type="submit" class="btn btn-success">Aprobar</button>
									      </div>
									    </div>
								    </form>
								  </div>
								</div>
		                	</td>
		                	<?php elseif($registro->activo==1):?>
		                	<td>
		                		<a class="btn btn-primary" href="<?=base_url('/detalles-socio/'.$registro->id) ?>">Detalles</a>
		                	</td>
		                <?php endif; ?>
	                	</tr>
	               	<?php endforeach; ?>
	            </tbody>
	        </table>
	    </div>
	</div>
	<script>
	    function cargarDatosEvaluar(idSocio) {
	        $.when(
	            $.get("<?= base_url('obtener-beneficio/') ?>" + idSocio, function (data) {
	                // Obtener datos
	                $("#evaluarCategoria").val(data['categoria']);
	                $("#evaluarDescripcion").val(data['descripcion']);
	            })
	        ).done(function () {
	            // Activar modal después de que la solicitud AJAX se complete
	            $('#evaluarModal' + idSocio).modal('show');
	        });
	    }
	</script>
</body>
</html>