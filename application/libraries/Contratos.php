<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contratos {

    public function __construct() {
        
    }

    private $nome = '';
    private $email = '';
    
    
    public function setnome($nome){
        $this->nome = $nome;
    }
    public function setemail($nome){
        $this->email = $nome;
    }
    public function getnome(){
        return $this->nome;
    }
    public function getemail(){
        return $this->email;
    }    
    
    public function mostra(){
        $ret = "";
        $ret.=  $this->nome;
        $ret.=  $this->email;
        return $ret;
    }
    
    
    
    

}
