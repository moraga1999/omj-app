<!DOCTYPE html>
<html>
<head>
	<?=$header?>
</head>
<body class="d-flex flex-column min-vh-100">
	<div class="col-sm-10 col-md-10 flex-grow-1" style="margin: auto;">
		<div class="card mt-2">
		  	<div class="card-header">
			    <div class="row">
			        <div class="col-md-6 col-12 text-md-left">
			            <h3><?= ucfirst($registro['nombre']) ?></h3>
			        </div>
			        <div class="col-md-4 col-12 text-md-right">
			        	<h5>N°<?= $registro['id'] ?> 
				        		<a href="<?= base_url('/editar-tarjeta/'.$registro['id']); ?>" class="btn btn-secondary ml-2">
				        			Editar
				        		</a>
			        	</h5>
							</div>
			    </div>
			</div>

			<div class="container">
				<fieldset class="m-2"> <legend>Datos del beneficiario</legend>
					<div class="row">
		        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
		            RUT
		        </div>
		        <div class="col-md-2 col-8 border">
		            <?= $registro['rut'] ?>
		        </div>
		        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
		            Dirección
		        </div>
		        <div class="col-md-6 col-8 border">
		            <?= $registro['direccion']?>
		        </div>
			    </div>
			    <div class="row">
		        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
	            Nacimiento
		        </div>
		        <div class="col-md-2 col-8 border">
	          	<?= $registro['nacimiento']?>
		        </div>
		        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
		          Teléfono
		        </div>
		        <div class="col-md-6 col-8 border">
	            <?= $registro['telefono']?>
		        </div>
			    </div>
			    <div class="row">
		        <div class="col-md-2 col-4 border" style="background-color: whitesmoke;">
	            Correo
		        </div>
		        <div class="col-md-2 col-8 border">
	          	<?= $registro['correo']?>
		        </div>
			    </div>
				</fieldset> 
			</div>
		</div>
	</div>
	<script>
		function cerrarModal() {
			$('#imagenModal').modal('hide');
		}
	</script>
	<?= $footer ?>
</body>
</html>