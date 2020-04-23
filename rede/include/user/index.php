<?php


if ($i1 == 1){
$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$i2'");
$rsql = mysqli_fetch_array($csql);
$repeat_contato = mysqli_query($conecta, "SELECT * FROM contato WHERE deid='$id' and cotid='$i2'");


?>
<h1 class="page-header"><?php echo $rsql['nome'] . " " . $rsql['sobrenome']; ?></h1>
<div class="well">
	<div class="row">
		<div class="col-md-8">
			<H4><?php echo $rsql['nome'] . " " . $rsql['sobrenome']; ?></h4>
			<hr>
			<b>Data de Nascimento:</b> <?php echo $rsql['data_nasc']; ?><br>
			<b>Telefone:</b> <?php echo $rsql['telefone']; ?><br>
			<b>Cidade:</b> <?php echo $rsql['cidade']; ?><br>
			<b>Estado:</b> <?php echo $rsql['estado']; ?><br>
			<b>Regiao:</b> <?php echo $rsql['regiao']; ?><br>
			<b>País:</b> <?php echo $rsql['pais']; ?><br>
			<b>Sexo:</b> <?php echo $rsql['sexo']; ?><br>
			<b>Descrição:</b> <?php echo $rsql['descricao']; ?><br>
		</div>
		<div class="col-md-4">
			<img width="100%" src="fotos/<?php echo $rsql['foto']; ?>" class="img-circle">
			<hr>
			<div align="center">
				<?php
				if (mysqli_num_rows($repeat_contato) > 0){
				echo "<a href=\"index.php?user&i1=3&i2=" . $i2 . "\" class=\"btn btn-primary btn-lg\">Apagar contato</a>";
				} else {
				echo "<a href=\"index.php?user&i1=2&i2=" . $i2 . "\" class=\"btn btn-primary btn-lg\">Adicionar contato</a>";
				}
				if ($id != $i2){
				echo "<br><br><a href=\"index.php?msg&i1=5&i2=" . $i2 . "\" class=\"btn btn-primary btn-lg\">Enviar mensagem</a>";
				}
				?>
			</div>
		</div>
	</div>
</div>

<div class="well">
	propaganda
</div>

<?php

$contatos = $i2;
include ("engine/post/postagem.php");

}







if ($i1 == 2){
$add = mysqli_query($conecta, "INSERT INTO contato(deid, cotid) VALUES('$id', '$i2')") or die(mysqli_error()); 
if($add) {
$msg_erro = "Contato adicionado com sucesso!";
}
else {
$msg_erro = "Houve um erro! relate o erro!";
}
echo "<div id=cont><span class=texto>" . $msg_erro . "</span></div>";
}







if ($i1 == 3){
$add = mysqli_query($conecta, "delete from contato where deid = '$row[id]' and cotid = '$i2'") or die(mysqli_error()); 
if($add) {
$msg_erro = "Contato apagado com sucesso!";
}
else {
$msg_erro = "Houve um erro! relate o erro!";
}
echo "<div id=cont><span class=texto>" . $msg_erro . "</span></div>";
}







if ($i1 == 4){
$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$i2'");
$rsql = mysqli_fetch_array($csql);
echo "<span class=titulo>Fotos de " . $rsql['nome'] . " " . $rsql['sobrenome'] . "</span><hr size=\"1\" color=\"#cccccc\">";
$res = mysqli_query($conecta, "SELECT * FROM `album` where us='$i2';");
 while($escrever=mysqli_fetch_array($res)){
 echo "
<div id=\"item\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">
<a href=index.php?album&i1=2&i2=" . $escrever['id'] . "><img src=album/" . $escrever['nome'] . " width=\"143\"  height=\"120\"></a> 
</div>

 ";
}
}



if ($i1 == 5){
	$csql = mysqli_query($conecta, "select * from user where id = '$i2'");
	$rsql = mysqli_fetch_array($csql);
	echo "<span class=\"titulo\">Videos de " . $rsql['nome'] . " " . $rsql['sobrenome'] . "</span>
	<hr size=\"1\" color=\"#cccccc\">";
	$videoscsql = mysqli_query($conecta, "SELECT * FROM videos WHERE id_us = '$i2';");
	while($videosrsql = mysqli_fetch_array($videoscsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 381px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<div id=\"myElement" . $videosrsql['id'] . "\">Loading the player...</div>

		<script type=\"text/javascript\">
   		jwplayer(\"myElement" . $videosrsql['id'] . "\").setup({
        	file: \"uploads/videos/" . $videosrsql['link'] . "\",
        	image: \"/uploads/myPoster.jpg\",
        	width: \"381\",
        	height: \"214\"
    	});
		</script>
		<br><span class=\"titulo\"><center><a href=index.php?videos&i1=5&i2=" . $videosrsql['id'] . " class=classe1>" . $videosrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
}


if ($i1 == 6){
	$csql = mysqli_query($conecta, "select * from user where id = '$i2'");
	$rsql = mysqli_fetch_array($csql);
	echo "<span class=\"titulo\">Musicas de " . $rsql['nome'] . " " . $rsql['sobrenome'] . "</span>
	<hr size=\"1\" color=\"#cccccc\">";
	$musicascsql = mysqli_query($conecta, "SELECT * FROM musicas WHERE id_us = '$i2';");
	while($musicasrsql = mysqli_fetch_array($musicascsql)){
		echo "
		<div id=\"item\" style=\"position: relative; width: 381px; float: left; margin: 2px; text-align: justify; padding: 5px;\">
		<center>
		<object type=\"application/x-shockwave-flash\" data=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" width=\"200\" height=\"20\"/>
		<param name=\"movie\" value=\"zplayer.swf?mp3=uploads/musicas/" . $musicasrsql['link'] . "&down=1\" />
		</object>
		</center>
		<br><span class=\"titulo\"><center><a href=index.php?musicas&i1=5&i2=" . $musicasrsql['id'] . " class=classe1>" . $musicasrsql['nome'] . "</a><br></span>
		</center>
		</div>
		";
	}
}
?>