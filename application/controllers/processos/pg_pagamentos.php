<?php
$pag = new pagamentos_model();
$proc = new Processos_model();
$dados['pag'] = $pag->PadraoSelect();
$dados['proc'] = $proc->PadraoSelect();

$dados['status_pag'] = array();
$dados['status_pag'][0] = 'Não Pago';
$dados['status_pag'][1] = 'Pago';
$dados['status_pag'][2] = 'Confirmado Pagamento';

/**
 * CONSULTA OS DADOS DO PROCESSO
 */
$proc = new Query_model();
$proc->SetCampos("*");
$proc->SetTabelas("processos");
$proc->SetCondicao("id = '" . $this->uri->segment(4) . "'");
$proc->SetTipoRetorno(1);
$processo = $proc->get();

/**
 * CONSUTA OS SERVIÇOS
 */
$serv = new Query_model();
$serv->SetCampos("*");
$serv->SetTabelas("servicos,processos_servicos");
$serv->SetCondicao(""
        . "processos_servicos.id_servico = servicos.id "
        . "AND processos_servicos.id_processo = '" . $this->uri->segment(4) . "'"
        . "AND servicos.id <> '1'"
        . "");
$serv->SetTipoRetorno(0);
$dados['servicos'] = $serv->get();
$dados['quem_paga_cartas'] = $processo->quem_pg_cartas;

$vl_cartas = new Query_model();
$vl_cartas->SetCampos("valor");
$vl_cartas->SetTabelas("servicos");
$vl_cartas->SetCondicao("id = '1'");
$vl_cartas->SetTipoRetorno("1");
$vl_carta = $vl_cartas->get();

if ($dados['quem_paga_cartas'] == 1) {
    $dados['form']['servico'] = "Cartas";
    $dados['form']['data_conc'] = "";
    $dados['form']['valor'] = $vl_carta->valor;
    ;
    $dados['form']['parcela'] = "1";
    $dados['form']['forma_pg'] = "Boleto";
}
if ($dados['quem_paga_cartas'] == 2) {
    $dados['form']['servico'] = "Cartas";
    $dados['form']['valor'] = $vl_carta->valor;
    $dados['form']['data'] = "";
    $dados['form']['parcela'] = "0";
    ;
}
$dados['form']['f_pag'] = 3;
$dados['form']['n_parcela'] = 1;
$dados['form']['desconto'] = 0;
$dados['form']['acrecimo'] = 0;

if($this->uri->segment(6) == "pagar" && $this->uri->segment(7) != "" && $this->uri->segment(8) == "1"){
    $pag = new Query_model();
    $pag->SetCampos(array('status'=>'1'));
    $pag->SetCondicao("id = '".$this->uri->segment(7)."'");
    $pag->SetTabelas("pagamentos");
    $pag->atualizar();
    
    /******CONSULTA E INSERE A PARTE DO DEDO DURO*****
        $cdd = new Query_model();
        $cdd->SetCampos("*");
        $cdd->SetCondicao("processos.id = '".$this->uri->segment(4)."'");
        $cdd->SetTabelas('processos');
        $cdd->SetTipoRetorno(1);
        $cdd_dados = $cdd->get();
        debug($cdd_dados,true);
        */
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        
        if($this->uri->segment(5) == 'editar'){
            $nome_processo = ' NOTA ';
        }else{
            $nome_processo = texto_log($this->uri->segment(5));
        }
        
        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "<b>Pagamentos Recebido: </b>O pagamento foi recebido pelo usuario " . $session['usuario']->nome . ' no dia ' .  date("d/m/Y") ." às " . date("h:i:s") ;
        
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /******FIM DA PARTE DO DEDO DURO*****/
    
} 

if($this->uri->segment(6) == "confirmar" && $this->uri->segment(7) != "" && $this->uri->segment(8) == "1"){
    $pag_con = new Query_model();
    $pag_con->SetCampos(array('status'=>'2', 'dt_confirmacao' => date('Y-m-d')));
    $pag_con->SetCondicao("id = '".$this->uri->segment(7)."'");
    $pag_con->SetTabelas("pagamentos");
    $pag_con->atualizar();
    
    /******CONSULTA E INSERE A PARTE DO DEDO DURO*****
        $cdd = new Query_model();
        $cdd->SetCampos("*");
        $cdd->SetCondicao("processos.id = '".$this->uri->segment(4)."'");
        $cdd->SetTabelas('processos');
        $cdd->SetTipoRetorno(1);
        $cdd_dados = $cdd->get();
        debug($cdd_dados,true);
        */
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        
        if($this->uri->segment(5) == 'editar'){
            $nome_processo = ' NOTA ';
        }else{
            $nome_processo = texto_log($this->uri->segment(5));
        }
        
        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "<b>Pagamentos Confirmado: </b>O pagamento foi confirmado pelo usuario " . $session['usuario']->nome . ' no dia ' .  date("d/m/Y") ." às " . date("h:i:s") ;
        
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /******FIM DA PARTE DO DEDO DURO*****/
    
}

