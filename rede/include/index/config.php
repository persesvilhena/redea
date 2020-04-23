<?php

if(isset($_POST["cadastrar"])) { 
	if(!empty($_POST["epp"])) { 
		$epp = $class->antisql($_POST["epp"]); 
		$insert = mysql_query("update user set epp = '$epp' where id = '$id';") or die(mysql_error()); 
		if($insert) {
			echo "<script>alert('Salvo!');window.location='index.php?config'</script>";
		}else{
			echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}





if(isset($_POST["alterar_senha"])) { 
	if(!empty($_POST["senha_atual"]) && !empty($_POST["nova_senha"]) && !empty($_POST["nova_senha1"])) { 
		$senha_atual = md5($class->antisql($_POST["senha_atual"]));
		$nova_senha = md5($class->antisql($_POST["nova_senha"])); 
		$nova_senha1 = md5($class->antisql($_POST["nova_senha1"])); 
		if($senha_atual == $row['senha']){
			if($nova_senha == $nova_senha1){
				$insert = mysql_query("update user set senha = '$nova_senha' where id = '$id';") or die(mysql_error()); 
				if($insert) {
					echo "<script>alert('Salvo!');window.location='sair.php'</script>";
				}else{
					echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
				}
			}else{
				echo "<script>alert('As senhas não são iguais!');window.location='index.php?config'</script>";
			}
		}else{
			echo "<script>alert('Senha errada!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}







if(isset($_POST["excluir_conta"])) { 
	if(!empty($_POST["senha_atual"])) { 
		$senha_atual = md5($class->antisql($_POST["senha_atual"]));
		if($senha_atual == $row['senha']){
			unlink("fotos/". $row['foto'] ."");
			unlink("fotos/min/". $row['foto'] ."");
			$insert = mysql_query("DELETE FROM rmsg WHERE deid = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM rmsg WHERE idpert = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM repost WHERE id_us = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM post WHERE id_us = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM perfil WHERE id = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM msg WHERE deid = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM msg WHERE paraid = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM links WHERE id_us = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM gostar WHERE id_us = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM contato WHERE deid = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM contato WHERE cotid = '$id';") or die(mysql_error()); 
			$insert = mysql_query("DELETE FROM user WHERE id = '$id';") or die(mysql_error()); 
			if($insert) {
				echo "<script>alert('Sua conta foi apagada!');window.location='sair.php'</script>";
			}else{
				echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
			}
			
		}else{
			echo "<script>alert('Senha errada!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}
?>





<div class="panel panel-default">
	<div class="panel-heading">Configuração:</div>
	<div class="panel-body">
		<form method="post" action="">
			<div class="form-group">
				<label>Número de exibições de posts/relatórios por pagina: </label>
				<input type="text" class="form-control" placeholder="<?php echo $row["epp"]; ?>" name="epp">
			</div>
			<div align="right">
				<button type="submit" class="btn btn-default" name="cadastrar">Salvar</button>
			</div>
		</form>
	</div>
</div>

<br>

<div class="panel panel-default">
	<div class="panel-heading">Alterar Senha:</div>
	<div class="panel-body">
		<form method="post" action="">
			<div class="form-group">
				<label>Senha atual: </label>
				<input type="password" class="form-control" placeholder="Senha atual" name="senha_atual">
			</div>
			<div class="form-group">
				<label>Nova Senha: </label>
				<input type="password" class="form-control" placeholder="Nova senha" name="nova_senha">
			</div>
			<div class="form-group">
				<label>Repita a senha: </label>
				<input type="password" class="form-control" placeholder="Repita a senha" name="nova_senha1">
			</div>
			<div align="right">
				<button type="submit" class="btn btn-default" name="alterar_senha">Alterar</button>
			</div>
		</form>
	</div>
</div>

<br>

<div class="panel panel-default">
	<div class="panel-heading">Excluir conta:</div>
	<div class="panel-body">
		<form method="post" action="">
			<div class="form-group">
				<label>Senha: </label>
				<input type="password" class="form-control" placeholder="Senha" name="senha_atual">
			</div>
			<div align="right">
				<button type="submit" class="btn btn-default" name="excluir_conta">Excluir</button>
			</div>
		</form>
	</div>
</div>