<?php

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


//POROTEÇÂO DA PAGINA SE NAO TIVER SESSAO REDIRECIONA PRO LOGIN

//$session = $this->session->all_userdata();
//if(isset($session['usuario']) == ""){
//    redirect('login/tela');
//}    



