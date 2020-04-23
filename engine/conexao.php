<?php
$bd_server = "localhost";
$bd_user = "root";
$bd_pass = "";
$bd_name = "redea";

header('Content-Type: text/html; charset=utf-8');
$conecta = mysqli_connect($bd_server, $bd_user, $bd_pass);
mysqli_select_db($conecta, $bd_name);
mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta, 'SET character_set_connection=utf8');
mysqli_query($conecta, 'SET character_set_client=utf8');
mysqli_query($conecta, 'SET character_set_results=utf8');
		   
class SistemaLogin {
	function antisql($sql) {
    $sql = addslashes($sql);
    return $sql;
	}
}
$class = new SistemaLogin;


$tabela = "user";
$creditos = "Rede © 2016";
?>
