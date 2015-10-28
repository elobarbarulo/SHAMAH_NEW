<?php
$contas = new Query_model();
$contas->SetCampos("clientes.id,clientes.cpf,clientes.nome,pagamentos.id_processo,pagamentos.data,pagamentos.valor,pagamentos.quem_ira_pagar,pagamentos.forma_pagamento,pagamentos.numero,pagamentos.status,pagamentos.dt_confirmacao").
$contas->SetCondicao(" pagamentos.status = '1' AND "
                   . " processos.id_cliente = clientes.id "
                   . " ");
$contas->SetTabelas("pagamentos,processos,clientes");
$contas->SetTipoRetorno(0);
$dados['contas'] = $contas->get();

//debug($dados['contas'],true);