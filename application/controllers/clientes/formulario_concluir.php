<?php
/* 
 * 1 - Esssa pagina ja tem uma verificação logo no inicio. se nao tiver id é redirecionada para cadastro de clientes
 * 2 - Instancia a classe cliente pra preencher os formularios
 * 3 - instancia o banco pra fazer as consultas
 * 4 - Consulta as tabelas para preencher as tabelas ou os campos
 * 5 - Telefone
 * 5.1 - excluir
 * 5.2 - Editar
 * 6 - Ajuda
 * 6.1 - excluir
 * 6.2 - Editar
 * 7 - preenche todo o formulario com a consulta do banco de dados.
 * 8 - Verifica se incapaz é ativo se for ativo consulta os dados e coloca no form se não deixa o texto vazio
 ------------------------------------------------------------------------------------------------------------------
 * Agora recebo o post e faço todas as logicas de manipulação no banco dedados
 ------------------------------------------------------------------------------------------------------------------
 * 9 - telefone se telefone numero e tipo for diferente de vazio instancio e depois vejo e se tem parametro e ditar se tiver faz um update se não é insert
 * 10 - Ajuda financeira editar: vejo se tem parametros pra editar se não faz nada
 * 11 - passo todos os valores para model e faço o update
 * 12 - Incapaz vejo se é ativo se sim  consulto o banco e vejo se tem algum registro se tiver faz um update se nao faz um insert
 * 13 -  ajuda Financeira - Vejo se é ativo se for faz um insert
 */



/**
 * 1 - Faz a verificação
 */
if ($this->uri->segment(3) == "" || $this->uri->segment(3) == 0) {
    redirect('clientes/formulario/');
}
/**
 * 2 - INSTANCIAR A CLASSE CLIENTES PARA TRAZER AS INFORMAÇÕES DOS SELCTS
 */
$clientes = new Clientes_model();
$dados = $clientes->PadraoSelect();
/**
 * 3 - Instancia o banco para preencher todos os dados do form
 */
$banco = new Query_model();
/**
 * 4 - Consulta o banco de dados clinte para preencher todo o form com os valores do banco
 */
$banco->SetCampos("*");
$banco->SetCondicao("id = '" . $this->uri->segment(3) . "'");
$banco->SetTabelas("clientes");
$banco->SetTipoRetorno(1);
$preencher_form = $banco->get();
/**
 * 4 - Preencher a tabela telefones
 */
$banco->SetCampos("*");
$banco->SetCondicao("id_cliente = '" . $this->uri->segment(3) . "'");
$banco->SetTabelas("clientes_telefones");
$banco->SetTipoRetorno(0);
$dados['telefones'] = $banco->get();
/**
 * 4 - Preencher a tabela de ajuda financeira
 */
$banco->SetCampos("*");
$banco->SetCondicao("id_cliente = '" . $this->uri->segment(3) . "'");
$banco->SetTabelas("clientes_ajuda");
$banco->SetTipoRetorno(0);
$dados['ajuda'] = $banco->get();



/**
 * 5.1- Se clicar no exluir telefone e for confirmado a exclusao
 */
if ($this->uri->segment(4) == "telefone" && $this->uri->segment(6) == "2" && $this->uri->segment(7) == "1") {
    $ex = new Query_model();
    $ex->SetCondicao("id = '" . $this->uri->segment(5) . "'");
    $ex->SetTabelas("clientes_telefones");
    $ex->excluir();
    redirect('clientes/formulario_concluir/' . $this->uri->segment(3));
    exit();
}

/**
 * 5.2 - Se clicar o telefone editar
 */
if ($this->uri->segment(4) == "telefone" && $this->uri->segment(6) == '1') {
    $banco->SetCampos("telefone,tipo,obs");
    $banco->SetCondicao("id='" . $this->uri->segment(5) . "'");
    $banco->SetTipoRetorno(1);
    $banco->SetTabelas("clientes_telefones");
    $dad = $banco->get();
    $dados['form']['n_tel'] = $dad->telefone;
    $dados['form']['t_tel'] = $dad->tipo;
    $dados['form']['o_tel'] = $dad->obs;
} else {
    $dados['form']['n_tel'] = "";
    $dados['form']['t_tel'] = "";
    $dados['form']['o_tel'] = "";
}



/**
 * 6.1 - Se clicar no exluir ajuda financeiro e for confirmado a exclusao
 */
if ($this->uri->segment(4) == "ajuda" && $this->uri->segment(6) == "2" && $this->uri->segment(7) == "1") {
    $ex = new Query_model();
    $ex->SetCondicao("id = '" . $this->uri->segment(5) . "'");
    $ex->SetTabelas("clientes_ajuda");
    $ex->excluir();
    redirect('clientes/formulario_concluir/' . $this->uri->segment(3));
    exit();
}
/**
 * 6.2 - Se clicar o Ajuda financeira editar
 */
