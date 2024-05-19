<!DOCTYPE html>
<html lang="en">
<head>
    <?= $header; ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="col-10 col-sm-6 col-md-4 flex-grow-1 mt-4 mx-auto">
        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Validación de tarjetas</h5>
                <div class="ratio ratio-4x3">
                    <video id="videoElement" class="w-100" autoplay></video>
                </div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
    <!-- Modal validación-->
	<div class="modal fade" id="validarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-lg">
	        <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">Validar beneficio</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()"></button>
                </div>
	            <div class="modal-body p-0">
                    <div class="alert alert-success m-2" role="alert">
                        Validación de socio exitosa! Por favor ingresa el beneficio asignado:
                    </div>
                    <form method="post" action="<?=base_url('/crear-validacion') ?>" autocomplete="off">
                        <div class="modal-body">
                            <?= csrf_field() ?>
                            <input type="hidden" name="idJoven" id="idJoven" value="">
                            <input type="hidden" name="idSocio" id="idSocio" value="<?= $socio["id"] ?>">
                            <input type="hidden" name="emailSocio" id="emailSocio" value="<?= $socio["nombre"] ?>">
                            <div class="form-group mb-2">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombreJoven" id="nombreJoven" value="" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="beneficio">Beneficio utilizado</label>
                                <select type="text" class="form-select" id="beneficio" name="beneficio" required>
                                    <option value="" selected disabled> Elegir una opción</option>
                                    <?php foreach($beneficios as $beneficio): ?>
                                        <option value="<?= $beneficio->descripcion ?>"><?= $beneficio->descripcion ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="monto">Monto</label>
                                <input type="text" class="form-control" name="monto" value="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">Confirmar</button>
                        </div>
                    </form>
	            </div>
	        </div>
	    </div>
	</div>
    <?= $footer;?>
    <script>
        function cerrarModal() {
	        $('#validarModal').modal('hide');
	    }
    </script>
    <script type="module">
        import QrScanner from '<?= base_url('js/qr-scanner.min.js') ?>';
        let qrScanner;
        let modalVisible = false;

        $('#validarModal').on('hidden.bs.modal', function () {
            modalVisible = false;
        });
        
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            var video = document.getElementById('videoElement');
            video.srcObject = stream;
            qrScanner = new QrScanner(
                video,
                result => {
                    if (!modalVisible) {
                        modalVisible = true;
                        var params = result['data'].split(",");
                        $.ajax({
                            type: "GET",
                            url: "<?= base_url('/validar/') ?>" + params[0] + "/" + params[1],
                            dataType: "json",
                            success: function(data) {
                                let idJoven = data['id'];
                                let nombre = data['nombre'];
                                $('#idJoven').val(idJoven);
                                $('#nombreJoven').val(nombre);
                                $('#validarModal').modal('show');
                            },
                            error: function(xhr, status, error) {
                                console.error("Error en la solicitud:", status, error);
                            },
                        });
                    }
                },
                {returnDetailedScanResult: true},
            );
            qrScanner.start();
        })
        .catch(function(err) {
            console.log('Error al acceder a la webcam: ' + err);
        });        
    </script>
</body>
</html>
