<?php
$this->load->library('contratos');
$contratos = new Contratos();
$contratos->setnome("Teste");
$contratos->setemail("Teste");
echo $contratos->mostra();



exit();




