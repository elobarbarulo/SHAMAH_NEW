<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processos extends CI_Controller {
 
    public function __construct(){
    	parent::__construct();
        include 'defaul_controller.php';
    }

    private $controle = 'clientes';
    private $acao_principal = 'consulta';
    private $titulo = '';


    
    public function proc(){
            $dados =  array();
            include ($this->uri->segment(1).'/'.$this->uri->segment(2).'.php');
            $this->index($dados);
    }
    
    public function index($dados = array()){
            if($this->uri->segment(2) == ''){
                    redirect($this->controle.'/'.$this->acao_principal);
            }		
            $dad = array();
            $dados['titulo'] = $this->titulo;		
            $dad['dados'] = $dados;
            $this->load->view('estrutura/conteudo',$dad);
    }
}
