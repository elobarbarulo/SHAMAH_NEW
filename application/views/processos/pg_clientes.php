<?php

echo SubTitulo('Cliente');
echo monta_input_ver($tamanho = 6, $label = 'Nome Completo', $tipo_campo = 'txt', $nome = 'nome', $value = $dados['form']['nome'], $maxlength = "100", $classes = "", $id = "");
echo monta_input_ver($tamanho = 6, $label = 'CPF', $tipo_campo = 'txt', $nome = 'cpf', $value = $dados['form']['cpf'], $maxlength = "100", $classes = "cpf", $id = "");

echo SubTitulo('');
echo SubTitulo('NAVEGAÇÂO');
if ($this->uri->segment(4) != 0) {
    echo bt_link("processos/proc/" . $this->uri->segment(3) . '/' . $this->uri->segment(4) . "/editar", "EDITAR PROCESSO");
    echo ' ';
    echo bt_link("processos/proc/" . $this->uri->segment(3) . '/' . $this->uri->segment(4) . "/pagamentos", "PAGAMENTO");
    echo ' ';
    echo bt_link("processos/proc/" . $this->uri->segment(3) . '/' . $this->uri->segment(4) . "/ver", "VER");
    echo ' <hr>';
    
}else{
    echo bt_link("clientes/formulario_concluir/" . $this->uri->segment(3), "EDITAR CLIENTE");
    echo ' <hr>';
    echo ' ';
}
    echo SubTitulo('');