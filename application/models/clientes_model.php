<?php

class Clientes_model extends CI_Model {

    private $nome = '';
    private $dt_nasc = '';
    private $sexo = '2';
    private $cpf = '';
    private $rg = '';
    private $rg_uf = '';
    private $email = '';
    private $inss = '';
    private $tem_cnh = '';
    private $cnh_numero = '';
    private $cnh_tipo = '0';
    private $possui_cnpj = '0';
    private $possui_carro_automatico = '0';
    private $atividade = '';
    private $end_logradouro = '';
    private $end_n = '';
    private $end_complemento = '';
    private $end_bairro = '';
    private $end_cep = '';
    private $end_cidade = '';
    private $end_estado = '';
    private $incapaz = '0';
    private $condutor = '0';
    private $ajuda_finaceira = '0';
    
    //Carregar as private
    public function SetCampo($campo, $valor) {
        $this->$campo = $valor;
    }
    
    public function GetCampo($campo) {
        return $this->$campo;
    }
    

    public function PadraoSelect() {
        $ret['tel_tipo'] = array();
        $ret['tel_tipo'][0] = "Selecione";
        $ret['tel_tipo'][1] = "fixo";
        $ret['tel_tipo'][2] = "tim";
        $ret['tel_tipo'][3] = "oi";
        $ret['tel_tipo'][4] = "vivo";
        $ret['tel_tipo'][5] = "comercial";
        $ret['tel_tipo'][6] = "claro";
        $ret['tel_tipo'][7] = "nextel";
        $ret['tel_tipo'][8] = "recado";
        
        $ret['sexo'] = array();
        $ret['sexo'][1] = "M";
        $ret['sexo'][2] = "F";
        
           
        $ret['incapaz'] = array();
        $ret['incapaz'][0] = "Não";
        $ret['incapaz'][1] = "Sim";
        
        $ret['ajuda_finaceira'] = array();
        $ret['ajuda_finaceira'][0] = "Não";
        $ret['ajuda_finaceira'][1] = "Sim";  
        
        $ret['tem_cnh'] = array();
        $ret['tem_cnh'][0] = "Não";
        $ret['tem_cnh'][1] = "Sim";        
        
        $ret['cnh_tipo'] = array();
        $ret['cnh_tipo'][0] = "Selecione";
        $ret['cnh_tipo'][1] = "PGU";        
        $ret['cnh_tipo'][2] = "Registro";        
        
        
        $ret['parentesco'] = array();
        $ret['parentesco'][1] = "Pai";
        $ret['parentesco'][2] = "Mãe";
        $ret['parentesco'][3] = "Filho/Filha";
        $ret['parentesco'][4] = "Tio / Tia";
        $ret['parentesco'][5] = "Primo/Prima";
        $ret['parentesco'][6] = "Irmão/Irmã";
        return $ret;
    }


 public function monta_campos(){
        $ret = array();
        $ret['nome'] = $this->nome;
        $ret['dt_nasc'] = data_banco($this->dt_nasc);
        $ret['sexo'] = $this->sexo;
        $ret['cpf'] = str2int($this->cpf);
        $ret['rg'] = str2int($this->rg);
        $ret['rg_uf'] = $this->rg_uf;
        $ret['email'] = $this->email;
        $ret['inss'] = $this->inss;
        $ret['tem_cnh'] = $this->tem_cnh;
        $ret['cnh_numero'] = $this->cnh_numero;
        $ret['cnh_tipo'] = $this->cnh_tipo;
        $ret['possui_cnpj'] = $this->possui_cnpj;
        $ret['possui_carro_automatico'] = $this->possui_carro_automatico;
        $ret['atividade'] = $this->atividade;
        $ret['end_logradouro'] = $this->end_logradouro;
        $ret['end_n'] = $this->end_n;
        $ret['end_complemento'] = $this->end_complemento;
        $ret['end_bairro'] = $this->end_bairro;
        $ret['end_cep'] = str2int($this->end_cep);
        $ret['end_cidade'] = $this->end_cidade;
        $ret['end_estado'] = $this->end_estado;
        $ret['incapaz'] = $this->incapaz;
        $ret['ajuda_finaceira'] = $this->ajuda_finaceira;
        $ret['condutor'] = $this->condutor;
        return $ret;
    }
    

}


    