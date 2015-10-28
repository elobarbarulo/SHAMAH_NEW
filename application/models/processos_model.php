<?php

class Processos_model extends CI_Model {

    //Camopos banco
    private $id_cliente = "";
    private $id_usu_concessionaria = "";
    private $dt_inicio = "";
    private $quem_pg_cartas = "";
    private $status = "1"; // 1 = Producao 2 =Finalizado 3 = Cancelado
    private $valor_servicos = "";
    private $valor_desconto = "";
    private $valor_acrescimos = "";
    private $emitiu_nota = "";
    private $n_nota = "";
    private $anexo_nota = "";

    
    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }
    
    public function GetCampo($campo) {
        return $this->$campo;
    }
    
    public function PadraoSelect() {
        $ret['pg_cartas'] = array();
        $ret['pg_cartas'][0] = "Selecione";
        $ret['pg_cartas'][1] = "Concessionaria";
        $ret['pg_cartas'][2] = "Cliente";
        return $ret;
    }
    
    public function monta_campos(){
        $ret = array();
        $ret['id_cliente'] = $this->id_cliente;
        $ret['id_usu_concessionaria'] = $this->id_usu_concessionaria;
        $ret['dt_inicio'] = date("Y-m-d");
        $ret['quem_pg_cartas'] = $this->quem_pg_cartas;
        $ret['status'] = $this->status;
        $ret['valor_servicos'] = $this->valor_servicos;
        $ret['valor_desconto'] = $this->valor_desconto;
        $ret['valor_acrescimos'] = $this->valor_acrescimos;
        $ret['emitiu_nota'] = $this->emitiu_nota;
        $ret['n_nota'] = $this->n_nota;
        $ret['anexo_nota'] = $this->anexo_nota;
        
        return $ret;
    }

}

?>