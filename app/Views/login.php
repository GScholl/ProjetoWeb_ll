<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/login.css') ?>">
</head>

<body>
    <form class="form text-center" action="<?= base_url('autenticar') ?>" method="post">

        <p class="title"><img src="<?= base_url('public/img/logo.png') ?>" class="w-50 " alt=""> </p>
        <p class="message">Faça Login para finalizar sua compra </p>
        <div class="row">
            <div class="col-12">
                <?= getResponse() ?>
            </div>
        </div>

        <label>
            <input class="input" type="email" name="email" placeholder="" minlength="6" required>
            <span>E-mail</span>
        </label>

        <label>
            <input class="input" type="password" name="senha" placeholder=""minlength="8" required>
            <span>Senha</span>
        </label>

        <button class="submit">Login</button>
        <p class="signin">Ainda não possui Conta ? <a href="<?= base_url('registrar-se') ?>">Registre-se</a> </p>
    </form>
</body>

</html>