if($this->uri->segment(7) == ""){
    $dados['form']['valor_edit'] = 0;
    $dados['form']['data_edit'] = 0;
    $dados['form']['n_boleto'] = 0;
    $dados['form']['f_pag'] = 0;
    $dados['form']['pg_cartas'] = 0;
    $dados['form']['status_pag'] = 0;
    
}else{
    $vl_edit_pag = new Query_model();
    $vl_edit_pag->SetCampos("valor,data,quem_ira_pagar,forma_pagamento,numero,status");
    $vl_edit_pag->SetCondicao("id = '".$this->uri->segment(7)."'");
    $vl_edit_pag->SetTipoRetorno(1);
    $vl_edit_pag->SetTabelas("pagamentos");
    $valores = $vl_edit_pag->get();
    
    $dados['form']['valor_edit'] = $valores->valor;
    $dados['form']['data_edit'] = data_br($valores->data);
    $dados['form']['n_boleto'] = $valores->numero;
    $dados['form']['f_pag'] = $valores->forma_pagamento;
    $dados['form']['pg_cartas'] = $valores->quem_ira_pagar;
    $dados['form']['status_pag'] = $valores->status;
}

$dados['bt'] = "Salvar";


$cons_parcelas = new Query_model();
$cons_parcelas->SetCampos("*");
$cons_parcelas->SetTabelas("pagamentos");
$cons_parcelas->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$cons_parcelas->SetTipoRetorno("0");
$dados['parcelas'] = $cons_parcelas->get();
$dados['quant_parcelas'] = count($dados['parcelas']);



