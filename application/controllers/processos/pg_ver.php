<?php

//Se for igual a zero vejo se tem algum processo do aberto deste com clinte com status ativo
$cons = new Query_model();
$cons->SetTabelas("processos");
$cons->SetCondicao(
                    "id_cliente = '".$this->uri->segment(3)."' AND "
                    . "status = '1'"
                  );

$cons->SetCampos("*");
$cons->SetTipoRetorno(1);
$consulta = $cons->get();

if($this->uri->segment(4) == 0){
    if(count($consulta) == 0){
        redirect("processos/proc/".$this->uri->segment(3).'/0/novo');
    }else{
        redirect("processos/proc/".$this->uri->segment(3).'/'.$consulta->id.'/ver');
    }
}

/****************************************************************************/
$const_ipi = new Query_model();
$const_ipi->SetCampos("status");
$const_ipi->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_ipi->SetTabelas("processos_ipi");
$const_ipi->SetTipoRetorno(1);
$retorno_const_ipi = $const_ipi->get();

if(count($retorno_const_ipi) == 0){
    $dados['ipi_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['ipi_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['ipi_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['ipi_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($retorno_const_ipi->status == '0'){
        $dados['ipi_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['ipi_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($retorno_const_ipi->status == '1' || $retorno_const_ipi->status == '2'){
        $dados['ipi_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['ipi_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($retorno_const_ipi->status == '3'){
        $dados['ipi_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['ipi_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/*****************************************************************************/
$const_baixa_rodizio= new Query_model();
$const_baixa_rodizio->SetCampos("status");
$const_baixa_rodizio->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_baixa_rodizio->SetTabelas("processos_rodizios_baixa");
$const_baixa_rodizio->SetTipoRetorno(1);
$retorno_const_baixa_rodizio = $const_baixa_rodizio->get();

if(count($retorno_const_baixa_rodizio) == 0){
    $dados['baixa_rodizio_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_rodizio_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['baixa_rodizio_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($retorno_const_baixa_rodizio->status == '0'){
        $dados['baixa_rodizio_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['baixa_rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($retorno_const_baixa_rodizio->status == '1' || $retorno_const_baixa_rodizio->status == '2'){
        $dados['baixa_rodizio_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['baixa_rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($retorno_const_baixa_rodizio->status == '3'){
        $dados['baixa_rodizio_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['baixa_rodizio_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_cnh = new Query_model();
$const_cnh->SetCampos("status");
$const_cnh->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_cnh->SetTabelas("processos_cnh");
$const_cnh->SetTipoRetorno(1);
$const_cnh = $const_cnh->get();

if(count($const_cnh) == 0){
    $dados['cnh_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['cnh_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['cnh_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['cnh_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_cnh->status == '0'){
        $dados['cnh_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['cnh_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_cnh->status == '1' || $const_cnh->status == '2'){
        $dados['cnh_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['cnh_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_cnh->status == '3'){
        $dados['cnh_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['cnh_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_laudos= new Query_model();
$const_laudos->SetCampos("status");
$const_laudos->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_laudos->SetTabelas("processos_cnh");
$const_laudos->SetTipoRetorno(1);
$const_laudos = $const_laudos->get();

if(count($const_laudos) == 0){
    $dados['laudos_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['laudos_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['laudos_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['laudos_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_laudos->status == '0'){
        $dados['laudos_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['laudos_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_laudos->status == '1' || $const_laudos->status == '2'){
        $dados['laudos_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['laudos_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_laudos->status == '3'){
        $dados['laudos_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['laudos_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_icms= new Query_model();
$const_icms->SetCampos("status");
$const_icms->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_icms->SetTabelas("processos_icms");
$const_icms->SetTipoRetorno(1);
$const_icms = $const_icms->get();

if(count($const_icms) == 0){
    $dados['icms_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['icms_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['icms_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['icms_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_icms->status == '0'){
        $dados['icms_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['icms_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_icms->status == '1' || $const_icms->status == '2'){
        $dados['icms_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['icms_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_icms->status == '3'){
        $dados['icms_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['icms_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_ipva= new Query_model();
$const_ipva->SetCampos("status");
$const_ipva->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_ipva->SetTabelas("processos_ipva");
$const_ipva->SetTipoRetorno(1);
$const_ipva = $const_ipva->get();

if(count($const_ipva) == 0){
    $dados['ipva_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['ipva_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_ipva->status == '0'){
        $dados['ipva_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_ipva->status == '1' || $const_ipva->status == '2'){
        $dados['ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_ipva->status == '3'){
        $dados['ipva_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['ipva_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_rodizio= new Query_model();
$const_rodizio->SetCampos("status");
$const_rodizio->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_rodizio->SetTabelas("processos_rodizios");
$const_rodizio->SetTipoRetorno(1);
$const_rodizio = $const_rodizio->get();

if(count($const_rodizio) == 0){
    $dados['rodizio_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['rodizio_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['rodizio_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_rodizio->status == '0'){
        $dados['rodizio_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_rodizio->status == '1' || $const_rodizio->status == '2'){
        $dados['rodizio_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['rodizio_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_rodizio->status == '3'){
        $dados['rodizio_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['rodizio_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}

/***************************************************************************
$const_defis= new Query_model();
$const_defis->SetCampos("status");
$const_defis->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_defis->SetTabelas("processos_icms");
$const_defis->SetTipoRetorno(1);
$const_defis = $const_defis->get();

if(count($const_defis) == 0){
    $dados['defis_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['defis_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['defis_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['defis_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_defis->status == '0'){
        $dados['defis_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['defis_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_defis->status == '1' || $const_defis->status == '2'){
        $dados['defis_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['defis_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_defis->status == '3'){
        $dados['defis_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['defis_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}*/
/****************************************************************************/
$const_baixa_ipva= new Query_model();
$const_baixa_ipva->SetCampos("status");
$const_baixa_ipva->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_baixa_ipva->SetTabelas("processos_ipva_baixa");
$const_baixa_ipva->SetTipoRetorno(1);
$const_baixa_ipva = $const_baixa_ipva->get();

if(count($const_baixa_ipva) == 0){
    $dados['baixa_ipva_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['baixa_ipva_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_baixa_ipva->status == '0'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_baixa_ipva->status == '1' || $const_baixa_ipva->status == '2'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_baixa_ipva->status == '3'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/
$const_baixa_ipva= new Query_model();
$const_baixa_ipva->SetCampos("status");
$const_baixa_ipva->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$const_baixa_ipva->SetTabelas("processos_ipva_baixa");
$const_baixa_ipva->SetTipoRetorno(1);
$const_baixa_ipva = $const_baixa_ipva->get();

if(count($const_baixa_ipva) == 0){
    $dados['baixa_ipva_iniciado'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
    $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
}else{
    $dados['baixa_ipva_iniciado'] = '<i class="fa fa-thumbs-o-up"></i>';
    if($const_baixa_ipva->status == '0'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-thumbs-o-down"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_baixa_ipva->status == '1' || $const_baixa_ipva->status == '2'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-cog fa-spin"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-cog fa-spin"></i>';
    }
    if($const_baixa_ipva->status == '3'){
        $dados['baixa_ipva_processo'] = '<i class="fa fa-thumbs-o-up"></i>';
        $dados['baixa_ipva_finalizado'] = '<i class="fa fa-thumbs-o-up"></i>';
    }
}
/****************************************************************************/

//debug($dados);

$anexos = new Query_model();
$anexos->SetCampos("id,anexo");
$anexos->SetCondicao("id_processo = '".$this->uri->segment(4)."' ");
$anexos->SetTipoRetorno(0);
$anexos->SetTabelas("processos_anexos");
$dados['arquivos'] = $anexos->get();


$cons_servicos = new Query_model();
$cons_servicos->SetCampos("id_servico");
$cons_servicos->SetTabelas("processos_servicos");
$cons_servicos->SetTipoRetorno("0");
$cons_servicos->SetCondicao("id_processo = '".$this->uri->segment(4)."'");
$rest = $cons_servicos->get();

        $dados['ipi']      = '0';
        $dados['icms']     = '0';
        $dados['ipva']     = '0';
        $dados['rodizio']  = '0';
        $dados['cnh']  = '0';
        $dados['laudos']  = '0';
        $dados['ipva']  = '0';
        $dados['laudos']  = '0';
        $dados['baixa_ipva']  = '0';
        $dados['baixa_rodizio']  = '0';
        $dados['defis']  = '0';

foreach ($rest as $value) {
    
    if($value['id_servico'] == 1){
        $dados['ipi']      = '1';
        $dados['icms']     = '1';
        $dados['ipva']     = '1';
        $dados['rodizio']  = '1';
    }
    if($value['id_servico'] == 2){
        $dados['cnh'] = '1';
    }
    if($value['id_servico'] == 3 || $value['id_servico'] == 4){
        $dados['laudos'] = '1';
    }    
    if($value['id_servico'] == 5){
        $dados['ipva'] = '1';
        $dados['rodizio'] = '1';
    }   
    if($value['id_servico'] == 6){
        $dados['baixa_ipva'] = '1';
    }  
    if($value['id_servico'] == 7){
        $dados['baixa_rodizio'] = '1';
    }   
    if($value['id_servico'] == 8){
        $dados['defis'] = '1';
    }     
}

