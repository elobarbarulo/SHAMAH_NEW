<?php

/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$ipva = new Query_model();
$ipva->SetCampos("*");
$ipva->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$ipva->SetTabelas("processos_ipva");
$ipva->SetTipoRetorno(1);
$result_ipva = $ipva->get();

/*CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '5' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] =$tarefas->get();

/*CONSULTA TODOS OS ANEXOS DESTE PROCESSO*/
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '".$this->uri->segment(4)."' AND id_nome_processo = '5' ");
$anexos->SetTipoRetorno(0);
$anexos->SetTabelas("processos_anexos");
$dados['arquivos'] = $anexos->get();


/* VERIFICA SE A TAREFA PARA SER EXCLUIDA */
if($this->uri->segment(6) == 'tarefas' && $this->uri->segment(7)!= "" && $this->uri->segment(8)!= ""){
    $apagar_tareafa = new Query_model();
    $apagar_tareafa->SetCondicao("id = '".$this->uri->segment(7)."'");
    $apagar_tareafa->SetTabelas("alerta");
    $apagar_tareafa->excluir();
    redirect($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/');
}

/* MONTA OS PADROS SO CHECKLIST */
if (count($result_ipva) == 0) {
    $select = 0;
    $dados['condutor'] = $dados['form']['condutor'];
    $dados['requerimento_ipva'] = array('selec' => $select, 'vl' => 'Requerimento de Ipva');
    $dados['rg_cpf'] = array('selec' => $select, 'vl' => '1 Copia de RG e CPF autenticados');
    $dados['laudo_detran'] = array('selec' => $select, 'vl' => 'Laudo medico detran + anexo9 + CNH Detran');
    $dados['laudo_sus'] = array('selec' => $select, 'vl' => 'Laudo medico SUS + anexo9 + Declaração do SUS');
    $dados['rg_cpf'] = array('selec' => $select, 'vl' => '1 Copia de RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)');
    $dados['curatela'] = array('selec' => $select, 'vl' => 'Curatela interdico (Copia simples)');
    $dados['mandado_seguranca'] = array('selec' => $select, 'vl' => 'Mandado de Segurança');
    $dados['comprov_end'] = array('selec' => $select, 'vl' => 'Comprovante de endereço atual (Copia simples)');
    $dados['licenciamento'] = array('selec' => $select, 'vl' => 'Licenciamento Frente e Verso');
    $dados['comprov_venda'] = array('selec' => $select, 'vl' => 'Comprovante de Venda Frente e Verso');
    $dados['nota_fiscal'] = array('selec' => $select, 'vl' => 'Nota fiscal do carro');
    $dados['declaracao_adaptacao'] = array('selec' => $select, 'vl' => 'Declaralção de adaptação (Quando necessario)');
    $dados['declaracao_ipva'] = array('selec' => $select, 'vl' => 'Declaração do IPVA');
    $dados['form']['status'] = 0;
    $dados['numero_protocolo'] = 0;
} else {
    $dados['condutor'] = $result_ipva->condutor;
    $dados['requerimento_ipva'] = array('selec' => $result_ipva->requerimento_ipva, 'vl' => 'Requerimento de Ipva');
    if($result_ipva->condutor == 1){
        $dados['rg_cpf'] = array('selec' => $result_ipva->rg_cpf, 'vl' => '1 Copia de RG e CPF autenticados');
        $dados['laudo_detran'] = array('selec' => $result_ipva->laudo_ipva_anexo9, 'vl' => 'Laudo medico detran + anexo9 + CNH Detran');
        $dados['laudo_sus'] = array('selec' => 0, 'vl' => 'Laudo medico SUS + anexo9 + Declaração do SUS');
    }else{
        $dados['laudo_detran'] = array('selec' => 0, 'vl' => 'Laudo medico detran + anexo9 + CNH Detran');
        $dados['laudo_sus'] = array('selec' => $result_ipva->laudo_ipva_anexo9, 'vl' => 'Laudo medico SUS + anexo9 + Declaração do SUS');
        $dados['rg_cpf'] = array('selec' => $result_ipva->rg_cpf, 'vl' => '1 Copia de RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)');
        $dados['curatela'] = array('selec' => $result_ipva->curatela, 'vl' => 'Comprovante de endereço atual (Copia simples)');
        $dados['mandado_seguranca'] = array('selec' => $result_ipva->mandado_seguranca, 'vl' => 'Mandado de Segurança');
    }
    $dados['comprov_end'] = array('selec' => $result_ipva->comprov_end, 'vl' => 'Comprovante de endereço');
    $dados['licenciamento'] = array('selec' => $result_ipva->licenciamento, 'vl' => 'Licenciamento Frente e Verso');
    $dados['comprov_venda'] = array('selec' => $result_ipva->comprov_venda, 'vl' => 'Comprovante de Venda Frente e Verso');
    $dados['nota_fiscal'] = array('selec' => $result_ipva->nota_fiscal, 'vl' => 'Nota fiscal do carro');
    $dados['declaracao_adaptacao'] = array('selec' => $result_ipva->declaracao_adaptacao, 'vl' => 'Declaralção de adaptação (Quando necessario)');
    $dados['declaracao_ipva'] = array('selec' => $result_ipva->declaracao_ipva, 'vl' => 'Declaração do IPVA');
    $dados['form']['status'] = $result_ipva->status;
    $dados['numero_protocolo'] = $result_ipva->protocolo;
}

/* PADRÂO DO SATATUS DO ITEM */
$dados['status'] = 3;
$dados['item'][17] = 'Aguardando resposta';
$dados['item'][16] = 'Aguardando para levar os documentos';
$dados['item'][15] = 'Faltando Documento';
/* PADRÂO DOS SELECTS */
$dados['conduntor_select'] = array("Não condutor", 'Sim condutor');
$dados['status_select'] = array('Pendente', 'Resposta Notificação', 'Documentos preparados', "Deferido");
$dados['bt'] = 'Salvar';

/* SE FOR PRECIONADO O BOTÂO DO FORM */
$post = $this->input->post();
if ($post) {
   
    $session = $this->session->all_userdata();
    //TABELA ALETAS
    $monta = array();
    $monta['obs']               = $post['alerta_mensagem'];
    $monta['id_processo'] = $this->uri->segment(4);
    $monta['id_usuarios']       = $session['usuario']->id;
    $monta['id_item']           = $post['item'];
    $monta['id_nome_processo']  = '5';
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
    $requerimento_ipva= 0;
    $rg_cpf= 0;
    $laudo_ipva_anexo9= 0;
    $rg_cpf= 0;
    $curatela= 0;
    $mandado_seguranca= 0;
    $comprov_end= 0;
    $licenciamento= 0;
    $comprov_venda= 0;
    $nota_fiscal= 0;
    $declaracao_adaptacao= 0;
    $declaracao_ipva= 0;

    foreach ($post['campo'] as $key => $value) {
        if ($value == 'Requerimento de Ipva') {
            $requerimento_ipva = 1;
        }
        if ($value == '1 Copia de RG e CPF autenticados') {
            $rg_cpf = 1;
        }
        if ($value == 'Laudo medico detran + anexo9 + CNH Detran') {
            $laudo_ipva_anexo9 = 1;
        }
        if ($value == 'Laudo medico SUS + anexo9 + Declaração do SUS') {
            $laudo_ipva_anexo9 = 1;
        }
        if ($value == '1 Copia de RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)') {
            $rg_cpf = 1;
        }
        if ($value == 'Comprovante de endereço atual (Copia simples)') {
            $comprov_end = 1;
        }
        if ($value == 'Curatela interdico (Copia simples)') {
            $curatela = 1;
        }
        if ($value == 'Mandado de Segurança') {
            $mandado_seguranca = 1;
        }
         
        if ($value == 'Comprovante de Venda Frente e Verso') {
            $comprov_venda = 1;
        }
        if ($value == 'Nota fiscal do carro') {
            $nota_fiscal = 1;
        }
        if ($value == 'Declaralção de adaptação (Quando necessario)') {
            $declaracao_adaptacao = 1;
        }
        if ($value == 'Declaração do IPVA') {
            $declaracao_ipva = 1;
        }
    }
    
    
        $campos_processo_ipva = array();
        $campos_processo_ipva['condutor'] = $post['condutor_nome'];
        $campos_processo_ipva['requerimento_ipva'] = $requerimento_ipva;
        $campos_processo_ipva['laudo_ipva_anexo9'] = $laudo_ipva_anexo9;
        $campos_processo_ipva['rg_cpf'] = $rg_cpf;
        $campos_processo_ipva['comprov_end'] = $comprov_end;
        $campos_processo_ipva['licenciamento'] = $licenciamento;
        $campos_processo_ipva['comprov_venda'] = $comprov_venda;
        $campos_processo_ipva['nota_fiscal'] = $nota_fiscal;
        $campos_processo_ipva['declaracao_adaptacao'] = $declaracao_adaptacao;
        $campos_processo_ipva['declaracao_ipva'] = $declaracao_ipva;
        $campos_processo_ipva['curatela'] = $curatela;
        $campos_processo_ipva['mandado_seguranca'] = $mandado_seguranca;        
        $campos_processo_ipva['status'] = $post['status'];
        $campos_processo_ipva['protocolo'] = "";
        $campos_processo_ipva['id_processo'] = $this->uri->segment(4);
        
    if (count($result_ipva) == 0) {
        $inserir_ipvaa = new Query_model();
        $inserir_ipvaa->SetCampos($campos_processo_ipva);
        $inserir_ipvaa->SetTabelas("processos_ipva");
        $inserir_ipvaa->inserir();
    } else {
        $alterar_ipvaa = new Query_model();
        $alterar_ipvaa->SetCampos($campos_processo_ipva);
        $alterar_ipvaa->SetTabelas("processos_ipva");
        $alterar_ipvaa->SetCondicao("id = '" . $result_ipva->id . "'");
        $alterar_ipvaa->atualizar();
    }


    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}