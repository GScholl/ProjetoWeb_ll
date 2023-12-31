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
    <form class="form" action="<?= base_url("registrar") ?>" method="post">
        <p class="title"><img src="<?= base_url('public/img/logo.png') ?>" class="w-50" alt=""> </p>
        <p class="message">Faça o registro para finalizar sua Compra </p>
        <div class="row">
            <div class="col-12">
                <?= getResponse() ?>
            </div>
        </div>
        <div class="flex">
            <label>
                <input class="input" type="text" name="nome" placeholder="" minlength="3" required >
                <span>Nome</span>
            </label>

            <label>
                <input class="input" type="text" name="sobrenome" minlength="3"  placeholder="" required>
                <span>Sobrenome</span>
            </label>
        </div>

        <label>
            <input class="input" type="email" name="email" placeholder="" minlength="6"  required>
            <span>E-mail</span>
        </label>

        <label>
            <input class="input" type="password" name="senha" placeholder="" minlength="8" required>
            <span>Senha</span>
        </label>
        <label>
            <input class="input" type="password" name="confirma_senha" placeholder="" minlength="8" required>
            <span>Confirme a senha</span>
        </label>
        <button class="submit">Registre-se</button>
        <p class="signin">Já Possui Conta ? <a href="<?= base_url('login') ?>">Faça login</a> </p>
    </form>
</body>

</html>