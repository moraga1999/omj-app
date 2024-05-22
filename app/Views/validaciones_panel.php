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
            <table id="tablaValidaciones" class="table table-bordered">
            </table>
	    </div>
	</div>
    

<script>
    $(document).ready(function() {
        $('#tablaValidaciones').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.5/i18n/es-CL.json',
            },
            data: <?= $validaciones ?>,
            columns: [
                { title: 'Id', data: 'id' },
                { title: 'Beneficiario', data: 'nombre_joven' },
                { title: 'Colaborador', data: 'email_socio' },
                { title: 'Beneficio', data: 'beneficio' },
                { title: 'Monto', data: 'monto' },
                { title: 'Fecha de creación', data: 'fecha_creacion' },
            ]
        });
    });
</script>

	<?= $footer ?>
</body>
</html>