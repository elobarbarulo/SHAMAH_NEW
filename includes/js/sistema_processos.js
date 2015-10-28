/************************************************************************
 * CNH 
 *************************************************************************/
if ($("#aprovado_id").val() == 0) {
    $(".nao_aprovado_div").show();
    $(".aprovado_div").hide();
} else {
    $(".nao_aprovado_div").hide();
    $(".aprovado_div").show();
}
/************************************************************************
 * CONDUTOR PADRAO
 *************************************************************************/
if ($("#condutor_select").val() == 0) {
    $(".condutor").hide();
    $(".nao_condutor").show();
} else {
    $(".condutor").show();
    $(".nao_condutor").hide();
}
/************************************************************************
 * ICMS PADRAO
 *************************************************************************/

  if($("#tipo_compra_id").val() == '1'){
       $(".veiculo_pagamento").show()
       $(".cedendo_veiculo").hide()
       $(".ajuda_financeira").hide()
    }
    if($("#tipo_compra_id").val() == '2'){
       $(".veiculo_pagamento").hide()
       $(".cedendo_veiculo").show()
       $(".ajuda_financeira").hide()
    }  
    if($("#tipo_compra_id").val() == '3'){
       $(".veiculo_pagamento").hide()
       $(".cedendo_veiculo").hide()
       $(".ajuda_financeira").show()
    }       
/************************************************************************
 * QUANDO TEM A AÇÂO DO SELECT EM QUASE TODOS OS PROCESSOS
 *************************************************************************/
$("#condutor_select").change(function () {
    if ($(this).val() == 0) {
        $(".condutor").hide();
        $(".nao_condutor").show();
    } else {
        $(".condutor").show();
        $(".nao_condutor").hide();
    }
});
/************************************************************************
 * QUANDO TEM A AÇÂO DO SELECT NO ICMS
 *************************************************************************/
$("#tipo_compra_id").change(function () {
    
    if($(this).val() == '1'){
       $(".veiculo_pagamento").show()
       $(".cedendo_veiculo").hide()
       $(".ajuda_financeira").hide()
    }
    if($(this).val() == '2'){
       $(".veiculo_pagamento").hide()
       $(".cedendo_veiculo").show()
       $(".ajuda_financeira").hide()
    }  
    if($(this).val() == '3'){
       $(".veiculo_pagamento").hide()
       $(".cedendo_veiculo").hide()
       $(".ajuda_financeira").show()
    }       
});
/************************************************************************
 * QUANDO TEM A AÇÂO DO SELECT NO CNH
 *************************************************************************/
$("#aprovado_id").change(function () {
   if($(this).val() == '0'){
       $(".nao_aprovado_div").show();
       $(".aprovado_div").hide();
    } else{
       $(".nao_aprovado_div").hide();
       $(".aprovado_div").show();
    }
});

/************************************************************************
 * VALIDAR
 *************************************************************************/
$(".validar_processo").click(function () {
    if ($("#status").val() != "3"){
        if ($(".alerta_data").val() == "") {
            alert('a Data do alerta não pode ser vazia');
            $(".alerta_data").focus();
            return false;
        }
        if ($(".item").val() == "") {
            alert('o Item do alerta não pode ser vazio');
            $(".item").focus();
            return false;
        }
        if ($(".alerta_mensagem").val() == 
                "") {
            alert('A descrição do alerta não pode ser vazia');
            $(".alerta_mensagem").focus();
            return false;
        }
    }


});


