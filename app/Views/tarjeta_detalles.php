<!DOCTYPE html>
<html>
<head>
	<?=$header?>
</head>
<body class="">
	<div class="col-sm-10 col-md-10" style="margin: auto;">
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
				<fieldset class="m-2"> <legend>Archivos asociados</legend>
					<?php foreach($archivos as $archivo): ?>
					<div class="thumbnail">
						<img src="data:image/<?= $archivo->formato?>;base64,<?= $archivo->archivo?>" alt="Imagen base64">
					</div>
					<?php endforeach; ?>
				</fieldset>
		    
			</div>
		</div>
	</div>
</body>
</html>