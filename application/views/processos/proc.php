<!-- Padrão -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Processos</h4></div>
            <div class="panel-body">
                <?php
                echo '<form method="post" action="'.base_url().$this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9).'" enctype="multipart/form-data" />';
                //echo form_open_multipart($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
                
                if($this->uri->segment(5)== ""){
                     include 'pg_consulta.php';
                }else{
                    //include "pg_clientes.php";
                    include("pg_".$this->uri->segment(5).".php");    
                }
                
                echo form_close();
                ?>

            </div>
        </div>
    </div>
</div>	