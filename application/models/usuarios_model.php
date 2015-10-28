<?php

class Usuarios_model extends CI_Model {

    //Camopos banco
    private $id = "";
    private $nome = "";
    private $email = "";
    private $cpf = "";
    private $senha = "shamah";
    private $status = "1"; //0 = inativo, 1= ativo
    private $tipo_usuario = "3"; //1 = master, 2=funcionario, 3=concessionaria
    private $resp_cnh = 0; //0 = não responsavel, 1= responsavel
    private $resp_laudos = 0; //0 = não responsavel, 1= responsavel
    private $resp_rodizio = 0; //0 = não responsavel, 1= responsavel
    private $resp_defis = 0; //0 = não responsavel, 1= responsavel
    private $resp_icms = 0; //0 = não responsavel, 1= responsavel
    private $resp_ipi = 0; //0 = não responsavel, 1= responsavel
    private $resp_ipva = 0; //0 = não responsavel, 1= responsavel

    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }

    //Recuperar os valores
    public function GetNome() {
        return $this->nome;
    }

    public function GetEmail() {
        return $this->email;
    }

    public function GetCpf() {
        return $this->cpf;
    }

    public function GetSenha() {
        return $this->senha;
    }

    public function GetStatus() {
        return $this->status;
    }

    public function GetTipoUsuarios() {
        return $this->tipo_usuario;
    }

    public function GetRespCnh() {
        return $this->resp_cnh;
    }

    public function GetRespLaudos() {
        return $this->resp_laudos;
    }

    public function GetRespRodizios() {
        return $this->resp_rodizio;
    }

    public function GetRespDefis() {
        return $this->resp_defis;
    }

    public function GetRespIcms() {
        return $this->resp_icms;
    }

    public function GetRespIpi() {
        return $this->resp_ipi;
    }

    public function GetRespIpva() {
        return $this->resp_ipva;
    }

    
    public function PadraoSelect(){       
        $ret = array();
        $ret['status'] = array();
        $ret['status'][0] = "Inativo";
        $ret['status'][1] = "Ativo";

        $ret['tipo_usurio'] = array();
        $ret['tipo_usurio'][1] = "Master";
        $ret['tipo_usurio'][2] = "Usuario";
        $ret['tipo_usurio'][3] = "Concessionaria";
        return $ret;
    }

    public function CamposObrigatorios(){       
        $ret = array();
        //Nome do campo, Nome que aparecerá no alerta, tipo de validação
        array_push($ret, array('nome','Nome','required'));
        array_push($ret, array('status','Status','required'));
        array_push($ret, array('cpf','CPF','required'));
        array_push($ret, array('tipo_usurio','Tipo Usuario','required'));
        return $ret;
    }

    public function monta_campos(){
        $ret = array();
        $ret['nome'] = $this->nome;
        $ret['email'] = $this->email;
        $ret['cpf'] = str2int($this->cpf);
        $ret['senha'] = md5($this->senha);
        $ret['status'] = $this->status;
        $ret['tipo_usurio'] = $this->tipo_usuario;
        $ret['resp_cnh'] = $this->resp_cnh;
        $ret['resp_laudos'] = $this->resp_laudos;
        $ret['resp_rodizio'] = $this->resp_rodizio;
        $ret['resp_defis'] = $this->resp_defis;
        $ret['resp_icms'] = $this->resp_icms;
        $ret['resp_ipi'] = $this->resp_ipi;
        $ret['resp_ipva'] = $this->resp_ipva;
        return $ret;
    }

}

?>