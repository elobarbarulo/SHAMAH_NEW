<?php

$controler = $this->uri->segment(1);


$consulta = $this->servicos_model->get();
$dados['registros'] = $consulta;



//PREENCHER FORM NO HTML
if ($this->uri->segment(3) == '') {
    $dados['form']['nome'] = '';
    $dados['form']['valor'] = '';

    $dados['bt'] = 'Adicionar';
} else {
    $dad_form = $this->servicos_model->get($id = $this->uri->segment(3));
    $dados['form']['nome'] = $dad_form->nome;
    $dados['form']['valor'] = $dad_form->valor;
    $dados['bt'] = 'Alterar';
}

//VALIDA OS CAMPOS
$this->form_validation->set_rules('nome', 'Nome', 'required');
$this->form_validation->set_rules('valor', 'Valor', 'required');


$this->form_validation->set_message('required', '%s, Por favor o campo não pode ser vazio');
$this->form_validation->set_message('valid_email', '%s, esta com erro!');


//RECEBE OS CAMPOS
$post = $this->input->post();
$dados['mensagem_form'] = 0;
if ($post) {

    if ($this->form_validation->run() == FALSE) {
        $dados['mensagem_form'] = 1;
    } else {
        
        if($this->uri->segment(3) == ''){
            $this->servicos_model->inserir($post);
        }else{
            $this->servicos_model->atualizar($post,array("id"=>$this->uri->segment(3)));
        }
        
        redirect('servicos/');
    }
}
?>