<?php

/* * *****************************************************************************
 * Instancia a classe usuarios
 * ***************************************************************************** */
$usuarios = new Usuarios_model();
$usuarios_alterar = new Usuarios_model();
$banco = new Query_model();

    
/* * *****************************************************************************
 * Preenche os SELETS PADRÃO
 * ***************************************************************************** */
$dados = $usuarios->PadraoSelect();
/* * *****************************************************************************
 * Verifica se é insert ou update de acordo com e parametro da URL
 * ***************************************************************************** */
if ($this->uri->segment(3) == '') {
    $dados['bt'] = 'Adicionar';
} else {
    //Botão
    $dados['bt'] = 'Alterar';
    //Prepara a consulta
    $banco->SetCampos("*");
    $banco->SetTabelas("usuarios");
    $banco->SetCondicao("id = '".$this->uri->segment(3)."' ");
    $banco->SetTipoRetorno('1');
    $consulta=$banco->get();    
    //Seta os  valores de tetorno
    $usuarios->SetCampo('nome',$consulta->nome);
    $usuarios->SetCampo('email',$consulta->email);
    $usuarios->SetCampo('cpf',$consulta->cpf);
    $usuarios->SetCampo('status',$consulta->status);
    $usuarios->SetCampo('tipo_usurio',$consulta->tipo_usurio);
    $usuarios->SetCampo('resp_cnh',$consulta->resp_cnh);
    $usuarios->SetCampo('resp_laudos',$consulta->resp_laudos);
    $usuarios->SetCampo('resp_rodizio',$consulta->resp_rodizio);
    $usuarios->SetCampo('resp_defis',$consulta->resp_defis);
    $usuarios->SetCampo('resp_icms',$consulta->resp_icms);
    $usuarios->SetCampo('resp_ipi',$consulta->resp_ipi);
    $usuarios->SetCampo('resp_ipva',$consulta->resp_ipva);
    

}
/* * *****************************************************************************
 * Preenche o Parao do funcionario que esta no model
 * ***************************************************************************** */
$dados['form']['nome'] = $usuarios->GetNome();
$dados['form']['email'] = $usuarios->GetEmail();
$dados['form']['status'] = $usuarios->GetStatus();
$dados['form']['cpf'] = $usuarios->GetCpf();
$dados['form']['tipo_usurio'] = $usuarios->GetTipoUsuarios();
$dados['form']['resp_cnh'] = $usuarios->GetRespCnh();
$dados['form']['resp_rodizio'] = $usuarios->GetRespRodizios();
$dados['form']['resp_defis'] = $usuarios->GetRespDefis();
$dados['form']['resp_icms'] = $usuarios->GetRespIcms();
$dados['form']['resp_ipi'] = $usuarios->GetRespIpi();
$dados['form']['resp_ipva'] = $usuarios->GetRespIpva();
$dados['form']['resp_laudos'] = $usuarios->GetRespLaudos();

/* * *****************************************************************************
 * VALIDA OS CAMPOS
 * ***************************************************************************** */
$this->form_validation->set_message('required', '%s, Por favor o campo não pode ser vazio');
$this->form_validation->set_message('valid_email', '%s, esta com erro!');
foreach ($usuarios->CamposObrigatorios() as $key => $value) {
    $this->form_validation->set_rules($value[0], $value[1], $value[2]);
}


/* * *****************************************************************************
 * Buscas todos os registros
 * ***************************************************************************** */
$banco->SetCampos("*");
$banco->SetTabelas("usuarios");
$banco->SetCondicao("");
$banco->SetTipoRetorno('0');
$todos = $banco->get();
$dados['registros']= $todos;

/* * *****************************************************************************
 * RECEBE OS CAMPOS
 * ***************************************************************************** */
$post = $this->input->post();
$dados['mensagem_form'] = 0;
$dados['mensagem_erro'] = '';

if ($post) {
    if ($this->form_validation->run() == FALSE) {
        $dados['mensagem_form'] = 1;
    } else {

        $usuarios_alterar->SetCampo('nome', $post['nome']);
        $usuarios_alterar->SetCampo('email', $post['email']);
        $usuarios_alterar->SetCampo('cpf', $post['cpf']);
        $usuarios_alterar->SetCampo('status', $post['status']);
        $usuarios_alterar->SetCampo('tipo_usuario', $post['tipo_usurio']);
        if (count($post['responsavidades']) > 0) {
            
            foreach ($post['responsavidades'] as $key => $value) {
                echo $value.'<br>';
                if ($value == 'CNH') {
                    $usuarios_alterar->SetCampo('resp_cnh', 1);
                }
                if ($value == 'RODIZIO') {
                    $usuarios_alterar->SetCampo('resp_rodizio', 1);
                }
                if ($value == 'DEFIS') {
                    $usuarios_alterar->SetCampo('resp_defis', 1);
                }
                if ($value == 'ICMS') {
                    $usuarios_alterar->SetCampo('resp_icms', 1);
                }
                if ($value == 'IPI') {
                    $usuarios_alterar->SetCampo('resp_ipi', 1);
                }
                if ($value == 'IPVA') {
                    $usuarios_alterar->SetCampo('resp_ipva', 1);
                }
                if ($value == 'LAUDOS') {
                    $usuarios_alterar->SetCampo('resp_laudos', 1);
                }
                
            }
            
            
        }
        if ($this->uri->segment(3) == "") {
            $banco->SetTabelas("usuarios");
            $banco->SetCampos($usuarios_alterar->monta_campos());
            $banco->inserir();
            
            //Enviar email para o usurios 
            $this->load->library('email');
            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.isencao.net',
                'smtp_user' => 'sistema@isencao.net',
                'smtp_pass' => 'sistema1',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => "html",
            ));
        $mensagem =  "";
        $mensagem.="<pre>";
        $mensagem.="MENSAGEM ENVIADO DO SISTEMA SHAMAH<br>"
                . "Seu cadastro foi realizado no sistema shamah para acessar entre no endereço a baixo:"
                . "<br>"
                . "<a href='http://localhost/SHAMAH_NEW/site/inicio'>http://localhost/SHAMAH_NEW/site/inicio</a> "
                . "Com a senha: <b>shamah</b> e seu CPF";
        $mensagem.="</pre>";
           
        $this->email->from('sistema@isencao.net', 'SHAMAH');
        $this->email->to("viniciusbarbarulo@gmail.com");
        $this->email->subject('SHAMAH - ' . date("d/m/Y"));
        $this->email->message($mensagem);
        $this->email->send();
            
        } else {
            $banco->SetTabelas("usuarios");
            $banco->SetCondicao(array('id' => $this->uri->segment(3)));
            $banco->SetCampos($usuarios_alterar->monta_campos());
            $banco->atualizar();
        }
        redirect('usuarios');
    }
}
?>