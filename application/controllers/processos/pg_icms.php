<?php

/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$icms = new Query_model();
$icms->SetCampos("*");
$icms->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$icms->SetTabelas("processos_icms");
$icms->SetTipoRetorno(1);
$result_icms = $icms->get();

/* CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '4' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] = $tarefas->get();

/* CONSULTA TODOS OS ANEXOS DESTE PROCESSO */
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '" . $this->uri->segment(4) . "' AND id_nome_processo = '4' ");
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
if (count($result_icms) == 0) {
    $select = 0;
    $dados['condutor'] = $dados['form']['condutor'];
    $dados['form']['status'] = 0;
    $dados['numero_protocolo'] = 0;
    $dados['tipo_compra'] = 1;
    //**********    
    $dados['requerimento_icms'] = array('selec' => $select, 'vl' => 'Requerimento ICMS Autenticado 2 vias');
    $dados['procuracao_icms'] = array('selec' => $select, 'vl' => '1 copia autenticada da procuração do ICMS');
    $dados['procuracao_shamah'] = array('selec' => $select, 'vl' => '1 copia simples dos procurações da SHAMAH');
    $dados['cartas_originais_ipi'] = array('selec' => $select, 'vl' => 'Cartas originais de IPI (Para apresentar e voltar para o escritorio)');
    $dados['carta_concessionaria'] = array('selec' => $select, 'vl' => 'Carta da concessionaria');
    $dados['carta_financiamento'] = array('selec' => $select, 'vl' => 'Carta Financiamento');    
    $dados['extrato_bancario'] = array('selec' => $select, 'vl' => '1 extrato bancario original / se impresso contendo carimbo e assinatura do gerente do banco(Contendo valor a ser dados a vista ou entrada)');
    $dados['carta_ip'] = array('selec' => $select, 'vl' => '1 copia simples da carta de IPI');    
    //Condutor
    $dados['laudo_detran'] = array('selec' => $select, 'vl' => 'Laudo medico detran + anexo 9 + CNH Detran');
    $dados['rg_cpf_c'] = array('selec' => $select, 'vl' => 'Copia do RG e CPF autenticados'); //Condutor
    $dados['comprov_endereco_c'] = array('selec' => $select, 'vl' => 'Copia autenticade / original do comprovante de endereço atual(beneficiario)');
    $dados['comprovante_renda_c'] = array('selec' => $select, 'vl' => '1 Copia autenticada / original do comprovante de renda atual(Beneficiario ou Representante legal)');
    $dados['declaracoes_imposto_renda_c'] = array('selec' => $select, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)');
    //Não Condutor
    $dados['laudo_sus'] = array('selec' => $select, 'vl' => 'Laudo SUS + anexo 9 + Declarações do SUS');
    $dados['rg_cpf_n_c'] = array('selec' => $select, 'vl' => 'Copia do RG e CPF autenticados(Beneficiario e Representante legal)'); //Não Condutor
    $dados['comprov_endereco_n_c'] = array('selec' => $select, 'vl' => 'Copia autenticade / original do comprovante de endereço atual(beneficiario ou Representante Legal)');
    $dados['curatela'] = array('selec' => $select, 'vl' => 'Copia simples da curatela, interdição (Quando o beneficiario é maior de idade e não assina ou incapaz)');
    $dados['comprovante_renda_n_c'] = array('selec' => $select, 'vl' => '1 Copia autenticada / original do comprovante de renda atual');
    $dados['declaracoes_imposto_renda_n_c'] = array('selec' => $select, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)(Beneficiario e Representante legal)');
    //**********
    $dados['aj_declaracao'] = array('selec' => $select, 'vl' => 'Declaração de ajuda financeira');
    $dados['aju_rg_cpf'] = array('selec' => $select, 'vl' => 'Copia do RG e CPF autenticados');
    $dados['aju_comprov_renda'] = array('selec' => $select, 'vl' => '1 copia autenticada / original comprovante de renda atual (Ajudador)');
    $dados['aju_declaracoes_imposto_renda'] = array('selec' => $select, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)');
    $dados['aju_certidao_casamento'] = array('selec' => $select, 'vl' => 'Copia autenticada da certidão de casamento');
    //**********
    $dados['ced_veiculo_declaracao'] = array('selec' => $select, 'vl' => 'Declaração cedendo o veiculo (reconhecer firma)');
    $dados['ced_veiculo_recibo'] = array('selec' => $select, 'vl' => 'Copia autenticada do recibo de compra e venda frente e verso(Veiculo cedido)');
    $dados['ced_veiculo_rg_cpf'] = array('selec' => $select, 'vl' => '1 copia autenticada do rg e CPF do atual dono do veiculo');
    //**********
    $dados['veic_pag_declaracao'] = array('selec' => $select, 'vl' => 'Declaração cedendo o veiculo e reconhecimento de firma');
    $dados['veic_pag_recibo'] = array('selec' => $select, 'vl' => 'copia autenticada do recibo de compra e venda Frente e verso (veiculo cedido)');
} else {
    $dados['condutor'] = $result_icms->condutor;
    $dados['form']['status'] = $result_icms->status;
    $dados['protocolo'] = $result_icms->protocolo;
    $dados['tipo_compra'] = $result_icms->tipo_compra;
    //**********    
    $dados['requerimento_icms'] = array('selec' => $result_icms->requerimento_icms, 'vl' => 'Requerimento ICMS Autenticado 2 vias');
    $dados['procuracao_icms'] = array('selec' => $result_icms->procuracao_icms, 'vl' => '1 copia autenticada da procuração do ICMS');
    $dados['procuracao_shamah'] = array('selec' => $result_icms->procuracao_shamah, 'vl' => '1 copia simples dos procurações da SHAMAH');
    $dados['cartas_originais_ipi'] = array('selec' => $result_icms->cartas_originais_ipi, 'vl' => 'Cartas originais de IPI (Para apresentar e voltar para o escritorio)');
    $dados['carta_ip'] = array('selec' => $result_icms->carta_ip, 'vl' => '1 copia simples da carta de IPI');
    $dados['extrato_bancario'] = array('selec' => $result_icms->extrato_bancario, 'vl' => '1 extrato bancario original / se impresso contendo carimbo e assinatura do gerente do banco(Contendo valor a ser dados a vista ou entrada)');
    $dados['carta_concessionaria'] = array('selec' => $result_icms->carta_concessionaria, 'vl' => 'Carta da concessionaria');
    $dados['carta_financiamento'] = array('selec' => $result_icms->carta_financiamento, 'vl' => 'Carta  Financiamento');
    //**********    
    $dados['laudo_detran'] = array('selec' => $result_icms->laudo_anexo9, 'vl' => 'Laudo medico detran + anexo 9 + CNH Detran');
    $dados['rg_cpf_c'] = array('selec' => $result_icms->rg_cpf, 'vl' => 'Copia do RG e CPF autenticados'); //Condutor
    $dados['comprov_endereco_c'] = array('selec' => $result_icms->comprov_endereco, 'vl' => 'Copia autenticade / original do comprovante de endereço atual(beneficiario)');
    $dados['declaracoes_imposto_renda_c'] = array('selec' => $result_icms->declaracoes_imposto_renda, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)');
    $dados['comprovante_renda_c'] = array('selec' => $result_icms->comprovante_renda, 'vl' => '1 Copia autenticada / original do comprovante de renda atual(Beneficiario ou Representante legal)');
    //**********    
    $dados['laudo_sus'] = array('selec' => $result_icms->laudo_anexo9, 'vl' => 'Laudo SUS + anexo 9 + Declarações do SUS');
    $dados['rg_cpf_n_c'] = array('selec' => $result_icms->rg_cpf, 'vl' => 'Copia do RG e CPF autenticados(Beneficiario e Representante legal)'); //Não Condutor
    $dados['comprov_endereco_n_c'] = array('selec' => $result_icms->comprov_endereco, 'vl' => 'Copia autenticade / original do comprovante de endereço atual(beneficiario ou Representante Legal)');
    $dados['curatela'] = array('selec' => $result_icms->curatela, 'vl' => 'Copia simples da curatela, interdição (Quando o beneficiario é maior de idade e não assina ou incapaz)');
    $dados['comprovante_renda_n_c'] = array('selec' => $result_icms->comprovante_renda, 'vl' => '1 Copia autenticada / original do comprovante de renda atual');
    $dados['declaracoes_imposto_renda_n_c'] = array('selec' => $result_icms->declaracoes_imposto_renda, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)(Beneficiario e Representante legal)');
    //**********
    $dados['aj_declaracao'] = array('selec' => $result_icms->aj_declaracao, 'vl' => 'Declaração de ajuda financeira');
    $dados['aju_rg_cpf'] = array('selec' => $result_icms->aju_rg_cpf, 'vl' => 'Copia do RG e CPF autenticados');
    $dados['aju_comprov_renda'] = array('selec' => $result_icms->aju_comprov_renda, 'vl' => '1 copia autenticada / original comprovante de renda atual (Ajudador)');
    $dados['aju_declaracoes_imposto_renda'] = array('selec' => $result_icms->aju_declaracoes_imposto_renda, 'vl' => 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)');
    $dados['aju_certidao_casamento'] = array('selec' => $result_icms->aju_certidao_casamento, 'vl' => 'Copia autenticada da certidão de casamento');
    //**********
    $dados['ced_veiculo_declaracao'] = array('selec' => $result_icms->ced_veiculo_declaracao, 'vl' => 'Declaração cedendo o veiculo (reconhecer firma)');
    $dados['ced_veiculo_recibo'] = array('selec' => $result_icms->ced_veiculo_recibo, 'vl' => 'Copia autenticada do recibo de compra e venda frente e verso(Veiculo cedido)');
    $dados['ced_veiculo_rg_cpf'] = array('selec' => $result_icms->ced_veiculo_rg_cpf, 'vl' => '1 copia autenticada do rg e CPF do atual dono do veiculo');
    //**********
    $dados['veic_pag_declaracao'] = array('selec' => $result_icms->veic_pag_declaracao, 'vl' => 'Declaração cedendo o veiculo e reconhecimento de firma');
    $dados['veic_pag_recibo'] = array('selec' => $result_icms->veic_pag_recibo, 'vl' => 'copia autenticada do recibo de compra e venda Frente e verso (veiculo cedido)');
}

