
<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Serviços</h4></div>
            <div class="panel-body">
                <?php
                if ($dados['mensagem_form'] > 0) {
                    echo reprovado(validation_errors());
                }
                
                if($this->uri->segment(3) != ''){
                    echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4));
                    echo SubTitulo('Dados Serviço');
                    echo monta_input($tamanho = 6, $label = 'Nome Serviço', $tipo_campo = 'txt', $nome = 'nome', $value = $dados['form']['nome'], $maxlength = "50", $classes = "nome");
                    echo monta_input($tamanho = 6, $label = 'Valor', $tipo_campo = 'txt', $nome = 'valor', $value = $dados['form']['valor'], $maxlength = "50", $classes = "");
                    echo bt_form('11', '1', $dados['bt']);
                    echo form_close();
                }
                
                ?>

                <div class="row"><div class="col-md-12"><hr></div></div>
                <table class="table table-hover registros">
                    <thead>	
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dados['registros'] as $key => $value) {
                            echo '
				<tr>
					<td>' . $value['nome'] . '</td>
					<td>' . $value['valor'] . '</td>
					
					<td> 
						' . anchor('servicos/formulario/' . $value['id'], '<i class="fa fa-pencil"></i>') . ' | 
						' . anchor('servicos/excluir/' . $value['id'], '<i class="fa fa-user-times"></i>') . ' 
					</td>
				</tr>
				';
                        }
                        ?>
                    </tbody>
                </table>		


            </div>
        </div>
    </div>
</div>	


