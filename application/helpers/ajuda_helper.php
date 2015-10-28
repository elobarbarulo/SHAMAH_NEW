<?php
/******************************************************************************************************
 * 
 * @param type $objeto
 * @param type $morre
 *****************************************************************************************************/
 function debug($objeto, $morre = false){
     echo '<h2>DEBUG</h2>';
     echo '<pre style="font-family: Arial;">';
     print_r($objeto);
     echo '</pre>';
     if($morre){
         die();
     }
 }

/****************************************************************************************************
 * 
 * @param type $data
 * @return type
 ****************************************************************************************************/
function data_mysql($data) {
    return implode("-",array_reverse(explode("/",$data)));
}
/****************************************************************************************************
 * 
 * @param type $data
 * @return type
****************************************************************************************************/
function data_br($data = NULL) {
    if ($data) {
        return date('d/m/Y', strtotime($data));
    }
}
/****************************************************************************************************
 * 
 * @param type $data
 * @return type
 ****************************************************************************************************/
function data_hora_br($data = NULL) {
    if ($data) {
        return date('d/m/Y H:i:s', strtotime($data));
    }
}

function mascara_cep($cep){
    $q = strlen($cep);
    if($q <= 7){
        $cep = '0'.$cep;
    }else{
        $cep = $cep;
    }
    $digito = substr($cep, -3);  
    $antes_digito = substr($cep, 0, -3);
    return $antes_digito.'-'.$digito;
}

function texto_negrito($trexo,$texto){
    return str_replace($trexo, "<b>".$trexo."</b>", $texto);
}

function texto_sublinhado($trexo,$texto){
    return str_replace($trexo, "<u>".$trexo."</u>", $texto);
}


function mascara_tel($tel){
    $primeiro_digito =  substr($tel, 0,1); //Pega o primeiro digito
    if($primeiro_digito == 0){
        $tel = $primeiro_digito =  substr($tel,1);//Tira o primeiro digito
    }else{
        $tel = $tel;
    }

    $ddd = substr($tel, 0,2);
    $ddd = "(".$ddd.")";
    $primeira_parte = substr($tel, 2,4);
    $segunda_parte  = substr($tel, 6,9);
    return  $ddd.$primeira_parte.'-'.$segunda_parte;
}

/****************************************************************************************************
 * 
 * @param type $campo
 * @param type $formatado
 * @return boolean
****************************************************************************************************/
function formatarCPF_CNPJ($campo, $formatado = true){
	//retira formato
	$codigoLimpo = str2int($campo);
	// pega o tamanho da string menos os digitos verificadores
	$tamanho = (strlen($codigoLimpo) -2);
	//verifica se o tamanho do código informado é válido
	if ($tamanho != 9 && $tamanho != 12){
		return false; 
	}
 
	if ($formatado){ 
		// seleciona a máscara para cpf ou cnpj
		$mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##'; 
 
		$indice = -1;
		for ($i=0; $i < strlen($mascara); $i++) {
			if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
		}
		//retorna o campo formatado
		$retorno = $mascara;
 
	}else{
		//se não quer formatado, retorna o campo limpo
		$retorno = $codigoLimpo;
	}
 
	return $retorno;
 
}
/****************************************************************************************************
 * 
 * @param type $mensagem
 ****************************************************************************************************/
function alerta($mensagem) {
    echo '<script>alert("' . $mensagem . '")</script>'; 
}
/******************************************************************************************************
 * 
 * @param type $email
 * @return boolean|string
 *****************************************************************************************************/
function validaemail($email){
    //verifica se e-mail esta no formato correto de escrita
    if (!ereg('^([a-zA-Z0-9.-])*([@])([a-z0-9]).([a-z]{2,3})',$email)){
        $mensagem='E-mail Inv&aacute;lido!';
        return $mensagem;
    }
    else{
        //Valida o dominio
        $dominio=explode('@',$email);
        if(!checkdnsrr($dominio[1],'A')){
            $mensagem='E-mail Inv&aacute;lido!';
            return $mensagem;
        }
        else{return true;} // Retorno true para indicar que o e-mail é valido
    }
}
/******************************************************************************************************
 * 
 * @param type $hora_inicio
 * @param type $hora_final
 * @param type $decimal
 * @return type
 *****************************************************************************************************/ 
function diferenca_horas($hora_inicio, $hora_final, $decimal = true){
    $hora_inicio = strtotime($hora_inicio);
    $hora_final = strtotime($hora_final);
    
    $diferenca = $hora_final - $hora_inicio;
    
    if($decimal){
        $horas = $diferenca / (60 * 60);
    } else {
        $horas = $diferenca;
    }
    
    return $horas;
}
/******************************************************************************************************
 * 
 * @param type $minutos
 * @return type
 *****************************************************************************************************/
