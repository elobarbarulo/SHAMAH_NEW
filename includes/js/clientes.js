//Validação dos campos
$(".validar_clientes").click(function () {
    if ($(".nome").val() == "") {
        alert("O nome não pode ser Vazio");
        $(".nome").focus();
        return false;
    }

    if ($(".dt_nasc").val() == "") {
        alert("A data de nascimento não pode ser Vazio");
        $(".dt_nasc").focus();
        return false;
    }
    if ($(".sexo").val() == "") {
        alert("O sexo não pode ser Vazio");
        $(".sexo").focus();
        return false;
    }
    if ($("#cpf").val() == "") {
        alert("O CPF não pode ser Vazio");
        $(".cpf").focus();
        return false;
    }
    if ($(".rg").val() == "") {
        alert("O RG não pode ser Vazio");
        $(".rg").focus();
        return false;
    }
    if ($(".rg_uf").val() == "") {
        alert("O RG UF não pode ser Vazio");
        $(".rg_uf").focus();
        return false;
    }
    if ($(".email").val() == "") {
        alert("O Email não pode ser Vazio");
        $(".email").focus();
        return false;
    }    
    /*
    if ($(".inss").val() == "") {
        alert("O INSS não pode ser Vazio");
        $(".inss").focus();
        return false;
    }
    */
    if ($(".tem_cnh").val() == "") {
        alert("o Campo tem Cnh não pode ser Vazio");
        $(".tem_cnh").focus();
        return false;
    }
    if ($("#tem_cnh").val() == "1") {
        if ($(".cnh_numero").val() == "") {
            alert("o Campo Cnh Nº não pode ser Vazio");
            $(".cnh_numero").focus();
            return false;
        }
        if ($(".cnh_tipo").val() == "" || $(".cnh_tipo").val() == 0) {
            alert("o Campo Cnh Tipo não pode ser Vazio");
            $(".cnh_tipo").focus();
            return false;
        }
    }
    if ($(".atividade").val() == "") {
        alert("o Campo atividade não pode ser Vazio");
        $(".atividade").focus();
        return false;
    }
    if ($(".end_logradouro").val() == "") {
        alert("o Campo Logradouro não pode ser Vazio");
        $(".end_logradouro").focus();
        return false;
    }
    if ($(".end_n").val() == "") {
        alert("o Campo Numero não pode ser Vazio");
        $(".end_n").focus();
        return false;
    }
    if ($(".end_bairro").val() == "") {
        alert("o Campo Bairro não pode ser Vazio");
        $(".end_bairro").focus();
        return false;
    }
    if ($(".end_cep").val() == "") {
        alert("o Campo CEP não pode ser Vazio");
        $(".end_cep").focus();
        return false;
    }
    if ($(".end_cidade").val() == "") {
        alert("o Campo Cidade não pode ser Vazio");
        $(".end_cidade").focus();
        return false;
    }
    if ($(".end_estado").val() == "") {
        alert("o Campo Estado não pode ser Vazio");
        $(".end_estado").focus();
        return false;
    }


    if ($(".n_tel").val() != "" && $(".t_tel").val() != "0" && $(".o_tel").val() != "") {

        if ($(".n_tel").val() == "") {
            alert("o Campo Numero do telefone não pode ser Vazio");
            $(".n_tel").focus();
            return false;
        }
        if ($(".t_tel").val() == "") {
            alert("o Campo tipo do telefone não pode ser Vazio");
            $(".t_tel").focus();
            return false;
        }
    }
    
    if ($("#incapaz").val() == "1") {
        alert
        if ($(".i_nome").val() == "") {
            alert("o Campo Nome do responsavel não pode ser Vazio");
            $(".i_nome").focus();
            return false;
        }
        if ($(".i_cpf").val() == "") {
            alert("o Campo CPF do responsavel não pode ser Vazio");
            $(".i_cpf").focus();
            return false;
        }
        if ($(".i_rg").val() == "") {
            alert("o Campo RG do responsavel não pode ser Vazio");
            $(".i_rg").focus();
            return false;
        }        
    }
    
    /*
    if ($("#aj_fin").val() == "1") {
        if ($(".a_nome").val() == "") {
            alert("o Campo Nome da ajuda financeira não pode ser Vazio");
            $(".a_nome").focus();
            return false;
        }
        if ($(".a_cpf").val() == "") {
            alert("o Campo CPF da ajuda financeira não pode ser Vazio");
            $(".a_cpf").focus();
            return false;
        }
        if ($(".a_rg").val() == "") {
            alert("o Campo RG da ajuda financeira não pode ser Vazio");
            $(".a_rg").focus();
            return false;
        }        
    }
    */



});

if ($("#tem_cnh").val() == 1) {
    $(".form_cnh").show();
} else {
    $(".form_cnh").hide();

}

if ($("#incapaz").val() == 1) {
     $(".form_pessoal_incapaz").show();
     $(".form_incapaz").show();
} else {
    $(".form_pessoal_incapaz").hide();
    $(".form_incapaz").hide();

}


if ($("#aj_fin").val() == 1) {
    $(".form_ajuda_financeira").show();
} else {
    $(".form_ajuda_financeira").hide();

}




$("#tem_cnh").change(function () {
    if ($(this).val() == 1) {
        $(".form_cnh").show();
        $(".cnh_numero").val('');
        $(".cnh_tipo").val('0');
    } else {
        $(".form_cnh").hide();

    }
});

$("#incapaz").change(function () {
    if ($(this).val() == 1) {
        $(".form_pessoal_incapaz").show();
        $(".form_incapaz").show();
    } else {

        $(".form_incapaz").hide();
        $(".form_pessoal_incapaz").hide();
    }
})

$("#aj_fin").change(function () {
    if ($(this).val() == 1) {
        $(".form_ajuda_financeira").show();
    } else {
        $(".form_ajuda_financeira").hide();
    }
});


