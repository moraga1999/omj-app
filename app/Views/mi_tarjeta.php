<!DOCTYPE html>
<html lang="en">
<head>
    <?= $header; ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="col-10 col-sm-6 col-md-4 flex-grow-1 mt-4" style="margin: auto;">
        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Mi tarjeta</h5>
                <p class="card-text">Utilizala para validar tu beneficio en los emprendimientos adheridos!</p>
                <img src="<?= $qrcode ?>" class="img-fluid" alt="Código QR">
                <a href="#" class="btn btn-primary">Ver listado de beneficios</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
    <?= $footer;?>
</body>
</html>