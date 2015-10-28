<?php 
$post = $this->input->post();
$dados['mensagem_login'] = '';
if ($post) {
    if(isset($post['cpf']) && isset($post['senha']) ){
        //debug($post,true);
        $login = new Query_model();
        $login->SetCampos("*");
        $login->SetTabelas("usuarios");
        $login->SetTipoRetorno(1);
        $login->SetCondicao(" cpf = '". str2int($post['cpf'])."' AND senha = '".md5($post['senha'])."' ");
        $dados_login = $login->get();
        if(count($dados_login) == 0){
            $dados['mensagem_login'] = 'O CPF ou senha invalidos';
        }else{

            if($dados_login->status == 0){
                $dados['mensagem_login'] = 'Usuario desativado pelo administrador';    
            }else{
                $this->session->set_userdata(array("usuario"=> $dados_login));
                redirect('processos/proc');
            }
            
        }
        
        
    }
     
}

?>