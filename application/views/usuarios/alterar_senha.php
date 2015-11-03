<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Usuarios</h4></div>
            <div class="panel-body">
                <?php
                echo form_open();
                $session = $this->session->all_userdata();
                echo SubTitulo('Cadastro de Usuario');
                echo monta_input_ver($tamanho = 6, $label = 'Nome', $tipo_campo = 'txt', $nome = 'nome', $value = $session['usuario']->nome, $maxlength = "50", $classes = "nome");
                echo monta_input_ver($tamanho = 6, $label = 'Email', $tipo_campo = 'txt', $nome = 'email', $value = $session['usuario']->email, $maxlength = "150", $classes = "email");
                echo SubTitulo('');
                echo monta_input_ver($tamanho = 6, $label = 'CPF', $tipo_campo = 'txt', $nome = 'cpf', $value = formatarCPF_CNPJ($session['usuario']->cpf), $maxlength = "14", $classes = ""); //cnpj_cpf
                echo monta_input($tamanho = 6, $label = 'SENHA', $tipo_campo = 'txt', $nome = 'senha', $value = '', $maxlength = "14", $classes = "");
                echo bt_form('11', '1', "Alterar");
                echo form_close();
                ?> 
                <!-- Daqui pra cima pode mudar -->
            </div>
        </div>
    </div>
</div>	


