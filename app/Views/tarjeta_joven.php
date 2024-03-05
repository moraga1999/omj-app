<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
    <div class="container pt-2">
		<form method="get" id="tarjeta" action="<?= base_url('/panel')?>">
			<div class="row mb-2 justify-content-md-end">
			    <div class="col-md-2 col-5 text-md-end mb-2">
			        <label for="filtro" class="col-form-label">Filtrar por estado</label>
			    </div>
			    <div class="col-md-2 col-7 mb-2">
			        <select class="form-select" id="filtro" name="filtro_estado" required>
			            <option value="1" <?= ($estado == 1)? 'selected' : '' ?>>Nuevo</option>
			            <option value="2" <?= ($estado == 2)? 'selected' : '' ?>>Solicitante</option>
			            <option value="3" <?= ($estado == 3)? 'selected' : '' ?>>Inscrito</option>
			        </select>
			    </div>
			    <div class="col-md-3 text-md-end mb-2">
			        <label for="busqueda" class="col-form-label">Buscar por nombre o RUT</label>
			    </div>
			    <div class="col-md-3 col-8 mb-2">
			        <input class="form-control" type="text" id="busqueda" name="busqueda" form="none">
			    </div>
			</div>
	    </form>
    	
	    <div class="table-responsive">
	        <table class="table table-bordered">
	            <thead class="">
	                <tr>
	                    <th scope="col">Nombre</th>
	                    <th scope="col">RUT</th>
	                    <th scope="col">Correo</th>
	                    <th scope="col">Compromiso</th>
	                    <th scope="col">Tarjeta</th>
	                    <th scope="col">Acciones</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php foreach($registros as $registro): ?>
	                	<tr>
		                	<td><?= $registro->nombre; ?></td>
		                	<td><?= $registro->rut; ?></td>
		                	<td><?= $registro->correo; ?></td>

		                	<td>
		                		<?php if(isset($registro->compromiso)): ?> 
		                			<a href="#" id="imagen" data-target="#imagenModal" data-src="<?= $registro->compromiso?>">
                                        <?="compromiso".$registro->compromiso;?>
                                    </a>
		                		<?php else: ?>
		                			<?= form_open_multipart('/compromiso') ?>
		                				<?= csrf_field() ?>
			                			<a class="btn btn-sm btn-info" href="" data-bs-toggle="modal" data-bs-target="#pdfModal<?= $registro->id ?>">Subir PDF</a>
			                			<!-- Modal -->
										<div class="modal fade" id="pdfModal<?= $registro->id ?>" tabindex="-1" aria-labelledby="pdfModalLabel<?= $registro->id ?>" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h1 class="modal-title fs-5" id="pdfModalLabel<?= $registro->id ?>">Subir carta de compromiso <?= $registro->id?></h1>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
									        	<input type="hidden" name="id" value="<?= $registro->id ?>">
				                                <input type="hidden" name="filtro_estado" value="<?=$estado?>">
				                                <label for="archivo">Archivo</label>
                                				<input type="file" class="form-control-file" name="archivo" accept=".jpg, .jpeg, .png, image/jpeg, image/png" id="archivo" required>
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
		                				<a href="#" id="imagen" data-target="#imagenModal" data-src="<?= $registro->tarjeta?>">
	                                        <?="QR".$registro->tarjeta;?>
	                                    </a>
		                			<?php else: ?>
		                				<?= form_open_multipart('/tarjeta-qr') ?>
			                				<?= csrf_field() ?>
				                			<a class="btn btn-sm btn-info" href="" data-bs-toggle="modal" data-bs-target="#qrModal<?= $registro->id ?>">Subir QR</a>
				                			<!-- Modal -->
											<div class="modal fade" id="qrModal<?= $registro->id ?>" tabindex="-1" aria-labelledby="qrModalLabel<?= $registro->id ?>" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h1 class="modal-title fs-5" id="qrModalLabel<?= $registro->id ?>">Subir código QR <?= $registro->id?></h1>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
										        	<input type="hidden" name="id" value="<?= $registro->id ?>">
					                                <input type="hidden" name="filtro_estado" value="<?=$estado?>">
					                                <label for="archivo">Archivo</label>
	                                				<input type="file" class="form-control-file" name="archivo" accept=".jpg, .jpeg, .png, image/jpeg, image/png" id="archivo" required>
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
		                		<?php else: ?>
		                			-
		                		<?php endif; ?>
		                	</td>
		                	<td><a href="<?= base_url('/tarjeta/'.$registro->id)?>" class="btn btn-outline-primary">Detalles</a></td>
	                	</tr>
	               	<?php endforeach; ?>
	            </tbody>
	        </table>
	    </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-lg">
	        <div class="modal-content border-0">
	            <div class="modal-body p-0 d-flex justify-content-center align-items-center position-relative">
	                <button type="button" class="btn-close" data-dismiss="modal" style="position: absolute; top: 10px; right: 10px; z-index: 1" onclick="cerrarModal()">
	                    
	                </button>
	                <img id="modalImage" src="" alt="Image" style="max-width: 100%; max-height: 100vh;">
	            </div>
	        </div>
	    </div>
	</div>

	<script>
		function cerrarModal() {
	        $('#imagenModal').modal('hide');
	    }
	    $(document).on("click", '#imagen', function() {
	        var id = $(this).data("src");
	        // Hacer una solicitud GET utilizando la ruta completa
	        $.ajax({
			    type: "GET",
			    url: "<?= base_url('/imagen/') ?>" + id,
			    dataType: "json",  // Indica que esperas una respuesta JSON
			    success: function(data) {
			        let formato = data['formato'];
			        let archivo = data['archivo'];

			        if (formato && archivo) {
			            let str = "data:" + formato + ";base64," + archivo;
			            $("#modalImage").attr("src", str);
			        } else {
			            console.error("Los datos del formato o archivo son undefined.");
			        }
			    },
			    error: function(xhr, status, error) {
			        console.error("Error en la solicitud:", status, error);
			    },
			    complete: function() {
			        // Activar modal
			        $('#imagenModal').modal('show');
			    }
			});
	    });

	    $( "#filtro" ).on( "change", function() {
            $('#tarjeta').submit();
        } );

        $("#busqueda").on("keyup", function() {
            // Obtener el valor actual del campo de búsqueda
            var busqueda = $(this).val().toLowerCase();
            // Ocultar todas las filas de la tabla
		    $("tbody tr").hide();

		    // Mostrar solo las filas que coinciden con la búsqueda
		    $("tbody tr").filter(function() {
		        // Puedes ajustar esta lógica según tus necesidades
		        // Aquí estoy comparando el contenido de todas las celdas con la búsqueda
		        return $(this).text().toLowerCase().includes(busqueda);
		    }).show();
        });
	</script>
</body>
</html>