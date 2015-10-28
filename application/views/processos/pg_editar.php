<?php
include "pg_clientes.php";
echo SubTitulo('Servicos Editar');

foreach ($dados['servicos_selecionados'] as $value) {    
    echo monta_form_check_checado($nome = 'servicos[]', $class = '', $id = '', $value['nome']);
}

foreach ($dados['servicos_n_selecionados'] as $value) {    
    echo monta_form_check($nome = 'servicos[]', $class = '', $id = '', $value['nome']);
}

echo SubTitulo('');
echo monta_select($tamanho = "6", $label = "Quem ira pagar as carcas", $nome = "quem_pg_cartas", $valores = $dados['pg_cartas'], $selecionado = $dados['form']['pg_cartas']);
echo monta_select($tamanho = "6", $label = "Vendedor", $nome = "vendedor", $valores = $dados['vendedor'], $selecionado = $dados['form']['vendedor']);

echo bt_form('11', '1', $dados['bt'], '', 'validar_clientes');


