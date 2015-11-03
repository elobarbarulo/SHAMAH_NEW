<?php
/**
 * PREECHE OS FORMULARIOS
 */
if ($this->uri->segment(4) == '' || $this->uri->segment(4) == 0) {
    $dados['form']['pg_cartas'] = 0;
    $dados['form']['vendedor'] = 0;
    $dados['bt'] = "Salvar";
} else {
    $proc = new Query_model();
    $proc->SetCondicao("id = '".$this->uri->segment(4)."'");
    $proc->SetTabelas("processos");
    $proc->SetCampos("*");
    $proc->SetTipoRetorno(1);
    $processo = $proc->get();
    $dados['form']['pg_cartas'] = $processo->quem_pg_cartas;
    $dados['form']['vendedor'] = $processo->id_usu_concessionaria;
    $dados['bt'] = "Editar";
}
/**
 * CONSULTA OS SERVIÇOS SELECIONADOS 
 */
$servicos_selecionados = new Query_model();
$servicos_selecionados->SetCampos("servicos.nome");
$servicos_selecionados->SetTabelas("servicos,processos_servicos");
$servicos_selecionados->SetTipoRetorno(0);
$servicos_selecionados->SetCondicao("servicos.id = processos_servicos.id_servico  AND processos_servicos.id_processo = '".$this->uri->segment(4)."' ");
$dados['servicos_selecionados'] = $servicos_selecionados->get();

/**
 * CONSULTA SERVIÇOS NAO SELECIONADOS
 */
$servicos_n_selecionados = new Query_model();
$servicos_n_selecionados->SetCampos("nome");
$servicos_n_selecionados->SetTabelas("servicos");
$condicao =  "";
foreach ($dados['servicos_selecionados']as $key => $value) {
    $condicao.= " nome <> '".$value['nome']."' AND ";
}
if($condicao != ""){
    $condicao = substr($condicao, 0, -4);
    $servicos_n_selecionados->SetCondicao($condicao);    
}
$servicos_n_selecionados->SetTipoRetorno(0);
$dados['servicos_n_selecionados'] = $servicos_n_selecionados->get();


$servicos = new Query_model();
$servicos->SetCampos("*");
$servicos->SetTabelas("servicos");
$servicos->SetTipoRetorno(0);
$dados['servicos'] = $servicos->get();

/**
 * CONSULTA OS USUARIOS DE CONSESSIONARIAS NOMEADOS DE VENDEDOR PARA O USUARIO
 */
$usu = new Query_model();
$usu->SetCampos("nome");
$usu->SetTabelas("usuarios");
$usu->SetTipoRetorno(0);
$usu->SetCondicao("tipo_usurio = '3'");
//Monta padrão de select
$monta_secet_usu = array();
array_push($monta_secet_usu, "Selecione");
foreach ($usu->get() as $key => $value) {
    array_push($monta_secet_usu, $value['nome']);
}
$dados['vendedor'] = $monta_secet_usu;

/*
 * *****************************************************************************
 * *****************************************************************************
 * *****************************************************************************
 */


$post = $this->input->post();
if ($post) {

    //debug($post,true);
    
    $processos->SetCampo("id_cliente", $this->uri->segment(3));
    $processos->SetCampo("id_usu_concessionaria", $post['vendedor']);
    $processos->SetCampo("quem_pg_cartas", $post['quem_pg_cartas']);
    
    $alterar = new Query_model();
    $alterar->SetCampos($processos->monta_campos());
    $alterar->SetTabelas("processos");
    $alterar->SetCondicao("id = '".$this->uri->segment(4)."'");
    $alterar->atualizar();

    $detelar = new Query_model();
    $detelar->SetTabelas("processos_servicos");
    $detelar->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
    $detelar->excluir();
    
    foreach ($post['servicos'] as $key => $value) {
        foreach ($dados['servicos'] as $k => $v) {
            if ($v['nome'] == $value) {
                //array_push($id_servicos, $v['id']);    
                $inserir_id_servico = new Query_model();
                $inserir_id_servico->SetTabelas("processos_servicos");
                $inserir_id_servico->SetCampos(array('id_servico' => $v['id'], 'id_processo' => $this->uri->segment(4),'negociado'=>'0'));
                $inserir_id_servico->inserir();
            }
        }
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
        $inserir['descricao'] = "<b>O processo foi alterado</b> "
                . "Adicionando ou removido serviços,vendendores ou alterando  quem ira pagar as cartas feito pelo usuario " . $session['usuario']->nome . ' no dia ' .  date("d/m/Y") ." às " . date("h:i:s") ;
        
        $sis_dedo_duro->SetCampos($inserir);
        $sis_dedo_duro->SetTabelas("processos_log");
        $sis_dedo_duro->inserir();
        /******FIM DA PARTE DO DEDO DURO*****/
  redirect('processos/proc/' . $this->uri->segment(3) . '/' .  $this->uri->segment(4) .'/pagamentos');
}
