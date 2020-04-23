<?php
//include("cabeca.php");
$numincial = 0;
$exibicoesporpag = 30;

$csql = mysqli_query($conecta, "SELECT * FROM `com` where tipo = '1' and id_post = '$idu' and id_com is null ORDER BY id DESC LIMIT $numincial , $exibicoesporpag");
while($rsql=mysqli_fetch_array($csql)){
	$res = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
	$escrever=mysqli_fetch_array($res);
	$like = mysqli_query($conecta, "select * from gostar where id_com = '$rsql[id]' and gostei = '1'");
	$rlike = mysqli_num_rows($like);
	$nlike = mysqli_query($conecta, "select * from gostar where id_com = '$rsql[id]' and gostei = '0'");
	$rnlike = mysqli_num_rows($nlike);

	?>
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="media-list"> 
				<li class="media"> 
					<div class="media-left">
						<a href="#" onclick="CarregaDadosJanela('<?php echo $rsql['id_us']; ?>','us');"> 
							<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $escrever['foto']; ?>" data-holder-rendered="true"> 
						</a> 
					</div> 
					<div class="media-body"> 
					 	<div class="media-heading">
					 		<a href="#" onclick="CarregaDadosJanela('<?php echo $rsql['id_us']; ?>','us');">
								<?php echo $escrever['nome']; ?> <?php echo $escrever['sobrenome']; ?>
							</a>
							<a href="#" onclick="BtnLike('<?php echo $rsql['id']; ?>','1');">
								<span class="glyphicon glyphicon-thumbs-up"></span>
							</a> 
							<a href="#" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','btn_like_com');">
								(<?php echo $rlike; ?>)
							</a>
							<a href="#" onclick="BtnLike('<?php echo $rsql['id']; ?>','0');">
								<span class="glyphicon glyphicon-thumbs-down"></span>
							</a> 
							<a href="#" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','btn_nlike_com');">
								(<?php echo $rnlike; ?>)
							</a>
							<div align="right">
								<a href="#" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','menu_com');">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</div>
					 	</div>
					 	<p><?php echo $rsql['msg']; ?></p> 
					 	<?php include "recom.php"; ?>
					</div> 
				</li> 
			</ul> 
		</div>
	</div>

	<?php

	


}
?>
<div class="panel panel-default">
	<div class="panel-heading">Postar:</div>
	<div class="panel-body">
		<div class="form-group">
			<form method="post" action="">
				<textarea class="form-control" rows="3" name="msg"></textarea><br>
				<div align="right">
					<input type="hidden" name="tipo" value="1">
					<input type="hidden" name="id_post" value="<?php echo $idu; ?>">
					<input type="submit" name="com" class="btn btn-default" value="Postar">
				</div>
			</form>
		</div>
	</div>
</div>


