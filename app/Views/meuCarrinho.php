<section>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-8 p-1">
                <h3 class="text-purple text-center">Seus Produtos</h3>
                <?php
                $session = getSession();
                $carrinho = $session->get('carrinho');
                if ($carrinho != false && count($carrinho['produtos']) > 0) {

                    foreach ($carrinho['produtos'] as  $indice => $produto) {
                        $tipo = strpos($produto['foto_produto'], "http") == false ? 1 : 0;
                ?>
                        <div class="item-carrinho bg-white p-2">
                            <div class="row">
                                <div class="col-2">

                                    <img src="<?= $tipo == 0 ? base_url("public/img/produtos/" . $produto['foto_produto']) : $produto['foto_produto'] ?>" class="img-produto-nav" alt="">
                                </div>
                                <div class="col-6 text-center d-flex flex-column justify-content-center text-purple">
                                    <?= $produto['quantidade'] . "x " . $produto['titulo'] ?>
                                </div>
                                <div class="col-4 text-center d-flex flex-column justify-content-center text-purple">
                                    <b> R$ <?= number_format($produto['valor'], 2, ',', '.') ?></b>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <h4 class="text-center text-purple"><i class="fa fa-circle-x"></i> Você não Possui nenhum Item no carrinho ainda!</h4>
                <?php } ?>
            </div>
            <div class="col-lg-4 p-1 mt-3">
                <div class="bg-purple  div-carrinho p-3 text-white">
                    <div class="title-carrinho text-center  p-2">
                        <h5>Resumo da Compra</h5>
                    </div>
                    <div class="pt-4 ">
                        <?php if ($carrinho != false && count($carrinho['produtos']) > 0) { ?>

                            <b class="text-start text-white p-2">Total da compra:          R$ <?= number_format($carrinho['subtotal'], 2, ',', '.') ?></b>

                        <?php } else { ?>

                            <b class="text-center text-white p-2"><i class="fa fa-circle-x"></i>Você não Possui Itens no carrinho</b>

                            <b class="text-center text-white p-2">Subtotal: R$ 0,00</b>
                        <?php } ?>

                    </div>
                </div>
                <a role="button" href="<?= base_url('finalizar-compra') ?>"class="btn w-100 mt-2 p-2 text-white btn-purple"> <i class="fa fa-check-to-slot"></i> Finalizar Compra</a>
            </div>
        </div>
    </div>
</section>