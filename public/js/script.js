 
 const base_url = "http://localhost/ProjetoWeb_ll/";
 const adicionaProduto = (id_produto) => {


    console.log(` adiciona id_Produto ${id_produto}`)

    $.ajax({
        url : `${base_url}adicionar-produto/${id_produto}`,
        method: "get",
        success: function(carrinho){
        

        },
        error: function(err){


        },
    })
 }

 const removeProduto = (id_produto) => {

    console.log(` remover id_Produto ${id_produto}`)

    
 }