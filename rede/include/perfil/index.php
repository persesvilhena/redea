<?php
if (isset($_POST['alterar_foto'])) {
	$us = recebe($_POST['us']);
	$foto = $_FILES["foto"];
 
	if (!empty($foto["name"])) {
		$largura = 5000;
		$larguramin = 1;
		$altura = 2500;
		$tamanho = 5000000;

    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "<script>alert ('Formato incompativel!')</script>";
   	 	} else {
			$dimensoes = getimagesize($foto["tmp_name"]);
			if($dimensoes[0] > $largura) {
				$error[2] = "<script>alert ('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
			}
			if($dimensoes[0] < $larguramin) {
				$error[5] = "<script>alert ('A largura da imagem não deve ser menor de ".$larguramin." pixels')</script>";
			}
			if($dimensoes[1] > $altura) {
				$error[3] = "<script>alert ('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
			}
			if($foto["size"] > $tamanho) {
	   		 	$error[4] = "<script>alert ('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
			}
		}
 
		if (!isset($error)){
			$sql = mysqli_query($conecta, "SELECT foto FROM user WHERE id = '$id';");
			$usuario = mysqli_fetch_object($sql);
			if($usuario->foto != "new/new.png"){
				unlink("fotos/".$usuario->foto."");
				unlink("fotos/min/".$usuario->foto."");
			} 
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	$caminho_imagem = "fotos/" . $nome_imagem;
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			$sql = mysqli_query($conecta, "update user set foto = '$nome_imagem' where id = '$id';");
			require('engine/wide/WideImage.php');
			$image = WideImage::load($caminho_imagem);
			$image = $image->resize(60, 60);
			$image->saveToFile('fotos/min/' . $nome_imagem);
			if ($sql){
				sucesso("Imagem alterada com sucesso!");
			}else{
				problema("Houve um problema");
			}
		}

		if(isset($error)){
			foreach ($error as $erro) {
				echo $erro;
			}
		}
	}
}


if(isset($_POST["alterar_perfil1"])) { 
	if(!empty($_POST["nome"]) && !empty($_POST["sobrenome"]) && !empty($_POST["email"])) { 
		$nome = recebe($_POST["nome"]);
		$sobrenome = recebe($_POST["sobrenome"]); 
		$email = recebe($_POST["email"]); 

		$insert = mysqli_query($conecta, "update user set nome = '$nome', sobrenome = '$sobrenome', email = '$email' where id = '$id';");
		if($insert) {
			sucesso("Dados alterados com sucesso!");
		}else{
			problema("Houve um problema!");
		}
	}
	else {
		alerta("Por Favor, preencha os campos corretamente!");
	}		
}


if(isset($_POST["alterar_perfil2"])) { 	
	$user->data_nasc = recebe($_POST["data_nasc"]);
	$user->telefone = recebe($_POST["telefone"]); 
	$user->descricao = recebe($_POST["descricao"]);
	$user->cidade = recebe($_POST["cidade"]);
	$user->estado = recebe($_POST["estado"]);
	$user->regiao = recebe($_POST["regiao"]);
	$user->pais = recebe($_POST["pais"]);
	$user->sexo = recebe($_POST["sexo"]);
	
	if($user->update($id)) {
		sucesso("Dados alterados com sucesso!");
	}else{
		problema("Houve um problema!");
	}
}

?>

<div class="panel panel-default">
	<div class="panel-heading">Foto de exibição:</div>
	<div class="panel-body">
		<form action="<?php $PHP_SELF; ?>" method="post" enctype="multipart/form-data" name="cadastro" >
		<input type="hidden" name="us" value="<?php echo "$id_gen"; ?>">
		<input class="btn btn-default" type="file" name="foto" />
		<div align="right"><input class="btn btn-default" type="submit" name="alterar_foto" value="Enviar" /></div>
		</form>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Dados Pessoais:</div>
	<div class="panel-body">
		<b>Nome: </b><?php echo $row["nome"]; ?><br>
		<b>Sobrenome: </b><?php echo $row["sobrenome"]; ?><br>
		<b>Email: </b><?php echo $row["email"]; ?><br><br>
		<div align="right"><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('0','perfil_alt');">Alterar Dados</a></div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Perfil:</div>
	<div class="panel-body">
		<b>Data de nascimento: </b><?php echo $row["data_nasc"]; ?><br>
		<b>Telefone: </b><?php echo $row["telefone"]; ?><br>
		<b>Descrição: </b><?php echo $row["descricao"]; ?><br>
		<b>Cidade: </b><?php echo $row["cidade"]; ?><br>
		<b>Estado: </b><?php echo $row["estado"]; ?><br>
		<b>Região: </b><?php echo $row["regiao"]; ?><br>
		<b>País: </b><?php echo $row["pais"]; ?><br>
		<b>Sexo: </b><?php echo $row["sexo"]; ?><br><br>
		<div align="right"><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default" onclick="CarregaDadosJanela('0','perfil_alt1');">Alterar Dados</a></div>
	</div>
</div>


<?php
$contatos = $id;
post_campo();
include ("engine/post/postagem.php");
?>