$post = $this->input->post();
if ($post) {
    
    if($this->uri->segment(6)== 'form'){
        
        $edt_pg = array();
        $edt_pg['valor'] =   $post['valor_edit'];
        $edt_pg['data'] = data_banco($post['data_edit']);
        $edt_pg['numero'] = $post['n_boleto'];
        $edt_pg['forma_pagamento'] = $post['f_pag'];
        $edt_pg['quem_ira_pagar'] = $post['pg_cartas'];
        $edt_pg['status'] = $post['status_pg'];
        if($post['status_pg'] == '2'){
            $edt_pg['dt_confirmacao'] = date('Y-m-d'); 
        }else{
            $edt_pg['dt_confirmacao'] = '';
        }
        
        
        if($this->uri->segment(7)!= ''){
            $alterar = new Query_model();
            $alterar->SetCampos($edt_pg);
            $alterar->SetCondicao("id = '".$this->uri->segment(7)."'");
            $alterar->SetTabelas("pagamentos");
            $alterar->atualizar();            
        }else{
            $const_pag =  new Query_model();
            $const_pag->SetCampos("count(*) as quant");
            $const_pag->SetCondicao("id_processo = '".$this->uri->segment(4)."' AND quem_ira_pagar = '2'");
            $const_pag->SetTabelas("pagamentos");
            $const_pag->SetTipoRetorno(1);
            $vl_parcelas = $const_pag->get();
            
            $n_parcela = new Pagamentos_model();
            $n_parcela->SetCampo("id_processo", $this->uri->segment(4));
            $n_parcela->SetCampo("valor", $post['valor_edit']);
            $n_parcela->SetCampo("data", data_banco($post['data_edit']));
            $n_parcela->SetCampo("n_parcela", $vl_parcelas->quant + 1);
            $n_parcela->SetCampo("quem_ira_pagar", $post['pg_cartas']);
            $n_parcela->SetCampo("forma_pagamento", $post['f_pag']);
            $n_parcela->SetCampo("numero", $post['n_boleto']);
            $n_parcela->SetCampo("status", '0');
            $n_parcela->SetCampo("dt_confirmacao", "");

            $inserir = new Query_model();
            $inserir->SetCampos($n_parcela->monta_campos());
            $inserir->SetTabelas("pagamentos");
            $inserir->inserir();
            
            
                /******CONSULTA E INSERE A PARTE DO DEDO DURO*****
        $cdd = new Query_model();
        $cdd->SetCampos("*");
        $cdd->SetCondicao("processos.id = '".$this->uri->segment(4)."'");
        $cdd->SetTabelas('processos');
        $cdd->SetTipoRetorno(1);
        $cdd_dados = $cdd->get();
        debug($cdd_dados,true);
        */
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        
        if($this->uri->segment(5) == 'editar'){
            $nome_processo = ' NOTA ';
        }else{
            $nome_processo = texto_log($this->uri->segment(5));
        }
        
        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "<b>Pagamentos parcela Nova: </b>Foi adicionado uma nova parcela  pelo usuário " . $session['usuario']->nome . ' no dia ' .  date("d/m/Y") ." às " . date("h:i:s") ;
        
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /******FIM DA PARTE DO DEDO DURO*****/
            
            
            
        }


    }
    
    
    
    if (isset($post['data_conc'])) {
        //Pega o preco das cartas
        $preco_cartas = new Query_model();
        $preco_cartas->SetCampos("valor");
        $preco_cartas->SetTabelas("servicos");
        $preco_cartas->SetTipoRetorno(1);
        $preco_cartas->SetCondicao(" id = '1'");
        $servico = $preco_cartas->get();
        $valor = str2decimal($servico->valor);
        $valor = substr($valor, 0, -2);

        if($post['data_conc'] != ""){
            $dt = data_banco($post['data_conc']);
        }else{
            $dt = date('Y-m-d', strtotime("+ 30 day", strtotime(date("Y-m-d"))));
        }
        //Monta o vetor para inserir
        $pagamentos = new Pagamentos_model();
        $pagamentos->SetCampo('id_processo', $this->uri->segment(4));
        $pagamentos->SetCampo('valor', str2int($valor));
        $pagamentos->SetCampo('data', $dt);
        $pagamentos->SetCampo('n_parcela', '1');
        $pagamentos->SetCampo('quem_ira_pagar', 1);
        $pagamentos->SetCampo('forma_pagamento', 4);
        $pagamentos->SetCampo('numero', "");
        $pagamentos->SetCampo('status', 0);
        $pagamentos->SetCampo('dt_confirmacao', "");
        //INSERE NA TABELA
        $pag_inserir_concessionaria = new Query_model();
        $pag_inserir_concessionaria->SetTabelas('pagamentos');
        $pag_inserir_concessionaria->SetCampos($pagamentos->monta_campos());
        $pag_inserir_concessionaria->inserir();
    }
    //$dados['quem_paga_cartas'];
    
    if ($post['n_parcela'] > 0 && count($dados['servicos']) > 0) {
        $valor_novo = $post['vl_total'] - $post['desconto'] + $post['acrecimo'];
        $valor_parcela = str2decimal($valor_novo) / $post['n_parcela'];
        $valor_parcela = round ($valor_parcela);
        $s_dias = 0;
        for ($i = 1; $i <= $post['n_parcela']; $i++) {
            $date = date('Y-m-d', strtotime("+" . $s_dias . "day", strtotime(date("Y-m-d"))));
            $s_dias+='30';
            $pagamentos_cli = new Pagamentos_model();
            $pagamentos_cli->SetCampo('id_processo', $this->uri->segment(4));
            $pagamentos_cli->SetCampo('valor', $valor_parcela);
            $pagamentos_cli->SetCampo('data', $date);
            $pagamentos_cli->SetCampo('n_parcela', $i);
            $pagamentos_cli->SetCampo('quem_ira_pagar', "2");
            $pagamentos_cli->SetCampo('forma_pagamento', $post['f_pag']);
            $pagamentos_cli->SetCampo('numero', "");
            $pagamentos_cli->SetCampo('status', 0);
            $pagamentos_cli->SetCampo('dt_confirmacao', "");
            $pag_inserir_cliente = new Query_model();
            $pag_inserir_cliente->SetTabelas('pagamentos');
            $pag_inserir_cliente->SetCampos($pagamentos_cli->monta_campos());
            $pag_inserir_cliente->inserir();
        }
        /******CONSULTA E INSERE A PARTE DO DEDO DURO*****
        $cdd = new Query_model();
        $cdd->SetCampos("*");
        $cdd->SetCondicao("processos.id = '".$this->uri->segment(4)."'");
        $cdd->SetTabelas('processos');
        $cdd->SetTipoRetorno(1);
        $cdd_dados = $cdd->get();
        debug($cdd_dados,true);
        */
        $session = $this->session->all_userdata();
        $sis_dedo_duro = new Query_model();
        $inserir = array();
        
        if($this->uri->segment(5) == 'editar'){
            $nome_processo = ' NOTA ';
        }else{
            $nome_processo = texto_log($this->uri->segment(5));
        }
        
        $inserir['id_processo'] = $this->uri->segment(4);
        $inserir['descricao'] = "<b>Pagamentos: </b>inserido pelo usuario " . $session['usuario']->nome . ' no dia ' .  date("d/m/Y") ." às " . date("h:i:s") ;
        
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /******FIM DA PARTE DO DEDO DURO*****/
    }
    redirect("processos/proc/".$this->uri->segment(3).'/'.$this->uri->segment(4).'/pagamentos');
}