<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="d-flex flex-column min-vh-100">
	<div class="container flex-grow-1">
        <?php if(session()->has('error')): ?>
            <div class="alert alert-danger">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center ">
            <div class="col-sm-10 col-md-8">
                <div class="card" style="margin: 2% auto">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="logo" style="width: 50px;">
                            </div>
                            <div class="col">
                                <h5 class="mb-0">Inscripción Tarjeta Joven</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="<?=base_url('/nueva-tarjeta') ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="form-group mb-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juanito Castañas" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="rut">RUT</label>
                                <input type="text" class="form-control" id="rut" name="rut" placeholder="Ej: 22303404-9" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Villa Altos los Pinos #447" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nacimiento">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="nacimiento" name="nacimiento" placeholder="Ingresa una fecha" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="telefono">Número de teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ej: 912345678" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej: jnitocst@correo.com" required>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LfsU-8pAAAAADmmZz84XUVImvSoQNV6U5NUwlij"></div>
                            <div class="text-end">
                              <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                              <button type="submit" class="btn btn-primary">Inscribirse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.datepicker.regional['es'] = {
             closeText: 'Cerrar',
             prevText: '< Ant',
             nextText: 'Sig >',
             currentText: 'Hoy',
             monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
             monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
             dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
             dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
             dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
             weekHeader: 'Sm',
             dateFormat: 'yy-mm-dd',
             firstDay: 1,
             isRTL: false,
             showMonthAfterYear: false,
             yearSuffix: ''
             };
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            $("#nacimiento").datepicker({
                "autoclose": true,
                "changeYear": true,
                "yearRange": "1990:2024"
            });
        });  
    </script>
    <?= $footer ?>
</body>
</html>