<?php

if ($_FILES) {
    $arquivo = importar_arquivo($_FILES);
    if ($this->uri->segment(5) == 'cnh') {$n_processo = 1;}
    if ($this->uri->segment(5) == 'laudos') {$n_processo = 2;}
    if ($this->uri->segment(5) == 'ipi') {$n_processo = 3;}
    if ($this->uri->segment(5) == 'icms') {$n_processo = 4;}
    if ($this->uri->segment(5) == 'ipva') {$n_processo = 5;}
    if ($this->uri->segment(5) == 'rodizio') {$n_processo = 6;}
    if ($this->uri->segment(5) == 'defis') {$n_processo = 7;}
    if ($this->uri->segment(5) == 'baixa_ipva') {$n_processo = 8;}
    if ($this->uri->segment(5) == 'baixa_rodizio') {$n_processo = 9;}
    if ($this->uri->segment(5) == 'lacracao') {$n_processo = 10;}
    if ($this->uri->segment(5) == 'editar') {$n_processo = "";}
    
    if($arquivo['erro']  != "" ){
        $link =base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
        echo confirma_acao($mensagem = $arquivo['erro'],$link_confirmacao  = $link,$link_volta  = $link);
        exit();
    }
    
    if ($arquivo['arquivo'] != "") {
        $inserir_arquivo = new Query_model();
        $inserir_arquivo->SetCampos(array('id_processo' => $this->uri->segment(4), 'anexo' => preparar_pasta($arquivo['arquivo']), 'id_nome_processo' => $n_processo));
        $inserir_arquivo->SetTabelas("processos_anexos");
        $inserir_arquivo->inserir();
    }
    
}

if($this->uri->segment(3) == "0"){
   
}else{
    //Padrao de select
    $processos = new Processos_model();
    $dados = $processos->PadraoSelect();
    //Preenche os dados do cliente
    $banco = new Query_model();
    $banco->SetCampos("nome,cpf,possui_cnpj,possui_carro_automatico,condutor");
    $banco->SetTabelas("clientes");
    $banco->SetTipoRetorno(1);
    $banco->SetCondicao("id = '" . $this->uri->segment(3) . "'");
    $cli = $banco->get();
    $dados['form']['nome'] = $cli->nome;
    $dados['form']['cpf'] = $cli->cpf;    
    $dados['form']['condutor'] = $cli->condutor;
    $dados['form']['possui_cnpj'] = $cli->possui_cnpj;
    $dados['form']['possui_carro_automatico'] = $cli->possui_carro_automatico;
    $dados['form']['condutor'] = $cli->condutor;

    
    

    
}

  if($this->uri->segment(5) != 0 || $this->uri->segment(5) != ''){
      include 'pg_'.$this->uri->segment(5).".php";
  }else{
       include 'pg_consulta.php';
  }
