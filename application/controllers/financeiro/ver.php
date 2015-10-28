<?php

if($this->uri->segment(3) == '' && $this->uri->segment(4) == '' && $this->uri->segment(5) == '' ){
    redirect($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.date('d').'/'.date('m').'/'.date('Y'));
}

if($this->uri->segment(4) != '' &&  $this->uri->segment(4) != '0'){
    $mes = $this->uri->segment(4)."-";
}else{
    $mes = "";
}

if($this->uri->segment(3) != '' && $this->uri->segment(3) != '0'){
    $dia = $this->uri->segment(3);
}else{
    $dia = "";
}


$contas = new Query_model();
$contas->SetCampos("clientes.cpf,clientes.nome,pagamentos.id_processo,pagamentos.data,pagamentos.valor,pagamentos.quem_ira_pagar,pagamentos.forma_pagamento,pagamentos.numero,pagamentos.status,pagamentos.dt_confirmacao").
$contas->SetCondicao(" pagamentos.data like '%".$this->uri->segment(5)."-".$mes.$dia."%' AND "
        . " processos.id = pagamentos.id_processo AND "
        . " processos.id_cliente = clientes.id "
        . " ");
$contas->SetTabelas("pagamentos,processos,clientes");
$contas->SetTipoRetorno(0);
$dados['contas'] = $contas->get();



//RECEBE OS CAMPOS
$post = $this->input->post();
if ($post) {
    if($post['dia'] == ""){
       $post['dia'] =0; 
    }
    if($post['mes'] == ""){
       $post['mes'] =0; 
    }
    if($post['ano'] == ""){
       $post['ano'] =0; 
    }
    redirect($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$post['dia'].'/'.$post['mes'].'/'.$post['ano']);
}