(function($) {

	"use strict";

	$('[data-toggle="tooltip"]').tooltip()

})(jQuery);

  $(document).on('click', '.removeProduct', function (e) {

    e.preventDefault();
    var id = $(this).data('id');
    var token = $(this).data('token');
  
        swal({
            title: "Confirma a exclusão desse produto?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            showCancelButton: true,
        },
        function() {
          $.ajax({
            url: '/product/remove',
            method: 'POST',
            data: {
              id: id,
              "_token": token
            },
          
          success: function() {   
            swal({title: "OK", text: "Registro removido!", type: "success"},
              function(){ 
                  location.reload();
              }
            );
          },
  
          error: function() {   
            swal({title: "OPS", text: "Erro ao remover registro!", type: "warning"},
              function(){ 
                  location.reload();
              }
            );
          }
  
          });
    });
  });

  $(document).on('click', '.removeProductOrder', function (e) {

    e.preventDefault();
    var order_id = $(this).data('order');
    var product_id = $(this).data('product');
    var token = $(this).data('token');
  
        swal({
            title: "Confirma a exclusão desse produto do pedido?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            showCancelButton: true,
        },
        function() {
          $.ajax({
            url: '/order/product/remove',
            method: 'POST',
            data: {
              order_id: order_id,
              product_id: product_id,
              "_token": token
            },
          
          success: function() {   
            swal({title: "OK", text: "Registro removido!", type: "success"},
              function(){ 
                  location.reload();
              }
            );
          },
  
          error: function() {   
            swal({title: "OPS", text: "Erro ao remover registro!", type: "warning"},
              function(){ 
                  location.reload();
              }
            );
          }
  
          });
    });
  });

  $('.itemName').select2({
    placeholder: 'Selecione um usuario',
    ajax: {
      url: '/select2-users-ajax',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })
        };
      },
      cache: true
    }
  });

  $("#ProductID").focusout(function(){

    // isset helper function 
    var isset = function(variable){
        return typeof(variable) !== "undefined" && variable !== null && variable !== '';
    }

    //Início do Comando AJAX
    id = $(this).val();

    //Início do Comando AJAX
    $.ajax({
        //O campo URL diz o caminho de onde virá os dados
        //É importante concatenar o valor digitado no CNPJ
        url: '/product/'+id+'/show',
        //Atualização: caso use java, use cnpj.jsp, usando o outro exemplo.
        //Aqui você deve preencher o tipo de dados que será lido,
        //no caso, estamos lendo JSON.
        dataType: 'json',
        //SUCESS é referente a função que será executada caso
        //ele consiga ler a fonte de dados com sucesso.
        //O parâmetro dentro da função se refere ao nome da variável
        //que você vai dar para ler esse objeto.
        success: function(resposta){

                if(resposta.id){
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#nameProduct").val(resposta.name);
                    $("#idProduct").val(resposta.id);
                    $("#priceProduct").val(resposta.price); 
                }else{
                    swal("Ops!", "Não encontramos nenhum produto com esse código!", "error");
                    $("#ProductID").val(null);
                    $("#nameProduct").val(null);
                    $("#idProduct").val(null);
                    $("#priceProduct").val(null); 
                }     
        }
    });
    
});