function minutos2hora($minutos){
     if($minutos > 60){
         $hora = add0(floor($minutos/60));
         $minuto = add0(floor($minutos - ($hora * 60)));
     } else {
         $hora = '00';
         $minuto = add0(floor($minutos));
     }
   
     return $hora . ':' . $minuto;
 }


/******************************************************************************************************
 * 
 * @param type $mes
 * @param type $tipo
 * @return array
 *****************************************************************************************************/
function get_mes($mes, $tipo = 'completo'){
    $retorno = array(
        '01' => array('completo' => 'Janeiro', 'resumido' => 'Jan'),
        '02' => array('completo' => 'Fevereiro', 'resumido' => 'Fev'),
        '03' => array('completo' => 'Março', 'resumido' => 'Mar'),
        '04' => array('completo' => 'Abril', 'resumido' => 'Abr'),
        '05' => array('completo' => 'Maio', 'resumido' => 'Mai'),
        '06' => array('completo' => 'Junho', 'resumido' => 'Jun'),
        '07' => array('completo' => 'Julho', 'resumido' => 'Jul'),
        '08' => array('completo' => 'Agosto', 'resumido' => 'Ago'),
        '09' => array('completo' => 'Setembro', 'resumido' => 'Set'),
        '10' => array('completo' => 'Outubro', 'resumido' => 'Out'),
        '11' => array('completo' => 'Novembro', 'resumido' => 'Nov'),
        '12' => array('completo' => 'Dezembro', 'resumido' => 'Dez')
    );
    
    if(isset($retorno[$mes][$tipo])){
        return $retorno[$mes][$tipo];
    }
}

/******************************************************************************************************
 * 
 * @return array
 *****************************************************************************************************/
function dias(){
    $dias = array();
    $n =0;
    for ($i=1; $i <=31 ; $i++) { 
        $n = $n+1;
        array_push($dias,$n);
    }
    return $dias;
}
/******************************************************************************************************
 * 
 * @return array
 *****************************************************************************************************/
function meses(){
    $meses = array();
    $n =0;
    for ($i=1; $i <=12 ; $i++) { 
        $n = $n+1;
        array_push($meses,$n);
    }
    return $meses;
}
/******************************************************************************************************
 * 
 * @param type $str
 * @return type
 *****************************************************************************************************/
function str2int($str){
    $int = str_replace(array(' ', ',','.','-','/','%'), array('', '','','','',''), $str);
    return $int;
}
/******************************************************************************************************
 * 
 * @param type $str
 * @return type
 *****************************************************************************************************/
function str2decimal($str){
    $dec = str_replace(array('.',','), array('','.'), $str);
    return $dec;
}
/******************************************************************************************************
 * CONVERTER VALORES PARA DECIMAL
 * @param type $decimal
 * @return type
 *****************************************************************************************************/
function decimal2str($decimal){
    setlocale(LC_MONETARY, 'pt_BR');
    $str = number_format($decimal,2,',','.');  
    return $str;
}
/******************************************************************************************************
 * 
 * @param type $string
 * @return type
 *****************************************************************************************************/
function remover_acentos($string){
    $retorno = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) );
    return $retorno;
}
/******************************************************************************************************
 * 
 * @param type $variavel
 * @return type
 *****************************************************************************************************/
function limpar_variavel($variavel){    
    $variavel = trim($variavel);
    $variavel = str_replace("\r", "", $variavel);
    $variavel = str_replace("\n", "", $variavel);
    $variavel = str_replace("\r\n", "", $variavel);
    $variavel = str_replace("\t", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = preg_replace("/(<br.*?>)/i","", $variavel);
    return $variavel;
}
/******************************************************************************************************
 * 
 * @param type $nome
 * @return type
 *****************************************************************************************************/
function preparar_pasta($nome){
    $nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome));//Tira acentos
    $nome = strtoupper($nome);// Deixar tudo maiusculos
    $nome = str_replace(" ", "_", $nome);// tirar espaços e colocar '_' 
    return $nome;
}
/******************************************************************************************************
 * 
 * @param type $nome
 * @return type
 *****************************************************************************************************/
function retorna_nome_real($nome){
    $nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome));//Tira acentos
    $nome = strtoupper($nome);// Deixar tudo maiusculos
    $nome = str_replace("_"," ", $nome);// tirar espaços e colocar '_' 
    return $nome;
}
/******************************************************************************************************
 * 
 * @param type $nome
 * @return type
 *****************************************************************************************************/
function padronizar_nome($nome){
    $nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome));//Tira acentos
    $nome = strtoupper($nome);// Deixar tudo maiusculos
    return $nome;
}
/******************************************************************************************************
 * 
 * @param type $data
 * @return type
 *****************************************************************************************************/
