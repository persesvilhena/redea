<?php
///////////////////////////////funcoes gerais
function recebe($valor){
	if($valor == NULL){
		$valor = "";
	}else{
		$valor = addslashes($valor);
	}
	return $valor;
}








//////////////////////////////horario
$config_horario = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
function retorna_horario($hora){
    echo date('H:i:s d/m/Y', $hora);
}









/////////////////////ALTERTAS
function sucesso($info){
	echo "
		<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			" . $info . "
		</div>
	";
}
function aviso($info){
	echo "
		<div class=\"alert alert-info alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			" . $info . "
		</div>
	";
}
function alerta($info){
	echo "
		<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			" . $info . "
		</div>
	";
}
function problema($info){
	echo "
		<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			" . $info . "
		</div>
	";
}



?>