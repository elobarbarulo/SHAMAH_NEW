<?php

$link = site_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);

if($this->uri->segment(4) == ""){
echo '
             <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
             decisao = confirm("Deseja realmente apagar o contato?");
             if (decisao){
               location.href="'.$link.'/2";
             } else {
               location.href="'.$link.'/1";
             }
             </SCRIPT>;
         ';      
}

if($this->uri->segment(4) == 1){
    redirect($this->uri->segment(1).'/formulario/'.$this->uri->segment(3));
}
if($this->uri->segment(4) == 2){
    $consulta = $this->servicos_model->excluir($this->uri->segment(3));
    redirect($this->uri->segment(1).'/formulario/'.$this->uri->segment(3));
}

//$this->uri->segment(4);
exit();

