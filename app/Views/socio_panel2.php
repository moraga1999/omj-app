<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container pt-2 flex-grow-1">
        <div class="table-responsive">
            <table id="tablaColaboradores" class="table table-bordered">
            </table>
	    </div>
        <!-- Modal evaluar socio-->
        <?php foreach ($registros as $registro): ?>
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
        <?php endforeach; ?>
	</div>
	<script>
        $(document).ready(function() {
            $('#tablaColaboradores').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.5/i18n/es-CL.json',
                },
                data: <?= json_encode($registros) ?>,
                columns: [
                    { title: 'Nombre', data: 'nombre' },
                    { title: 'Empresa', data: 'empresa' },
                    { title: 'Dirección', data: 'direccion' },
                    { title: 'Acciones', render: function(data, type, row) {
                        if (row.activo == 0) {
                            return '<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#evaluarModal'+ row.id +'" onclick="cargarDatosEvaluar('+ row.id +')">Evaluar</button>'
                        } else {
                            return '<a class="btn btn-primary" href="<?= base_url('/detalles-socio/') ?>' + row.id + '">Detalles</a>'
                        }
                    }},
                ]
            });
        });
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
	<?= $footer ?>
</body>
</html>