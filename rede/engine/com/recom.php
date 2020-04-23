<?php
	$csqlus = mysqli_query($conecta, "SELECT * FROM `com` where tipo = '1' and id_post = '$idu' and id_com = '$rsql[id]' ORDER BY id ASC");
	while($rsqlus = mysqli_fetch_array($csqlus)){
		$user_csql = mysqli_query($conecta, "SELECT * FROM `user` where id = '$rsqlus[id_us]'");
		$user_rsql = mysqli_fetch_array($user_csql);
		$like2 = mysqli_query($conecta, "select * from gostar where id_com = '$rsqlus[id]' and gostei = '1'");
		$rlike2 = mysqli_num_rows($like2);
		$nlike2 = mysqli_query($conecta, "select * from gostar where id_com = '$rsqlus[id]' and gostei = '0'");
		$rnlike2 = mysqli_num_rows($nlike2);
	
		?>
		<hr>
		<div class="media"> 
	 		<div class="media-left"> 
	 			<a href="#" onclick="CarregaDadosJanela('<?php echo $user_rsql['id']; ?>','us');"> 
	 				<img class="img-circle" style="width: 50px; height: 50px;" src="fotos/min/<?php echo $user_rsql['foto']; ?>" data-holder-rendered="true"> 
	 			</a> 
	 		</div> 
	 		<div class="media-body"> 
	 			<div class="media-heading">
	 				<a href="#" onclick="CarregaDadosJanela('<?php echo $user_rsql['id']; ?>','us');">
						<?php echo $user_rsql['nome']; ?> <?php echo $user_rsql['sobrenome']; ?>
					</a>
					<a href="#" onclick="BtnLike('<?php echo $rsqlus['id']; ?>','1');">
						<span class="glyphicon glyphicon-thumbs-up"></span>
					</a> 
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqlus['id']; ?>','btn_like_com');">
						(<?php echo $rlike2; ?>)
					</a>

					<a href="#" onclick="BtnLike('<?php echo $rsqlus['id']; ?>','0');">
						<span class="glyphicon glyphicon-thumbs-down"></span>
					</a> 
					<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqlus['id']; ?>','btn_nlike_com');">
						(<?php echo $rnlike2; ?>)
					</a>
					<div align="right">
						<a href="#" onclick="CarregaDadosJanela('<?php echo $rsqlus['id']; ?>','menu_com');">
							<span class="glyphicon glyphicon-pencil"></span>
						</a>
					</div>
	 			</div>
	 			<p><?php echo $rsqlus['msg']; ?></p>
	 		</div> 
	 	</div>
	 	<?php
	}
	?>

	<hr>
	<div class="media"> 
			<form method="post" action="">
			<textarea class="form-control" rows="1" name="msg"></textarea>
			<div align="right">
				<input type="hidden" name="id_post" value="<?php echo $idu; ?>">
				<input type="hidden" name="tipo" value="1">
				<input type="hidden" name="id_com" value="<?php echo $rsql['id']; ?>">
				<input type="submit" name="recom" class="btn btn-default" value="Postar">
			</div>
		</form>
	</div> 
