const base_url = "http://localhost/ProjetoWeb_ll/";
const adicionaProduto = (id_produto) => {
  $.ajax({
    url: `${base_url}adicionar-produto/${id_produto}`,
    method: "GET",
    success: function (carrinho) {
      carrinho = JSON.parse(carrinho);
      console.log(carrinho);
      $("#carrinho-navbar").empty();
      if (carrinho.produtos.length > 0) {
        $.each(carrinho.produtos, function (key, value) {
          let valor = value.valor.toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          });
          let linha = ` <li class="m-1">
                            <div class="row text-white">
                                <div class="col-2 text-center"><img src="${
                                  value.tipo == 0
                                    ? base_url +
                                      "public/img/produtos/" +
                                      value.foto_produto
                                    : value.foto_produto
                                }" class="img-produto-nav" alt=""></div>
                                <div class="col-6 text-center">${
                                  value.quantidade
                                }x   ${value.titulo} </div>
                                <div class="col-4 text-center">${valor}</div>
                            </div>
                         </li>`;
          $("#carrinho-navbar").append(linha);
          if (carrinho["produtos"].length - 1 < key) {
            let divider = `
            <li>
                <hr class="dropdown-divider">
            </li>`;
            $("#carrinho-navbar").append(divider);
          }
        });

        let valor_subtotal = carrinho.subtotal.toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        });
        let subtotal = `<li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="text-start text-white p-2">Subtotal: R$ ${valor_subtotal}</li>`;
        $("#carrinho-navbar").append(subtotal);
      } else {
        let semItens = `
                                <li class="text-center text-white p-2"><i class="fa fa-circle-x"></i>Você não Possui Itens no carrinho</li>

                                    <li class="text-center text-white p-2">Subtotal: R$ 0,00</li>`;
        $("#carrinho-navbar").append(semItens);
      }

      const alerta  = $("#liveToast");
      const toastBootstrap =
        bootstrap.Toast.getOrCreateInstance(alerta);

      toastBootstrap.show();

      $(".menu-carrinho").addClass("show");
    },
    error: function (err) {
      location.reload();
    },
  });
};

const comprarProduto = (id_produto) => {
  adicionaProduto(id_produto);

  location.href = `${base_url}/meu-carrinho`;
};
const removeProduto = (id_produto) => {
  $.ajax({
    url: `${base_url}remover-produto/${id_produto}`,
    method: "GET",
    success: function (carrinho) {
      carrinho = JSON.parse(carrinho);
      console.log(carrinho);
      $("#carrinho-navbar").empty();
      if (carrinho.produtos.length > 0) {
        $.each(carrinho.produtos, function (key, value) {
          let valor = value.valor.toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          });
          let linha = ` <li class="m-1">
                            <div class="row text-white">
                                <div class="col-2 text-center"><img src="${
                                  value.tipo == 0
                                    ? base_url +
                                      "public/img/produtos/" +
                                      value.foto_produto
                                    : value.foto_produto
                                }" class="img-produto-nav" alt=""></div>
                                <div class="col-6 text-center">${
                                  value.quantidade
                                }x   ${value.titulo} </div>
                                <div class="col-4 text-center">${valor}</div>
                            </div>
                         </li>`;
          $("#carrinho-navbar").append(linha);
          if (carrinho["produtos"].length - 1 < key) {
            let divider = `
            <li>
                <hr class="dropdown-divider">
            </li>`;
            $("#carrinho-navbar").append(divider);
          }
        });

        let valor_subtotal = carrinho.subtotal.toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        });
        let subtotal = `<li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="text-start text-white p-2">Subtotal: ${valor_subtotal}</li>`;
        $("#carrinho-navbar").append(subtotal);
      } else {
        let semItens = `
                                <li class="text-center text-white p-2"><i class="fa fa-circle-x"></i>Você não Possui Itens no carrinho</li>

                                    <li class="text-center text-white p-2">Subtotal: R$ 0,00</li>`;
        $("#carrinho-navbar").append(semItens);
      }
      const alerta  = $("#liveToast2");
      const toastBootstrap =
        bootstrap.Toast.getOrCreateInstance(alerta);

      toastBootstrap.show();

      $(".menu-carrinho").addClass("show");
    },
    error: function (err) {
      location.reload();
    },
  });
};
