

<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Usuarios</h4></div>
            <div class="panel-body">

                <div class="row"><div class="col-md-12"><hr></div></div>

                <?php   echo form_open();  ?>
                
                <table class="table table-hover registros">
                    <thead>	
                        <tr>
                            <th><?php  echo monta_input($tamanho = 12 ,$label = 'Dia',$tipo_campo = 'txt',$nome = 'dia', $value = $this->uri->segment(3),$maxlength = "2" , $classes = "numero");  ?></th>                            
                            <th><?php  echo monta_input($tamanho = 12 ,$label = 'Mês',$tipo_campo = 'txt',$nome = 'mes', $value = $this->uri->segment(4),$maxlength = "2" , $classes = "numero");  ?></th>                            
                            <th><?php  echo monta_input($tamanho = 12 ,$label = 'Ano',$tipo_campo = 'txt',$nome = 'ano', $value = $this->uri->segment(5),$maxlength = "4" , $classes = "numero");  ?></th>                            
                            <th><?php  echo bt_form("0", "12", "Buscar") ?></th>                            
                        </tr>
                    </thead>
                </table>
                 <?php   echo form_close();  ?>
                <hr>

                <table class="table table-striped registros">
                    <thead>	
                        <tr>
                            <th>N° Processos</th>                            
                            <th>Cliente</th>                            
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Responsavel</th>
                            <th>Formas Pagamentos</th>
                            <th>Numero</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        foreach ($dados['contas'] as $key => $value) {
                            if($value['quem_ira_pagar'] == '1'){
                                $responsavel = 'Concessionaria';
                            }else{
                                $responsavel = 'Cliente';
                            }
                            if($value['forma_pagamento'] == '1'){
                                $pag = 'Dinheiro';      
                            }
                            if($value['forma_pagamento'] == '2'){
                                $pag = 'Deposito Bancario';      
                            }
                            if($value['forma_pagamento'] == '3'){
                                $pag = 'Cheque';      
                            }
                            if($value['forma_pagamento'] == '4'){
                                $pag = 'Boleto';      
                            }
                            
                            if($value['status'] == '0'){
                                $status = 'Não Pago';      
                            }         
                            if($value['status'] == '1'){
                                $status = 'Pago';      
                            }
                            if($value['status'] == '2'){
                                $status = 'Pagamento Confirmado <br> ' . data_br($value['dt_confirmacao']);      
                            }
                            echo '<tr>
                                    <td>'.$value['id_processo'].'</td>                            
                                    <td>'.$value['nome'].'<br>'.formatarCPF_CNPJ($value['cpf']).'</td>                            
                                    <td>'.  data_br($value['data']).'</td>
                                    <td> R$ '.decimal2str($value['valor']).'</td>
                                    <td>'.$responsavel.'</td>
                                    <td>'.$pag.'</td>
                                    <td>'.$value['numero'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            
                        }
                        ?>
                    </tbody>

                </table>		

                <!-- Daqui pra cima pode mudar -->
            </div>
        </div>
    </div>
</div>	