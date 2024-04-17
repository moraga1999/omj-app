<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body>
	<div class="row d-flex justify-content-center " style="margin:5%">
		<div class="col-md-5" style="">
			<img src="<?php echo base_url('assets/images/logoHome.png'); ?>" alt="logo" class="img-fluid">
			<h5 class="text-center" style="margin-top: 3%; color:dimgray; ">Oportunidades, protección y momentos de encuentro para los jóvenes de la comuna</h5>
		</div>
	</div>
	<!-- Icons Grid-->
    <section class="bg-light text-center" id="servicios">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mx-auto mb-5 mb-lg-3" style="max-width: 30rem;">
                        <div class="d-flex"><i class="bi-door-open m-auto text-primary" style="height: 7rem; font-size: 4.5rem"></i></div>
                        <h3>Acceso a salones</h3>
                        <p class="lead mb-0">Si perteneces a un grupo, puedes acudir a la oficina para solicitar el uso de alguno de nuestros salones, para así reservar un horario para sus actividades.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mx-auto mb-5 mb-lg-3" style="max-width: 30rem;">
                        <div class="d-flex"><i class="bi-palette m-auto text-primary" style="height: 7rem; font-size: 4.5rem"></i></div>
                        <h3>Inscripción a talleres</h3>
                        <p class="lead mb-0">Dentro de la oficina suelen impartirse varios talleres de índole deportivo y cultural, en los cuales se podrá participar a lo largo de todo el año, en conjunto con otros jóvenes.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mx-auto mb-5 mb-lg-3" style="max-width: 30rem;">
                        <div class="d-flex"><i class="bi-people m-auto text-primary" style="height: 7rem; font-size: 4.5rem;"></i></div>
                        <h3>Actividades masivas</h3>
                        <p class="lead mb-0">La oficina suele fomentar la participación de los jóvenes en actividades masivas, tales como voluntariado o recreativas, tanto dentro como fuera de sus espacios. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mx-auto mb-5 mb-lg-3" style="max-width: 30rem;">
                        <div class="mx-auto mb-5 mb-lg-3" style="max-width: 30rem;">
                            <div class="d-flex"><i class="bi-award m-auto text-primary" style="height: 7rem; font-size: 4.5rem"></i></div>
                            <h3>Actividades educacionales</h3>
                            <p class="lead mb-0">Desarrollamos actividades recreativas y desarrollo personal para los alumnos de las instituciones de la comuna.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pb-5">
                <div class="col">
                    <div class="mx-auto mb-5 mb-lg-3" style="max-width: 35rem;">
                        <div class="d-flex"><i class="bi-credit-card m-auto text-primary" style="height: 7rem; font-size: 4.5rem"></i></div>
                        <h3>Tarjeta joven</h3>
                        <p class="lead mb-0">Para apoyar de manera económica a los jóvenes, ofrecemos un servicio que contiene una lista de beneficios y descuentos en varias tiendas y servicios de la comuna, entre ellos salud, ropa, comida o entretenimiento.</p>
                        <a href="<?=base_url('/tarjeta-info');?>" class="btn btn-outline-primary float-end">
                            Más información
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid pt-3 pb-3" id="nosotros">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/images/omjprev.jpeg'); ?>" class="img-fluid">
                </div>
                <div class="col-lg-6" style="padding: 3rem;">
                    <h2>Quiénes somos</h2>
                    <p class="lead mb-0">Somos una organización, sin fines de lucro, que busca facilitar espacios, recursos y servicios a los jóvenes de la comuna de Curicó que favorezcan momentos de encuentro e interacción a través de valores, actitudes y comportamientos basados en la responsabilidad individual y colectiva a nivel social, cultural y comunitario.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#servicios">Servicios</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#nosotros">Quiénes somos</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="<?=base_url('/tarjeta-info');?>">Tarjeta joven</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Oficina Municipal de la juventud Curicó, 2023.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-tiktok fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>