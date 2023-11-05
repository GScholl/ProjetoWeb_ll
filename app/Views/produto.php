<section>
    <div class="container mt-5 pt-5">
        <div class="row">
            <?php  $tipo = strpos($produto['foto_produto'], "http") == false ? 1 : 0; ?>
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <h4 class="text-purple">
                    <?= $produto['titulo'] ?>
                </h4>
                <img src="<?= $tipo == 0 ? base_url("public/img/produtos/" . $produto['foto_produto']) : $produto['foto_produto'] ?>" class="img-produto-id" alt="">
                <p class="text-justify">
                    <?= $produto['descricao'] ?>
                </p>
                <button class=" btn btn-purple text-white p-2 text-center" onclick="adicionaProduto(<?= $produto['id']?>) "><i class="fa fa-cart-shopping"></i> Adicionar ao Carrinho</button>
            </div>
        </div>
    </div>
</section>