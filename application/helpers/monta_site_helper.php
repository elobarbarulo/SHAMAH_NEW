<?php

function monta_servico_site($titulo,$descricao){
    return ''
    . '<div class="col-md-4">
            <h4 class="service-heading">'.$titulo.'</h4>
            <p class="text-muted">'.$descricao.'</p>
        </div>
    ';
}
function monta_imagem($imagem){
    $caminho = site_url().'includes/img/'.$imagem;
    return ''
    . '<div class="col-md-3 col-sm-6">                    
                        <img src="'.$caminho.'" class="img-responsive img-centered" alt="">
                </div>
    ';
}

function input_text($nome_campo, $label){
    return ''
    . '<div class="form-group">
        <input type="text" class="form-control" placeholder="'.$label.'" id="'.$nome_campo.'" name="'.$nome_campo.'">
       </div>
    ';
}


