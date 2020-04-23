<?php
if (isset($_POST['alterar'])) {
	$idimg = $class->antisql($_POST['id']);
	$descricao = $class->antisql($_POST['descricao']);
	$sec = mysqli_query($conecta, "select * from album_fotos where id = '$idimg'");
	$rsec = mysqli_fetch_array($sec);
	if ($rsec['us'] == $id){
		$alte = mysqli_query($conecta, "update album_fotos set descricao = '$descricao' where id = '$idimg'");
		if($alte){ 
			echo "<script>alert('Alteração realizada com sucesso!');window.location='index.php?album'</script>"; 
		}else{ 
			echo "<script>alert('Houve um erro!');window.location='index.php?album'</script>"; 
		}
	}else{ 
		echo "error"; 
	}

}
$error = null;

if (isset($_POST['cadastrar'])) {
 
	// Recupera os dados dos campos
	$descricao = $class->antisql($_POST['descricao']);
	$id_album = $class->antisql($_POST['id']);
	$foto = $_FILES["foto"];
 
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 500000;
		// Altura máxima em pixels
		$altura = 500000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 100000000;
 
    	// Verifica se o arquivo é uma imagem
    	if( ! preg_match( '/^image\/(jpeg|png|gif|pjpeg|jpg)$/i' , $foto[ 'type' ] ) ){
     	   $error[1] = "<script>alert('Formato nao aceito!'); window.location='index.php?album'</script>";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "<script>alert('A largura da imagem não deve ultrapassar ".$largura." pixels!'); window.location='index.php?album'</script>";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "<script>alert('Altura da imagem não deve ultrapassar ".$altura." pixels!'); window.location='index.php?album'</script>";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "<script>alert('A imagem deve ter no máximo ".$tamanho." bytes!'); window.location='index.php?album'</script>";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(pjpeg|jpeg|png|gif|bmp|jpg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "include/uploads/fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysqli_query($conecta, "INSERT INTO album_fotos VALUES (null, '$id_album', '$id_gen', '$nome_imagem', '$descricao')");
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script>alert('imagem enviada com sucesso'); window.location='index.php?album'</script>";
			}
		}
 
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro;
			}
		}
	}
}





if (isset($_POST['excluir'])) {
	$idimg = $class->antisql($_POST['id']);
	$sec = mysqli_query($conecta, "select * from album_fotos where id = '$idimg' and us = '$id_gen';");
	$r_sec = mysqli_fetch_array($sec);
	if(mysqli_num_rows($sec) != 0){
		unlink("include/uploads/fotos/".$r_sec['foto']."");
		$deletar = mysqli_query($conecta, "delete from album_fotos where id = '$r_sec[id]';");
		if ($deletar){
			echo "<script>alert('Foto apagada com sucesso!'); window.location='index.php?album'</script>";
		}else{
			echo "<script>alert('Houve um problema!'); window.location='index.php?album'</script>";
		}
	}
}






if($i1 == 1 || $i1 == null){
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Suas fotos:</div>
		<div class="panel-body">
			<div class="row">
				<?php
				$res = mysqli_query($conecta, "SELECT * FROM `album_fotos` where id_album = '$i2' order by id asc;");
				while($escrever=mysqli_fetch_array($res)){
				?>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $escrever['id']; ?>','ft');">
							<img src="include/uploads/fotos/<?php echo $escrever['foto']; ?>">
						</a>
						<div class="caption">
							<p><?php echo $escrever['descricao']; ?></p>
							<p>
								<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('<?php echo $escrever['id']; ?>','ft_edit');" role="button">Editar</a> 
								<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger" onclick="CarregaDadosJanela('<?php echo $escrever['id']; ?>','ft_del');" role="button">Excluir</a>
							</p>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<div align="right">
		<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('<?php echo $i2; ?>','ft_novo');">Nova foto</a>
	</div>
	<?php

}














if($i1 == 2){
$qfoto = mysqli_query($conecta, "select * from album where id = '$i2';");
$rfoto = mysqli_fetch_array($qfoto);
if ($rfoto['us'] == $id){ echo "<a href=\"index.php?album\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }else
{ echo "<a href=\"index.php?user&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }

echo "<center><img src=\"album/" . $rfoto['nome'] . "\" style=\"max-width: 798px; max-height: 1500px;\"></center><hr size=\"1\" color=\"#cccccc\">";
echo "<span class=\"titulo\">Descricao: </span><span class=\"texto\">" . $rfoto['descricao'] . "<br>";
echo "<br> ";
	$com_idtipo = "10";
	$com_idsubtipo = $i2;
	include("engine/com/index.php");
}










if($i1 == 3){
$qfoto = mysqli_query($conecta, "select * from album where id = '$i2';");
$rfoto = mysqli_fetch_array($qfoto);
if ($rfoto['us'] == $id){ 
?>
<form action="" method="post">
<input type="hidden" name="idimg" value="<?php echo $rfoto['id']; ?>">
<textarea id="cordoinput" type="text" name="descricao" rows="10" cols="50"><?php echo $rfoto['descricao']; ?></textarea>
<input id="cordoinput" type="submit" name="alterar" value="Alterar" />
</form>
<?php 
}
else { echo "error"; }

}












if($i1 == 4){
$qfoto = mysqli_query($conecta, "select * from album where id = '$i2';");
$rfoto = mysqli_fetch_array($qfoto);
if ($rfoto['us'] == $id){ 
unlink("album/".$rfoto['nome']."");
$exc = mysqli_query($conecta, "delete from album where id = '$i2'");
if($exc){ echo "<script>alert('Exclusao realizada com sucesso!');window.location='index.php?album'</script>"; }
else{ echo "<script>alert('Houve um erro!');window.location='index.php?album'</script>"; }
}
else { echo "error"; }

}

?>