
<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Cliente</h4></div>
            <div class="panel-body">
                <?php
               
                echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4));
                echo SubTitulo('Cliente');
                echo monta_input($tamanho = 7, $label = 'Nome Completo', $tipo_campo = 'txt', $nome = 'nome', $value = $dados['form']['nome'], $maxlength = "100", $classes = "");
                echo monta_input($tamanho = 3, $label = 'Nascimento', $tipo_campo = 'txt', $nome = 'dt_nasc', $value = $dados['form']['dt_nasc'], $maxlength = "100", $classes = "data", $id="");
                echo monta_select($tamanho = '2',$label = 'SEXO' ,$nome ='sexo',$dados['sexo'],$dados['form']['sexo'],$id = "");
                
                echo SubTitulo('');
                echo monta_input($tamanho = 5, $label = 'CPF', $tipo_campo = 'txt', $nome = 'cpf', $value = $dados['form']['cpf'], $maxlength = "100", $classes = "cpf", $id="cpf");
                echo monta_input($tamanho = 5, $label = 'RG', $tipo_campo = 'txt', $nome = 'rg', $value = $dados['form']['rg'], $maxlength = "100", $classes = "");
                echo monta_input($tamanho = 2, $label = 'RG UF', $tipo_campo = 'txt', $nome = 'rg_uf', $value = $dados['form']['rg_uf'], $maxlength = "100", $classes = "rg");
                echo SubTitulo('');
                echo monta_input($tamanho = 12, $label = 'Email', $tipo_campo = 'txt', $nome = 'email', $value = $dados['form']['email'], $maxlength = "100", $classes = "");
                echo SubTitulo('');
                echo monta_input($tamanho = 3, $label = 'Inscrição do INSS', $tipo_campo = 'txt', $nome = 'inss', $value = $dados['form']['inss'], $maxlength = "100", $classes = "");
                echo monta_select($tamanho = 3,$label = 'Tem CNH' ,$nome ='tem_cnh',$dados['tem_cnh'],$dados['form']['tem_cnh'],$id = "tem_cnh");
                echo '<div class="form_cnh" style="display: none">';
                echo monta_input($tamanho = 3, $label = 'CNH Nº', $tipo_campo = 'txt', $nome = 'cnh_numero', $value = $dados['form']['cnh_numero'], $maxlength = "20", $classes = "");
                echo monta_select($tamanho = 3,$label = 'CNH TIPO' ,$nome ='cnh_tipo',$dados['cnh_tipo'],$dados['form']['cnh_tipo'],$id = "",$classes = "");
                echo '</div>';
                
                echo SubTitulo('');
                echo monta_select($tamanho = 4,$label = 'Possui CNJP' ,$nome ='possui_cnpj',$dados['tem_cnh'],$dados['form']['possui_cnpj'],$id = "");
                echo monta_select($tamanho = 4,$label = 'Possui carro automatico' ,$nome ='possui_carro_automatico',$dados['tem_cnh'],$dados['form']['possui_carro_automatico'],$id = "");
                echo monta_input($tamanho = 4, $label = 'Atividade', $tipo_campo = 'txt', $nome = 'atividade', $value = $dados['form']['atividade'], $maxlength = "100", $classes = "");
                echo SubTitulo('Endereço');
                echo monta_input($tamanho = 10, $label = 'Logradoro', $tipo_campo = 'txt', $nome = 'end_logradouro', $value = $dados['form']['end_logradouro'], $maxlength = "100", $classes = "");
                echo monta_input($tamanho = 2, $label = 'Nº', $tipo_campo = 'txt', $nome = 'end_n', $value = $dados['form']['end_n'], $maxlength = "100", $classes = "numemro");
                echo SubTitulo('');
                echo monta_input($tamanho = 4, $label = 'Complemento', $tipo_campo = 'txt', $nome = 'end_complemento', $value = $dados['form']['end_complemento'], $maxlength = "100", $classes = "");
                echo monta_input($tamanho = 4, $label = 'Bairro', $tipo_campo = 'txt', $nome = 'end_bairro', $value = $dados['form']['end_bairro'], $maxlength = "20", $classes = "");
                echo monta_input($tamanho = 4, $label = 'CEP', $tipo_campo = 'txt', $nome = 'end_cep', $value = $dados['form']['end_cep'], $maxlength = "100", $classes = "cep");
                echo SubTitulo('');
                echo monta_input($tamanho = 4, $label = 'Municipio', $tipo_campo = 'txt', $nome = 'end_cidade', $value = $dados['form']['end_cidade'], $maxlength = "20", $classes = "");
                echo monta_input($tamanho = 4, $label = 'UF', $tipo_campo = 'txt', $nome = 'end_estado', $value = $dados['form']['end_estado'], $maxlength = "2", $classes = "");
                echo SubTitulo('');
                echo monta_select($tamanho = 3,$label = 'Condutor' ,$nome ='condutor',$dados['tem_cnh'],$dados['form']['condutor'],$id = "");
                echo bt_form('11', '1', $dados['bt'], '', 'validar_clientes');
                echo form_close();
                ?>

            </div>
        </div>
    </div>
</div>	


