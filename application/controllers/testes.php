<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {
 
    public function __construct(){
    	parent::__construct();
        include 'defaul_controller.php';
    }
	
        public function contratos(){
		$dados =  array();
		include ($this->uri->segment(1).'/'.$this->uri->segment(2).'.php');
		$this->index($dados);
	}
        public function novo_teste(){
		$dados =  array();
		include ($this->uri->segment(1).'/'.$this->uri->segment(2).'.php');
		$this->index($dados);
	}        
        
        public function index($dados = array()){
		if($this->uri->segment(2) == ''){
			redirect('usuarios/formulario');
		}		
		$dad = array();
		$dados['titulo'] = isset($dados['titulo']) > 0 ? "Usuarios" : "";		
		$dad['dados'] = $dados;
		$this->load->view('estrutura/conteudo',$dad);

	}
}