if ($this->uri->segment(4) == "ajuda" && $this->uri->segment(6) == '1') {

    $banco->SetTabelas("clientes_ajuda");
    $banco->SetCondicao("id =  '" . $this->uri->segment(5) . "'");
    $banco->SetCampos("*");
    $banco->SetTipoRetorno(1);
    $ajuda = $banco->get();

    $dados['form']['a_nome'] = $ajuda->nome;
    $dados['form']['a_cpf'] = $ajuda->rg;
    $dados['form']['a_rg'] = $ajuda->cpf;
    $dados['form']['a_parentesco'] = $ajuda->parentesco;
} else {
    $dados['form']['a_nome'] = "";
    $dados['form']['a_cpf'] = "";
    $dados['form']['a_rg'] = "";
    $dados['form']['a_parentesco'] = "";
}


/**
 * 7 - PREENCHE O FORMULARIO
 */
$dados['bt'] = 'Finalizar';

$dados['form']['nome'] = $preencher_form->nome;
$dados['form']['dt_nasc'] = $preencher_form->dt_nasc;
$dados['form']['sexo'] = $preencher_form->sexo;
$dados['form']['cpf'] = $preencher_form->cpf;
$dados['form']['rg'] = $preencher_form->rg;
$dados['form']['rg_uf'] = $preencher_form->rg_uf;
$dados['form']['email'] = $preencher_form->email;
$dados['form']['inss'] = $preencher_form->inss;
$dados['form']['tem_cnh'] = $preencher_form->tem_cnh;
$dados['form']['cnh_numero'] = $preencher_form->cnh_numero;
$dados['form']['cnh_tipo'] = $preencher_form->cnh_tipo;
$dados['form']['possui_cnpj'] = $preencher_form->possui_cnpj;
$dados['form']['possui_carro_automatico'] = $preencher_form->possui_carro_automatico;
$dados['form']['atividade'] = $preencher_form->atividade;
$dados['form']['end_logradouro'] = $preencher_form->end_logradouro;
$dados['form']['end_n'] = $preencher_form->end_n;
$dados['form']['end_complemento'] = $preencher_form->end_complemento;
$dados['form']['end_bairro'] = $preencher_form->end_bairro;
$dados['form']['end_cep'] = $preencher_form->end_cep;
$dados['form']['end_cidade'] = $preencher_form->end_cidade;
$dados['form']['end_estado'] = $preencher_form->end_estado;
$dados['form']['condutor'] = $preencher_form->condutor;
$dados['form']['incapaz'] = $preencher_form->incapaz;
$dados['form']['ajuda_finaceira'] = $preencher_form->ajuda_finaceira;


/**
 * 8 -  INCAPAZ
 */
if ($dados['form']['incapaz'] == '1') {
    $banco->SetTabelas("clientes_incapaz");
    $banco->SetCondicao("id_cliente =  '" . $this->uri->segment(3) . "'");
    $banco->SetCampos("*");
    $banco->SetTipoRetorno(1);
    $incapaz = $banco->get();
    
    $dados['form']['i_nome'] = $incapaz->nome;
    $dados['form']['i_cpf'] = $incapaz->cpf;
    $dados['form']['i_rg'] = $incapaz->rg;
    $dados['form']['i_parentesco'] = $incapaz->parentesco;
    
    $dados['form']['tutela'] = $incapaz->tutela;
    $dados['form']['mandado_seguranca'] = $incapaz->mandado_seguranca;
    $dados['form']['curatela'] = $incapaz->curatela;
} else {
    $dados['form']['i_nome'] = "";
    $dados['form']['i_cpf'] = "";
    $dados['form']['i_rg'] = "";
    $dados['form']['i_parentesco'] = "";
    $dados['form']['tutela'] = "";
    $dados['form']['mandado_seguranca'] = "";
    $dados['form']['curatela'] = "";
}

