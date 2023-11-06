<!DOCTYPE html>
<html>
<head>
    <?= $header ?>
</head>
<body>
    <div class="bg-main px-4 py-4">
        <div class="col-md-6 col-11" style="margin: 2% auto;">
            <div class="card" style="padding: 5%;">
                <h4 class="card-title">Iniciar sesión</h4>
                <form method="post" action="<?= base_url('login/auth');?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" id="username" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
	<?= $footer ?>
</body>
</html>