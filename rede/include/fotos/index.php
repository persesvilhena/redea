<?php
if (isset($_POST['alterar'])) {
	$id = $class->antisql($_POST['id']);
	$descricao = $class->antisql($_POST['descricao']);
	$nome = $class->antisql($_POST['nome']);
	
	$sql = mysqli_query($conecta, "UPDATE `album` SET `descricao` = '$descricao', `nome` = '$nome' WHERE `album`.`id` = $id;");

	if ($sql){
		echo "<script>alert('Album alterado com sucesso!'); window.location='index.php?album'</script>";
	}else{
		echo "<script>alert('Houve um problema!'); window.location='index.php?album'</script>";
	}
}






if (isset($_POST['cadastrar'])) {
	$descricao = $class->antisql($_POST['descricao']);
	$nome = $class->antisql($_POST["nome"]);

	$sql = mysqli_query($conecta, "INSERT INTO album VALUES (null, '$descricao', '$id_gen', '$nome')");

	if ($sql){
		echo "<script>alert('Album criado com sucesso!'); window.location='index.php?album'</script>";
	}else{
		echo "<script>alert('Houve um problema!'); window.location='index.php?album'</script>";
	}
}





if (isset($_POST['excluir'])) {
	$id = $class->antisql($_POST['id']);
	
	$c_album = mysqli_query($conecta, "select * from album where id = '$id';");
	$r_album = mysqli_fetch_array($c_album);
	$c_fotos = mysqli_query($conecta, "select * from album_fotos where id_album = '$id';");
	while($r_fotos = mysqli_fetch_array($c_fotos)){
		unlink("include/uploads/fotos/".$r_fotos['foto']."");
		mysqli_query($conecta, "delete from album_fotos where id = '$r_fotos[id]';");
	}
	$deletar = mysqli_query($conecta, "delete from album where id = '$id';");

	if ($deletar){
		echo "<script>alert('Album apagado com sucesso!'); window.location='index.php?album'</script>";
	}else{
		echo "<script>alert('Houve um problema!'); window.location='index.php?album'</script>";
	}
}





if($i1 == 1 || $i1 == null){
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Seus albuns:</div>
		<div class="panel-body">
			<div class="row">
				<?php
				$res = mysqli_query($conecta, "SELECT * FROM `album` where us = '$id_gen' order by id asc;");
				while($escrever=mysqli_fetch_array($res)){
					$c_album = mysqli_query($conecta, "SELECT * FROM `album_fotos` where id_album = '$escrever[id]' order by id desc;");
					$r_album = mysqli_fetch_array($c_album);
				?>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<a href="index.php?fotos&i1=1&i2=<?php echo $escrever['id']; ?>"><img src="include/uploads/fotos/<?php echo $r_album['foto']; ?>"></a>
						<div class="caption">
							<h3><a href="index.php?fotos&i1=1&i2=<?php echo $escrever['id']; ?>"><?php echo $escrever['nome']; ?></a></h3>
							<p><?php echo $escrever['descricao']; ?></p>
							<p>
								<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('<?php echo $escrever['id']; ?>','ab_edit');" role="button">Editar</a> 
								<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger" onclick="CarregaDadosJanela('<?php echo $escrever['id']; ?>','ab_del');" role="button">Excluir</a>
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
		<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('0','ab_novo');">Novo album</a>
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