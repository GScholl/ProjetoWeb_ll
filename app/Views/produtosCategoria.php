<section>
    <div class="container mt-5 pt-5">
        <h3 class="text-purple text-center"><?= $categoria->nome ?></h3>
        <div class="row justify-content-center">
            <?php 
            if($produtos != false && count($produtos) > 0){

           
            foreach ($produtos as $produto) {
                
                    $tipo = strpos($produto->foto_produto, "http") == false ? 1 : 0;

            ?>

                    <div class=" col-xl-2 col-lg-3 col-md-6 col-sm-12 p-1">
                        <div class="card-produto">
                            <a href="<?= base_url("produto/$produto->id") ?>">
                                <div class="div-img-produto">
                                    <img src="<?= $tipo == 0 ? base_url("public/img/produtos/" . $produto->foto_produto) : $produto->foto_produto ?>" class="img-produto" alt="">
                                </div>
                            </a>
                            <div class="title-produto d-flex flex-wrap p-2 justify-content-center">
                                <h5 class="text-white align-self-end ps-1 pe-1 titulo-produto"><?= $produto->titulo ?></h5>
                                <h5 class="text-white align-self-end ps-1 pe-1"> R$ <?= number_format($produto->valor, 2, ',', '.') ?></h5>
                                <a class="btn fs-6 w-100  align-self-end btn-success text-white" onclick="comprarProduto(<?= $produto->id ?>)" id="btn-comprar" role="button"><i class="fa fa-cart-shopping"> </i> Comprar</a>

                                <a href="#" onclick="adicionaProduto(<?= $produto->id ?>)" class="btn fs-6 w-100  align-self-end btn-purple text-white" role="button"><i class="fa fa-plus"> </i> Carrinho</a>

                            </div>
                        </div>
                    </div>
            <?php }
             }else{?>

             <h4 class="text-purple text-center"> <i class="fa fa-circle-xmark"></i> Não há nenhum produto por aqui...</h4>
             
            <?php }
           ?>
        </div>
    </div>
</section>