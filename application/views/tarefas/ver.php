

<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Usuarios</h4></div>
            <div class="panel-body">

                <div class="row"><div class="col-md-12"><hr></div></div>
                <table class="table table-hover registros">
                    <thead>	
                        <tr>
                            <th>Status</th>                            
                            <th>N° Proc.</th>

                            <th>Processo</th>
                            <th>Item</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        //debug($dados['tarefas']);
                        foreach ($dados['tarefas']as $key => $value) {
                            if($value['data']< date("Y-m-d")){
                                $cor = 'status_atrasados';
                                $letra = 'A';
                            }elseif ($value['data']> date("Y-m-d")) {
                                $cor = 'status_futuros';
                                $letra = 'F';
                            }elseif ($value['data']== date("Y-m-d")) {
                                $cor = 'status_hoje';
                                $letra = 'H';
                            }
                            
                            
                            echo '
				<tr>
					<td><div class="'.$cor.'"><span>'.$letra.'</span></div></td>
					<td>' . $value['id_processo'] . '</td>
					<td>' . $value['nome'] . '</td>
					<td>' . $value['item'] . '</td>
					<td>' . $value['obs'] . '</td>
                                        <td> ' . anchor('processos/proc/'.$value['id_cliente'].'/'.$value['id_processo'].'/'.$value['nome'], '<i class="fa fa-eye fa-1x"></i>') . ' </td>
				</tr>
				';
                        }
              
                        ?>
                    </tbody>

                </table>		

                <!-- Daqui pra cima pode mudar -->
            </div>
        </div>
    </div>
</div>	