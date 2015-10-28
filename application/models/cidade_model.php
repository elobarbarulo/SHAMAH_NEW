<?php 
class Cidade_model extends CI_Model {
    private $tabela = 'sis_cidades';
    
    
    public function __construct(){
        $this->load->database();
    }

  public function get($id = '', $nome = '', $id_estado = '',$nome_selecionado = ""){
        
        $this->db->select('*');
        $this->db->from($this->tabela);       

        if($id){
            $this->db->where('id', $id);
        }

        if($nome){
            $this->db->like('nome', $nome);
        }

        if($nome_selecionado){
            $this->db->where('nome', $nome_selecionado);
        }

        if($id_estado){
            $this->db->where('id_estado', $id_estado);
        }

        $query = $this->db->get();
        
        if($id){
          return $query->row();
        } else {
          return $query->result_array();
        }
        
    }


}
?>