<?php
/* * *****************************************************************************
 * Banco
 * ***************************************************************************** */
$session = $this->session->all_userdata();
$consulta_tarefas = new Query_model();
$consulta_tarefas->SetCampos('obs,id_processo,nome,item,id_cliente,data');//
$consulta_tarefas->SetCondicao(" "
        . " alerta.id_usuarios = '".$session['usuario']->id."' AND "
        . " alerta.id_nome_processo = processos_nome.id AND "
        . " alerta.id_item = alerta_item_processo.id AND " 
        . " alerta.id_processo = processos.id " 
        . " ORDER BY data ASC"
        . " ");
$consulta_tarefas->SetTabelas("alerta,processos_nome,alerta_item_processo,processos");
$consulta_tarefas->SetTipoRetorno(0);
$dados['tarefas'] = $consulta_tarefas->get();
//debug($dados,true);

