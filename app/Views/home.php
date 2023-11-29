<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
	<div class="container-fluid px-4 py-4">
		<div class="row d-flex justify-content-center " style="margin:5%">
			<div class="col-md-5" style="margin-bottom: 5%;">
				<img src="<?php echo base_url('/images/logoHome.png'); ?>" alt="logo" class="img-fluid">
				<h5 class="text-center" style="margin-top: 3%; color:dimgray; ">Oportunidades, protección y momentos de encuentro para los jóvenes de la comuna</h5>
			</div>
		</div>
		<div class="row justify-content-center" style="margin:5%">
		    <div class="col-md-4">
		        <div class="row">
		            <h5>Trabajamos por y para los jóvenes</h5>
		        </div>
		        <div class="row">
		            <p>Somos una organización sin fines de lucro, que busca ayudar a los jóvenes de 14 a 29 años en su desarrollo personal, a través de oportunidades y servicios sin ningún tipo de costo.</p>
		        </div>
		        <div class="d-flex justify-content-end">
		            <a href="<?=base_url('/nosotros');?>" class="btn btn-primary"> Quiénes somos</a>
		        </div>
		    </div>
		    <div class="col-md-1"></div>
		    <div class="col-md-4">
		        <img src="<?= base_url('/images/logoHome.png'); ?>" alt="logo" class="img-fluid">
		    </div>
		</div>
		<div class="row justify-content-center" style="margin:5%">
			<div class="col-md-4">
		        <img src="<?= base_url('/images/logoHome.png'); ?>" alt="logo" class="img-fluid">
		    </div>
		    <div class="col-md-1"></div>
		    <div class="col-md-4">
		        <div class="row">
		            <h5>Oportunidades a tu alcance</h5>
		        </div>
		        <div class="row">
		            <p>En la oficina se aprecia el generar encuentros entre los jóvenes, orientados al desarrollo personal y colectivo. Del mismo modo, tenemos en nuestra disposición diferentes servicios que permitan reducir los factores de riesgo que involucren al sector juvenil.</p>
		        </div>
		        <div class="d-flex justify-content-end">
		            <a href="<?=base_url('/servicios');?>" class="btn btn-primary"> Servicios OMJ</a>
		        </div>
		    </div>
		</div>
	</div>
	
	<?= $footer ?>
</body>
</html>