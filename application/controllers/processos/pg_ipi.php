<?php

/* CONSULTA A TABELA IPI PELO ID PARA TRAZER AS INFORMAÇÔES DO SELECT */
$ipi = new Query_model();
$ipi->SetCampos("*");
$ipi->SetCondicao("id_processo = '" . $this->uri->segment(4) . "'");
$ipi->SetTabelas("processos_ipi");
$ipi->SetTipoRetorno(1);
$result_ipi = $ipi->get();

/*CONSULTA TODAS AS TAREFAS INDEPENDENTE DO USUARIO */
$tarefas = new Query_model();
$tarefas->SetCampos("alerta.data,alerta.id,alerta.obs,usuarios.nome,alerta_item_processo.item");
$tarefas->SetTabelas(" alerta,usuarios,alerta_item_processo ");
$tarefas->SetTipoRetorno(0);
$tarefas->SetCondicao(" alerta.id_nome_processo = '3' AND alerta.status = '0' AND alerta.id_usuarios = usuarios.id  AND alerta_item_processo.id = alerta.id_item ");
$dados['talefas_list'] =$tarefas->get();

/*CONSULTA TODOS OS ANEXOS DESTE PROCESSO*/
$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '".$this->uri->segment(4)."' AND id_nome_processo = '3' ");
$anexos->SetTipoRetorno(0);
$anexos->SetTabelas("processos_anexos");
$dados['arquivos'] = $anexos->get();
//debug($dados['arquivos']);

