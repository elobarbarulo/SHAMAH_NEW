<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 
    public function __construct(){
    	parent::__construct();
        //include 'defaul_controller.php';
        $this->load->model('usuarios_model');
        $this->load->library('session');
    }


        public function index(){
            $ret = array();
            $ret['status'] = 0;
            $ret['mensagem'] = '';
            $post = $this->input->post();
            $resp = $this->usuarios_model->login( $post['cpf'],$status="");
            if($resp['quant'] == 0){
                $ret['status'] = 0;
                $ret['mensagem'] =  'Usuario não encontrado';
            }else{
                if($resp['valor'][0]['status'] == 0){
                    $ret['status'] = 0;
                    $ret['mensagem'] = 'Usuario não pode acessar o sistema!';
                }else{
                    $this->session->set_userdata(array("usuario"=>$resp['valor'][0]));
                    $ret['status'] = 1;
                    $ret['mensagem'] = '';
                }
            }
            echo $retorno = json_encode($ret);
	}
}

