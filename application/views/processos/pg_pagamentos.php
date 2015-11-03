<?php
if ($this->uri->segment(6) == 'form') {

    if ($this->uri->segment(7) != "") {
        echo SubTitulo('Editar parcela');
    } else {
        echo SubTitulo('Nova parcela');
    }
    echo monta_input($tamanho = 4, $label = 'Valor', $tipo_campo = 'txt', $nome = 'valor_edit', $value = $dados['form']['valor_edit'], $maxlength = "100", $classes = "", $id = "");
    echo monta_input($tamanho = 4, $label = 'Data', $tipo_campo = 'txt', $nome = 'data_edit', $value = $dados['form']['data_edit'], $maxlength = "100", $classes = "data", $id = "");
    echo monta_input($tamanho = 4, $label = 'Numero Boleto', $tipo_campo = 'txt', $nome = 'n_boleto', $value = $dados['form']['n_boleto'], $maxlength = "100", $classes = "", $id = "");
    echo SubTitulo('');
    echo monta_select($tamanho = "6", $label = "Forma de pagamentos", $nome = "f_pag", $valores = $dados['pag']['f_pag'], $selecionado = $dados['form']['f_pag']);
    echo monta_select($tamanho = "6", $label = "Quem ira Pagar", $nome = "pg_cartas", $valores = $dados['proc']['pg_cartas'], $selecionado = $dados['form']['pg_cartas']);
    echo SubTitulo('');
    echo monta_select($tamanho = "12", $label = "Status", $nome = "status_pg", $valores = $dados['status_pag'], $selecionado = $dados['form']['status_pag']);



    if ($this->uri->segment(7) != "") {
        echo bt_form('11', '1', "Editar", '', '');
    } else {
        echo bt_form('11', '1', "salvar", '', '');
    }
} else {
    include "pg_clientes.php";

    echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
    if ($dados['quem_paga_cartas'] == 1) {
        echo SubTitulo('Pagamentos');
        echo SubTitulo('Concessionaria pagará as cartas');
        echo monta_input_ver($tamanho = 3, $label = 'Servico', $tipo_campo = 'txt', $nome = 'servico', $value = $dados['form']['servico'], $maxlength = "100", $classes = "", $id = "");
        echo monta_input_ver($tamanho = 2, $label = 'Valor', $tipo_campo = 'txt', $nome = 'valor', $value = $dados['form']['valor'], $maxlength = "100", $classes = "", $id = "");
        if ($dados['quant_parcelas'] <= 0) {
            echo monta_input($tamanho = 2, $label = 'Data', $tipo_campo = 'txt', $nome = 'data_conc', $value = $dados['form']['data_conc'], $maxlength = "100", $classes = "data", $id = "");
        } else {
            echo monta_input_ver($tamanho = 2, $label = 'Data', $tipo_campo = 'txt', $nome = 'data_conc', $value = $dados['form']['data_conc'], $maxlength = "100", $classes = "data", $id = "");
        }


        echo monta_input_ver($tamanho = 2, $label = 'Parcelas', $tipo_campo = 'txt', $nome = 'parcela', $value = $dados['form']['parcela'], $maxlength = "100", $classes = "", $id = "");
        echo monta_input_ver($tamanho = 3, $label = 'Forma de PG', $tipo_campo = 'txt', $nome = 'forma_pg', $value = $dados['form']['forma_pg'], $maxlength = "100", $classes = "", $id = "");
    }
    if ($dados['quem_paga_cartas'] == 2) {
        echo SubTitulo('Pagamentos');
        echo SubTitulo('Cliente pagará as cartas');
        echo monta_input_ver($tamanho = 9, $label = 'Servico', $tipo_campo = 'txt', $nome = 'servico', $value = $dados['form']['servico'], $maxlength = "100", $classes = "", $id = "");
        echo monta_input_ver($tamanho = 3, $label = 'Valor', $tipo_campo = 'txt', $nome = 'valor', $value = $dados['form']['valor'], $maxlength = "100", $classes = "", $id = "");
    }
    if ($dados['quem_paga_cartas'] == 0) {
        echo SubTitulo('Não foi informado quem pagará as cartas ou não possui o mesmo serviço.');
    }

    echo SubTitulo('Servicos');

    $valor_servicos = 0;
    foreach ($dados['servicos'] as $key => $v) {

        if ($v['negociado'] == 0) {
            $valor_servicos+=$v['valor'];
            //$negociado = "Não";
        } else {
            //$negociado = "Sim";
        }

        echo monta_input_ver($tamanho = 9, $label = 'Servico', $tipo_campo = 'txt', $nome = 'servico', $value = $v['nome'], $maxlength = "100", $classes = "", $id = "");
        echo monta_input_ver($tamanho = 3, $label = 'Valor', $tipo_campo = 'txt', $nome = 'valor', $value = decimal2str($v['valor']), $maxlength = "100", $classes = "", $id = "");
        echo SubTitulo('');
    }
//Se for o cliente responsavel em pagar as cartas add o valor aqui.
    if ($dados['quem_paga_cartas'] == 2) {
        $valor_servicos += $dados['form']['valor'];
    }

    echo SubTitulo('');
    echo '<div class="col-md-9"></div>';
    echo monta_input_ver($tamanho = 3, $label = 'TOTAL', $tipo_campo = 'txt', $nome = 'servico', $value = decimal2str($valor_servicos), $maxlength = "100", $classes = "", $id = "");
    echo '<input type="hidden" value="' . $valor_servicos . '" name="vl_total">';

    echo SubTitulo('');
    echo '<div class="col-md-9"></div>';
    if ($dados['quant_parcelas'] <= 0) {
        echo monta_input($tamanho = 3, $label = 'DESCONTO', $tipo_campo = 'txt', $nome = 'desconto', $value = decimal2str($dados['form']['desconto']), $maxlength = "100", $classes = "", $id = "");
    } else {
        echo monta_input_ver($tamanho = 3, $label = 'DESCONTO', $tipo_campo = 'txt', $nome = 'desconto', $value = decimal2str($dados['form']['desconto']), $maxlength = "100", $classes = "", $id = "");
    }


    echo SubTitulo('');
    echo '<div class="col-md-9"></div>';
    if ($dados['quant_parcelas'] <= 0) {
        echo monta_input($tamanho = 3, $label = 'ACRÉSCIMO', $tipo_campo = 'txt', $nome = 'acrecimo', $value = decimal2str($dados['form']['acrecimo']), $maxlength = "100", $classes = "", $id = "");
    } else {
        echo monta_input_ver($tamanho = 3, $label = 'ACRÉSCIMO', $tipo_campo = 'txt', $nome = 'acrecimo', $value = decimal2str($dados['form']['acrecimo']), $maxlength = "100", $classes = "", $id = "");
    }



    echo SubTitulo('');
    if ($dados['quant_parcelas'] <= 0) {
        echo monta_select($tamanho = "6", $label = "Forma de pagamentos", $nome = "f_pag", $valores = $dados['pag']['f_pag'], $selecionado = $dados['form']['f_pag']);
        echo monta_select($tamanho = "6", $label = "Parcelas", $nome = "n_parcela", $valores = $dados['pag']['n_parcela'], $selecionado = $dados['form']['n_parcela']);
        echo bt_form('11', '1', $dados['bt'], '', '');
    }

    echo SubTitulo('<hr>');
    ?>


    <table class="table table-hover">
        <thead>
            <tr>
                <td>Parcela</td>
                <td>data</td>
                <td>Valor</td>
                <td>Responsavel</td>
                <td>Status</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $link_add = "";
            foreach ($dados['parcelas'] as $key => $value) {

                if ($value['quem_ira_pagar'] == 1) {
                    $quem = "Concessionaria";
                } else {
                    $quem = "Cliente";
                }

                if ($value['status'] == 2) {
                    $status = '<i class="fa fa-thumbs-o-up fa-1x"></i><br>' . data_br($value['dt_confirmacao']);
                } elseif ($value['status'] == 1) {
                    $status = '<i class="fa fa-money"></i>';
                } else {
                    $status = '<i class="fa fa-spinner fa-spin"></i>';
                }

                $session = $this->session->all_userdata();

                //Verifica o tipo de usuarios
                if ($session['usuario']->tipo_usurio == '2') {
                    $link_editar = "";
                    if ($value['status'] == 1 || $value['status'] == 2) {
                        $link_pagar = "";
                    } else {
                        $link_pagar = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/pagar/" . $value['id'], '<i class="fa fa-money"></i>');
                    }

                    $link_confirmar_pg = "";
                    $link_add = "";
                } elseif($session['usuario']->tipo_usurio == '1')  {
                    if ($value['status'] == 1) {
                        $link_pagar = '';
                        $link_editar = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/" . $value['id'], '<i class="fa fa-pencil"></i>');
                        $link_confirmar_pg = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/confirmar/" . $value['id'], '<i class="fa fa-thumbs-o-up fa-1x">      ');
                        $link_add = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/", '<i class="fa fa-plus-square"></i> Adicionar Parcela');
                    } 
                    if ($value['status'] == 2) {
                        $link_pagar = '';
                        $link_editar = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/" . $value['id'], '<i class="fa fa-pencil"></i>');
                        $link_confirmar_pg = "";
                        $link_add = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/", '<i class="fa fa-plus-square"></i> Adicionar Parcela');
                    }
                    if ($value['status'] == 0) {
                        $link_pagar = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/pagar/" . $value['id'], '<i class="fa fa-money"></i>');
                        $link_editar = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/" . $value['id'], '<i class="fa fa-pencil"></i>');
                        $link_confirmar_pg = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/confirmar/" . $value['id'], '<i class="fa fa-thumbs-o-up fa-1x">      ');
                        $link_add = bt_link("processos/proc/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/pagamentos/form/", '<i class="fa fa-plus-square"></i> Adicionar Parcela');
                    }
                }

                
                echo
                '<tr>
                    <td>' . $value['n_parcela'] . '</td>
                    <td>' . data_br($value['data']) . '</td>
                    <td> R$ ' . decimal2str($value['valor']) . '</td>
                    <td>' . $quem . '</td>
                    <td>' . $status . '</td>
                    <td>' . $link_editar . ' | ' . $link_pagar . ' | ' . $link_confirmar_pg . '</td>
                </tr>';
            }
            echo '<tr><td colspan="6">' . $link_add . '</td></tr>';
            ?>

        </tbody>
    </table>
            <?php
        }



        if ($this->uri->segment(6) == "pagar" && $this->uri->segment(7) != '' && $this->uri->segment(8) == '') {
            $link = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7);
            echo confirma_acao("Deseja realmente confirmar o recebimento ? ", $link . '/1', $link . '/0');
        }
        if ($this->uri->segment(6) == "confirmar" && $this->uri->segment(7) != '' && $this->uri->segment(8) == '') {
            $link = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7);
            echo confirma_acao("Deseja realmente confirmar o confirmar o recebimento ? ", $link . '/1', $link . '/0');
        }