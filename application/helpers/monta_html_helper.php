<?php 
/*****************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $tipo_campo
 * @param type $nome
 * @param type $value
 * @param type $maxlength
 * @param type $classes
 * @return string
 *****************************************************************************************************/
function monta_input($tamanho,$label,$tipo_campo,$nome,$value = '',$maxlength = "" , $classes = "", $id = ''){	
	$valor = $value != ""  ? $value : set_value($nome);
	$maxla = $maxlength != ""  ? $maxlength : "";
	$classe = $classes != ""  ? $classes : "";
	
	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.' '.$classes.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<input type="'.$tipo_campo.'" class="form-control  ' . $nome . ' ' . $classe .' "  name="'.$nome.'" value="'.$valor.'" placeholder="'.$label.'" aria-describedby="basic-addon1" maxlength="'.$maxlength.'" id="'.$id.'">';
	$ret.='</div>';
	$ret.='<ul  class=" ul_'.$nome.'_list col-md-12 ul_autocomplete"></ul>';
	$ret.='</div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $nome
 * @param type $valores
 * @param type $selecionado
 * @return string
 *****************************************************************************************************/
function monta_select($tamanho,$label,$nome,$valores,$selecionado,$id = "",$classes = ""){	
	if($selecionado == '' || $selecionado == 0){
		$selec = set_value($nome);
	}else{
		$selec = $selecionado;
	}

        
	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<select class="form-control ' . $classes ." ". $nome.' " name="'.$nome.'" id ="'.$id.'">';
	//$ret.='<option value = "">'.$label.'</option>';
		foreach ($valores as $key => $value) {
	    	if($selec == $key){
	          $selected = " selected='selected' ";
	        }else{
	          $selected = "  ";
	    	}
		$ret.='<option  ' . $selected . ' value = "'.$key.'">'.$value.'</option>';
	    }
	$ret.='</select>';
	$ret.='</div>';
	$ret.='</div>';

	return $ret;

} 
 


/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $tipo_campo
 * @param type $nome
 * @param type $value
 * @return string
 *****************************************************************************************************/
function monta_input_ver($tamanho,$label,$tipo_campo,$nome,$value = '',$maxlength = "" , $classes = "", $id = ''){	
	$valor = $value != ""  ? $value : set_value($nome);

	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<input disabled type="'.$tipo_campo.'" class="form-control  ' . $nome . ' "  name="'.$nome.'" value="'.$valor.'" placeholder="'.$label.'">';
	$ret.='</div>';
	$ret.='</div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho
 * @param type $label
 * @param type $nome
 * @param type $valores
 * @param type $selecionado
 * @return string
 *****************************************************************************************************/
function monta_select_ver($tamanho,$label,$nome,$valores,$selecionado,$id = "",$classes = ""){	
	if($selecionado == '' || $selecionado == 0){
		$selec = set_value($nome);
	}else{
		$selec = $selecionado;
	}

	$ret = '';
	$ret.='<div class="col-md-'.$tamanho.'">';
	$ret.='<div class="input-group">';
	$ret.='<span class="input-group-addon" id="basic-addon1">'.$label.'</span>';
	$ret.='<select disabled class="form-control '. $nome.' " name="'.$nome.'"  id ="'.$id.'">';
	//$ret.='<option value = "">'.$label.'</option>';
		foreach ($valores as $key => $value) {
	    	if($selec == $key){
	          $selected = " selected='selected' ";
	        }else{
	          $selected = "  ";
	    	}
		$ret.='<option  ' . $selected . ' value = "'.$key.'">'.$value.'</option>';
	    }
	$ret.='</select>';
	$ret.='</div>';
	$ret.='</div>';

	return $ret;

} 
function monta_form_check($nome,$class,$id,$texto){
    return '<div class="checkbox_form">'
            . '<label>  '
            . ' <input type="checkbox" name="'.$nome.'" class="'.$class.'" id="'.$id.'" value="'.$texto.'"> '.$texto.''
            . ' </label>'
           . '</div>';
}
function monta_form_check_checado($nome,$class,$id,$texto){
    return ''
         .'<div class="checkbox_form">'
            . '<label> '
            . '<input type="checkbox" checked name="'.$nome.'" class="'.$class.'" id="'.$id.'" value="'.$texto.'"> '.$texto.''
            . '</label>'
         .'</div>';
}



/******************************************************************************************************
 * 
 * @param type $link
 * @param type $texto
 * @return type
 *****************************************************************************************************/
function bt_link($link,$texto,$classe = 'primary'){
	$ret ='';
	// $ret.= '<div class="col-md-12"><br></div>';
	$ret.=anchor($link,'<span class="btn btn-'.$classe.'">'.$texto.'</span>');
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $texto
 * @return string
 *****************************************************************************************************/
function SubTitulo($texto){
	$ret ='';
	$ret.= '<div class="col-md-12"><h4>'.$texto.'</h4></div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $tamanho_espaco
 * @param type $tamanho_bt
 * @param type $texto
 * @return string
 *****************************************************************************************************/
function bt_form($tamanho_espaco,$tamanho_bt,$texto,$id="", $class = ""){
	$ret ='';
	$ret.= '<div class="col-md-12"><br></div>';
	$ret.= '<div class="col-md-'.$tamanho_espaco.'"></div>';
	$ret.= '<div class="col-md-'.$tamanho_bt.'"><button type="submit" class="btn btn-primary '.$class.'" id="'.$id.'">'.$texto.'</button></div>';
	return $ret;
}

/******************************************************************************************************
 * 
 * @param type $mensagem
 * @return string
 *****************************************************************************************************/
function reprovado($mensagem){
	$ret ='';
	$ret.= '<div class="row"><div class="col-md-12">';
	$ret.= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$ret.= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$ret.= $mensagem;
	$ret.= '</div>';
	$ret.= '</div></div>';
	return $ret;
}
/******************************************************************************************************
 * 
 * @param type $mensagem
 * @return string
 *****************************************************************************************************/
function mensagem_alerta($mensagem){
	$ret ='';
        $ret.= '<div class="row"><div class="col-md-12">';
	$ret.= '<div class="alert alert-info alert-dismissible" role="alert">';
	$ret.= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$ret.= $mensagem;
	$ret.= '</div>';
        $ret.= '</div></div>';
	return $ret;
}

function confirma_acao($mensagem = "",$link_confirmacao  = "",$link_volta  = ""){
    return '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        decisao = confirm("'.$mensagem.'");
        if (decisao){
          location.href="'.$link_confirmacao.'";
        } else {
           location.href="'.$link_volta.'";
        }
        </SCRIPT>;
    ';
}

function link_js($link){
    return '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">location.href="'.$link.'";';
}



?>