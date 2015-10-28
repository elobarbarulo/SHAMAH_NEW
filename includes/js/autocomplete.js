var link_padrao = $('#link_padrao').val();

/******************************************************************************************************
*******************************************************************************************************
                        Faz os completes do formulario de cadastros
*******************************************************************************************************
******************************************************************************************************/
 $('.pn_gaveta').keyup(function(){
   var link = link_padrao+'ajax/pn_gaveta';
   autocomplet('pn_gaveta',link);
    // $('.'+classe).blur(function(){
    //      $('.ul_'+classe+'_list').hide();         
    // });
 }); 



/******************************************************************************************************
*******************************************************************************************************
                                          BUSCA EMPRESA
*******************************************************************************************************
******************************************************************************************************/
 $('.busca_cliente').keyup(function(){
   var link = link_padrao+'ajax/busca_cliente';
    //alert(link);
    busca('busca_cliente',link);
 });

/******************************************************************************************************
*******************************************************************************************************
                                          BUSCA ESTADO
*******************************************************************************************************
******************************************************************************************************/
 $('.estado').keyup(function(){
   var link = link_padrao+'ajax/estado';
   autocomplet('estado',link);
 });
/******************************************************************************************************
*******************************************************************************************************
                                          BUSCA Cidade
*******************************************************************************************************
******************************************************************************************************/
 $('.cidade').keyup(function(){
   var link = link_padrao+'ajax/cidade';
   autocomplet('cidade',link);
 });
/******************************************************************************************************
*******************************************************************************************************





/******************************************************************************************************
*******************************************************************************************************
          NAO MUDAR AS FUNÇOES ABAIXO APENAS ADD AS CLASSES QUE TERÃO AUTO COMPLETE ACIMA
*******************************************************************************************************
******************************************************************************************************/
function autocomplet(classe,caminho) {
    var min_length = 1; // min caracters to display the autocomplete
    var keyword = $('.'+classe).val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: caminho,
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('.ul_'+classe+'_list').show();
                $('.ul_'+classe+'_list').html(data);
            }
        });
    } else {
        $('.ul_'+classe+'_list').hide();
    }

    // $('.'+classe).blur(function(){
    //      $('.ul_'+classe+'_list').hide();         
    // });
}



 function set_item(classe,item) {
    $('.'+classe).val(item); 
    $('.ul_'+classe+'_list').hide();
}

function link_tr(link) {
  alert(link);
  $(window.document.location).attr('href',link);   
}



function busca(classe,caminho){  

    var min_length = 2; // min caracters to display the autocomplete
    var keyword = $('.'+classe).val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: caminho,
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('.sumir').hide();
                $('.registros').html(data);
            },
            beforeSend: function(){
                $('#loading').css({display:"block"});
            },
            complete: function(msg){
                $('#loading').css({display:"none"});
            },
            error: function(){
                alert("Falha na requisição");
            }
        });
    } else {
        $('.sumir').show();
    }
}





//url – Indica a página que você está solicitando.
//dataType – É o tipo de dado que esta página vai retornar, podendo ser um json, html e etc.
//success – Veja que ela recebe como parâmetro uma função anônima que vai ser executada quando a solicitação for finalizada. Se você está fazendo passo a passo, ao executar sua página, você precisa receber a mensagem de alerta.
//append, ele serve para incluir algo dentro do elemento 
//beforeSend – Ele recebe uma função, que vai ser executada assim que a requisição for enviada, veja que estou mostrando a div de carregamento.
//complete – Também recebe uma função, ela vai ser executada logo que a requisição finalizar, veja que estou novamente alterando o css para fazer a div desaparecer.


// function ajax(tipo_envio,dados_post,arquivo_enviar,tipo_retorno,id_que_retonara){
//     $.ajax({             
//         type: tipo_envio,
//         data: { dados_post },
         
//         url: arquivo_enviar,
//         dataType: tipo_retorno,
//         success: function(result){
//             $('#'+id_que_retonara).html(result);
//             //$("#aqui").append(result);
//         },
//         beforeSend: function(){
//             $('#loading').css({display:"block"});
//         },
//         complete: function(msg){
//             $('#loading').css({display:"none"});
//         },
//         error: function(){
//             alert("Falha na requisição");
//         }
//     });
// }
