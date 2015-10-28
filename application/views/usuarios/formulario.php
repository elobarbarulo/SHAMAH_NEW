<!-- Padrão -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
  			<div class="panel-heading"><h4>Usuarios</h4></div>
			<div class="panel-body">
        		<?php 
		          if($dados['mensagem_form'] > 0){
		            echo reprovado(validation_errors() . '<br>' .$dados['mensagem_erro']); 
                            
		          } //$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)
		            echo form_open();
		  			echo SubTitulo('Cadastro de Usuario');
  					echo monta_input($tamanho = 6 ,$label = 'Nome',$tipo_campo = 'txt',$nome = 'nome',$value = $dados['form']['nome'],$maxlength = "50" , $classes = "nome");
  					echo monta_input($tamanho = 6 ,$label = 'Email',$tipo_campo = 'txt',$nome = 'email',$value = $dados['form']['email'],$maxlength = "150" , $classes = "email");
  					echo SubTitulo('');
  					echo monta_input($tamanho = 6 ,$label = 'CPF',$tipo_campo = 'txt',$nome = 'cpf',$value = formatarCPF_CNPJ($dados['form']['cpf']),$maxlength = "14" , $classes = "");//cnpj_cpf
                                        echo monta_select($tamanho = '6',$label = 'Status' ,$nome ='status',$dados['status'],$dados['form']['status']);                                        
                                        echo SubTitulo('');
                                        
                                        echo monta_select($tamanho = '6',$label = 'Tipo Usuario' ,$nome ='tipo_usurio',$dados['tipo_usurio'],$dados['form']['tipo_usurio']);
                                        $monta = "";
                                        $monta.='<div class="checkbox col-6" id="check_usuarios">';
                                        
                                        $monta.=($dados['form']['resp_cnh'] == 0) ? monta_form_check('responsavidades[]',"","","CNH"): monta_form_check_checado('responsavidades[]',"","","CNH");
                                        $monta.=($dados['form']['resp_rodizio'] == 0) ? monta_form_check('responsavidades[]',"","","RODIZIO"): monta_form_check_checado('responsavidades[]',"","","RODIZIO");
                                        $monta.=($dados['form']['resp_defis'] == 0) ? monta_form_check('responsavidades[]',"","","DEFIS"): monta_form_check_checado('responsavidades[]',"","","DEFIS");
                                        $monta.=($dados['form']['resp_icms'] == 0) ? monta_form_check('responsavidades[]',"","","ICMS"): monta_form_check_checado('responsavidades[]',"","","ICMS");
                                        $monta.=($dados['form']['resp_ipi'] == 0) ? monta_form_check('responsavidades[]',"","","IPI"): monta_form_check_checado('responsavidades[]',"","","IPI");
                                        $monta.=($dados['form']['resp_ipva'] == 0) ? monta_form_check('responsavidades[]',"","","IPVA"): monta_form_check_checado('responsavidades[]',"","","IPVA");
                                        $monta.=($dados['form']['resp_laudos'] == 0) ? monta_form_check('responsavidades[]',"","","LAUDOS"): monta_form_check_checado('responsavidades[]',"","","LAUDOS");

                                        $monta.='</div>';
                                        echo $monta;
                                        
                                        
                                        
		            echo bt_form('11','1',$dados['bt']);
		            echo form_close();

  				?> 

  		<div class="row"><div class="col-md-12"><hr></div></div>
  		<table class="table table-hover registros">
			<thead>	
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Status</th>
					<th>ação</th>
				</tr>
			</thead>
		
                        <tbody>
				<?php 
                                //debug($dados,true);
                                foreach ($dados['registros'] as $key => $value) {
                                    if($value['status'] == 0){
                                        $status = '<i class="fa fa-ban"></i>';
                                    }else{
                                       $status = '<i class="fa fa-thumbs-up"></i>'; 
                                    }
                                    
				echo '
				<tr>
					<td>'.$value['nome'].'</td>
					<td>'.$value['email'].'</td>
					<td>'.$status.'</td>
					<td> 
						'.anchor('usuarios/formulario/'.$value['id'],'<i class="fa fa-pencil"></i>').' | 
						'.anchor('usuarios/excluir/'.$value['id'],'<i class="fa fa-user-times"></i>').' 
					</td>
				</tr>
				';
				} ?>
			</tbody>
                        
		</table>		

 				<!-- Daqui pra cima pode mudar -->
  			</div>
 		</div>
	</div>
</div>	


