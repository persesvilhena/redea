<div class="panel panel-default">
	<div class="panel-heading">Contatos:</div>
	<div class="panel-body">
		<div class="row">
			<?php

			$res2 = mysqli_query($conecta, "SELECT * FROM `contato` where deid = '$id'");
			while($escrever2=mysqli_fetch_array($res2)){
				$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever2[cotid]'");
				$rsql = mysqli_fetch_array($csql);
				?>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="fotos/<?php echo $rsql['foto']; ?>">
						<div class="caption">
							<h3><?php echo $rsql['nome'] . " " . $rsql['sobrenome'] ?></h3>
							<p>...</p>
							<p>
								<a href="index.php?user&i1=1&i2=<?php echo $rsql['id']; ?>" class="btn btn-primary" role="button">Ver perfil</a> 
								<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','us');" role="button">Vizualizar</a>
							</p>
						</div>
					</div>
				</div>
			<?php

			}
			if (mysqli_num_rows($res2) > 0){

			} else {
			echo "<center><h3>A lista de contatos está vazia</h3></center>";
			}
			?>
		</div>
	</div>
</div>