/* PADRÂO DO SATATUS DO ITEM */
$dados['status'] = 3;
$dados['item'][14] = 'Aguardando resposta';
$dados['item'][13] = 'Aguardando para levar os documentos';
$dados['item'][12] = 'Faltando Documento';

/* PADRÂO DOS SELECTS */
$dados['conduntor_select'] = array("Não condutor", 'Sim condutor');
$dados['tipo_compra'] = array('1' => 'Ajuda Finaceira','2' => 'Cedendo o Veiculo', '3' => 'Veiculo parte do Pagamento',);
$dados['status_select'] = array('Pendente', 'Resposta Notificação', 'Documentos preparados', "Deferido");
$dados['bt'] = 'Salvar';



/* SE FOR PRECIONADO O BOTÂO DO FORM */
$post = $this->input->post();
if ($post) {
    
    $session = $this->session->all_userdata();
    //TABELA ALETAS
    $monta = array();
    $monta['obs'] = $post['alerta_mensagem'];
    $monta['id_processo'] = $this->uri->segment(4);
    $monta['id_usuarios'] = $session['usuario']->id;
    $monta['id_item'] = $post['item'];
    $monta['id_nome_processo'] = '4';
    $monta['data'] = data_banco($post['alerta_data']);
    $monta['status'] = '0';
    if ($post['status'] != 3) {
        $salvar_alerta = new Query_model();
        $salvar_alerta->SetCampos($monta);
        $salvar_alerta->SetTabelas("alerta");   
        $salvar_alerta->inserir();
    }
        //TABELA PROCESSOS IPI    
        $requerimento_icms= 0;
        $laudo_anexo9= 0;
        $rg_cpf= 0;
        $comprov_endereco= 0;
        $carta_ip= 0;
        $curatela= 0;
        $comprovante_renda= 0;
        $extrato_bancario= 0;
        $carta_concessionaria= 0;
        $carta_financiamento= 0;
        $declaracoes_imposto_renda= 0;
        $procuracao_icms= 0;
        $procuracao_shamah= 0;
        $cartas_originais_ipi = 0;        
        $aj_declaracao= 0;
        $aju_rg_cpf= 0;
        $aju_comprov_renda= 0;
        $aju_declaracoes_imposto_renda= 0;
        $aju_certidao_casamento= 0;        
        $ced_veiculo_declaracao= 0;
        $ced_veiculo_recibo= 0;
        $ced_veiculo_rg_cpf= 0;        
        $veic_pag_declaracao= 0;
        $veic_pag_recibo = 0;
        
    foreach ($post['campo'] as $key => $value) {
        if ($value == 'Requerimento ICMS Autenticado 2 vias'){$requerimento_icms = 1;}
        if ($value == 'Laudo medico detran + anexo 9 + CNH Detran'){$laudo_anexo9 = 1;}
        if ($value == 'Laudo SUS + anexo 9 + Declarações do SUS'){$laudo_anexo9 = 1;}        
        if ($value == 'copia do RG e CPF autenticados(Beneficiario e Representante legal)'){$rg_cpf = 1;}
        if ($value == 'Copia do RG e CPF autenticados'){$rg_cpf = 1;}
        if ($value == 'Copia autenticade / original do comprovante de endereço atual(beneficiario ou Representante Legal)'){$comprov_endereco = 1;}
        if ($value == 'Copia autenticade / original do comprovante de endereço atual(beneficiario)'){$comprov_endereco = 1;}
        if ($value == '1 copia simples da carta de IPI'){$carta_ip = 1;}        
        if ($value == 'Copia simples da curatela, interdição (Quando o beneficiario é maior de idade e não assina ou incapaz)'){$curatela = 1;}
        if ($value == '1 Copia autenticada / original do comprovante de renda atual'){$comprovante_renda = 1;}
        if ($value == '1 Copia autenticada / original do comprovante de renda atual(Beneficiario ou Representante legal)'){$comprovante_renda = 1;}
        if ($value == 'Carta da concessionaria'){$carta_concessionaria = 1;}
        if ($value == 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)(Beneficiario e Representante legal)'){$declaracoes_imposto_renda = 1;}
        if ($value == 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)'){$declaracoes_imposto_renda = 1;}
        if ($value == '1 copia autenticada da procuração do ICMS'){$procuracao_icms = 1;}
        if ($value == '1 copia simples dos procurações da SHAMAH'){$procuracao_shamah = 1;}
        if ($value == 'Cartas originais de IPI (Para apresentar e voltar para o escritorio)'){$cartas_originais_ipi = 1;}
        if ($value == 'Carta Financiamento'){$carta_financiamento = 1;}
        if ($value == '1 extrato bancario original / se impresso contendo carimbo e assinatura do gerente do banco(Contendo valor a ser dados a vista ou entrada)'){$extrato_bancario = 1;}
        //**********        
        if ($value == 'Declaração de ajuda financeira'){$aj_declaracao = 1;}
        if ($value == 'Copia do RG e CPF autenticados'){$aju_rg_cpf = 1;}
        if ($value == '1 copia autenticada / original comprovante de renda atual (Ajudador)'){$aju_comprov_renda = 1;}
        if ($value == 'Copia da declaração do imposto de renda todas as vias ou (Declaração de proprio punho declarando ser isento)'){$aju_declaracoes_imposto_renda = 1;}
        if ($value == 'Copia autenticada da certidão de casamento'){$aju_certidao_casamento = 1;}
        //**********        
        if ($value == 'Declaração cedendo o veiculo (reconhecer firma)'){$ced_veiculo_declaracao = 1;}
        if ($value == 'Copia autenticada do recibo de compra e venda frente e verso(Veiculo cedido)'){$ced_veiculo_recibo = 1;}
        if ($value == '1 copia autenticada do rg e CPF do atual dono do veiculo'){$ced_veiculo_rg_cpf = 1;}
        //**********        
        if ($value == 'Declaração cedendo o veiculo e reconhecimento de firma'){$veic_pag_declaracao = 1;}
        if ($value == 'copia autenticada do recibo de compra e venda Frente e verso (veiculo cedido)'){$veic_pag_recibo = 1;}
    }
    
    $campos_processo_icms = array();
    $campos_processo_icms['condutor'] = $post['condutor_nome'];
    $campos_processo_icms['requerimento_icms'] = $requerimento_icms;
    $campos_processo_icms['laudo_anexo9'] = $laudo_anexo9;
    $campos_processo_icms['rg_cpf'] = $rg_cpf;
    $campos_processo_icms['comprov_endereco'] = $comprov_endereco;
    $campos_processo_icms['carta_ip'] = $carta_ip;
    $campos_processo_icms['comprovante_renda'] = $comprovante_renda;
    $campos_processo_icms['extrato_bancario'] = $extrato_bancario;
    $campos_processo_icms['carta_concessionaria'] = $carta_concessionaria;
    $campos_processo_icms['carta_financiamento'] = $carta_financiamento;
    $campos_processo_icms['declaracoes_imposto_renda'] = $declaracoes_imposto_renda;
    $campos_processo_icms['procuracao_icms'] = $procuracao_icms;
    $campos_processo_icms['procuracao_shamah'] = $procuracao_shamah;
    $campos_processo_icms['cartas_originais_ipi'] = $cartas_originais_ipi;
    $campos_processo_icms['curatela'] = $curatela;
    $campos_processo_icms['tipo_compra'] = $post['tipo_compra_nome'];
    $campos_processo_icms['aj_declaracao'] = $aj_declaracao;
    $campos_processo_icms['aju_rg_cpf'] = $aju_rg_cpf;
    $campos_processo_icms['aju_comprov_renda'] = $aju_comprov_renda;
    $campos_processo_icms['aju_declaracoes_imposto_renda'] = $aju_declaracoes_imposto_renda;
    $campos_processo_icms['aju_certidao_casamento'] = $aju_certidao_casamento;
    $campos_processo_icms['ced_veiculo_declaracao'] = $ced_veiculo_declaracao;
    $campos_processo_icms['ced_veiculo_recibo'] = $ced_veiculo_recibo;
    $campos_processo_icms['ced_veiculo_rg_cpf'] = $ced_veiculo_rg_cpf;
    $campos_processo_icms['veic_pag_declaracao'] = $veic_pag_declaracao;
    $campos_processo_icms['veic_pag_recibo'] = $veic_pag_recibo;
    $campos_processo_icms['status'] = $post['status'];
    $campos_processo_icms['protocolo'] = "";
    $campos_processo_icms['id_processo'] = $this->uri->segment(4);
    
    if (count($result_icms) == 0) {
        $inserir_icms = new Query_model();
        $inserir_icms->SetCampos($campos_processo_icms);
        $inserir_icms->SetTabelas("processos_icms");
        $inserir_icms->inserir();
    } else {
        $alterar_icms = new Query_model();
        $alterar_icms->SetCampos($campos_processo_icms);
        $alterar_icms->SetTabelas("processos_icms");
        $alterar_icms->SetCondicao("id = '" . $result_icms->id . "'");
        $alterar_icms->atualizar();
    }
    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}