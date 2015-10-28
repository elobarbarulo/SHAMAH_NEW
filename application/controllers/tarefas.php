<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas extends CI_Controller {
 
    public function __construct(){
    	parent::__construct();
        include 'defaul_controller.php';
    }


	public function ver($id = ''){
		$dados =  array();
		include ($this->uri->segment(1).'/'.$this->uri->segment(2).'.php');
		$this->index($dados);
	}
	
        public function index($dados = array()){
		if($this->uri->segment(2) == ''){
			redirect('tarefas/ver');
		}		
		$dad = array();
		$dados['titulo'] = isset($dados['titulo']) > 0 ? "Usuarios" : "";		
		$dad['dados'] = $dados;
		$this->load->view('estrutura/conteudo',$dad);

	}
}

