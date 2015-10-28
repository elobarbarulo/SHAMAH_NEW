<?php
include "pg_clientes.php";
echo SubTitulo('IPVA');

echo monta_select($tamanho = 3,$label = 'Condutor' ,$nome ='condutor_nome',$dados['conduntor_select'],$dados['condutor'],$id = "condutor_select");
echo SubTitulo('OBS: essa informação esta vindo do cadastro do cliente');
echo SubTitulo('<hr>');

if($dados['requerimento_ipva']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['requerimento_ipva']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['requerimento_ipva']['vl']).'<br>';    
}

if($dados['comprov_end']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprov_end']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprov_end']['vl']).'<br>';    
}

if($dados['licenciamento']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['licenciamento']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['licenciamento']['vl']).'<br>';    
}

if($dados['comprov_venda']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprov_venda']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprov_venda']['vl']).'<br>';    
}

if($dados['nota_fiscal']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['nota_fiscal']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['nota_fiscal']['vl']).'<br>';    
}
if($dados['declaracao_adaptacao']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['declaracao_adaptacao']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['declaracao_adaptacao']['vl']).'<br>';    
}
if($dados['declaracao_ipva']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['declaracao_ipva']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['declaracao_ipva']['vl']).'<br>';    
}


echo '<div class="condutor"  style="display: none;">';
    if($dados['laudo_detran']['selec'] == 1){
        echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['laudo_detran']['vl']).'<br>';    
    }else{
        echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['laudo_detran']['vl']).'<br>';    
    }
    
    if($dados['rg_cpf']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf']['vl']).'<br>';    
    }else{
        echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf']['vl']).'<br>';    
    }
echo '</div>';





//*******************************************


echo '<div class="nao_condutor"  style="display: none;">';
if($dados['laudo_sus']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['laudo_sus']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['laudo_sus']['vl']).'<br>';    
}

if($dados['rg_cpf']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf']['vl']).'<br>';    
}

if($dados['curatela']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['curatela']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['curatela']['vl']).'<br>';    
}

if($dados['mandado_seguranca']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['mandado_seguranca']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['mandado_seguranca']['vl']).'<br>';    
}
echo '</div>';






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

?>

