<?php
///////////////////////////////funcoes gerais
function user_logado (){
	if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){ 
		return "1";
	}else{
		return "0";
	}
}




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





//////////////////////////////////funcao postagem
function post_campo(){
?>
<div class="panel panel-default">
	<div class="panel-heading">Postar:</div>
	<div class="panel-body">
		<div class="form-group">
			<form method="post" action="">
				<textarea class="form-control" rows="3" name="msg"></textarea><br>
				<div align="right">
					<input type="submit" name="post" class="btn btn-default" value="Postar">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
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