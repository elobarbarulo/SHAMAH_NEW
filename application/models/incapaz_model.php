<?php

class Incapaz_model extends CI_Model {

    //Camopos banco
    private $id = "";
    private $nome = "";
    private $rg = "";
    private $cpf = "";
    private $parentesco = "";
    private $id_cliente = "";
    private $curatela = "0";
    private $mandado_seguranca = "0";
    private $tutela = "0";


    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }
    
    public function GetCampo($campo) {
        return $this->$campo;
    }
    
    public function monta_campos(){
        $ret = array();
        $ret['nome'] = $this->nome;
        $ret['rg'] = $this->rg;
        $ret['cpf'] = str2int($this->cpf);
        $ret['parentesco'] = $this->parentesco;
        $ret['id_cliente'] = $this->id_cliente;
        $ret['curatela'] = $this->curatela;
        $ret['mandado_seguranca'] = $this->mandado_seguranca;
        $ret['tutela'] = $this->tutela;
        return $ret;
    }

}

?>