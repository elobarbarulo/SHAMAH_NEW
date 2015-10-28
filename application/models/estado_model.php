<?php 
class Estado_model extends CI_Model {
    private $tabela = 'sis_estados';
    
    
    public function __construct(){
        $this->load->database();
    }

  public function get($id = '', $uf = ''){
        
        $this->db->select('id,uf');
        $this->db->from($this->tabela);       

        if($id){
            $this->db->where('id', $id);
        }

        if($uf){
            $this->db->like('uf', $uf);
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