/* VERIFICA SE A TAREFA PARA SER EXCLUIDA */
if($this->uri->segment(6) == 'tarefas' && $this->uri->segment(7)!= "" && $this->uri->segment(8)!= ""){
    $apagar_tareafa = new Query_model();
    $apagar_tareafa->SetCondicao("id = '".$this->uri->segment(7)."'");
    $apagar_tareafa->SetTabelas("alerta");
    $apagar_tareafa->excluir();
    redirect($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/');
}

/* MONTA OS PADROS SO CHECKLIST */
if (count($result_ipi) == 0) {
    $select = 0;
    $dados['condutor'] = $dados['form']['condutor'];
    $dados['anexo1'] = array('selec' => $select, 'vl' => 'anexo1');
    $dados['anexo2'] = array('selec' => $select, 'vl' => 'anexo2');
    $dados['anexo14'] = array('selec' => $select, 'vl' => 'anexo14');
    $dados['anexo15'] = array('selec' => $dados['form']['possui_cnpj'], 'vl' => 'anexo15');
    $dados['laudo_detran'] = array('selec' => $select, 'vl' => 'Laudo Detran + Complementos + Anexo 9 + CNH Detran');
    $dados['certidao_negativa'] = array('selec' => $select, 'vl' => 'Certidão Negativa');
    $dados['laudo_sus'] = array('selec' => $select, 'vl' => 'Laudo SUS + Complementos + Anexo 9 + Declaração SUS');
    $dados['certidao_negativa_beneficiario'] = array('selec' => $select, 'vl' => 'Certidão Negativa Beneficiario');
    $dados['rg_cpf'] = array('selec' => $select, 'vl' => 'RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)');
    $dados['comprov_end'] = array('selec' => $select, 'vl' => 'Comprovante de endereço atual (Copia simples)');
    $dados['curatela'] = array('selec' => $select, 'vl' => 'Curatela interdico (Copia simples)');
    $dados['status'] = 0;
} else {
    $dados['condutor'] = $result_ipi->condutor;
    $dados['anexo1'] = array('selec' => $result_ipi->anexo1, 'vl' => 'anexo1');
    $dados['anexo2'] = array('selec' => $result_ipi->anexo2, 'vl' => 'anexo2');
    $dados['anexo14'] = array('selec' => $result_ipi->anexo14, 'vl' => 'anexo14');
    $dados['anexo15'] = array('selec' => $result_ipi->anexo15, 'vl' => 'anexo15');
    $dados['laudo_detran'] = array('selec' => $result_ipi->laudo_complemento_anexo9, 'vl' => 'Laudo Detran + Complementos + Anexo 9 + CNH Detran');
    $dados['certidao_negativa'] = array('selec' => $result_ipi->certidao_negativa, 'vl' => 'Certidão Negativa');
    $dados['laudo_sus'] = array('selec' => $result_ipi->laudo_complemento_anexo9, 'vl' => 'Laudo SUS + Complementos + Anexo 9 + Declaração SUS');
    $dados['certidao_negativa_beneficiario'] = array('selec' => $result_ipi->certidao_negativa, 'vl' => 'Certidão Negativa Beneficiario');
    $dados['rg_cpf'] = array('selec' => $result_ipi->rg_cpf, 'vl' => 'RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)');
    $dados['comprov_end'] = array('selec' => $result_ipi->comprovante_endereco, 'vl' => 'Comprovante de endereço atual (Copia simples)');
    $dados['curatela'] = array('selec' => $result_ipi->curatela, 'vl' => 'Curatela interdico (Copia simples)');
    $dados['form']['status'] = $result_ipi->status;
}
/* PADRÂO DO SATATUS DO ITEM */
$dados['status'] = 4;
$dados['item'][30] = 'Aguardando resposta';
$dados['item'][11] = 'Aguardando para levar os documentos';
$dados['item'][10] = 'Faltando Documento';
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
    $monta['id_nome_processo']  = '3';
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
    $anexo1 = 0;
    $anexo2 = 0;
    $anexo14 = 0;
    $anexo15 = 0;
    $laudo_complemento_anexo9 = 0;
    $certidao_negativa = 0;
    $rg_cpf = 0;
    $comprovante_endereco = 0;
    $curatela = 0;


    foreach ($post['campo'] as $key => $value) {
        if ($value == 'anexo1') {
            $anexo1 = 1;
        }
        if ($value == 'anexo2') {
            $anexo2 = 1;
        }
        if ($value == 'anexo14') {
            $anexo14 = 1;
        }
        if ($value == 'anexo15') {
            $anexo15 = 1;
        }
        if ($value == 'Laudo SUS + Complementos + Anexo 9 + Declaração SUS') {
            $laudo_complemento_anexo9 = 1;
        }
        if ($value == 'Laudo Detran + Complementos + Anexo 9 + CNH Detran') {
            $laudo_complemento_anexo9 = 1;
        }
        if ($value == 'Certidão Negativa Beneficiario') {
            $certidao_negativa = 1;
        }
        if ($value == 'RG e CPF autenticados (BENEFICIARIO E REPRESENTANTE LEGAL)') {
            $rg_cpf = 1;
        }
        if ($value == 'Comprovante de endereço atual (Copia simples)') {
            $comprovante_endereco = 1;
        }
        if ($value == 'Curatela interdico (Copia simples)') {
            $curatela = 1;
        }
    }
    
    
        $campos_processo_ipi = array();
        $campos_processo_ipi['condutor'] = $post['condutor_nome'];
        $campos_processo_ipi['anexo1'] = $anexo1;
        $campos_processo_ipi['anexo2'] = $anexo2;
        $campos_processo_ipi['anexo14'] = $anexo14;
        $campos_processo_ipi['anexo15'] = $anexo15;
        $campos_processo_ipi['laudo_complemento_anexo9'] = $laudo_complemento_anexo9;
        $campos_processo_ipi['certidao_negativa'] = $certidao_negativa;
        $campos_processo_ipi['rg_cpf'] = $rg_cpf;
        $campos_processo_ipi['comprovante_endereco'] = $comprovante_endereco;
        $campos_processo_ipi['curatela'] = $curatela;
        $campos_processo_ipi['status'] = $post['status'];
        $campos_processo_ipi['numero_protocolo'] = "";
        $campos_processo_ipi['descricao'] = $post['obs'];
        $campos_processo_ipi['id_processo'] = $this->uri->segment(4);
        //debug($campos_processo_ipi,true);

    if (count($result_ipi) == 0) {
        $inserir_ipi = new Query_model();
        $inserir_ipi->SetCampos($campos_processo_ipi);
        $inserir_ipi->SetTabelas("processos_ipi");
        $inserir_ipi->inserir();
    } else {
        $alterar_ipi = new Query_model();
        $alterar_ipi->SetCampos($campos_processo_ipi);
        $alterar_ipi->SetTabelas("processos_ipi");
        $alterar_ipi->SetCondicao("id = '" . $result_ipi->id . "'");
        $alterar_ipi->atualizar();
    }


    redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
}