<?php 
class Query_model extends CI_Model {
    private $tabela = '';
    private $condicao = '';
    private $campos = '';
    private $tipo_retorno = ''; // 1 = apenas uma linha ,0 = varias linahs
    
    public function SetTabelas($tabelas){
        $this->tabela = $tabelas;
    }
    public function SetCondicao($condicao){
        $this->condicao = $condicao;
    }
    public function SetCampos($campos){
        $this->campos = $campos;
    }
    public function SetTipoRetorno($tipo_retorno){
        $this->tipo_retorno = $tipo_retorno;
    }    
    
    
    
    public function __construct(){
        $this->load->database();
    }

    public function inserir(){
        $this->db->insert($this->tabela, $this->campos);
        return $this->db->insert_id();
    }

    public function atualizar(){
        return $this->db->update($this->tabela, $this->campos,$this->condicao);
    }
    
    
    public function get(){
       
        $monta_query = "";
        $monta_query.= " SELECT ";
        $monta_query.= $this->campos;
        $monta_query.= " FROM ";
        $monta_query.= $this->tabela;
        if($this->condicao != ""){
            $monta_query.= ' WHERE ' .$this->condicao;
        }
       $query =$this->db->query($monta_query);
        
       //Ve o tipo do retorno 
        if($this->tipo_retorno == 1){
          return $query->row();
        } else {
          return $query->result_array();
        }
        
    }
    
    public function excluir(){
        return $this->db->delete($this->tabela,$this->condicao);
    }


}
?>