<?php 

                $C 		=$this->uri->segment(1);// controler
		$M 		=$this->uri->segment(2);// metodo
		$I 		=$this->uri->segment(3);// id
		$P_I    	=$this->uri->segment(3);// paginaçao inicio
		$P_F            =$this->uri->segment(4);// paginaçao fimz

    if($C != 'site'){
        $this->load->view('estrutura/head');
                    $this->load->view($C.'/'.$M); 	
        $this->load->view('estrutura/rodape'); 
    }else{
        $this->load->view('estrutura/head_site');
                    $this->load->view("site/inicio"); 	
        $this->load->view('estrutura/rodape_site'); 
    }
                
	

        
        
        
?>