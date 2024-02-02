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
		                	<td>
		                		<button class="btn btn-outline-primary">Evaluar</button>
		                	</td>
	                	</tr>
	               	<?php endforeach; ?>
	            </tbody>
	        </table>
	    </div>
	</div>
</body>
</html>