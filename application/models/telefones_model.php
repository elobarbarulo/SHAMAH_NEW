<?php

class Telefones_model extends CI_Model {

    //Camopos banco
    private $id = "";
    private $telefone = "";
    private $tipo = "";
    private $obs = "";
    private $id_cliente = "";


    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }
    
    public function GetCampo($campo) {
        return $this->$campo;
    }
    
    public function monta_campos(){
        $ret = array();
        $ret['telefone'] = $this->telefone;
        $ret['tipo'] = $this->tipo;
        $ret['obs'] = str2int($this->obs);
        $ret['id_cliente'] = $this->id_cliente;
        return $ret;
    }

}

?>