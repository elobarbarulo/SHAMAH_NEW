<?php
include "pg_clientes.php";
echo SubTitulo('ICMS');

echo monta_select($tamanho = 3,$label = 'Condutor' ,$nome ='condutor_nome',$dados['conduntor_select'],$dados['condutor'],$id = "condutor_select");
echo SubTitulo('OBS: essa informação esta vindo do cadastro do cliente');
echo SubTitulo('<hr>');



if($dados['requerimento_icms']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['requerimento_icms']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['requerimento_icms']['vl']).'<br>';    
}
if($dados['procuracao_icms']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['procuracao_icms']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['procuracao_icms']['vl']).'<br>';    
}
if($dados['procuracao_shamah']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['procuracao_shamah']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['procuracao_shamah']['vl']).'<br>';    
}
if($dados['cartas_originais_ipi']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['cartas_originais_ipi']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['cartas_originais_ipi']['vl']).'<br>';    
}
if($dados['carta_concessionaria']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['carta_concessionaria']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['carta_concessionaria']['vl']).'<br>';    
}
if($dados['carta_financiamento']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['carta_financiamento']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['carta_financiamento']['vl']).'<br>';    
}
if($dados['extrato_bancario']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['extrato_bancario']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['extrato_bancario']['vl']).'<br>';    
}
if($dados['carta_ip']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['carta_ip']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['carta_ip']['vl']).'<br>';    
}
//*******************************************
echo '<div class="condutor"  style="display: none;">';
if ($dados['laudo_detran']['selec'] == 1) {
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['laudo_detran']['vl']) . '<br>';
} else {
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['laudo_detran']['vl']) . '<br>';
}
if ($dados['rg_cpf_c']['selec'] == 1) {
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf_c']['vl']) . '<br>';
} else {
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf_c']['vl']) . '<br>';
}
if ($dados['comprov_endereco_c']['selec'] == 1) {
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprov_endereco_c']['vl']) . '<br>';
} else {
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprov_endereco_c']['vl']) . '<br>';
}
if ($dados['comprovante_renda_c']['selec'] == 1) {
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprovante_renda_c']['vl']) . '<br>';
} else {
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprovante_renda_c']['vl']) . '<br>';
}
if ($dados['declaracoes_imposto_renda_c']['selec'] == 1) {
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['declaracoes_imposto_renda_c']['vl']) . '<br>';
} else {
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['declaracoes_imposto_renda_c']['vl']) . '<br>';
}
echo '</div>';
//*******************************************

echo '<div class="nao_condutor"  style="display: none;">';


if($dados['laudo_sus']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['laudo_sus']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['laudo_sus']['vl']).'<br>';    
}
if($dados['rg_cpf_n_c']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf_n_c']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['rg_cpf_n_c']['vl']).'<br>';    
}
if($dados['comprov_endereco_n_c']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprov_endereco_n_c']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprov_endereco_n_c']['vl']).'<br>';    
}
if($dados['curatela']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['curatela']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['curatela']['vl']).'<br>';    
}
if($dados['comprovante_renda_n_c']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['comprovante_renda_n_c']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['comprovante_renda_n_c']['vl']).'<br>';    
}
if($dados['declaracoes_imposto_renda_n_c']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['declaracoes_imposto_renda_n_c']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['declaracoes_imposto_renda_n_c']['vl']).'<br>';    
}

echo '</div>';

echo monta_select($tamanho = 12,$label = 'Tipo da Compra' ,$nome ='tipo_compra_nome',$dados['tipo_compra'],$dados['tipo_compra'],$id = "tipo_compra_id");



echo '<div class="ajuda_financeira"  style="display: none;">';
echo SubTitulo('');
echo SubTitulo('Ajuda Financeira');
if($dados['aj_declaracao']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['aj_declaracao']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['aj_declaracao']['vl']).'<br>';    
}
if($dados['aju_rg_cpf']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['aju_rg_cpf']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['aju_rg_cpf']['vl']).'<br>';    
}
if($dados['aju_comprov_renda']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['aju_comprov_renda']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['aju_comprov_renda']['vl']).'<br>';    
}
if($dados['aju_declaracoes_imposto_renda']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['aju_declaracoes_imposto_renda']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['aju_declaracoes_imposto_renda']['vl']).'<br>';    
}
if($dados['aju_certidao_casamento']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['aju_certidao_casamento']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['aju_certidao_casamento']['vl']).'<br>';    
}
echo '</div>';



echo '<div class="cedendo_veiculo"  style="display: none;">';
echo SubTitulo('');
echo SubTitulo('Cedendo o Veiculo');
if($dados['ced_veiculo_declaracao']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_declaracao']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_declaracao']['vl']).'<br>';    
}
if($dados['ced_veiculo_recibo']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_recibo']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_recibo']['vl']).'<br>';    
}
if($dados['ced_veiculo_rg_cpf']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_rg_cpf']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['ced_veiculo_rg_cpf']['vl']).'<br>';    
}
echo '</div>';

echo '<div class="veiculo_pagamento"  style="display: none;">';
echo SubTitulo('');
echo SubTitulo('Veiculo parte do pagamento');
if($dados['veic_pag_declaracao']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['veic_pag_declaracao']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['veic_pag_declaracao']['vl']).'<br>';    
}
if($dados['veic_pag_recibo']['selec'] == 1){
    echo monta_form_check_checado($nome = 'campo[]', $class = '', $id = '', $dados['veic_pag_recibo']['vl']).'<br>';    
}else{
    echo monta_form_check($nome = 'campo[]', $class = '', $id = '', $dados['veic_pag_recibo']['vl']).'<br>';    
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

