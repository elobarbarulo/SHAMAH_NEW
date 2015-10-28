<?php

class Pagamentos_model extends CI_Model {

    //Camopos banco
    private $id = "";
    private $id_processo = "";
    private $valor = "";
    private $data = "";
    private $n_parcela = "";
    private $quem_ira_pagar = "";
    private $forma_pagamento = "";
    private $numero = "";
    private $status = "";
    private $dt_confirmacao = "";

    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }
    
    public function GetCampo($campo) {
        return $this->$campo;
    }
    
    public function monta_campos(){
        $ret = array();
        $ret['id'] = $this->id;
        $ret['id_processo'] = $this->id_processo;
        $ret['valor'] = str2int($this->valor);
        $ret['data'] = $this->data;
        $ret['n_parcela'] = $this->n_parcela;        
        $ret['quem_ira_pagar'] = $this->quem_ira_pagar;
        $ret['forma_pagamento'] = $this->forma_pagamento;
        $ret['numero'] = $this->numero;
        $ret['status'] = $this->status;
        $ret['dt_confirmacao'] = $this->dt_confirmacao;
        return $ret;
    }

     public function PadraoSelect() {
        $ret['f_pag'] = array();
        $ret['f_pag'][0] = "Selecione";
        $ret['f_pag'][1] = "Dinheiro";
        $ret['f_pag'][2] = "Deposito Bancario";
        $ret['f_pag'][3] = "Cheque";
        $ret['f_pag'][4] = "Boleto";
        
        $ret['n_parcela'] = array();
        $ret['n_parcela'][0] = "Selecione";
        $ret['n_parcela'][1] = "1";
        $ret['n_parcela'][2] = "2";
        $ret['n_parcela'][3] = "3";
        $ret['n_parcela'][4] = "4";
        $ret['n_parcela'][5] = "5";
        $ret['n_parcela'][6] = "6";
        $ret['n_parcela'][7] = "7";
        $ret['n_parcela'][8] = "8";
        $ret['n_parcela'][9] = "9";
        $ret['n_parcela'][10] = "10";
        
        return $ret;
     }
    
}

?>
