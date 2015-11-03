<?php

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


$post = $this->input->post();
$dados['mensagem_login'] = '';
if ($post) {
    if (isset($post['nome']) && isset($post['email']) && isset($post['telefone']) && isset($post['mensagem'])) {
       
        $mensagem =  "";
        $mensagem.="<pre>";
        $mensagem.="MENSAGEM ENVIADO DO FORMULARIO DE CONTADO DO SITE SHAMAH<br>";
        $mensagem.="<b>Nome:</b>    " .$post['nome'].'<br>';
        $mensagem.="<b>Email:</b>   " .$post['email'].'<br>';
        $mensagem.="<b>Telefone:</b>" .$post['telefone'].'<br>';
        $mensagem.="<b>Mensagem:</b>" .$post['mensagem'].'<br>';
        $mensagem.="</pre>";
        
        $this->email->from('sistema@isencao.net', 'SHAMAH');
        $this->email->to($post['email']);
        $this->email->subject('SHAMAH - Contato Site - ' . date("d/m/Y"));
        $this->email->message($mensagem);
        $this->email->send();
       
        $this->email->from('sistema@isencao.net', 'SHAMAH');
        $this->email->to("contato@isencao.net");
        $this->email->subject('SHAMAH - Contato Site - ' . date("d/m/Y"));
        $this->email->message($mensagem);
        $this->email->send();
        
        
        
        
        echo'
                 <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Enviado com Sucesso!");
                    location.href="' . site_url() . '";           
                 </SCRIPT>;
             ';
    }



    if (isset($post['cpf']) && isset($post['senha'])) {
        //debug($post,true);
        $login = new Query_model();
        $login->SetCampos("*");
        $login->SetTabelas("usuarios");
        $login->SetTipoRetorno(1);
        $login->SetCondicao(" cpf = '" . str2int($post['cpf']) . "' AND senha = '" . md5($post['senha']) . "' ");
        $dados_login = $login->get();
        if (count($dados_login) == 0) {
            $dados['mensagem_login'] = 'O CPF ou senha invalidos';
        } else {

            if ($dados_login->status == 0) {
                $dados['mensagem_login'] = 'Usuario desativado pelo administrador';
            } else {
                $this->session->set_userdata(array("usuario" => $dados_login));
                redirect('processos/proc');
            }
        }
    }
}
?>