<?php
/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$laudos = new Query_model();
$laudos->SetCampos("*");
$laudos->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$laudos->SetTabelas("processos_laudos");
$laudos->SetTipoRetorno(1);
$result_laudos = $laudos->get();
/* CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '2' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] = $tarefas->get();
/* CONSULTA TODOS OS ANEXOS DESTE PROCESSO */
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '" . $this->uri->segment(4) . "' AND id_nome_processo = '2' ");
$anexos->SetTipoRetorno(0);
$anexos->SetTabelas("processos_anexos");
$dados['arquivos'] = $anexos->get();
/* VERIFICA SE A TAREFA PARA SER EXCLUIDA */
if ($this->uri->segment(6) == 'tarefas' && $this->uri->segment(7) != "" && $this->uri->segment(8) != "") {
    $apagar_tareafa = new Query_model();
    $apagar_tareafa->SetCondicao("id = '" . $this->uri->segment(7) . "'");
    $apagar_tareafa->SetTabelas("alerta");
    $apagar_tareafa->excluir();
    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/');
}

/* PADRÂO DOS SELECTS */
$dados['status_select'] = array('Pendente',"Deferido");
$dados['bt'] = 'Salvar';
$dados['select_tipo_laudo'] = array(1 =>'Detran',2 =>'Sus',);
$dados['select_tipo_medico'] = array(1 =>'Shamah',2 =>'Particular',);

/* PADRÂO DO SATATUS DO ITEM */
$dados['item'][7] = 'Preencher Datas';
$dados['item'][8] = 'Anexar Laudos';
$dados['item'][9] = 'Status';

/* PADRÂO DOS SELECTS */
$dados['status_select'] = array('0' => 'Pendente', '3' => "Deferido");
$dados['bt'] = 'Salvar';


if (count($result_laudos) == 0) {
    $dados['tipo_laudo'] = '1';
    $dados['data_emissao'] = '';
    $dados['data_validade'] = '';
    $dados['medico'] = '1';
    $dados['form']['status'] = '0';
}else{
     $dados['tipo_laudo'] = $result_laudos->tipo_laudo;
    $dados['data_emissao'] = data_br($result_laudos->data_emissao);
    $dados['data_validade'] = data_br($result_laudos->data_validade);
    $dados['medico'] = $result_laudos->medico;
    $dados['form']['status'] = $result_laudos->status;
}

/* SE FOR PRECIONADO O BOTÂO DO FORM */
$post = $this->input->post();
if ($post) {
    
    //**********ALERTA*************************************
    $session = $this->session->all_userdata();
    $monta = array();
    $monta['obs'] = $post['alerta_mensagem'];
    $monta['id_processo'] = $this->uri->segment(4);
    $monta['id_usuarios'] = $session['usuario']->id;
    $monta['id_item'] = $post['item'];
    $monta['id_nome_processo'] = '2';
    $monta['data'] = data_banco($post['alerta_data']);
    $monta['status'] = '0';
    if ($post['status'] != 3) {
        $salvar_alerta = new Query_model();
        $salvar_alerta->SetCampos($monta);
        $salvar_alerta->SetTabelas("alerta");
        $salvar_alerta->inserir();
    }
    //**********FIM ALERTA*************************************
    
    
    $campos_laudos = array();
    $campos_laudos['id_processo'] = 
    $campos_laudos['tipo_laudo'] = $post['tipo_laudo'];
    $campos_laudos['data_emissao'] = data_banco($post['data_emissao']);
    $campos_laudos['data_validade'] = data_banco($post['data_validade']);
    $campos_laudos['medico'] = $post['medico'];
    $campos_laudos['status'] = $post['status'];
    
    
     if (count($result_laudos) == 0) {
        $inserir_laudos = new Query_model();
        $inserir_laudos->SetCampos($campos_laudos);
        $inserir_laudos->SetTabelas("processos_laudos");
        $inserir_laudos->inserir();
    } else {
        $alterar_laudos = new Query_model();
        $alterar_laudos->SetCampos($campos_laudos);
        $alterar_laudos->SetTabelas("processos_laudos");
        $alterar_laudos->SetCondicao("id = '" . $result_laudos->id . "'");
        $alterar_laudos->atualizar();
    }

    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
    
}








