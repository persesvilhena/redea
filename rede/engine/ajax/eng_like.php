<?php

include "../../engine/conexao.php"; 
include "../../engine/protege.php";
$idu = $class->antisql($_GET['id']);
$like = $class->antisql($_GET['like']);





$csql = mysqli_query($conecta, "select * from gostar where id_us = '$id' and id_post = '$idu';");
if(mysqli_num_rows($csql) > 0){
	$insert = mysqli_query($conecta, "update gostar set gostei = '$like', data = '$config_horario' where id_post = '$idu' and id_us = '$id'");
	if($insert){ echo "ok"; }else{ echo "error"; }
} else {
	$insert = mysqli_query($conecta, "insert into gostar (id_post, id_us, gostei, data) values('$idu', '$id', '$like', '$config_horario')");
	if($insert){ echo "ok"; }else{ echo "error"; }
}



?>