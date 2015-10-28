<?php

if ($this->uri->segment(4) == '' || $this->uri->segment(4) == 0) {
    $dados['form']['pg_cartas'] = 0;
    $dados['form']['vendedor'] = 0;
    $dados['bt'] = "Salvar";
} else {
    $dados['form']['pg_cartas'] = 0;
    $dados['form']['vendedor'] = 0;
    $dados['bt'] = "Salvar";
}

//Conuslta todos os servicos
$servicos = new Query_model();
$servicos->SetCampos("*");
$servicos->SetTabelas("servicos");
$servicos->SetTipoRetorno(0);
$dados['servicos'] = $servicos->get();

//Conuslta todos os usuario do tipo concessionaria
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




$post = $this->input->post();
if ($post) {

    //debug($post, true);

    $processos->SetCampo("id_cliente", $this->uri->segment(3));
    $processos->SetCampo("id_usu_concessionaria", $post['vendedor']);
    $processos->SetCampo("quem_pg_cartas", $post['quem_pg_cartas']);
    $inserir = new Query_model();
    $inserir->SetCampos($processos->monta_campos());
    $inserir->SetTabelas("processos");
    $id_processo = $inserir->inserir();
    //$id_processo = 1;
    //$id_servicos = array();
    foreach ($post['servicos'] as $key => $value) {
        foreach ($dados['servicos'] as $k => $v) {
            if ($v['nome'] == $value) {
                //array_push($id_servicos, $v['id']);    
                $inserir_id_servico = new Query_model();
                $inserir_id_servico->SetTabelas("processos_servicos");
                $inserir_id_servico->SetCampos(array('id_servico' => $v['id'], 'id_processo' => $id_processo, 'negociado' => '0'));
                $inserir_id_servico->inserir();
            }
        }
    }

   


    redirect('processos/proc/' . $this->uri->segment(3) . '/' . $id_processo . '/pagamentos');
}
