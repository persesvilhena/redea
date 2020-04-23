<div class="panel panel-default">
	<div class="panel-heading">Todos os usuários</div>
	<div class="panel-body">
		<div class="row">
			<?php
			$res1 = mysqli_query($conecta, "SELECT * FROM user ORDER BY id asc");
			while($escrever1=mysqli_fetch_array($res1)){
			 	$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever1[id]'");
				$rsql = mysqli_fetch_array($csql);
				?>
				<div class="col-sm-4 col-md-4" style="height: 400px;">
					<div class="thumbnail">
						<img src="fotos/<?php echo $rsql['foto']; ?>" style="border-radius: 100%; height: 200px;">
						<div class="caption">
							<h3><?php echo $rsql['nome'] . " " . $rsql['sobrenome']; ?></h3>
							<p>
								<a href="index.php?user&i1=1&i2=<?php echo $escrever1['id']; ?>" class="btn btn-primary" role="button">Ver perfil</a> 
								<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','us');" role="button">Vizualizar</a>
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