<?php


////////////////////////////////////////CADASTRA UM POST
if(isset($_POST["post"])) { 
	if(!empty($_POST["msg"])) {
		$msg = recebe($_POST["msg"]);
		if(isset($_GET['foto'])){$foto = recebe($_GET['foto']);} else {$foto = null;}
		if(isset($_GET['arquivo'])){$arquivo = recebe($_GET['arquivo']);} else {$arquivo = null;}
		$insert = mysqli_query($conecta, "insert into post (id_us, msg, foto, arquivo, data) values ('$row[id]', '$msg', '$foto', '$arquivo', '$config_horario');") or die(mysqli_error());
		if($insert) {
			echo "<script>window.location='" . $pagina . "';</script>";
		}	
	}
	else {
		problema("Erro, campo em branco!");
	}		
}



///////////////////////////////////////APAGA UM POST
if($p1 == 4){
	$sql2 = mysqli_query($conecta, "SELECT * FROM post WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysqli_query($conecta, "DELETE FROM post WHERE id='$p2' and id_us = '$id'");
		$csql4 = mysqli_query($conecta, "DELETE FROM com WHERE id_post = '$res2[id]' and tipo = '1'");
		if($csql4) {
			sucesso("Postagem apagada com sucesso!");
		}
		else {
			problema("Houve um problema!");
		}
	}
}




/////////////////////////////ALTERA UM POST
if($p1 == 6){
	$sql2 = mysqli_query($conecta, "SELECT * FROM post WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["alterapost"])) {
			if(!empty($_POST["msg"])) {
				$msg = recebe($_POST["msg"]);
				$csql4 = mysqli_query($conecta, "update post set msg = '$msg' WHERE id='$p2' and id_us = '$id'");
				if($csql4) {
					sucesso("Postagem alterada com sucesso!");
				}
				else {
					problema("Houve um problema!");
				}
			}
		}
	}
}






?>