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
            <table id="tablaJovenes" class="table table-bordered">
            </table>
	    </div>
	</div>
    <!-- Modal para subir PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pdfModalLabel">Subir carta de compromiso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open_multipart('/compromiso') ?>
                <div class="modal-body">
		            <?= csrf_field() ?>
                    <input type="hidden" name="id" id="modalId" value="">
                    <input type="hidden" name="filtro_estado" value="<?= $estado ?>">
                    <label for="archivo">Archivo</label>
                    <input type="file" class="form-control-file" name="archivo" accept=".jpg, .jpeg, .png, image/jpeg, image/png" id="archivo" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Confirmar</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- Modal imagen-->
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
    $(document).ready(function() {
        $('#tablaJovenes').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.5/i18n/es-CL.json',
            },
            data: <?= json_encode($registros) ?>,
            columns: [
                { title: 'Nombre', data: 'nombre' },
                { title: 'RUT', data: 'rut' },
                { title: 'Correo', data: 'correo' },
                { title: 'Compromiso', render: function(data, type, row) {
                    if (row.compromiso) {
                        return '<a href="#" id="imagen" data-target="#imagenModal" data-src="'+ row.compromiso +'">' + "compromiso" + row.compromiso + '</a>';
                    } else {
                        return '<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal" data-id="' + row.id + '">Subir PDF</button>';
                    }
                }},
                { title: 'Acciones', render: function(data, type, row) {
                    return '<a href="<?= base_url('/tarjeta/') ?>' + row.id + '" class="btn btn-outline-primary">Detalles</a>';
                }}
            ]
        });

        $('#submitBtn').on('click', function() {
            $('#pdfModal form').submit();
        });

        // Mostrar modales
        $('#pdfModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $('#modalId').val(id);
        });

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
    });
</script>

	<?= $footer ?>
</body>
</html>