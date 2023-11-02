<section>
    <div class="container mt-5 pt-5">
        <div class="row">

            <?php
            
            if ($produtos != false && count($produtos) > 0) {
                foreach ($categorias as $categoria) {
                    if ($categoria->produtosCategoria > 0) {
            ?>
                        <div class="col-12">
                            <h4 class="text-center"><?= $categoria->nome ?></h4>
                        </div>
                    <?php } ?>
                    <?php foreach ($produtos as $produto) {
                        if ($produto->id_categoria == $categoria->id) {  ?>

                            <div class=" col-xl-2 col-lg-3 col-md-6 col-sm-12 p-1">
                                <div class="card-produto">
                                    <div class="div-img-produto">
                                        <img src="https://microimport.com.br/storage/placa-mae-original-apple-watch-series-7-gps-alum-45mm.png" class="img-produto" alt="">
                                    </div>
                                    <div class="title-produto d-flex flex-wrap p-2 justify-content-center">
                                        <h5 class="text-white align-self-end ps-1 pe-1"><?= $produto->titulo ?></h5>
                                        <h5 class="text-white align-self-end ps-1 pe-1"> R$ <?= number_format($produto->valor,2,',','.') ?></h5>
                                        <a href="#" onclick="adicionaProduto(<?= $produto->id ?>)"  class="btn fs-6 w-100  align-self-end btn-purple text-white" role="button"><i class="fa fa-plus"> </i> Carrinho</a>
                                        <a class="btn fs-6 w-100  align-self-end btn-success text-white" id="btn-comprar" role="button"><i class="fa fa-cart-shopping"> </i> Comprar</a>

                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                <?php }
            } else { ?>

                <h4 class="mt-5"> Nenhum Produto encontrado!</h4>


            <?php  } ?>

        </div>
    </div>
</section>