<?php

$pagina = "index.php?mural";

include "../../engine/conexao.php"; 
include "../../engine/funcao_interna.php";
include "../../engine/protege.php";


$idu = recebe($_GET['id']);
$ua = recebe($_GET['ua']);








////////////////////////////////////////////////////////////
/////////////////////JANELA USUARIOS
/////////////////////////////////////////////////////////////
if($ua == "us"){
$csql = mysqli_query($conecta, "select * from user where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><?php echo $rsql['nome'] . " " . $rsql['sobrenome']; ?> - <a href="index.php?user&i1=1&i2=<?php echo $rsql['id']; ?>">Visitar Perfil</a></h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-4">
				<img src="fotos/<?php echo $rsql['foto']; ?>" width="250" height="250" align="left" class="img-circle">
			</div>
			<div class="col-md-8">
				<b>Data de Nascimento: </b><?php echo $rsql['data_nasc']; ?><br>
				<b>Telefone: </b><?php echo $rsql['telefone']; ?><br>
				<b>Cidade: </b><?php echo $rsql['cidade']; ?><br>
				<b>Estado: </b><?php echo $rsql['estado']; ?><br>
				<b>Regiao: </b><?php echo $rsql['regiao']; ?><br>
				<b>País: </b><?php echo $rsql['pais']; ?><br>
				<b>Descricao: </b><?php echo $rsql['descricao']; ?><br>
			</div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	

<?php
}








////////////////////////////////////////////////////////////
/////////////////////PERFIL
/////////////////////////////////////////////////////////////



if($ua == "perfil_alt"){
?>
<form method="post" action="">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Alterar Dados: </h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Nome: </label>
			<input type="text" class="form-control" value="<?php echo $row['nome']; ?>" name="nome">
		</div>
		<div class="form-group">
			<label>Sobrenome: </label>
			<input type="text" class="form-control" value="<?php echo $row['sobrenome']; ?>" name="sobrenome">
		</div>
		<div class="form-group">
			<label>E-mail: </label>
			<input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email">
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Fechar</button>
		<button class="btn btn-primary" type="submit" name="alterar_perfil1">Alterar</button>
	</div>
</form>

<?php
}

if($ua == "perfil_alt1"){
?>
<form method="post" action="">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Alterar Dados: </h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Data de Nascimento: </label>
			<input type="text" class="form-control" value="<?php echo $row['data_nasc']; ?>" name="data_nasc">
		</div>
		<div class="form-group">
			<label>Estado: </label>
			<input type="text" class="form-control" value="<?php echo $row['estado']; ?>" name="estado">
		</div>
		<div class="form-group">
			<label>Telefone: </label>
			<input type="text" class="form-control" value="<?php echo $row['telefone']; ?>" name="telefone">
		</div>
		<div class="form-group">
			<label>Descrição: </label>
			<textarea type="text" class="form-control" rows="3" name="descricao"><?php echo $row['descricao']; ?></textarea>
		</div>
		<div class="form-group">
			<label>País: </label>
			<input type="text" class="form-control" value="<?php echo $row['pais']; ?>" name="pais">
		</div>
		<div class="form-group">
			<label>Região: </label>
			<input type="text" class="form-control" value="<?php echo $row['regiao']; ?>" name="regiao">
		</div>
		<div class="form-group">
			<label>Cidade: </label>
			<input type="text" class="form-control" value="<?php echo $row['cidade']; ?>" name="cidade">
		</div>
		<div class="form-group">
			<label>Sexo: </label>
			<input type="text" class="form-control" value="<?php echo $row['sexo']; ?>" name="sexo">
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Fechar</button>
		<button class="btn btn-primary" type="submit" name="alterar_perfil2">Alterar</button>
	</div>
</form>

<?php

}

















////////////////////////////////////////////////////////////
/////////////////////BOTOES LIKE E DESLIKE
/////////////////////////////////////////////////////////////


if($ua == "btn_like"){
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Likes: </h4>
	</div>
	<div class="modal-body">
	<?php
	$csql = mysqli_query($conecta, "select * from gostar where id_post = '$idu' and gostei = '1'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		?>
			<div class="media"> 
				<div class="media-left">
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
						<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsqluser['foto']; ?>" data-holder-rendered="true"> 
					</a> 
						
				</div> 
				<div class="media-body"> 
				 	<div class="media-heading">
				 		<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
							<?php echo $rsqluser['nome'] . " " . $rsqluser['sobrenome']; ?>
						</a>
				 	</div>
				 	<p><?php retorna_horario($rsql['data']); ?></p> 
				</div> 
			</div> 

		<?php
	}
	?>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}

if($ua == "btn_nlike"){
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Likes: </h4>
	</div>
	<div class="modal-body">
	<?php
	$csql = mysqli_query($conecta, "select * from gostar where id_post = '$idu' and gostei = '0'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		?>
			<div class="media"> 
				<div class="media-left">
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
						<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsqluser['foto']; ?>" data-holder-rendered="true"> 
					</a> 
						
				</div> 
				<div class="media-body"> 
				 	<div class="media-heading">
				 		<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
							<?php echo $rsqluser['nome'] . " " . $rsqluser['sobrenome']; ?>
						</a>
				 	</div>
				 	<p><?php retorna_horario($rsql['data']); ?></p> 
				</div> 
			</div> 

		<?php
	}
	?>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}

if($ua == "btn_like_com"){
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Likes: </h4>
	</div>
	<div class="modal-body">
	<?php
	$csql = mysqli_query($conecta, "select * from gostar where id_com = '$idu' and gostei = '1'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		?>
			<div class="media"> 
				<div class="media-left">
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
						<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsqluser['foto']; ?>" data-holder-rendered="true"> 
					</a> 
						
				</div> 
				<div class="media-body"> 
				 	<div class="media-heading">
				 		<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
							<?php echo $rsqluser['nome'] . " " . $rsqluser['sobrenome']; ?>
						</a>
				 	</div>
				 	<p><?php retorna_horario($rsql['data']); ?></p> 
				</div> 
			</div> 

		<?php
	}
	?>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}

if($ua == "btn_nlike_com"){
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Likes: </h4>
	</div>
	<div class="modal-body">
	<?php
	$csql = mysqli_query($conecta, "select * from gostar where id_com = '$idu' and gostei = '0'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		?>
			<div class="media"> 
				<div class="media-left">
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
						<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsqluser['foto']; ?>" data-holder-rendered="true"> 
					</a> 
						
				</div> 
				<div class="media-body"> 
				 	<div class="media-heading">
				 		<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqluser['id']; ?>','us');">
							<?php echo $rsqluser['nome'] . " " . $rsqluser['sobrenome']; ?>
						</a>
				 	</div>
				 	<p><?php retorna_horario($rsql['data']); ?></p> 
				</div> 
			</div> 

		<?php
	}
	?>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}












////////////////////////////////////////////////////////////
/////////////////////MENU
/////////////////////////////////////////////////////////////


if($ua == "menu"){
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Editar: </h4>
	</div>
	<div class="modal-body" align="center">
		<?php
		$csql = mysqli_query($conecta, "select * from post where id = '$idu';");
		$rsql = mysqli_fetch_array($csql);
		retorna_horario($rsql['data']);
		if($rsql['id_us'] == $id){
			?>
			<br>
			<input type="button" value="Alterar" class="btn btn-default" onClick="MostrarOcultar('menualterar');Ocultar('menuapagar');">
			<input type="button" value="Apagar" class="btn btn-default" onClick="MostrarOcultar('menuapagar');Ocultar('menualterar');">
			<br><br>
			<?php
		}
		?>

		<div id="menualterar" style="display: none;">
			<form action="<?php echo $pagina . "&p1=6&p2=" . $rsql['id']; ?>" method="post">
				<textarea class="form-control" rows="1" name="msg"><?php echo $rsql['msg']; ?></textarea>
				<input name="alterapost" type="submit" value="Alterar" class="btn btn-default">
			</form>
		</div>

		<div id="menuapagar" style="display: none;">
			Você realmente deseja apagar o comentário?<br><br>
			<a href="<?php echo $pagina . "&p1=4&p2=" . $rsql['id']; ?>">
				<span class="glyphicon glyphicon-ok"></span>
			</a> 
			<a href="#" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span>
			</a>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}

if($ua == "menu_com"){
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Editar: </h4>
	</div>
	<div class="modal-body" align="center">
		<?php
		$csql = mysqli_query($conecta, "select * from com where id = '$idu';");
		$rsql = mysqli_fetch_array($csql);
		retorna_horario($rsql['data']);
		if($rsql['id_us'] == $id){
			?>
			<br>
			<input type="button" value="Alterar" class="btn btn-default" onClick="MostrarOcultar('menualterar');Ocultar('menuapagar');">
			<input type="button" value="Apagar" class="btn btn-default" onClick="MostrarOcultar('menuapagar');Ocultar('menualterar');">
			<br><br>
			<?php
		}
		?>

		<div id="menualterar" style="display: none;">
			<form action="<?php echo $pagina . "&p1=6&p2=" . $rsql['id']; ?>" method="post">
				<textarea class="form-control" rows="1" name="msg"><?php echo $rsql['msg']; ?></textarea>
				<input name="altera_com" type="submit" value="Alterar" class="btn btn-default">
			</form>
		</div>

		<div id="menuapagar" style="display: none;">
			Você realmente deseja apagar o comentário?<br><br>
			<a href="<?php echo $pagina . "&p1=4&p2=" . $rsql['id']; ?>">
				<span class="glyphicon glyphicon-ok"></span>
			</a> 
			<a href="#" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span>
			</a>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}







////////////////////////////////////////////////////////////
/////////////////////EXIBIR COMENTARIOS
/////////////////////////////////////////////////////////////

if($ua == "comentarios"){
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Comentários: </h4>
	</div>
	<div class="modal-body">
		<?php include "../com/comentario.php"; ?>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	<?php
}












////////////////////////////////////////////////////////////
/////////////////////EXIBIR FOTOS
/////////////////////////////////////////////////////////////

if($ua == "ft"){
	$csql = mysqli_query($conecta, "select * from album_fotos where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Foto: </h4>
		</div>
		<div class="modal-body" align="center">
			<img src="include/uploads/fotos/<?php echo $rsql['foto']; ?>" class="img-responsive">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		</div>
	<?php
	//echo "<center><img src=\"album/" . $rsql['nome'] . "\" style=\"max-width: 600px;\" class=\"pr1\"></center><br><span class=\"texto\">" . $rsql['descricao'] . "</span>";
}












////////////////////////////////////////////////////////////
/////////////////////FOTOS
/////////////////////////////////////////////////////////////

if($ua == "ft_edit"){
	$csql = mysqli_query($conecta, "select * from album_fotos where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	?>
	<form action="" method="post" enctype="multipart/form-data" name="alterar">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Alterar foto: </h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Descrição: </label>
				<input type="hidden" name="id" value="<?php echo $rsql['id']; ?>">
				<textarea type="text" class="form-control" name="descricao" rows="3"><?php echo $rsql['descricao']; ?></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
			<button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
		</div>
	</form>
	<?php
}





if($ua == "ft_del"){
	$csql = mysqli_query($conecta, "select * from album_fotos where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	?>
	<form action="" method="post" enctype="multipart/form-data" name="excluir">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Excluir album: </h4>
		</div>
		<div class="modal-body" align="center">
			Você deseja excluir a foto?<br>
			<button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
			<input type="hidden" name="id" value="<?php echo $rsql['id']; ?>">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
		</div>
	</form>
	<?php
}





if($ua == "ft_novo"){
	?>
	<form action="" method="post" enctype="multipart/form-data" name="cadastro">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Adicionar nova foto: </h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Foto: </label>
				<input type="file" class="form-control" name="foto">
				<input type="hidden" name="id" value="<?php echo $idu; ?>">
			</div>
			<div class="form-group">
				<label>Descrição: </label>
				<textarea type="text" class="form-control" name="descricao" rows="3"></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
			<button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button>
		</div>
	</form>
	<?php
}





if($ua == "ab_edit"){
	$c_album = mysqli_query($conecta, "select * from album where id = '$idu';");
	$r_album = mysqli_fetch_array($c_album);
	?>
	<form action="" method="post" enctype="multipart/form-data" name="alterar">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Alterar album: </h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nome: </label>
				<input type="text" class="form-control" name="nome" value="<?php echo $r_album['nome']; ?>">
				<input type="hidden" name="id" value="<?php echo $r_album['id']; ?>">
			</div>
			<div class="form-group">
				<label>Descrição: </label>
				<textarea type="text" class="form-control" name="descricao" rows="3"><?php echo $r_album['descricao']; ?></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
			<button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
		</div>
	</form>
	<?php
}






if($ua == "ab_del"){
	$csql = mysqli_query($conecta, "select * from album where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	?>
	<form action="" method="post" enctype="multipart/form-data" name="excluir">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Excluir album: </h4>
		</div>
		<div class="modal-body" align="center">
			Você deseja excluir o album?<br>
			<button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
			<input type="hidden" name="id" value="<?php echo $rsql['id']; ?>">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
		</div>
	</form>
	<?php
}





if($ua == "ab_novo"){
	?>
	<form action="" method="post" enctype="multipart/form-data" name="cadastro">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Adicionar novo album: </h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nome: </label>
				<input type="text" class="form-control" name="nome">
			</div>
			<div class="form-group">
				<label>Descrição: </label>
				<textarea type="text" class="form-control" name="descricao" rows="3"></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
			<button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
		</div>
	</form>
	<?php
}

?>