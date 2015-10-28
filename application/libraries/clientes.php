<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes {

    public function __construct() {
    }

    private $nome = '';
    private $nascimento = '';
    private $sexo = '';
    private $cpf = '';
    private $rg = '';
    private $cnh = '';
    private $atividade = '';
    private $inss = '';
    private $logradoro = '';
    private $n = '';
    private $complemento = '';
    private $bairro = '';
    private $cep = '';
    private $municipio = '';
    private $uf = '';
    private $incapaz = '0';
    private $ajuda_financeira = '0';
    private $email = '';
    

    public function preencher_form(){
        $dados = array();
        
        return $dados;
    }

 
    public function setcampo($campo,$valor){
        $this->$campo = $valor;
    }
    
    /*
    
    public function getemail(){
        return $this->email;
    }    
    
    public function mostra(){
        $ret = "";
        $ret.=  $this->nome;
        $ret.=  $this->email;
        return $ret;
    }
     * 
     *
     */
    
    
    
    

}
