<?php
$post = $this->input->post();
if ($post) {
    $session = $this->session->all_userdata();
    $banco = new Query_model();
    //8833040845c66f80b74123615a3f7395
    $banco->SetTabelas("usuarios");
    $alterar =   array('senha' => md5($post['senha']));
    $banco->SetCampos($alterar);
    $banco->SetCondicao( "id = '".$session['usuario']->id."'" );
    $banco->atualizar();
    echo alerta("alterado com sucesso!");    
}
?>