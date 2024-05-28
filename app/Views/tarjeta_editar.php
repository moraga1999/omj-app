<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
</head>
<body class="d-flex flex-column min-vh-100">
	<div class="container flex-grow-1">
        <div class="row justify-content-center ">
            <div class="col-sm-10 col-md-8">
                <div class="card" style="margin: 2% auto">
                    <div class="card-header">
                        <h5>Editar Tarjeta Joven <?= $registro['id']?> - OMJ Curicó</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('/cambios-tarjeta') ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $registro['id'] ?>">

                            <legend>Datos del Beneficiario</legend>
                            <div class="form-group mb-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $registro['nombre'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="rut">RUT</label>
                                <input type="text" class="form-control" id="rut" name="rut" value="<?=$registro['rut'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?=$registro['direccion'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nacimiento">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="nacimiento" name="nacimiento" value="<?= $registro['nacimiento'] ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="telefono">Número de teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $registro['telefono'] ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?= $registro['correo'] ?>" required>
                            </div>
                            <div class="text-end">
                              <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                              <button type="submit" class="btn btn-primary">Guardar cambios</button>
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