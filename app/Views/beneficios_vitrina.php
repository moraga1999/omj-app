<!DOCTYPE html>
<html>
<head>
	<?= $header ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <section class="flex-grow-1">
        <div class="container" id="beneficios">
            <h3 class="mb-3 mt-3">Listado de Beneficios</h3>
            <div class="row mb-3 mt-3">
                <div class="col-8">
                    <input class="search form-control" placeholder="Buscar" />
                </div>
                <div class="col-4 text-end">
                    <button class="sort btn btn-primary" data-sort="categoria">Ordenar</button>
                </div>
            </div>
            <div class="list list-group">
                <!-- Los elementos se generarán dinámicamente -->
            </div>
        </div>
    </section>
    <!-- Modal info elementos-->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Información del beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modalCategoria"></div>
                    <div id="modalDescripcion"></div>
                    <div id="modalEmpresa"></div>
                    <div id="modalDireccion"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.list-group-item-action').on('click', function() {
                var categoria = $(this).find('.categoria').text();
                var descripcion = $(this).find('.descripcion').text();
                var empresa = $(this).find('.empresa').text();
                var direccion = $(this).find('.direccion').text();
                // Establecer el contenido del modal
                $('#modalCategoria').text("Categoría: " + categoria);
                $('#modalDescripcion').text("Descripción: " + descripcion);
                $('#modalEmpresa').text("Empresa: " + empresa);
                $('#modalDireccion').text("Dirección: " + direccion);
                
                // Abrir el modal
                $('#infoModal').modal('show');
                    });
                });

        var options = {
            valueNames: [ 'empresa', 'categoria', 'descripcion', 'direccion' ],
            item: '<li class="list-group-item list-group-item-action d-flex align-items-center">'+
                    '<div>'+
                        '<div class="fw-bold categoria"></div>'+
                        '<p class="descripcion"></p>'+
                    '</div>'+
                    '<span class="bi bi-info-circle ms-auto" style="font-size: 2rem; padding: 0.5rem;"></span>'+
                    '<input type="hidden" class="empresa"><input type="hidden" class="direccion">'+
                '</li>'
        };

        var values = <?= $listaSocios ?>

        var userList = new List('beneficios', options, values);

    </script>
    <?= $footer ?>
</body>
</html>