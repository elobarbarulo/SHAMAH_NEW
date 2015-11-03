<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
 
    public function __construct(){
       parent::__construct();
       $this->load->model('usuarios_model');
        $this->load->model('estado_model');
        $this->load->model('cidade_model');
        $this->load->model('servicos_model');
        $this->load->model('clientes_model');
        $this->load->model('query_model');
        $this->load->model('telefones_model');
        $this->load->model('incapaz_model');
        $this->load->model('ajuda_financeira_model');
        $this->load->model('processos_model');
        $this->load->model('pagamentos_model');
        $this->load->database();
    }

    private $controle = 'site';
    private $acao_principal = 'inicio';
    private $titulo = '';
    

    public function inicio(){
            $dados =  array();
            include ($this->uri->segment(1).'/'.$this->uri->segment(2).'.php');
            $this->index($dados);
    }

    public function sair(){
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
