<?php

$cnh = new Query_model();
$cnh->SetCampos("*");
$cnh->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$cnh->SetTabelas("processos_cnh");
$cnh->SetTipoRetorno(1);
$result_cnh = $cnh->get();


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
//debug($dados['arquivos']);

/* VERIFICA SE A TAREFA PARA SER EXCLUIDA */
if ($this->uri->segment(6) == 'tarefas' && $this->uri->segment(7) != "" && $this->uri->segment(8) != "") {
       $apagar_tareafa = new Query_model();
    $apagar_tareafa->SetCondicao("id = '" . $this->uri->segment(7) . "'");
    $apagar_tareafa->SetTabelas("alerta");
    $apagar_tareafa->SetCampos("*");
    $apagar_tareafa->SetTipoRetorno(1);
    $consulta_tarefas = $apagar_tareafa->get();
    /******CONSULTA E INSERE A PARTE DO DEDO DURO***** */
        
        //MONTA O TEXTO COMPLEMENTO CASO O ALERTA FOR INSERIDO
        $complemento = ' O alera ';
        if ($consulta_tarefas->id_item == 1) {
            $complemento.= '<b> detran </b>';
        }
        if ($consulta_tarefas->id_item == 6) {
            $complemento.= ' <b> Aprovação </b>';
        }
        if ($consulta_tarefas->id_item == 5) {
            $complemento.= '<b> Processo Fisico </b>';
        }
        
        if ($consulta_tarefas->id_item == 4) {
            $complemento.= '<b> Processo agendamento pratico </b>';
        }
           
        if ($consulta_tarefas->id_item == 3) {
            $complemento.= '<b> Encaminhamento auto escola </b>';
        }  
        if ($consulta_tarefas->id_item == 2) {
            $complemento.= '<b> Clinica </b>';
        }           
        

        
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        if ($this->uri->segment(5) == 'editar') {
            $nome_processo = ' NOTA ';
        } else {
            $nome_processo = texto_log($this->uri->segment(5));
        }
        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = $complemento ."</b> do processo  <b>" . texto_log($this->uri->segment(5)) . "</b>  foi finalizado "
                . " pelo usuário <b>" . $session['usuario']->nome . '</b> no dia <b>' . date("d/m/Y") . "</b> às <b>" . date("h:i:s") ."</b>";

        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /*         * ****FIM DA PARTE DO DEDO DURO**** */
        $apagar_tareafa->excluir();
    redirect($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/');
}
/* PADRÂO DO SATATUS DO ITEM */
$dados['status_select'] = 4;
$dados['item'][1] = 'detran';
$dados['item'][6] = 'Aprovação';
$dados['item'][5] = 'Processo Fisico';
$dados['item'][4] = 'Processo agendamento pratico';
$dados['item'][3] = 'Encaminhamento auto escola';
$dados['item'][2] = 'Clinica';

/* PADRÂO DOS SELECTS */
$dados['status_select'] = array('Pendente', 'Resposta Notificação', 'Documentos preparados', "Deferido");
$dados['bt'] = 'Salvar';
$dados['select_sim_nao'] = array('Não', 'Sim');
$dados['select_servico_auto_escola'] = array('1' => 'Só Aula', '2' => 'Aulas + exames');
$dados['select_unidade'] = array('1' => 'Vila Guilerme', '2' => 'Aricanduva');

if (count($result_cnh) == 0) {
    $dados['detran_dt'] = '';
    $dados['detran_hr'] = '';
    $dados['detran_unidade'] = '';
    //*****
    $dados['clinica_dt'] = '';
    $dados['clinica_hr'] = '';
    $dados['clinica_unidade'] = '';
    //*****
    $dados['encaminhamento_auto_escola'] = '0';
    $dados['encaminhamento_auto_escola_data'] = '';
    $dados['possui_carro_automatico'] = '0';
    $dados['servico_auto_escola'] = '0';

    $dados['enc_proc_agendamento_aulas_data'] = '';
    $dados['enc_proc_agendamento_aulas_passou'] = '0';

    $dados['enc_proc_fisico_unidade'] = '1';
    $select = 0;
    $dados['enc_proc_fisico_panilha_detran'] = array('selec' => $select, 'vl' => 'Planilha Dentran');
    $dados['enc_proc_fisico_panilha_renach'] = array('selec' => $select, 'vl' => 'Renarch (RG, CPF,CNH)');
    $dados['enc_proc_fisico_panilha_comp_end'] = array('selec' => $select, 'vl' => 'Comprovante de endereço');
    $dados['enc_proc_fisico_procuracao'] = array('selec' => $select, 'vl' => 'Procuração ');
    $dados['enc_proc_fisico_laudo'] = array('selec' => $select, 'vl' => 'Laudo');
    
    $dados['enc_proc_fisico_confirmacao_recebi'] = '1';
    $dados['aprovado'] = '1';
    $dados['aprovado_data'] = '';
    $dados['aprovado_anexo'] = '';
    $dados['aprovado_validade'] = '';
    $dados['reprovado_data'] = '';
    $dados['reprovado_valor'] = '';
    $dados['form']['status'] = '';
}else{
    $dados['detran_dt'] = data_br($result_cnh->detran_dt);
    $dados['detran_hr'] = $result_cnh->detran_hr;
    $dados['detran_unidade'] = $result_cnh->detran_unidade;

    $dados['clinica_dt'] = data_br($result_cnh->clinica_dt);
    $dados['clinica_hr'] = $result_cnh->clinica_hr;
    $dados['clinica_unidade'] = $result_cnh->clinica_unidade;

    $dados['encaminhamento_auto_escola'] = $result_cnh->encaminhamento_auto_escola;
    $dados['encaminhamento_auto_escola_data'] = data_br($result_cnh->encaminhamento_auto_escola_data);
    $dados['possui_carro_automatico'] = $result_cnh->possui_carro_automatico;
    $dados['servico_auto_escola'] = $result_cnh->servico_auto_escola;;

    $dados['enc_proc_agendamento_aulas_data'] = data_br($result_cnh->enc_proc_agendamento_aulas_data);
    $dados['enc_proc_agendamento_aulas_passou'] =$result_cnh->enc_proc_agendamento_aulas_passou;

    $dados['enc_proc_fisico_unidade'] = $result_cnh->enc_proc_fisico_unidade;
    
    $dados['enc_proc_fisico_panilha_detran'] = array('selec' => $result_cnh->enc_proc_fisico_panilha_detran, 'vl' => 'Planilha Dentran');
    $dados['enc_proc_fisico_panilha_renach'] = array('selec' => $result_cnh->enc_proc_fisico_panilha_renach, 'vl' => 'Renarch (RG, CPF,CNH)');
    $dados['enc_proc_fisico_panilha_comp_end'] = array('selec' => $result_cnh->enc_proc_fisico_panilha_comp_end, 'vl' => 'Comprovante de endereço');
    $dados['enc_proc_fisico_procuracao'] = array('selec' => $result_cnh->enc_proc_fisico_procuracao, 'vl' => 'Procuração ');
    $dados['enc_proc_fisico_laudo'] = array('selec' => $result_cnh->enc_proc_fisico_laudo, 'vl' => 'Laudo');
    
    $dados['enc_proc_fisico_confirmacao_recebi'] = $result_cnh->enc_proc_fisico_confirmacao_recebi;
    $dados['aprovado'] = $result_cnh->aprovado;
    $dados['aprovado_data'] = data_br($result_cnh->aprovado_data);
    $dados['aprovado_anexo'] = $result_cnh->aprovado_anexo;
    $dados['aprovado_validade'] = $result_cnh->aprovado_validade;
    $dados['reprovado_data'] = data_br($result_cnh->reprovado_data);
    $dados['reprovado_valor'] =$result_cnh->reprovado_valor;
    $dados['form']['status'] =$result_cnh->status;
}

/* SE FOR PRECIONADO O BOTÂO DO FORM */
$post = $this->input->post();
if ($post) {
    debug($post['status']);
    $session = $this->session->all_userdata();
    //TABELA ALETAS
    $monta = array();
    $monta['obs']               = $post['alerta_mensagem'];
    $monta['id_processo'] = $this->uri->segment(4);
    $monta['id_usuarios']       = $session['usuario']->id;
    $monta['id_item']           = $post['item'];
    $monta['id_nome_processo']  = '1';
    $monta['data']              = data_banco($post['alerta_data']);
    $monta['status']            = '0';
    //Salvar    
    $salvar_alerta = new Query_model();
    $salvar_alerta->SetCampos($monta);
    $salvar_alerta->SetTabelas("alerta");
    if ($post['status'] != 3) {
        $salvar_alerta->inserir();    
    }
    

    
    //TABELA PROCESSOS IPI    
    $enc_proc_fisico_panilha_detran = 0;
    $enc_proc_fisico_panilha_renach = 0;
    $enc_proc_fisico_panilha_comp_end = 0;
    $enc_proc_fisico_procuracao = 0;
    $enc_proc_fisico_laudo = 0;
    if (isset($post['campo'])) {
        foreach ($post['campo'] as $key => $value) {
            if ($value == 'Planilha Dentran') {$enc_proc_fisico_panilha_detran = 1;}
            if ($value == 'Renarch (RG, CPF,CNH)') {$enc_proc_fisico_panilha_renach = 1;}
            if ($value == 'Comprovante de endereço') {$enc_proc_fisico_panilha_comp_end = 1;}
            if ($value == 'Procuração') {$enc_proc_fisico_procuracao = 1;}
            if ($value == 'Laudo') {$enc_proc_fisico_laudo = 1;}
        }
    }

    $campos_cnh = array();
    $campos_cnh['id_processo'] = $this->uri->segment(4);
    $campos_cnh['detran_dt'] = data_banco($post['detran_dt']);
    $campos_cnh['detran_hr'] =  $post['detran_hr'];
    $campos_cnh['detran_unidade'] =  $post['detran_unidade'];
    $campos_cnh['clinica_dt'] =  data_banco($post['clinica_dt']);
    $campos_cnh['clinica_hr'] =  $post['clinica_hr'];
    $campos_cnh['clinica_unidade'] =  $post['clinica_unidade'];
    
    $campos_cnh['encaminhamento_auto_escola'] =  $post['encaminhamento_auto_escola'];
    $campos_cnh['encaminhamento_auto_escola_data'] =  data_banco($post['encaminhamento_auto_escola_data']);
    $campos_cnh['possui_carro_automatico'] =  $post['possui_carro_automatico'];
    $campos_cnh['servico_auto_escola'] =  $post['servico_auto_escola'];
    $campos_cnh['enc_proc_agendamento_aulas_data'] =  data_banco($post['enc_proc_agendamento_aulas_data']);
    $campos_cnh['enc_proc_agendamento_aulas_passou'] =  $post['enc_proc_agendamento_aulas_passou'];
    $campos_cnh['enc_proc_fisico_unidade'] = $post['enc_proc_fisico_unidade'];
    $campos_cnh['enc_proc_fisico_panilha_detran'] = $enc_proc_fisico_panilha_detran;
    $campos_cnh['enc_proc_fisico_panilha_renach'] =  $enc_proc_fisico_panilha_renach;
    $campos_cnh['enc_proc_fisico_panilha_comp_end'] =  $enc_proc_fisico_panilha_comp_end;
    $campos_cnh['enc_proc_fisico_procuracao'] =   $enc_proc_fisico_procuracao;
    $campos_cnh['enc_proc_fisico_laudo'] =  $enc_proc_fisico_laudo;
    $campos_cnh['enc_proc_fisico_confirmacao_recebi'] =  $post['enc_proc_fisico_confirmacao_recebi'];
    $campos_cnh['aprovado'] =  $post['aprovado'];
    $campos_cnh['aprovado_data'] =  data_banco($post['aprovado_data']);
    $campos_cnh['aprovado_anexo'] = "";
    $campos_cnh['aprovado_validade'] =  data_banco($post['aprovado_validade']);
    $campos_cnh['reprovado_data'] =  data_banco($post['reprovado_data']);
    $campos_cnh['reprovado_valor'] = $post['reprovado_valor'];
    $campos_cnh['status'] =  $post['status'];
   
    if (count($result_cnh) == 0) {
    /******CONSULTA E INSERE A PARTE DO DEDO DURO*******/
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        if ($this->uri->segment(5) == 'editar') {
            $nome_processo = ' NOTA ';
        } else {
            $nome_processo = texto_log($this->uri->segment(5));
        }
        //MONTA O TEXTO COMPLEMENTO CASO O ALERTA FOR INSERIDO
        $complemento = ' Criando um alerta ';
        if ($post['item'] == 1) {
            $complemento.= '<b> detran </b>';
        }
        if ($post['item'] == 6) {
            $complemento.= ' Aprovação ';
        }
        if ($post['item'] == 5) {
            $complemento.= ' Processo Fisico ';
        }
        if ($post['item'] == 4) {
            $complemento.= ' Processo agendamento pratico ';
        }
        if ($post['item'] == 3) {
            $complemento.= ' Encaminhamento auto escola ';
        }
        if ($post['item'] == 2) {
            $complemento.= ' Clinica ';
        }

        $complemento.=' para a data <b>' . data_br($monta['data']) . '</b> com o mensagem <b>' . $monta['obs'] . "</b>";

        //Verifica os tipos de status para ver se tem complemento ou não
        if ($post['status'] == '0') {
            $status = 'Pendente';
        }
        if ($post['status'] == '3') {
            $status = 'Deferido';
            $complemento = "";
        }

        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "O processo <b>" . texto_log($this->uri->segment(5)) . "</b>  foi Iniciado "
                . " pelo usuário <b>" . $session['usuario']->nome . '</b> no dia <b>' . date("d/m/Y") . "</b> às <b>" . date("h:i:s") ."</b>"
                . " deixando  o status do processo como <b>" . $status ." </b> ". $complemento;
                
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /*         * ****FIM DA PARTE DO DEDO DURO**** */
        
        $inserir_cnh = new Query_model();
        $inserir_cnh->SetCampos($campos_cnh);
        $inserir_cnh->SetTabelas("processos_cnh");
        $inserir_cnh->inserir();
    } else {
        /******CONSULTA E INSERE A PARTE DO DEDO DURO*******/
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        if ($this->uri->segment(5) == 'editar') {
            $nome_processo = ' NOTA ';
        } else {
            $nome_processo = texto_log($this->uri->segment(5));
        }
        //MONTA O TEXTO COMPLEMENTO CASO O ALERTA FOR INSERIDO
        $complemento = ' Criando um alerta ';
        if ($post['item'] == 1) {
            $complemento.= '<b> detran </b>';
        }
        if ($post['item'] == 6) {
            $complemento.= ' Aprovação ';
        }
        if ($post['item'] == 5) {
            $complemento.= ' Processo Fisico ';
        }
        if ($post['item'] == 4) {
            $complemento.= ' Processo agendamento pratico ';
        }
        if ($post['item'] == 3) {
            $complemento.= ' Encaminhamento auto escola ';
        }
        if ($post['item'] == 2) {
            $complemento.= ' Clinica ';
        }

        $complemento.=' para a data <b>' . data_br($monta['data']) . '</b> com o mensagem <b>' . $monta['obs'] . "</b>";

        //Verifica os tipos de status para ver se tem complemento ou não
        if ($post['status'] == '0') {
            $status = 'Pendente';
        }
        if ($post['status'] == '3') {
            $status = 'Deferido';
            $complemento = "";
        }

        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "O processo <b>" . texto_log($this->uri->segment(5)) . "</b>  foi Alterado "
                . " pelo usuário <b>" . $session['usuario']->nome . '</b> no dia <b>' . date("d/m/Y") . "</b> às <b>" . date("h:i:s") ."</b>"
                . " deixando  o status do processo como <b>" . $status ." </b> ". $complemento;
                
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /*         * ****FIM DA PARTE DO DEDO DURO**** */
        $alterar_cnh = new Query_model();
        $alterar_cnh->SetCampos($campos_cnh);
        $alterar_cnh->SetTabelas("processos_cnh");
        $alterar_cnh->SetCondicao("id = '" . $result_cnh->id . "'");
        $alterar_cnh->atualizar();
    }

    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}


