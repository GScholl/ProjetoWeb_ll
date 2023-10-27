<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    foreach ($css_files as $css) { ?>
        <link rel="stylesheet" href="<?= base_url($css) ?>">
    <?php } ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('plataforma/home') ?>">
                <img class="ml-0 mr-2 ml-2" height="55px" src="<?= base_url('img/logo horizontal-2.png') ?>" alt="Logo ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-plataforma p-2" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 me-auto justify-content-end mb-2 mb-lg-0">

                    <form class="d-flex form-pesquisa" action="<?= base_url('plataforma/home') ?>" method="get" role="search">
                        <input class="form-control me-2" id="pesquisa_curso" value='' name="query" type="search" placeholder="Pesquisar Curso" aria-label="Pesquisar Curso">
                        <button class="btn btn-success " id="btn-pesquisa" type="submit"><i class=" fa fa-search"></i></button>
                    </form>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('plataforma/home') ?>">Home</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        
                    </li>




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/meus-cursos') ?>"><i class="fa fa-book"></i> Meus Cursos</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('plataforma/historico') ?>"><i class="fa fa-store"></i> Meus Pedidos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('alunos/logout') ?>"><i class="fa fa-chevron-right"></i> Sair</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>