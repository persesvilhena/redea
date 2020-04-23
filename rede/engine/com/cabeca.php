<?php


////////////////////////////////////////CADASTRA UM POST
if(isset($_POST["com"])) { 
	if(!empty($_POST["msg"])) {
		$msg = recebe($_POST["msg"]);
                $id_post = recebe($_POST["id_post"]);
		$tipo = recebe($_POST["tipo"]);
		if(isset($_GET['foto'])){$foto = recebe($_GET['foto']);} else {$foto = null;}
		if(isset($_GET['arquivo'])){$arquivo = recebe($_GET['arquivo']);} else {$arquivo = null;}
		$insert = mysqli_query($conecta, "insert into com(id_us, tipo, id_post, msg, foto, arquivo, data) values ('$row[id]', '$tipo', '$id_post', '$msg', '$foto', '$arquivo', '$config_horario');") or die(mysqli_error());
		if($insert) {
			sucesso("Comentário inserido com sucesso!");
		}	
	}
	else {
		problema("Houve um problema!");
	}		
}

////////////////////////////////////////CADASTRA UM REPOST
if(isset($_POST["recom"])) { 
	if(!empty($_POST["msg"]) && !empty($_POST["id_com"])) {
		$msg = recebe($_POST["msg"]);
		$id_com = recebe($_POST["id_com"]);
		$id_post = recebe($_POST["id_post"]);
		$tipo = recebe($_POST["tipo"]);
		if(isset($_GET['foto'])){$foto = recebe($_GET['foto']);} else {$foto = null;}
		if(isset($_GET['arquivo'])){$arquivo = recebe($_GET['arquivo']);} else {$arquivo = null;}
		$insert = mysqli_query($conecta, "insert into com (id_us, tipo, id_post, id_com, msg, foto, arquivo, data) values ('$row[id]', '$tipo', '$id_post', '$id_com', '$msg', '$foto', '$arquivo', '$config_horario');") or die(mysqli_error());
		if($insert) {
			sucesso("Comentário inserido com sucesso!");
		}	
	}
	else {
		problema("Houve um problema!");
	}		
}



///////////////////////////////////////APAGA UM POST
if($p1 == 4){
	$sql2 = mysqli_query($conecta, "SELECT * FROM com WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysqli_query($conecta, "DELETE FROM com WHERE id='$p2' and id_us = '$id'");
		$csql4 = mysqli_query($conecta, "DELETE FROM com WHERE id_com = '$res2[id]'");
		if($csql4) {
			sucesso("Comentário apagado com sucesso!");
		}
		else {
			problema("Houve um problema!");
		}
	}
}




/////////////////////////////ALTERA UM POST
if(isset($_POST["altera_com"])){
	$sql2 = mysqli_query($conecta, "SELECT * FROM com WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["altera_com"])) {
			if(!empty($_POST["msg"])) {
				$msg = recebe($_POST["msg"]);
				$csql4 = mysqli_query($conecta, "update com set msg = '$msg' WHERE id='$p2' and id_us = '$id'");
				if($csql4) {
					sucesso("Comentário alterado com sucesso!");
				}
				else {
					problema("Houve um problema!");
				}
			}
		}
	}
}




?>