
<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align:left;"><h4>Cliente</h4></td>
                        <td style="text-align:right;"><?php echo bt_link("processos/proc/".$this->uri->segment(3)."/0/ver/","Processo",'success');  ?>        </td>
                    </tr>
                </table>
                
            </div>
            <div class="panel-body">
                
                <?php
                echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7));
                if ($this->uri->segment(4) == "telefone" && $this->uri->segment(6) == "1") {
                    echo SubTitulo('Editar Telefone');
                    echo monta_input($tamanho = 3, $label = 'Nº', $tipo_campo = 'txt', $nome = 'n_tel', $value = $dados['form']['n_tel'], $maxlength = "15", $classes = "telefone");
                    echo monta_select($tamanho = 2, $label = 'Tipo', $nome = 't_tel', $dados['tel_tipo'], $dados['form']['t_tel'], $id = "");
                    echo monta_input($tamanho = 7, $label = 'Obs', $tipo_campo = 'txt', $nome = 'o_tel', $value = $dados['form']['o_tel'], $maxlength = "100", $classes = "");
                    //echo bt_form($tamanho_espaco = '11', $tamanho_bt = '1', $texto = "Alterar", $id = "", $class = "validar_clientes");
                } elseif ($this->uri->segment(4) == "ajuda" && $this->uri->segment(6) == "1") {
                    echo SubTitulo('Editar Ajuda financeira');
                    echo monta_input($tamanho = 6, $label = 'Nome', $tipo_campo = 'txt', $nome = 'a_nome', $value = $dados['form']['a_nome'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 6, $label = 'CPF', $tipo_campo = 'txt', $nome = 'a_cpf', $value = $dados['form']['a_cpf'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_select($tamanho = 6, $label = 'Parentesco', $nome = 'a_parentesco', $dados['parentesco'], $dados['form']['a_parentesco'], $id = "");
                    echo monta_input($tamanho = 6, $label = 'RG', $tipo_campo = 'txt', $nome = 'a_rg', $value = $dados['form']['a_rg'], $maxlength = "100", $classes = "");
                } else {

                    echo SubTitulo('Cliente');
                    echo monta_input($tamanho = 7, $label = 'Nome Completo', $tipo_campo = 'txt', $nome = 'nome', $value = $dados['form']['nome'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 3, $label = 'Nascimento', $tipo_campo = 'txt', $nome = 'dt_nasc', $value = data_br($dados['form']['dt_nasc']), $maxlength = "100", $classes = "data", $id = "");
                    echo monta_select($tamanho = '2', $label = 'SEXO', $nome = 'sexo', $dados['sexo'], $dados['form']['sexo'], $id = "");

                    echo SubTitulo('');
                    echo monta_input($tamanho = 5, $label = 'CPF', $tipo_campo = 'txt', $nome = 'cpf', $value = $dados['form']['cpf'], $maxlength = "100", $classes = "cpf", $id = 'cpf');
                    echo monta_input($tamanho = 5, $label = 'RG', $tipo_campo = 'txt', $nome = 'rg', $value = $dados['form']['rg'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 2, $label = 'RG UF', $tipo_campo = 'txt', $nome = 'rg_uf', $value = $dados['form']['rg_uf'], $maxlength = "100", $classes = "rg");
                    echo SubTitulo('');
                    echo monta_input($tamanho = 12, $label = 'Email', $tipo_campo = 'txt', $nome = 'email', $value = $dados['form']['email'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_input($tamanho = 3, $label = 'Inscrição do INSS', $tipo_campo = 'txt', $nome = 'inss', $value = $dados['form']['inss'], $maxlength = "100", $classes = "");
                    echo monta_select($tamanho = 3, $label = 'Tem CNH', $nome = 'tem_cnh', $dados['tem_cnh'], $dados['form']['tem_cnh'], $id = "tem_cnh");
                    echo '<div class="form_cnh" style="display: none">';
                    echo monta_input($tamanho = 3, $label = 'CNH Nº', $tipo_campo = 'txt', $nome = 'cnh_numero', $value = $dados['form']['cnh_numero'], $maxlength = "20", $classes = "");
                    echo monta_select($tamanho = 3, $label = 'CNH TIPO', $nome = 'cnh_tipo', $dados['cnh_tipo'], $dados['form']['cnh_tipo'], $id = "", $classes = "");
                    echo '</div>';
                    echo SubTitulo('');
                    echo monta_select($tamanho = 4, $label = 'Possui CNJP', $nome = 'possui_cnpj', $dados['tem_cnh'], $dados['form']['possui_cnpj'], $id = "");
                    echo monta_select($tamanho = 4, $label = 'Possui carro automatico', $nome = 'possui_carro_automatico', $dados['tem_cnh'], $dados['form']['possui_carro_automatico'], $id = "");
                    echo monta_input($tamanho = 4, $label = 'Atividade', $tipo_campo = 'txt', $nome = 'atividade', $value = $dados['form']['atividade'], $maxlength = "100", $classes = "");
                    echo SubTitulo('Endereço');
                    echo monta_input($tamanho = 10, $label = 'Logradoro', $tipo_campo = 'txt', $nome = 'end_logradouro', $value = $dados['form']['end_logradouro'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 2, $label = 'Nº', $tipo_campo = 'txt', $nome = 'end_n', $value = $dados['form']['end_n'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_input($tamanho = 4, $label = 'Complemento', $tipo_campo = 'txt', $nome = 'end_complemento', $value = $dados['form']['end_complemento'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 4, $label = 'Bairro', $tipo_campo = 'txt', $nome = 'end_bairro', $value = $dados['form']['end_bairro'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 4, $label = 'CEP', $tipo_campo = 'txt', $nome = 'end_cep', $value = $dados['form']['end_cep'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_input($tamanho = 4, $label = 'Municipio', $tipo_campo = 'txt', $nome = 'end_cidade', $value = $dados['form']['end_cidade'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 4, $label = 'UF', $tipo_campo = 'txt', $nome = 'end_estado', $value = $dados['form']['end_estado'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_select($tamanho = 3, $label = 'Condutor', $nome = 'condutor', $dados['tem_cnh'], $dados['form']['condutor'], $id = "");

                    echo SubTitulo('Telefones');
                    echo monta_input($tamanho = 3, $label = 'Nº', $tipo_campo = 'txt', $nome = 'n_tel', $value = $dados['form']['n_tel'], $maxlength = "15", $classes = "telefone");
                    echo monta_select($tamanho = 2, $label = 'Tipo', $nome = 't_tel', $dados['tel_tipo'], $dados['form']['t_tel'], $id = "");
                    echo monta_input($tamanho = 7, $label = 'Obs', $tipo_campo = 'txt', $nome = 'o_tel', $value = $dados['form']['o_tel'], $maxlength = "100", $classes = "");
                    echo bt_form($tamanho_espaco = '11', $tamanho_bt = '1', $texto = "Salvar", $id = "", $class = "validar_clientes");
                    echo SubTitulo('');
                    $teste = '
                    <div class="col-md-12">
                    <table class="table table-hover">
                      <thead><tr><td colspan="4"><h3>Telefones</h3></td></tr>
                        <tr>
                            <td>Telefone</td>
                            <td>Tipo</td>
                            <td>Obs</td>
                            <td class="icone"></td>
                        </tr>
                        </thead>';
                    foreach ($dados['telefones'] as $key => $value) {
                        if ($value['tipo'] == 1) {
                            $tipo = "Fixo";
                        }
                        if ($value['tipo'] == 2) {
                            $tipo = "Tim";
                        }
                        if ($value['tipo'] == 3) {
                            $tipo = "Oi";
                        }
                        if ($value['tipo'] == 4) {
                            $tipo = "Vivo";
                        }
                        if ($value['tipo'] == 5) {
                            $tipo = "Comercial";
                        }
                        if ($value['tipo'] == 6) {
                            $tipo = "Claro";
                        }
                        if ($value['tipo'] == 7) {
                            $tipo = "Nextel";
                        }
                        if ($value['tipo'] == 8) {
                            $tipo = "Recado";
                        }

                        $link_editar = anchor(site_url() . "clientes/formulario_concluir/" . $this->uri->segment(3) . "/telefone/" . $value['id'] . "/1", "<i class='fa fa-pencil'></i> | ");
                        $link_excluir = anchor(site_url() . "clientes/formulario_concluir/" . $this->uri->segment(3) . "/telefone/" . $value['id'] . "/2", "<i class='fa fa-trash'></i>");
                        $teste.='<tr>
                            <td>' . $value['telefone'] . '</td>
                            <td>' . $tipo . '</td>
                            <td>' . $value['obs'] . '</td>
                            <td class="icone">' . $link_editar . $link_excluir . '</td>
                        </tr>';
                    }
                    $teste.='
                    </table>
                    </div>';

                    echo $teste;

                    /* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
                    echo SubTitulo('Imcapaz ?');
                    echo monta_select($tamanho = '12', $label = 'Incapaz', $nome = 'incapaz', $dados['incapaz'], $dados['form']['incapaz'], $id = "incapaz");
                    echo SubTitulo('');
                    echo '<div class="form_incapaz" style="display: none">';
                    echo '<div class="form_pessoal_incapaz">';
                    echo monta_input($tamanho = 6, $label = 'Nome', $tipo_campo = 'txt', $nome = 'i_nome', $value = $dados['form']['i_nome'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 6, $label = 'CPF', $tipo_campo = 'txt', $nome = 'i_cpf', $value = $dados['form']['i_cpf'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_select($tamanho = 6, $label = 'Parentesco', $nome = 'i_parentesco', $dados['parentesco'], $dados['form']['i_parentesco'], $id = "");
                    echo monta_input($tamanho = 6, $label = 'RG', $tipo_campo = 'txt', $nome = 'i_rg', $value = $dados['form']['i_rg'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    if($dados['form']['curatela'] == 0){
                        echo monta_form_check($nome='documentos[]', $class = '', $id = '', $texto = ' Curatela');    
                    }else{
                        echo monta_form_check_checado($nome='documentos[]', $class = '', $id = '', $texto = ' Curatela');    
                    }
                    
                    if($dados['form']['mandado_seguranca'] == 0){
                        echo monta_form_check($nome='documentos[]', $class = '', $id = '', $texto = ' Mandado de Seg.');    
                    }else{
                        echo monta_form_check_checado($nome='documentos[]', $class = '', $id = '', $texto = ' Mandado de Seg.');    
                    }
                    
                    if($dados['form']['tutela'] == 0){
                        echo monta_form_check($nome='documentos[]', $class = '', $id = '', $texto = ' Tutela');    
                    }else{
                        echo monta_form_check_checado($nome='documentos[]', $class = '', $id = '', $texto = ' Tutela');    
                    }                    
                    echo '</div>';
                    echo '</div>';
                    /* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
                    echo SubTitulo('Terá Ajuda financeira ?');
                    echo monta_select($tamanho = '12', $label = 'Ajuda', $nome = 'ajuda_finaceira', $dados['ajuda_finaceira'], $dados['form']['ajuda_finaceira'], $id = "aj_fin");
                    echo '<div class="form_ajuda_financeira" style="display: none">';
                    echo SubTitulo('');
                    echo monta_input($tamanho = 6, $label = 'Nome', $tipo_campo = 'txt', $nome = 'a_nome', $value = $dados['form']['a_nome'], $maxlength = "100", $classes = "");
                    echo monta_input($tamanho = 6, $label = 'CPF', $tipo_campo = 'txt', $nome = 'a_cpf', $value = $dados['form']['a_cpf'], $maxlength = "100", $classes = "");
                    echo SubTitulo('');
                    echo monta_select($tamanho = 6, $label = 'Parentesco', $nome = 'a_parentesco', $dados['parentesco'], $dados['form']['a_parentesco'], $id = "");
                    echo monta_input($tamanho = 6, $label = 'RG', $tipo_campo = 'txt', $nome = 'a_rg', $value = $dados['form']['a_rg'], $maxlength = "100", $classes = "");

                    echo SubTitulo('');
                    $ajuda = '
                    <div class="col-md-12">
                    <table class="table table-hover">
                      <thead><tr><td colspan="5"><h3>Ajuda Financeira</h3></td></tr>
                        <tr>
                            <td>Nome</td>
                            <td>RG</td>
                            <td>CPF</td>
                            <td>Parentesco</td>
                            <td class="icone"></td>
                        </tr>
                        </thead>';
                    foreach ($dados['ajuda'] as $key => $value) {
                        if ($value['parentesco'] == "1") {
                            $parentesco = "Pai";
                        }
                        if ($value['parentesco'] == "2") {
                            $parentesco = "Mãe";
                        }
                        if ($value['parentesco'] == "3") {
                            $parentesco = "Filho/Filha";
                        }
                        if ($value['parentesco'] == "4") {
                            $parentesco = "Tio/Tia";
                        }
                        if ($value['parentesco'] == "5") {
                            $parentesco = "Primo/Prima";
                        }
                        if ($value['parentesco'] == "6") {
                            $parentesco = "Irmão/Irmã";
                        }

                        $link_editar = anchor(site_url() . "clientes/formulario_concluir/" . $this->uri->segment(3) . "/ajuda/" . $value['id'] . "/1", "<i class='fa fa-pencil'></i> | ");
                        $link_excluir = anchor(site_url() . "clientes/formulario_concluir/" . $this->uri->segment(3) . "/ajuda/" . $value['id'] . "/2", "<i class='fa fa-trash'></i>");

                        $ajuda.='<tr>
                            <td>' . $value['nome'] . '</td>
                            <td>' . $value['rg'] . '</td>
                            <td>' . $value['cpf'] . '</td>
                            <td>' . $parentesco . '</td>
                            <td class="icone">' . $link_editar . $link_excluir . '</td>
                        </tr>';
                    }
                    $ajuda.='
                    </table>
                    </div>';

                    echo $ajuda;
                }
                echo '</div>';
                
                echo bt_form($tamanho_espaco = '11', $tamanho_bt = '1', $texto = $dados['bt'], $id = "", $class = "validar_clientes");
                
                echo form_close();

                if ($this->uri->segment(4) == "telefone" && $this->uri->segment(6) == "2") {
                    $link_voltar = site_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
                    $link_confirmacao = $link_voltar . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/1';
                    echo confirma_acao($mensagem = "Deseja realmente excluir o Telefone", $link_confirmacao, $link_voltar);
                }
                if ($this->uri->segment(4) == "ajuda" && $this->uri->segment(6) == "2") {
                    $link_voltar = site_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
                    $link_confirmacao = $link_voltar . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/1';
                    echo confirma_acao($mensagem = "Deseja realmente excluir a ajuda financeira", $link_confirmacao, $link_voltar);
                }
                ?>

            </div>
        </div>
    </div>
</div>	




