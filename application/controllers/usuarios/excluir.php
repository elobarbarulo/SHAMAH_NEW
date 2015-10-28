<?php
$banco = new Query_model();

if ($this->uri->segment(4) == "") {
    echo '
             <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
             decisao = confirm("Deseja realmente apagar o usuarios?");
             if (decisao){
               location.href="' . site_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(3) . '";
             } else {
                location.href="' . site_url() . $this->uri->segment(1) . '/formulario/";
             }
             </SCRIPT>;
         ';
} else {

    $banco->SetTabelas("usuarios");
    $banco->SetCondicao(array('id' => $this->uri->segment(3)));
    $banco->excluir();

    redirect($this->uri->segment(1) . '/formulario/');
}
exit();