function data_banco($data){
    return  implode("-",array_reverse(explode("/",$data)));
}
/******************************************************************************************************
 * 
 * @param type $data
 * @return type
 *****************************************************************************************************/
function data_brasil_pasta($data){
    return  date('d-m-Y', strtotime($data));
}
/******************************************************************************************************
 * 
 * @param type $data
 * @return type
 *****************************************************************************************************/
function data_brasil($data){
    return implode("/",array_reverse(explode("-",$data)));
}
/******************************************************************************************************
 * 
 * @param type $valor
 * @return type
 *****************************************************************************************************/
function monetario($valor){
    return number_format($valor, 2, ',', '.');
}
/******************************************************************************************************
 * 
 * @param type $valor
 * @return type
 *****************************************************************************************************/
function monetario_rs($valor){
    return ' R$ ' . number_format($valor, 2, ',', '.');
}
/******************************************************************************************************
 * 
 * @param type $get_valor
 * @return type
 *****************************************************************************************************/
function rs_inteiro($get_valor) {
    $source = array('.', ','); 
    $replace = array('', '.');
    $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
    return $valor; //retorna o valor formatado para gravar no banco
}
/******************************************************************************************************
 * 
 * @param type $var
 * @return string
 *****************************************************************************************************/
function tipo_variavel($var){
    if (is_array($var)) return "array";
    if (is_bool($var)) return "boolean";
    if (is_float($var)) return "float";
    if (is_int($var)) return "integer";
    if (is_null($var)) return "NULL";
    if (is_numeric($var)) return "numeric";
    if (is_object($var)) return "object";
    if (is_resource($var)) return "resource";
    if (is_string($var)) return "string";
    return "unknown type";
}

/******************************************************************************************************
 * 
 * @param type $texto
 * @return string
 *****************************************************************************************************/
function converter_primeira_maiucula($texto){
    $explodir = explode(" ",$texto);
    $retorno = "";
    foreach ($explodir as $key => $value) {
        $retorno.= ucfirst($value) . ' '; 
    }
    return $retorno;
}



    /**
     * isCnpjValid
     *
     * Esta função testa se um Cnpj é valido ou não. 
     *
     * @author  Raoni Botelho Sporteman <raonibs@gmail.com>
     * @version 1.0 Debugada em 27/09/2011 no PHP 5.3.8
     * @param   string      $cnpj           Guarda o Cnpj como ele foi digitado pelo cliente
     * @param   array       $num            Guarda apenas os números do Cnpj
     * @param   boolean     $isCnpjValid    Guarda o retorno da função
     * @param   int         $multiplica     Auxilia no Calculo dos Dígitos verificadores
     * @param   int         $soma           Auxilia no Calculo dos Dígitos verificadores
     * @param   int         $resto          Auxilia no Calculo dos Dígitos verificadores
     * @param   int         $dg             Dígito verificador
     * @return  boolean                     "true" se o Cnpj é válido ou "false" caso o contrário
     *
     */
     
     function isCnpjValid($cnpj)
        {
            //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
            $j=0;
            for($i=0; $i<(strlen($cnpj)); $i++)
                {
                    if(is_numeric($cnpj[$i]))
                        {
                            $num[$j]=$cnpj[$i];
                            $j++;
                        }
                }
            //Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
            if(count($num)!=14)
                {
                    $isCnpjValid=false;
                }
            //Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
            if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 && $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0)
                {
                    $isCnpjValid=false;
                }
            //Etapa 4: Calcula e compara o primeiro dígito verificador.
            else
                {
                    $j=5;
                    for($i=0; $i<4; $i++)
                        {
                            $multiplica[$i]=$num[$i]*$j;
                            $j--;
                        }
                    $soma = array_sum($multiplica);
                    $j=9;
                    for($i=4; $i<12; $i++)
                        {
                            $multiplica[$i]=$num[$i]*$j;
                            $j--;
                        }
                    $soma = array_sum($multiplica); 
                    $resto = $soma%11;          
                    if($resto<2)
                        {
                            $dg=0;
                        }
                    else
                        {
                            $dg=11-$resto;
                        }
                    if($dg!=$num[12])
                        {
                            $isCnpjValid=false;
                        } 
                }
            //Etapa 5: Calcula e compara o segundo dígito verificador.
            if(!isset($isCnpjValid))
                {
                    $j=6;
                    for($i=0; $i<5; $i++)
                        {
                            $multiplica[$i]=$num[$i]*$j;
                            $j--;
                        }
                    $soma = array_sum($multiplica);
                    $j=9;
                    for($i=5; $i<13; $i++)
                        {
                            $multiplica[$i]=$num[$i]*$j;
                            $j--;
                        }
                    $soma = array_sum($multiplica); 
                    $resto = $soma%11;          
                    if($resto<2)
                        {
                            $dg=0;
                        }
                    else
                        {
                            $dg=11-$resto;
                        }
                    if($dg!=$num[13])
                        {
                            $isCnpjValid=false;
                        }
                    else
                        {
                            $isCnpjValid=true;
                        }
                }
            //Trecho usado para depurar erros.
           /*
            if($isCnpjValid==true){
                    echo "<p><font color='GREEN'>Cnpj é Válido</font></p>";
            }
            if($isCnpjValid==false){
                    echo "<p><font color='RED'>Cnpj Inválido</font></p>";
            }
             */
            //Etapa 6: Retorna o Resultado em um valor booleano.
            return $isCnpjValid;            
        }








