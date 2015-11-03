<?php

/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$baixa_rod = new Query_model();
$baixa_rod->SetCampos("*");
$baixa_rod->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$baixa_rod->SetTabelas("processos_rodizios");
$baixa_rod->SetTipoRetorno(1);
$result_baixa_rod = $baixa_rod->get();

/* CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '6' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] = $tarefas->get();

/* CONSULTA TODOS OS ANEXOS DESTE PROCESSO */
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '" . $this->uri->segment(4) . "' AND id_nome_processo = '6' ");
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
    
    //debug($consulta_tarefas,true);
    
    /******CONSULTA E INSERE A PARTE DO DEDO DURO***** */
        //MONTA O TEXTO COMPLEMENTO CASO O ALERTA FOR INSERIDO
        $complemento = ' O alera ';
        if ($consulta_tarefas->id_item == 29) {
            $complemento.= '<b> Aguardando resposta </b>';
        }
        if ($consulta_tarefas->id_item == 28) {
            $complemento.= ' <b> Aguardando para levar os documentos </b>';
        }
        if ($consulta_tarefas->id_item == 27) {
            $complemento.= '<b> Faltando Documento </b>';
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
    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/');
}

/* MONTA OS PADROS SO CHECKLIST */
if (count($result_baixa_rod) == 0) {
    $select = 0;
    $dados['condutor'] = $dados['form']['condutor'];
    $dados['requerimento'] = array('selec' => $select, 'vl' => 'Requerimento de rodizio (PICO)');
    $dados['laudo_anexo9_detran'] = array('selec' => $select, 'vl' => 'Laudo medico detran + ANEXO 9 + CNH Detran');
    $dados['laudo_anexo9_sus'] = array('selec' => $select, 'vl' => 'Laudo medico SUS + ANEXO 9 + Declaração SUS');
    $dados['licenciamento'] = array('selec' => $select, 'vl' => 'Licenciamento Frente e Verso');
    $dados['rg_cpf'] = array('selec' => $select, 'vl' => 'RG e CPF (BENEFICIOARIO E REPRESENTANTE LEGAL)');
    $dados['comprov_end'] = array('selec' => $select, 'vl' => 'Comprovante de endereço atual');
    $dados['curatela'] = array('selec' => $select, 'vl' => 'Curatela Interdição (Quando maior de idade ou incapaz)');
    $dados['status'] = "0";
    $dados['protocolo'] = "";
    $dados['form']['status'] = 0;
} else {
    $dados['condutor'] = $result_baixa_rod->condutor;
    $dados['requerimento'] = array('selec' => $result_baixa_rod->requerimento, 'vl' => 'Requerimento de rodizio (PICO)');
    if($dados['condutor'] == 0){
        $dados['laudo_anexo9_sus'] = array('selec' => $result_baixa_rod->laudo_anexo9, 'vl' => 'Laudo medico SUS + ANEXO 9 + Declaração SUS');
        $dados['laudo_anexo9_detran'] = array('selec' => 0, 'vl' => 'Laudo medico detran + ANEXO 9 + CNH Detran');
    }else{
        $dados['laudo_anexo9_detran'] = array('selec' => $result_baixa_rod->laudo_anexo9, 'vl' => 'Laudo medico detran + ANEXO 9 + CNH Detran');
        $dados['laudo_anexo9_sus'] = array('selec' => 0, 'vl' => 'Laudo medico SUS + ANEXO 9 + Declaração SUS');
    }
    $dados['licenciamento'] = array('selec' => $result_baixa_rod->licenciamento, 'vl' => 'Licenciamento Frente e Verso');
    $dados['rg_cpf'] = array('selec' => $result_baixa_rod->rg_cpf, 'vl' => 'RG e CPF (BENEFICIOARIO E REPRESENTANTE LEGAL)');
    $dados['comprov_end'] = array('selec' => $result_baixa_rod->comprov_end, 'vl' => 'Comprovante de endereço atual');
    $dados['curatela'] = array('selec' => $result_baixa_rod->curatela, 'vl' => 'Curatela Interdição (Quando maior de idade ou incapaz)');
    $dados['status'] = $result_baixa_rod->status;
    $dados['protocolo'] = $result_baixa_rod->protocolo;
    $dados['form']['status'] = $result_baixa_rod->status;
}

