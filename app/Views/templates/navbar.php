<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <?php

    foreach ($css_files as $css) { ?>
        <link rel="stylesheet" href="<?= base_url($css) ?>">
    <?php } ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(' ') ?>">
                <img class="ml-0 mr-2 ml-2" height="55px" src="<?= base_url('public/img/logo.png') ?>" alt="Logo ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-purple-light"></i>
            </button>
            <div class="collapse navbar-collapse navbar-plataforma p-2" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 me-auto justify-content-end mb-2 mb-lg-0">

                    <form class="d-flex mx-auto form-pesquisa" action="<?= base_url(' ') ?>" method="get" role="search">
                        <input class="form-control me-2" id="pesquisa_curso" value='<?= isset($_GET['pesquisa']) && !empty($_GET['pesquisa']) ? $_GET['pesquisa'] : "" ?>' name="pesquisa" type="search" placeholder="Pesquisar Produto" aria-label="Pesquisar Curso">
                        <button class="btn btn-purple text-white " id="btn-pesquisa" type="submit"><i class=" fa fa-search"></i></button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-cart-shopping"></i>
                        </a>
                        <ul class="dropdown-menu ps-2 menu-carrinho">
                            <div id="carrinho-navbar">
                                <?php
                                $session = getSession();
                                $carrinho = $session->get('carrinho');
                                if ($carrinho != false && count($carrinho['produtos']) > 0) {

                                    foreach ($carrinho['produtos'] as  $indice => $produto) {
                                        $tipo = strpos($produto['foto_produto'], "http") == false ? 1 : 0;

                                ?>
                                        <li class="m-1 mt-2 mb-2">
                                            <div class="row  text-white">
                                                <div class="col-2 text-center"><img src="<?= $tipo == 0 ? base_url("public/img/produtos/" . $produto['foto_produto']) : $produto['foto_produto'] ?>" class="img-produto-nav" alt=""></div>
                                                <div class="col-8 text-limit text-center"><?= $produto['quantidade'] . "x " . $produto['titulo'] ?></div>
                                                <div class="col-2 text-center remover-carrinho" onclick="removeProduto(<?= $produto['id'] ?>)"><i class="fa fa-circle-xmark"></i></div>
                                            </div>
                                        </li>
                                        <?php if (count($carrinho['produtos']) - 1 < $indice) { ?>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                        <?php } ?>


                                    <?php } ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="text-start text-white p-2">Subtotal: R$ <?= number_format($carrinho['subtotal'], 2, ',', '.') ?></li>

                                <?php } else { ?>

                                    <li class="text-center text-white p-2"><i class="fa fa-circle-x"></i>Você não Possui Itens no carrinho</li>

                                    <li class="text-center text-white p-2">Subtotal: R$ 0,00</li>
                                <?php } ?>
                            </div>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="ps-2 pe-2"><a class="dropdown-item p-2 rounded btn-purple text-white" href="<?= base_url('finalizar-compra') ?>" role="button"><i class="fa fa-check-to-slot"></i> Finalizar Compra</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/meus-cursos') ?>"><i class="fa fa-book"></i> item 1</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/historico') ?>"><i class="fa fa-store"></i> item 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>


                        </ul>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= !usuarioLogado() ? "Login <i class='fa fa-lock'></i>" : $session->get('nome_cliente') . " <img class='img-perfil' src='" . base_url("public/img/perfil.png") . "'>" ?>
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="<?= base_url('meu-carrinho') ?>"><i class="fa fa-cart-shopping"></i> Meu Carrinho</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a class="dropdown-item" href="<?= usuarioLogado() ? base_url('logout') : base_url('login') ?>"><i class="fa fa-right-from-bracket"></i> <?= usuarioLogado() ? 'Logout' : 'login' ?></a></li>



                        </ul>

                    </li>








                </ul>

            </div>
        </div>
    </nav>
    

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa fa-check text-purple"></i>
                <strong class="me-auto">&nbsp; Produto Adicionado</strong>
                <small>agora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Seu Produto foi adicionado no carrinho
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast2" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa fa-circle-xmark text-purple"></i>
                <strong class="me-auto">&nbsp; Produto removido</strong>
                <small>agora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Seu Produto foi removido do carrinho
            </div>
        </div>
    </div>