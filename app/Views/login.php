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
                <form method="post" action="<?=base_url('/login') ?>">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="text" id="email" class="form-control" name="email" required 
                        <?= set_value('email')?>>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" class="form-control" name="password"
                        <?= set_value('password')?>>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>