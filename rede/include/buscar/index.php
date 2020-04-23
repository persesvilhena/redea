<?php
$procurar = $_GET['buscar'];

$bcpessoas = mysqli_query($conecta, "select * from user where (nome like '%$procurar%') or (sobrenome like '%$procurar%') or (login like '%$procurar%') order by nome");

?>
<h1 class="page-header"><?php echo $procurar; ?></h1>
<div class="row">
<?php
while($rbcpessoas = mysqli_fetch_array($bcpessoas)){
	?>
	
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="fotos/<?php echo $rbcpessoas['foto']; ?>">
				<div class="caption">
					<h3><?php echo $rbcpessoas['nome'] . " " . $rbcpessoas['sobrenome'] ?></h3>
					<p>...</p>
					<p>
						<a href="index.php?user&i1=1&i2=<?php echo $escrever1['id']; ?>" class="btn btn-primary" role="button">Ver perfil</a> 
						<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rbcpessoas['id']; ?>','us');" role="button">Vizualizar</a>
					</p>
				</div>
			</div>
		</div>
	
	<?php
	/*echo "
	<div id=\"item\" style=\"padding: 5px; margin-top: 5px; margin-left: 5px; width: 380px; float: left;\">
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\"><img src=\"fotos/" . $rbcpessoas['foto'] . "\" align=\"left\" class=\"pr1\" width=\"100\" height=\"100\"></a>
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\" class=\"linkus\">" . $rbcpessoas['nome'] . " " . $rbcpessoas['sobrenome'] . "</a><br>
	<span class=\"texto\">
	<b>Nome: </b>" . $rbcpessoas['nome'] . "<br>
	<b>Sobrenome: </b>" . $rbcpessoas['sobrenome'] . "<br>
	<b>Login: </b>" . $rbcpessoas['login'] . "
	</span>
	</div>";*/
}

?>

</div>