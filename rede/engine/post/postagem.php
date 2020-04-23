<?php
include("engine/post/cabeca.php");
$numincial = 0;
$exibicoesporpag = 30;

$csql = mysqli_query($conecta, "SELECT * FROM `post` where id_us in ($contatos) ORDER BY id DESC LIMIT $numincial , $exibicoesporpag");
while($rsql=mysqli_fetch_array($csql)){
	$res = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
	$escrever=mysqli_fetch_array($res);
	$like = mysqli_query($conecta, "select * from gostar where id_post = '$rsql[id]' and gostei = '1'");
	$rlike = mysqli_num_rows($like);
	$nlike = mysqli_query($conecta, "select * from gostar where id_post = '$rsql[id]' and gostei = '0'");
	$rnlike = mysqli_num_rows($nlike);
	$csql_com = mysqli_query($conecta, "select count(*) from com where id_post = '$rsql[id]' and tipo = '1'");
	$rsql_com = mysqli_fetch_array($csql_com);

	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id_us']; ?>','us');"> 
				<img class="img-rounded" style="width: 64px; height: 64px; float:left;" src="fotos/min/<?php echo $escrever['foto']; ?>" data-holder-rendered="true"> 
			</a> 
			<div class="post-menu-esq">
		 		<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id_us']; ?>','us');">
					<?php echo $escrever['nome']; ?> <?php echo $escrever['sobrenome']; ?> 
				</a>
				<br>
				<?php echo retorna_horario($rsql['data']); ?>
			</div>
			<div class="post-menu-dir">
				<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','menu');">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
			</div>
			<div class="both"></div>
		</div>
		<div class="panel-body">
			<p><?php echo $rsql['msg']; ?></p> 
		</div>
		<div class="panel-footer">
			<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','comentarios');">
				Comentários (<?php echo $rsql_com['count(*)']; ?>)
			</a>
			<div class="post-menu-dir">
				<a href="#" onclick="BtnLike('<?php echo $rsql['id']; ?>','1');">
					<span class="glyphicon glyphicon-thumbs-up"></span>
				</a> 
				<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','btn_like');">
					(<?php echo $rlike; ?>)
				</a>
				<a href="#" onclick="BtnLike('<?php echo $rsql['id']; ?>','0');">
					<span class="glyphicon glyphicon-thumbs-down"></span>
				</a> 
				<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','btn_nlike');">
					(<?php echo $rnlike; ?>)
				</a>
			</div>
		</div>
	</div>

	<?php

	


}


