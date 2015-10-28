<?php

/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$baixa_ipva = new Query_model();
$baixa_ipva->SetCampos("*");
$baixa_ipva->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$baixa_ipva->SetTabelas("processos_ipva_baixa");
$baixa_ipva->SetTipoRetorno(1);
$result_baixa_ipva = $baixa_ipva->get();
/* CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '1' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] = $tarefas->get();
/* CONSULTA TODOS OS ANEXOS DESTE PROCESSO */
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '" . $this->uri->segment(4) . "' AND id_nome_processo = '1' ");
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
/* MONTA OS PADROS SO CHECKLIST */
if (count($result_baixa_ipva) == 0) {
    $select = 0;
    $dados['condutor'] = $dados['form']['condutor'];
    $dados['requerimento_ipva'] = array('selec' => $select, 'vl' => 'Requerimento de IPVA');
    $dados['rg_cpf'] = array('selec' => $select, 'vl' => '1 copia do RG e CPF autenticado');
    $dados['licenciamento'] = array('selec' => $select, 'vl' => 'Licenciamento do carro compra e venda');
    $dados['procuracao_autenticada'] = array('selec' => $select, 'vl' => 'Procuração Dentran autenticada');
    $dados['form']['status'] = 0;
    $dados['numero_protocolo'] = "";
} else {
   //debug($result_baixa_ipva,true);
    $dados['requerimento_ipva'] = array('selec' => $result_baixa_ipva->requerimento_ipva, 'vl' => 'Requerimento de IPVA');
    $dados['rg_cpf'] = array('selec' => $result_baixa_ipva->rg_cpf, 'vl' => '1 copia do RG e CPF autenticado');
    $dados['licenciamento'] = array('selec' => $result_baixa_ipva->licenciamento, 'vl' => 'Licenciamento do carro compra e venda');
    $dados['procuracao_autenticada'] = array('selec' => $result_baixa_ipva->procuracao_autenticada, 'vl' => 'Procuração Dentran autenticada');
    $dados['form']['status'] = $result_baixa_ipva->status;
    $dados['numero_protocolo'] = $result_baixa_ipva->protocolo;
}
//debug($dados,true);
/* PADRÂO DO SATATUS DO ITEM */
$dados['item'][20] = 'Aguardando resposta';
$dados['item'][19] = 'Aguardando para levar os documentos';
$dados['item'][18] = 'Faltando Documento';

/* PADRÂO DOS SELECTS */
$dados['status_select'] = array('Pendente', 'Resposta Notificação', 'Documentos preparados', "Deferido");
$dados['bt'] = 'Salvar';

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
    $monta['id_nome_processo'] = '8';
    $monta['data'] = data_banco($post['alerta_data']);
    $monta['status'] = '0';
    if ($post['status'] != 3) {
        $salvar_alerta = new Query_model();
        $salvar_alerta->SetCampos($monta);
        $salvar_alerta->SetTabelas("alerta");
        $salvar_alerta->inserir();
    }
    //**********FIM ALERTA*************************************
    

//**********Inicio Anexos*************************************
    $requerimento_ipva = 0;
    $rg_cpf = 0;
    $licenciamento = 0;
    $procuracao_autenticada = 0;
    
    if (isset($post['campo'])) {
        foreach ($post['campo'] as $key => $value) {
            if ($value == 'Requerimento de IPVA') {
                $requerimento_ipva = 1;
            }
            if ($value == '1 copia do RG e CPF autenticado') {
                $rg_cpf = 1;
            }
            if ($value == 'Licenciamento do carro compra e venda') {
                $licenciamento = 1;
            }
            if ($value == 'Procuração Dentran autenticada') {
                $procuracao_autenticada = 1;
            }
            
        }
    }


    $campos_baixa_i = array();
    $campos_baixa_i['requerimento_ipva'] = $requerimento_ipva;
    $campos_baixa_i['rg_cpf'] = $rg_cpf;
    $campos_baixa_i['licenciamento'] = $licenciamento;
    $campos_baixa_i['procuracao_autenticada'] = $procuracao_autenticada;
    $campos_baixa_i['status'] = $post['status'];
    $campos_baixa_i['protocolo'] = $post['protocolo'];
    $campos_baixa_i['id_processo'] = $this->uri->segment(4);
   
        

    if (count($result_baixa_ipva) == 0) {
        $inserir_baixa_ipva = new Query_model();
        $inserir_baixa_ipva->SetCampos($campos_baixa_i);
        $inserir_baixa_ipva->SetTabelas("processos_ipva_baixa");
        $inserir_baixa_ipva->inserir();
    } else {
        $alterar_baixa_ipva = new Query_model();
        $alterar_baixa_ipva->SetCampos($campos_baixa_i);
        $alterar_baixa_ipva->SetTabelas("processos_ipva_baixa");
        $alterar_baixa_ipva->SetCondicao("id = '" . $result_baixa_ipva->id . "'");
        $alterar_baixa_ipva->atualizar();
    }

    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}