

<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Usuarios</h4></div>
            <div class="panel-body">

                <div class="row"><div class="col-md-12"><hr></div></div>
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
                            <th>Ação</th>
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
                            
                            if($value['status'] == '1'){
                                $status = 'Não Pago';      
                            }         
                            if($value['status'] == '2'){
                                $status = 'Pago';      
                            }
                            if($value['status'] == '3'){
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
                                    <td>'. anchor('processos/proc/' . $value['id'].'/'.$value['id_processo'].'/pagamentos', '<i class="fa fa-eye fa-1x"></i>').'</td>
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