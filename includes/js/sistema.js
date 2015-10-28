
$(document).ready(function() {
    var link_padrao = $('#link_padrao').val();
    
    //REDIRECIONA A PAGINA QUANDO CLICAR NA TR
	$(".link_tr").click(function(){
		alert('aaa');
		// $(window.document.location).attr('href',this.title);
	});


/*****************************************************************************************************
									MASCARAS PRA TODOS OS CAMPOS 
*****************************************************************************************************/
$('.cpf').mask('999.999.999-99');
$('.cep').mask('99999-999');
// $('.telefone').mask('(99) 9999-9999?9');

$('.telefone').mask("(99) 9999-9999?9").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
 });




    $('.dinheiro').maskMoney({decimal: ",", thousands: "."});
    if($('.dinheiro').val()){
        $('.dinheiro').maskMoney('mask');
    }
    $('.hora').mask('99:99',{placeholder:" "});
    $('.data').mask('99/99/9999',{placeholder:" "});



	$('.cnpj_cpf').keyup(function(){	

            //limpa o que esta sendo digitado
	    var cnpj_cpf = $('.cnpj_cpf').val();
	    cnpj_cpf = cnpj_cpf.replace('/','');
	    cnpj_cpf = cnpj_cpf.replace('.','');
	    cnpj_cpf = cnpj_cpf.replace('.','');
	    cnpj_cpf = cnpj_cpf.replace('-','');

		if(cnpj_cpf.length <= 12 ){
		  	var retorno = cpf(cnpj_cpf);
		 }else{
		 	var retorno = cnpj(cnpj_cpf);
		 }
		$('.cnpj_cpf').val(retorno);

	});


 $('.numero').keypress(function(event) {
        var tecla = (window.event) ? event.keyCode : event.which;
        if ((tecla > 47 && tecla < 58)) return true;
        else {
            if (tecla != 8) return false;
            else return true;
        }
    });

/*******************************************************************************
 * Da um alerta na marca do processador mas não toma nenhuma ação
*******************************************************************************/
    $('#marca_processador').change(function(){
        //4 ó o tipo de produto que esta no banco de dados na linha 4
        var id_marca = $('#marca_processador').val();
        //Marca de processador é apenas INTEL e AMD
        if(id_marca == 4 || id_marca == 5){
            window.location.href = link_padrao+"produtos/form_processador/4/"+id_marca;
        }else{
            alert("A Marca selecionada não corresponde com processador");
        }
    });

    $('#proc_tipo_maquina').change(function(){
        //4 ó o tipo de produto que esta no banco de dados na linha 4
        var tipo_maquina = $('#proc_tipo_maquina').val();
        var marca_hidde = $('#marca_hidde').val();
        window.location.href = link_padrao+"produtos/form_processador/4/"+marca_hidde+'/'+tipo_maquina;
    });
   $('#proc_tipo_processador').change(function(){
        //4 ó o tipo de produto que esta no banco de dados na linha 4
        var proc_tipo_processador = $('#proc_tipo_processador').val();
         $('#proc_PN').focus();
        
    });

});


    // Funcao de formatacao CPF
    function cpf(valor) {

    	valor=valor.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    	valor=valor.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    	valor=valor.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                            			 //de novo (para o segundo bloco de números)
    	valor=valor.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    	return valor;

    }
 
    // Funcao de formatacao CNPJ
    function cnpj(valor) {
        // Remove qualquer caracter digitado que não seja numero
        valor = valor.replace(/\D/g, "");                           
 
        // Adiciona um ponto entre o segundo e o terceiro dígitos
        valor = valor.replace(/^(\d{2})(\d)/, "$1.$2");
 
        // Adiciona um ponto entre o quinto e o sexto dígitos
        valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
 
        // Adiciona uma barra entre o oitavaloro e o nono dígitos
        valor = valor.replace(/\.(\d{3})(\d)/, ".$1/$2");
 
        // Adiciona um hífen depois do bloco de quatro dígitos
        valor = valor.replace(/(\d{4})(\d)/, "$1-$2");              
        return valor;
    }