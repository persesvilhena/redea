<?php
$cont = 0;
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
	$csql = mysql_query("SELECT * FROM videos WHERE id_us = '$id';");
	while($rsql = mysql_fetch_array($csql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 381px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $rsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $rsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $rsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"381\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=index.php?videos&i1=5&i2=" . $rsql['id'] . " class=classe1>" . $rsql['nome'] . "</a><br></span>
		<span class=\"texto\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','vid_edit');\">Alterar</a> - 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','vid_del');\">Excluir</a>
		</span>
		</center>
		</div>
		";
		$cont = $cont + 1;
		$mod = $cont % 2;
 		if ($mod == 0){ echo "<div style=\"clear: both;\"></div>"; }
	}
	echo "<div style=\"clear: both;\"></div>";
	if (mysql_num_rows($csql) == 0){
		echo "<center><span class=\"titulo\">A lista de videos está vazia</span></center>";
	}
	echo "<br><div align=right><a href=\"#pfdialog\" name=\"pfmodal\" onclick=\"CarregaDadosJanela('0','vid_novo');\" class=\"botao\">Novo video</a></div>";
}













if($i1 == 2){
	$csql = mysql_query("select * from videos where id = '$i2' and id_us = '$id';");
	$rsql = mysql_fetch_array($csql);
	if(mysql_num_rows($csql) == 1){
		if(isset($_POST["alterar"])) {
			if(!empty($_POST["nome"]) && !empty($_POST["descricao"])) {
				$nome = $class->antisql($_POST["nome"]);
				$descricao = $class->antisql($_POST["descricao"]);
				$link = $class->antisql($_POST["link"]);
				$nlink = str_replace('https://www.youtube.com/watch?v=' , '' , $link);

				$altera = mysql_query("update videos set nome = '$nome', descricao = '$descricao' where id = '$i2' and id_us = '$id';");
				if ($altera){ 
					echo "<script>alert('Video alterado com sucesso!');window.location='index.php?videos';</script>"; 
				}else{
					echo "<script>alert('Houve um problema!');window.location='index.php?videos';</script>";
				}
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?videos';</script>";
			}
		}

		echo "<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?videos&i1=2&i2=" . $rsql['id'] . "\" method=\"post\">
		<span class=\"texto\">Nome:</span><input name=\"nome\" id=\"cordoinput\" type=\"text\" value=\"" . $rsql['nome'] . "\"><br>
		<span class=\"texto\">Descricao:</span><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\">" . $rsql['descricao'] . "</textarea><br>
		<input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\">
		</form>
		";
	}
}







if($i1 == 3){
	$csql = mysql_query("select * from videos where id = '$i2' and id_us = '$id';");
	$rsql = mysql_fetch_array($csql);
	if(mysql_num_rows($csql) == 1){
		$altera = mysql_query("delete from videos where id = '$i2' and id_us = '$id';");
		unlink("uploads/videos/".$rsql['link']."");
		if ($altera){ 
			echo "<script>alert('Video apagado com sucesso!');window.location='index.php?videos';</script>"; 
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?videos';</script>";
		}
	}
}








if($i1 == 4){
	   
if (isset($_POST['envia'])) {
$nome = $class->antisql($_POST["nome"]);
$descricao = $class->antisql($_POST["descricao"]);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/videos/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 100; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('flv', 'mp4');

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
echo "Por favor, apenas arquivos com as seguintes extensões: flv ou mp4";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 100Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
		//preg_match("/\.(mp4|flv){1}$/i", $_FILES["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_final = md5(uniqid(time())) . "." . $extensao; //$ext[1];

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
$insert = mysql_query("insert into videos (id_us, link, nome, descricao) values ('$id', '$nome_final', '$nome', '$descricao');");
if($insert){
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<script>alert('Upload efetuado com sucesso!');window.location='index.php?videos'</script>";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
}
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}

}
}


	echo "<span class=\"titulo\">Novo Video</span><hr size=\"1\" color=\"#cccccc\">
	<form action=\"index.php?videos&i1=4\" method=\"post\">
	<span class=\"texto\">Nome:</span><input name=\"nome\" id=\"cordoinput\" type=\"text\" value=\"\"><br>
	<span class=\"texto\">Descricao:</span><textarea name=\"descricao\" id=\"cordoinput\" type=\"text\" rows=\"5\" cols=\"50\"></textarea><br>
	<span class=\"texto\">Link:</span><input name=\"link\" id=\"cordoinput\" type=\"text\" value=\"\"><br>
	<input name=\"inserir\" id=\"cordoinput\" type=\"submit\" value=\"Postar\">
	</form>
	";
}





if($i1 == 5){
	$csql = mysql_query("select * from videos where id = $i2;");
	$rsql = mysql_fetch_array($csql);
	echo "
	<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
	<div id=\"myElement" . $rsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $rsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $rsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"800\",
        	height: \"450\"
    	});
		</script>
	<span class=\"texto\">" . $rsql['descricao'] . "</span>

	";

	$com_idtipo = "5";
	$com_idsubtipo = $i2;
	include("engine/com/index.php");

}
?>