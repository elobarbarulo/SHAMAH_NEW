<?php
include "pg_clientes.php";

echo SubTitulo('Laudos');
echo monta_select($tamanho = '3',$label = 'Tipo Laudo',$nome = 'tipo_laudo',$valores = $dados['select_tipo_laudo'],$selecionado = $dados['tipo_laudo'] ,$id = "",$classes = "");
echo monta_input($tamanho = '3', $label = 'Emissão',$tipo_campo = 'text', $nome = 'data_emissao',$value = $dados['data_emissao'],$maxlength = "" , $classes = "data", $id = '');
echo monta_input($tamanho = '3', $label = 'Validede',$tipo_campo = 'text', $nome = 'data_validade',$value = $dados['data_validade'],$maxlength = "" , $classes = "data", $id = '');
echo monta_select($tamanho = '3',$label = 'Medico',$nome = 'medico',$valores = $dados['select_tipo_medico'],$selecionado = $dados['medico'] ,$id = "",$classes = "");



//*******************************************
echo SubTitulo('<hr>');
echo SubTitulo('ALERTA');
echo monta_input($tamanho = 3, $label = 'Data', $tipo_campo = 'txt', $nome = 'alerta_data', $value = "", $maxlength = "13", $classes = "data");
echo monta_select($tamanho = 4,$label = 'Item' ,$nome ='item',$dados['item'],$dados['item'],$id = "");
echo monta_input($tamanho = 5, $label = 'Mensagem', $tipo_campo = 'txt', $nome = 'alerta_mensagem', $value = "", $maxlength = "", $classes = "");

//*******************************************
echo SubTitulo('<hr>');



$mensagem = 
'<table class="table table-hover table-striped">
    <thead>
        <tr>
            <td>Data</td>
            <td>Item</td>
            <td>Responsavel</td>
            <td>Item</td>
            <td>Ação</td>
        </tr>
    </thead>
    <tbody>';
        
    $link =  base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/';

    
    foreach ($dados['talefas_list'] as $key => $value) {
        $mensagem .='<tr>
                <td>'.  data_br($value['data']).'</td>                
                <td>'.$value['item'].'</td>
                <td>'.$value['nome'].'</td>
                <td>'.$value['obs'].'</td>
                <td>'.  bt_link($link.'tarefas/'.$value['id'], "Finalizar").'</td>
            </tr>';
    }

$mensagem .= '</tbody>
</table>';
if(count($dados['talefas_list']) == 0){
    echo mensagem_alerta("Nenhum alerta para esse processo");
}else{
   echo reprovado($mensagem);
}




//*******************************************
echo SubTitulo('<hr>');
echo SubTitulo('STATUS PARA O RESUMO DO PROCESSO');
echo monta_select($tamanho = 3,$label = 'Status' ,$nome ='status',$dados['status_select'],$dados['form']['status'] ,$id = "status");
echo SubTitulo('');
echo monta_input($tamanho = 12, $label = 'Observação', $tipo_campo = 'txt', $nome = 'obs', $value = "", $maxlength = "100", $classes = "");
echo 'o que for escrito aqui aparecerá no status geral';
echo SubTitulo('');
echo SubTitulo('<div class="form-group"><label>Anexar <label><input type="file" name="arquivo"></div>');
echo bt_form('11', '1', $dados['bt'], '', 'validar_processo');
echo SubTitulo('<hr>');

echo SubTitulo('Anexos');
foreach ($dados['arquivos'] as $key => $value) {
   $caminho = base_url().'anexos/'.$value['anexo'];
   echo '<iframe class=" col-md-6" src="'.$caminho.'" width="800px" height="600px" ></iframe>';
}

if($this->uri->segment(6) == 'tarefas' && $this->uri->segment(7)!= "" ){
    echo confirma_acao("Deseja realmente confirmar a tarefa" ,$link.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(7),$link);
}

//echo bt_form('11', '1', $dados['bt'], '', 'validar_clientes');
