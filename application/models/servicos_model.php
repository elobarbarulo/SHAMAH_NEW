<?php 
class Servicos_model extends CI_Model {
    private $tabela = 'servicos';
    
    public function __construct(){
        $this->load->database();
    }

    /****************************************************************************************
     * 
     * @param type $campos
     * @return type
    ****************************************************************************************/
    public function inserir($campos){
        $this->db->insert($this->tabela, $campos);
        return  $this->db->insert_id();
    }


    /******************************************************************************************
     * 
     * @param type $campos
     * @param type $condicao
     * @return type
    *****************************************************************************************/
    public function atualizar($campos,$condicao){
        return $this->db->update($this->tabela, $campos,$condicao);
    }

    /******************************************************************************************
     * 
     * @param type $id
     * @param type $nome
     * @param type $email
     * @param type $senha
     * @param type $status
     * @return type
    *****************************************************************************************/
    public function get($id = ''){
        
        $this->db->select('*');
        $this->db->from($this->tabela);       

        if($id){
            $this->db->where('id', $id);
        }
      
        $query = $this->db->get();
        
        if($id){
          return $query->row();
        } else {
          return $query->result_array();
        }
        
    }

    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function excluir($id){
        return $this->db->delete($this->tabela, array('id' => $id));
    }


}
?>