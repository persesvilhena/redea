<?php
$cont = 0;
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
	$csql = mysql_query("SELECT * FROM musicas WHERE id_ar = '$i2';");
	while($rsql = mysql_fetch_array($csql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 249px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" />
		</object>
		</center>
		<span class=\"titulo\"><center><a href=index.php?armusicas&i1=5&i2=" . $rsql['id'] . " class=classe1>" . $rsql['nome'] . "</a><br></span>
		<span class=\"texto\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','armus_edit');\">Alterar</a> - 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','armus_del');\">Excluir</a>
		</span>
		</center>
		</div>
		";

		$cont = $cont + 1;
		$mod = $cont % 3;
 		if ($mod == 0){ echo "<div style=\"clear: both;\"></div>"; }
	}
	echo "<div style=\"clear: both;\"></div>";
	if (mysql_num_rows($csql) == 0){
		echo "<center><span class=\"titulo\">A lista de musicas está vazia</span></center>";
	}
	echo "<br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"CarregaDadosJanela('" . $i2 . "','mus_novo');\">Nova Música</a></div>";

	}
}













if($i1 == 2){
	$csql = mysql_query("select * from musicas where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		if(isset($_POST["alterar"])) {
			if(!empty($_POST["nome"]) && !empty($_POST["descricao"])) {
				$nome = $class->antisql($_POST["nome"]);
				$descricao = $class->antisql($_POST["descricao"]);
				$link = $class->antisql($_POST["link"]);
				$nlink = str_replace('https://www.youtube.com/watch?v=' , '' , $link);

				$altera = mysql_query("update musicas set nome = '$nome', descricao = '$descricao' where id = '$i2' and id_ar = '$rsql[id_ar]';");
				if ($altera){ 
					echo "<script>alert('Musica alterada com sucesso!');window.location='index.php?armusicas&i2=" . $rsql['id_ar'] . "';</script>"; 
				}else{
					echo "<script>alert('Houve um problema!');window.location='index.php?armusicas&i2=" . $rsql['id_ar'] . "';</script>";
				}
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?armusicas&i2=" . $rsql['id_ar'] . "';</script>";
			}
		}
	}
}








if($i1 == 3){
	$csql = mysql_query("select * from musicas where id = '$i2';");
	$rsql = mysql_fetch_array($csql);
	$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$rsql[id_ar]'");
	$rsecveradm = mysql_fetch_array($secveradm);
	if($rsecveradm['adm'] == 1){
		$altera = mysql_query("delete from musicas where id = '$i2' and id_ar = '$rsql[id_ar]';");
		unlink("uploads/musicas/".$rsql['link']."");
		if ($altera){ 
			echo "<script>alert('Musicas apagada com sucesso!');window.location='index.php?armusicas&i2=" . $rsql['id_ar'] . "';</script>"; 
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?armusicas&i2=" . $rsql['id_ar'] . "';</script>";
		}
	}
}









if($i1 == 4){
$secveradm = mysql_query("select * from membros where id_us = '$id' and id_ar = '$i2'");
$rsecveradm = mysql_fetch_array($secveradm);
if($rsecveradm['adm'] == 1){
	   
if (isset($_POST['envia'])) {
$nome = $class->antisql($_POST["nome"]);
$descricao = $class->antisql($_POST["descricao"]);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/musicas/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 100; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('mp3');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
		//preg_match("/\.(mp4|flv){1}$/i", $_FILES["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
$insert = mysql_query("insert into musicas (id_ar, link, nome, descricao) values ('$i2', '$nome_final', '$nome', '$descricao');");
if($insert){
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<script>alert('Upload efetuado com sucesso!');window.location='index.php?armusicas&i2=" . $i2 . "'</script>";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
}
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}

}
}

}
}





if($i1 == 5){
	$csql = mysql_query("select * from musicas where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $rsql['link'] . "&down=1\" />
		</object>
		</center>
	<span class=\"texto\">" . $rsql['descricao'] . "</span>

	";
}
	$com_idtipo = "6";
	$com_idsubtipo = $i2;
	include("engine/com/comentar.php");
	include("engine/com/index.php");
?>