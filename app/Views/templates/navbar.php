<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a class="navbar-brand" href="<?= base_url('plataforma/home') ?>">
                <img class="ml-0 mr-2 ml-2" height="55px" src="<?= base_url('public/img/logo.png') ?>" alt="Logo ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-purple-light"></i>
            </button>
            <div class="collapse navbar-collapse navbar-plataforma p-2" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 me-auto justify-content-end mb-2 mb-lg-0">

                    <form class="d-flex mx-auto form-pesquisa" action="<?= base_url('plataforma/home') ?>" method="get" role="search">
                        <input class="form-control me-2" id="pesquisa_curso" value='' name="query" type="search" placeholder="Pesquisar Produto" aria-label="Pesquisar Curso">
                        <button class="btn btn-purple text-white " id="btn-pesquisa" type="submit"><i class=" fa fa-search"></i></button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-cart-shopping"></i>
                        </a>
                        <ul class="dropdown-menu menu-carrinho">
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/meus-cursos') ?>"><i class="fa fa-book"></i> item 1</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/historico') ?>"><i class="fa fa-store"></i> item 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="ps-1 pe-1"><a class="dropdown-item p-2 rounded btn-purple text-white" href="<?= base_url('finalizar-compra') ?>" role="button"><i class="fa fa-check-to-slot"></i> Finalizar Compra</a></li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('plataforma/home') ?>">Home</a>
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






                </ul>

            </div>
        </div>
    </nav>