<?php

include "pg_clientes.php";
echo SubTitulo('Detran');
echo monta_input($tamanho = '3', $label = 'Data',$tipo_campo = 'text', $nome = 'detran_dt',$value = $dados['detran_dt'],$maxlength = "" , $classes = "data", $id = '');
echo monta_input($tamanho = '3', $label = 'Hora',$tipo_campo = 'text', $nome = 'detran_hr',$value = $dados['detran_hr'],$maxlength = "" , $classes = "", $id = '');
echo monta_input($tamanho = '6', $label = 'Unidade',$tipo_campo = 'text', $nome = 'detran_unidade',$value = $dados['detran_unidade'],$maxlength = "" , $classes = "", $id = '');
echo SubTitulo('Detran');
echo monta_input($tamanho = '3', $label = 'Data',$tipo_campo = 'text', $nome = 'clinica_dt',$value = $dados['clinica_dt'],$maxlength = "" , $classes = "", $id = 'data');
echo monta_input($tamanho = '3', $label = 'Hora',$tipo_campo = 'text', $nome = 'clinica_hr',$value = $dados['clinica_hr'],$maxlength = "" , $classes = "", $id = '');
echo monta_input($tamanho = '6', $label = 'Unidade',$tipo_campo = 'text', $nome = 'clinica_unidade',$value = $dados['clinica_unidade'],$maxlength = "" , $classes = "", $id = '');
echo SubTitulo('Encaminhamento Auto Escola');

echo monta_select($tamanho = '3',$label = 'Encaminhou a auto escola ',$nome = 'encaminhamento_auto_escola',$valores = $dados['select_sim_nao'],$selecionado = $dados['encaminhamento_auto_escola'] ,$id = "",$classes = "");
echo monta_input($tamanho = '3', $label = 'Data',$tipo_campo = 'text', $nome = 'encaminhamento_auto_escola_data',$value = $dados['encaminhamento_auto_escola_data'],$maxlength = "" , $classes = "data", $id = '');
echo monta_select($tamanho = '3',$label = 'Possui carro automatico ',$nome = 'possui_carro_automatico',$valores = $dados['select_sim_nao'],$selecionado = $dados['possui_carro_automatico'] ,$id = "",$classes = "");
echo monta_select($tamanho = '3',$label = 'Serv. Auto Esc. ',$nome = 'servico_auto_escola',$valores = $dados['select_servico_auto_escola'],$selecionado = $dados['servico_auto_escola'] ,$id = "",$classes = "");

echo SubTitulo('Encaminhamento do processo agendamento pratico');
echo monta_input($tamanho = '3', $label = 'Data',$tipo_campo = 'text', $nome = 'enc_proc_agendamento_aulas_data',$value = $dados['enc_proc_agendamento_aulas_data'],$maxlength = "" , $classes = "data", $id = '');
echo monta_select($tamanho = '3',$label = 'Passou no exame ',$nome = 'enc_proc_agendamento_aulas_passou',$valores = $dados['select_sim_nao'],$selecionado = $dados['enc_proc_agendamento_aulas_passou'] ,$id = "",$classes = "");
echo SubTitulo('Encaminhar o processo fisico');
echo monta_select($tamanho = '3',$label = 'Retirada da CNH',$nome = 'enc_proc_fisico_unidade',$valores = $dados['select_unidade'],$selecionado = $dados['enc_proc_fisico_unidade'] ,$id = "",$classes = "");

echo SubTitulo('');
if($dados['enc_proc_fisico_panilha_detran']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_detran']['vl']);  
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_detran']['vl']);
}
if($dados['enc_proc_fisico_panilha_renach']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_renach']['vl']);
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_renach']['vl']);   
}
if($dados['enc_proc_fisico_panilha_comp_end']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_comp_end']['vl']);   
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_panilha_comp_end']['vl']);   
}
if($dados['enc_proc_fisico_procuracao']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_procuracao']['vl']);
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_procuracao']['vl']);   
}
if($dados['enc_proc_fisico_laudo']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_laudo']['vl']);  
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['enc_proc_fisico_laudo']['vl']);   
}

echo SubTitulo('');
echo monta_select($tamanho = '3',$label = 'Confirmação de Recebimento ',$nome = 'enc_proc_fisico_confirmacao_recebi',$valores = $dados['select_sim_nao'],$selecionado = $dados['enc_proc_fisico_confirmacao_recebi'] ,$id = "",$classes = "");

echo SubTitulo('');
echo monta_select($tamanho = '3',$label = 'Aprovado',$nome = 'aprovado',$valores = $dados['select_sim_nao'],$selecionado = $dados['aprovado'] ,$id = "aprovado_id",$classes = "");


//*******************************************
echo '<div class="nao_aprovado_div"  style="display: none;">';
echo SubTitulo('Não aprovado');
echo monta_input($tamanho = '6', $label = 'Data',$tipo_campo = 'text', $nome = 'reprovado_data',$value = $dados['reprovado_data'],$maxlength = "" , $classes = "data", $id = '');
echo monta_input($tamanho = '6', $label = 'Valor',$tipo_campo = 'text', $nome = 'reprovado_valor',$value = $dados['reprovado_valor'],$maxlength = "" , $classes = "data", $id = '');
echo '</div>';

echo '<div class="aprovado_div"  style="display: none;">';
echo SubTitulo('Não aprovado');
echo monta_input($tamanho = '6', $label = 'Data',$tipo_campo = 'text', $nome = 'aprovado_data',$value = $dados['aprovado_data'],$maxlength = "" , $classes = "data", $id = '');
echo monta_input($tamanho = '6', $label = 'Data Validade',$tipo_campo = 'text', $nome = 'aprovado_validade',$value = $dados['aprovado_validade'],$maxlength = "" , $classes = "data", $id = '');
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

//echo bt_form('11', '1', $dados['bt'], '', 'validar_clientes');