/**
 * Valida CPF
 *
 * @author Luiz Otávio Miranda <contato@todoespacoonline.com/w>
 * @param string $cpf O CPF com ou sem pontos e traço
 * @return bool True para CPF correto - False para CPF incorreto
 *
 */
function valida_cpf( $cpf = false ) {
    // Exemplo de CPF: 025.462.884-23
    
    /**
     * Multiplica dígitos vezes posições 
     *
     * @param string $digitos Os digitos desejados
     * @param int $posicoes A posição que vai iniciar a regressão
     * @param int $soma_digitos A soma das multiplicações entre posições e dígitos
     * @return int Os dígitos enviados concatenados com o último dígito
     *
     */
    function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {
        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições: 
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
        for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
            $soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );
            $posicoes--;
        }
 
        // Captura o resto da divisão entre $soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        $soma_digitos = $soma_digitos % 11;
 
        // Verifica se $soma_digitos é menor que 2
        if ( $soma_digitos < 2 ) {
            // $soma_digitos agora será zero
            $soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos $soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            $soma_digitos = 11 - $soma_digitos;
        }
 
        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        $cpf = $digitos . $soma_digitos;
        
        // Retorna
        return $cpf;
    }
    
    // Verifica se o CPF foi enviado
    if ( ! $cpf ) {
        return false;
    }
 
    // Remove tudo que não é número do CPF
    // Ex.: 025.462.884-23 = 02546288423
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
 
    // Verifica se o CPF tem 11 caracteres
    // Ex.: 02546288423 = 11 números
    if ( strlen( $cpf ) != 11 ) {
        return false;
    }   
 
    if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
    }


    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    $digitos = substr($cpf, 0, 9);
    
    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    $novo_cpf = calc_digitos_posicoes( $digitos );
    
    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    $novo_cpf = calc_digitos_posicoes( $novo_cpf, 11 );
    
    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if ( $novo_cpf === $cpf ) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }
}


function importar_arquivo($arquivos = array()) {
    if (count($arquivos) == 0) {
        $retorno['erro'] = '';
        $retorno['arquivo'] = '';
    } else {
        /*TRATAMENTO DE ERRO DO UPLOAD */
        if($arquivos['arquivo']['error'] == 0){
            /*Se n]ao teve erro o upload foi ok*/
            $exp = explode('.', $arquivos['arquivo']['name']);
            //Vejo se o arquivo é do tipo PDF
            if ($exp[1] == 'pdf' || $exp[1] == 'PDF') {
                //Se for monto o caminho para onde ira
                $uploaddir = 'anexos/';
                $uploadfile = $uploaddir . basename(preparar_pasta($arquivos['arquivo']['name']));
                    if (move_uploaded_file($arquivos['arquivo']['tmp_name'], $uploadfile)) {
                            $retorno['erro'] = '';
                            $retorno['arquivo'] = $arquivos['arquivo']['name'];
                    } else {
                            $retorno['erro'] = 'erro ao tranferir o arquivo "Mandar a pasta definitiva"';
                            $retorno['arquivo'] = "";
                    }
            } else {
                $retorno['erro'] = 'O ARQUIVO ENVIADO NAO ESTA EM FORMATO PDF';
                $retorno['arquivo'] = "";
            }
        }elseif($arquivos['arquivo']['error'] == 1){
            $retorno['erro'] = ' O ARQUIVO ENVIADO EXCEDE O LIMITE PERMITIDO';
            $retorno['arquivo'] = "";
        }elseif($arquivos['arquivo']['error'] == 2){
            $retorno['erro'] = '  O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML. ';
            $retorno['arquivo'] = "";
        }elseif($arquivos['arquivo']['error'] == 3){
            $retorno['erro'] = ' O upload do arquivo foi feito parcialmente. ';
            $retorno['arquivo'] = "";
        }elseif($arquivos['arquivo']['error'] == 4){
            //Nenhum arquivo foi enviado. 
            $retorno['erro'] = '';
            $retorno['arquivo'] = "";
        }
    }
    return $retorno;
}
