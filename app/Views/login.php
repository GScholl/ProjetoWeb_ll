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
    <form class="form text-center">
        
        <p class="title"><img src="<?= base_url('public/img/logo.png') ?>" class="w-50 " alt=""> </p>
        <p class="message">Faça Login para finalizar sua compra </p>
        

        <label>
            <input class="input" type="email" placeholder="" required="">
            <span>E-mail</span>
        </label>

        <label>
            <input class="input" type="password" placeholder="" required="">
            <span>Senha</span>
        </label>
      
        <button class="submit">Login</button>
        <p class="signin">Ainda não possui Conta ? <a href="<?= base_url('registrar-se') ?>">Registre-se</a> </p>
    </form>
</body>

</html>