$post = $this->input->post();
if ($post) {
    /**
     * 9 - Se o telefone for preenchido e o tipo tambem faço o processo de salvar se não passo direto
     */
    if ($post['n_tel'] != "" && $post['t_tel'] != "") {
        $telefones = new Telefones_model();
        $telefones->SetCampo('telefone', $post['n_tel']);
        $telefones->SetCampo('tipo', $post['t_tel']);
        $telefones->SetCampo('obs', $post['o_tel']);
        $telefones->SetCampo('id_cliente', $this->uri->segment(3));
        if ($this->uri->segment(4) == "telefone" && $this->uri->segment(5) != '') {
            $atu_tel = new Query_model();
            $atu_tel->SetTabelas("clientes_telefones");
            $atu_tel->SetCampos($telefones->monta_campos());
            $atu_tel->SetCondicao("id = '" . $this->uri->segment(5) . "' ");
            $atu_tel->atualizar();
            redirect('clientes/formulario_concluir/' . $this->uri->segment(3));
            exit();
        } else {
            $add_tel = new Query_model();
            $add_tel->SetTabelas("clientes_telefones");
            $add_tel->SetCampos($telefones->monta_campos());
            $add_tel->inserir();
        }
    }

    /**
     * 10 -EDITAR AJUDA FINCANCEIRA
     */
    if ($this->uri->segment(4) == "ajuda" && $this->uri->segment(5) != '') {
        $ajuda_fin = new Ajuda_financeira_model();
        $ajuda_fin->SetCampo('nome', $post['a_nome']);
        $ajuda_fin->SetCampo('cpf', $post['a_cpf']);
        $ajuda_fin->SetCampo('rg', $post['a_rg']);
        $ajuda_fin->SetCampo('parentesco', $post['a_parentesco']);
        $ajuda_fin->SetCampo('id_cliente', $this->uri->segment(3));
        //Altera os dados no banco
        $alterar_ajuda = new Query_model();
        $alterar_ajuda->SetTabelas("clientes_ajuda");
        $alterar_ajuda->SetCondicao("id = '" . $this->uri->segment(5) . "'");
        $alterar_ajuda->SetCampos($ajuda_fin->monta_campos());
        $alterar_ajuda->atualizar();
        redirect('clientes/formulario_concluir/' . $this->uri->segment(3));
        exit();
    }


    
    /**
     * 11 -  passo todos os valores para model e faço o update
     */
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
    $banco->SetCondicao("id = '" . $this->uri->segment(3) . "'");
    $banco->atualizar();


    /**
     * 12 - Se incapaz for preenchido 
     */
    if ($post['incapaz'] == 1) {
        
        $tutela = 0;
        $mandado = 0;
        $curatela = 0;
        foreach ($post['documentos'] as $key => $value) {
            echo $value;
            if ($value == ' Tutela') {
                $tutela = 1;
            }
            if ($value == ' Mandado de Seg.') {
                $mandado = 1;
            }
            if ($value == ' Curatela') {
                $curatela = 1;
            }
        }

        $incapaz = new Incapaz_model();
        $incapaz->SetCampo('nome', $post['i_nome']);
        $incapaz->SetCampo('cpf', $post['i_cpf']);
        $incapaz->SetCampo('rg', $post['i_rg']);
        $incapaz->SetCampo('parentesco', $post['i_parentesco']);
        $incapaz->SetCampo('id_cliente', $this->uri->segment(3));
        $incapaz->SetCampo('tutela',$tutela);
        $incapaz->SetCampo('mandado_seguranca', $mandado);
        $incapaz->SetCampo('curatela',$curatela);

        $consulta = new Query_model();
        $consulta->SetCampos("*");
        $consulta->SetCondicao("id_cliente = '" . $this->uri->segment(3) . "'");
        $consulta->SetTabelas("clientes_incapaz");
        $consulta->SetTipoRetorno(0);
        if (count($consulta->get()) == 0) {
            //INSERE NO BANCO 
            $add_incapaz = new Query_model();
            $add_incapaz->SetTabelas("clientes_incapaz");
            $add_incapaz->SetCampos($incapaz->monta_campos());
            $add_incapaz->inserir();
        } else {
            $alterar_incapaz = new Query_model();
            $alterar_incapaz->SetTabelas("clientes_incapaz");
            $alterar_incapaz->SetCampos($incapaz->monta_campos());
            $alterar_incapaz->SetCondicao(array('id_cliente' => $this->uri->segment(3)));
            $alterar_incapaz->atualizar();
        }
        //MOdifica rabela banco
        $banco->SetCampos(array('incapaz' => 1));
        $banco->SetTabelas("clientes");
        $banco->SetCondicao(array('id' => $this->uri->segment(3)));
        $banco->atualizar();
    }





    /**
     * 13 - Inserir ajuda financeira
     */
    if ($post['ajuda_finaceira'] == 1) {
        if($post['a_nome'] != '' && $post['a_cpf'] != "" && $post['a_rg'] != ""){
        $ajuda_fin = new Ajuda_financeira_model();
        $ajuda_fin->SetCampo('nome', $post['a_nome']);
        $ajuda_fin->SetCampo('cpf', $post['a_cpf']);
        $ajuda_fin->SetCampo('rg', $post['a_rg']);
        $ajuda_fin->SetCampo('parentesco', $post['a_parentesco']);
        $ajuda_fin->SetCampo('id_cliente', $this->uri->segment(3));


        //INSERE NO BANCO 
        $inserir_ajuda = new Query_model();
        $inserir_ajuda->SetTabelas("clientes_ajuda");
        $inserir_ajuda->SetCampos($ajuda_fin->monta_campos());
        $inserir_ajuda->inserir();
        //MOdifica rabela banco
        }
        $banco->SetCampos(array('ajuda_finaceira' => 1));
        $banco->SetTabelas("clientes");
        $banco->atualizar();
    }


    redirect('clientes/formulario_concluir/' . $this->uri->segment(3));
}
?>