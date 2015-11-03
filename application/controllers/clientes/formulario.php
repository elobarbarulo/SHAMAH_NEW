<?php

$clientes = new Clientes_model();
$banco = new Query_model();

$dados = $clientes->PadraoSelect();

//PREENCHER FORM NO HTML
$dados['bt'] = 'Prosseguir';
$dados['form']['nome'] = $clientes->GetCampo('nome');
$dados['form']['dt_nasc'] = $clientes->GetCampo('dt_nasc');
$dados['form']['sexo'] = $clientes->GetCampo('sexo');
$dados['form']['cpf'] = $clientes->GetCampo('cpf');
$dados['form']['rg'] = $clientes->GetCampo('rg');
$dados['form']['rg_uf'] = $clientes->GetCampo('rg_uf');
$dados['form']['email'] = $clientes->GetCampo('email');
$dados['form']['inss'] = $clientes->GetCampo('inss');
$dados['form']['tem_cnh'] = $clientes->GetCampo('tem_cnh');
$dados['form']['cnh_numero'] = $clientes->GetCampo('cnh_numero');
$dados['form']['cnh_tipo'] = $clientes->GetCampo('cnh_tipo');
$dados['form']['possui_cnpj'] = $clientes->GetCampo('possui_cnpj');
$dados['form']['possui_carro_automatico'] = $clientes->GetCampo('possui_carro_automatico');
$dados['form']['atividade'] = $clientes->GetCampo('atividade');
$dados['form']['end_logradouro'] = $clientes->GetCampo('end_logradouro');
$dados['form']['end_n'] = $clientes->GetCampo('end_n');
$dados['form']['end_complemento'] = $clientes->GetCampo('end_complemento');
$dados['form']['end_bairro'] = $clientes->GetCampo('end_bairro');
$dados['form']['end_cep'] = $clientes->GetCampo('end_cep');
$dados['form']['end_cidade'] = $clientes->GetCampo('end_cidade');
$dados['form']['end_estado'] = $clientes->GetCampo('end_estado');
$dados['form']['condutor'] = $clientes->GetCampo('condutor');
$dados['form']['incapaz'] = $clientes->GetCampo('incapaz');
$dados['form']['ajuda_finaceira'] = $clientes->GetCampo('ajuda_finaceira');

$post = $this->input->post();
if ($post) {
    $clientes->SetCampo('nome', $post['nome']);
    $clientes->SetCampo('dt_nasc', $post['dt_nasc']);
    $clientes->SetCampo('sexo', $post['sexo']);
    $clientes->SetCampo('cpf', $post['cpf']);
    $clientes->SetCampo('rg', $post['rg']);
    $clientes->SetCampo('rg_uf', $post['rg_uf']);
    $clientes->SetCampo('email', $post['email']);
    $clientes->SetCampo('inss', $post['inss']);
    $clientes->SetCampo('tem_cnh', $post['tem_cnh']);
    $clientes->SetCampo('cnh_numero', $post['cnh_numero']);
    $clientes->SetCampo('cnh_tipo', $post['cnh_tipo']);
    $clientes->SetCampo('possui_cnpj', $post['possui_cnpj']);
    $clientes->SetCampo('possui_carro_automatico', $post['possui_carro_automatico']);
    $clientes->SetCampo('atividade', $post['atividade']);
    $clientes->SetCampo('end_logradouro', $post['end_logradouro']);
    $clientes->SetCampo('end_n', $post['end_n']);
    $clientes->SetCampo('end_complemento', $post['end_complemento']);
    $clientes->SetCampo('end_bairro', $post['end_bairro']);
    $clientes->SetCampo('end_cep', $post['end_cep']);
    $clientes->SetCampo('end_cidade', $post['end_cidade']);
    $clientes->SetCampo('end_estado', $post['end_estado']);
    $clientes->SetCampo('condutor', $post['condutor']);
    
    
    
    $banco->SetCampos($clientes->monta_campos());
    $banco->SetTabelas("clientes");
    $id_insert = $banco->inserir();
    redirect('clientes/formulario_concluir/' . $id_insert . '/parte_2');
}
?>