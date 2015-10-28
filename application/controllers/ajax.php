<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
        include 'defaul_controller.php';
    }
/*
    private function busca_campos_produtos($campo){
        $ret = "";
        $consulta = $this->produtos_model->get_auto_compelte($campos = $this->uri->segment(2),$id = '', $descricao = $campo);
        foreach ($consulta as $key => $value) {
           $v ='set_item("'.$this->uri->segment(2).'","'.$value[$this->uri->segment(2)].'")';
           $ret.="<li onclick='".$v."'>".$value[$this->uri->segment(2)]."</li>";
         }
        return $ret;
    }
*/
    
    private function busca_cliente_ajax($texto = ''){
        $ret = "";
        $consulta = new Query_model();
        $consulta->SetCampos('nome,cpf,id');
        $consulta->SetCondicao(" nome like '%".$texto."%' OR cpf like '%".$texto."%' ");
        $consulta->SetTabelas("clientes");
        $consulta->SetTipoRetorno(0);
        $consulta_dados = $consulta->get();
        
        
        if(count($consulta_dados) == 0){
          $ret.= '<tr><td colspan="3">'.reprovado("Nunhum Cliente encotrado!<hr>".bt_link("clientes/formulario", "Novo Cliente")).'</td></tr>';
        }
        
        foreach ($consulta_dados as $key => $value) {
           $link_processos = anchor('processos/proc/'.$value['id'].'/0/ver','<i class="fa fa-cog fa-spin"></i><b> Processos </b></i>');
           $ret.=""
                . "<tr>"
                   . "<td>".$value['nome']."</td>"
                   . "<td>".$value['cpf']."</td>"
                   . "<td>".$link_processos."</td>"
                . "</tr>";            
        }
        return $ret;
    }

  
    


    private function busca_estado($uf = ''){
        $ret = "";
        $consulta = $this->estado_model->get('',$uf);
        foreach ($consulta as $key => $value) {
           $v ='set_item("estado","'.$value['uf'].'")';
           $ret.="<li onclick='".$v."'>".$value['uf']."</li>";
        }
        return $ret;
    }

    private function busca_cidade($nome = ''){
        $ret = "";
        $consulta = $this->cidade_model->get('',$nome);
        foreach ($consulta as $key => $value) {
           $v ='set_item("cidade","'.$value['nome'].'")';
           $ret.="<li onclick='".$v."'>".$value['nome']."</li>";
        }
        return $ret;
    }
    
  
    public function busca_cliente(){
        $post = $this->input->post();
        echo $this->busca_cliente_ajax($post['keyword']);    
    }
    public function estado(){
        $post = $this->input->post();
        echo $this->busca_estado($post['keyword']);
    }
    public function cidade(){
        $post = $this->input->post();
        echo $this->busca_cidade($post['keyword']);
    }

}