/* PADRÂO DO SATATUS DO ITEM */
$dados['status'] = 4;
$dados['item'][29] = 'Aguardando resposta';
$dados['item'][28] = 'Aguardando para levar os documentos';
$dados['item'][27] = 'Faltando Documento';

/* PADRÂO DOS SELECTS */
$dados['conduntor_select'] = array("Não condutor", 'Sim condutor');
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
    $monta['id_nome_processo'] = '6';
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
    $requerimento = 0;
    $laudo_anexo9 = 0;
    $licenciamento = 0;
    $rg_cpf = 0;
    $comprov_end = 0;
    $curatela = 0;

    if (isset($post['campo'])) {
        foreach ($post['campo'] as $key => $value) {
            if ($value == 'Requerimento de rodizio (PICO)') {
                $requerimento = 1;
            }
            if ($value == 'Licenciamento Frente e Verso') {
                $licenciamento = 1;
            }
            if ($value == 'Laudo medico SUS + ANEXO 9 + Declaração SUS') {
                $laudo_anexo9 = 1;
            }
            if ($value == 'Laudo medico detran + ANEXO 9 + CNH Detran') {
                $laudo_anexo9 = 1;
            }
            if ($value == 'RG e CPF (BENEFICIOARIO E REPRESENTANTE LEGAL)') {
                $rg_cpf = 1;
            }
            if ($value == 'Comprovante de endereço atual') {
                $comprov_end = 1;
            }
            if ($value == 'Curatela Interdição (Quando maior de idade ou incapaz)') {
                $curatela = 1;
            }
        }
    }


    $campos_ipva = array();
    $campos_ipva['condutor'] = $post['condutor_nome'];
    $campos_ipva['requerimento'] = $requerimento;
    $campos_ipva['laudo_anexo9'] = $laudo_anexo9;
    $campos_ipva['licenciamento'] = $licenciamento;
    $campos_ipva['rg_cpf'] = $rg_cpf;
    $campos_ipva['comprov_end'] = $comprov_end;
    $campos_ipva['curatela'] = $curatela;
    $campos_ipva['status'] = $post['status'];
    $campos_ipva['id_processo'] = $this->uri->segment(4);
    $campos_ipva['protocolo'] = $post['protocolo'];
    

    if (count($result_baixa_rod) == 0) {
        $inserir_baixa_ipva = new Query_model();
        $inserir_baixa_ipva->SetCampos($campos_ipva);
        $inserir_baixa_ipva->SetTabelas("processos_rodizios");
        $inserir_baixa_ipva->inserir();
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
        if ($post['item'] == 29) {
            $complemento.= '<b> Aguardando resposta </b>';
        }
        if ($post['item'] == 28) {
            $complemento.= ' Aguardando para levar os documentos ';
        }
        if ($post['item'] == 27) {
            $complemento.= ' Faltando Documento ';
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
        if ($post['item'] == 29) {
            $complemento.= '<b> Aguardando resposta </b>';
        }
        if ($post['item'] == 28) {
            $complemento.= ' Aguardando para levar os documentos ';
        }
        if ($post['item'] == 27) {
            $complemento.= ' Faltando Documento ';
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
        
        $alterar_baixa_ipva = new Query_model();
        $alterar_baixa_ipva->SetCampos($campos_ipva);
        $alterar_baixa_ipva->SetTabelas("processos_rodizios");
        $alterar_baixa_ipva->SetCondicao("id = '" . $result_baixa_rod->id . "'");
        $alterar_baixa_ipva->atualizar();
    }

    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}