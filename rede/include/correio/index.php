<?php

if ($i1 == 1){
?>
<div>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#recebidas" aria-controls="recebidas" role="tab" data-toggle="tab">Recebidas</a></li>
		<li role="presentation"><a href="#enviadas" aria-controls="enviadas" role="tab" data-toggle="tab">Enviadas</a></li>
	</ul>
	
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="recebidas">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table">
						<caption>Mensagens Recebidas: </caption>
						<thead>
							<tr>
								<th>Assunto:</th>
								<th>Remetente:</th>
								<th>Apagar?</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$res = mysqli_query($conecta, "SELECT * FROM `msg` WHERE `paraid` LIKE '$id' ORDER BY id DESC;");
							while($escrever=mysqli_fetch_array($res)){
								$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever[deid]'");
								$rsql = mysqli_fetch_array($csql);
								echo "<tr><td><a href=\"index.php?msg&i1=2&i2=" . $escrever['id'] . "\">" . $escrever['titulo'] . "</a>"; 
								if ($escrever['nw'] == 1 && $escrever['nwus'] != $id){ echo "<font color=\"#ff0000\"> (novo)</font>"; }
								if ($escrever['nw'] == 1 && $escrever['nwus'] == $id){ echo "<font color=\"#ff0000\"> (não lido)</font>"; }
								echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever['deid'] . "\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a></td>
								<td><a href=\"index.php?msg&i1=3&i2=" . $escrever['id'] . "\">Apagar?</a></td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="enviadas">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table">
						<caption>Mensagens Enviadas: </caption>
						<thead>
							<tr>
								<th>Assunto:</th>
								<th>Destinatário:</th>
								<th>Apagar?</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$res2 = mysqli_query($conecta, "SELECT * FROM `msg` WHERE `deid` LIKE '$id' ORDER BY id DESC;"); 
							while($escrever2=mysqli_fetch_array($res2)){
								$csql2 = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever2[deid]'");
								$rsql2 = mysqli_fetch_array($csql2);
								echo "<tr><td><a href=\"index.php?msg&i1=2&i2=" . $escrever2['id'] . "\">" . $escrever2['titulo'] . "</a>";
								if ($escrever2['nw'] == 1 && $escrever2['nwus'] != $id){ echo "<font color=\"#ff0000\"> (novo)</font>"; }
								if ($escrever2['nw'] == 1 && $escrever2['nwus'] == $id){ echo "<font color=\"#ff0000\"> (não lido)</font>"; }
									$csql_des = mysqli_query($conecta, "select nome, sobrenome from user where id = '$escrever2[paraid]'");
									$rsql_des = mysqli_fetch_array($csql_des);
								echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever2['paraid'] . "\">" . $rsql_des['nome'] . " " . $rsql_des['sobrenome'] . "</a></td>
								<td><a href=\"index.php?msg&i1=3&i2=" . $escrever2['id'] . "\">Apagar?</a></td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




<?php
}


















if ($i1 == 2){
	$csql2 = mysqli_query($conecta, "SELECT * FROM msg WHERE id='$i2'");
	$rsql2 = mysqli_fetch_array($csql2);
	$csql = mysqli_query($conecta, "select * from user where id = '$rsql2[deid]'");
	$rsql = mysqli_fetch_array($csql);

	if($rsql2['deid'] == $id || $rsql2['paraid'] == $id){
		if ($rsql2['nwus'] != $id){
			$nwup = mysqli_query($conecta, "update msg set nw = '0' WHERE id='$i2'");
		}

		if(isset($_POST["msg"])) {
			if(!empty($_POST["msg"])) { 
				$msg = $class->antisql($_POST["msg"]);
				$insert = mysqli_query($conecta, "insert into rmsg (deid, idpert, msg, data) values('$row[id]', '$i2', '$msg', '$config_horario');") or die(mysqli_error());
				$insert = mysqli_query($conecta, "update msg set nw  = '1', nwus = '$row[id]' where id = '$i2';") or die(mysqli_error());
			if($insert) {  echo "<script>alert('Mensagem enviada!');window.location='index.php?msg&i1=1';</script>";}
			}else { echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?msg&i1=1';</script>";}		
		}
		?>
		<h1 class="page-header"><?php echo $rsql2['titulo']; ?></h1>
		<div class="well">
			<form method="post" action="">
			<textarea id="msg" name="msg" rows="3" class="form-control" onkeydown="areaEnvia(this, event);"></textarea>
			<div align="right">
				<input type="submit" name="ok" class="btn btn-default" value="Enviar">
			</div>
			</form>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<ul class="media-list"> 

					<?php
					$res5 = mysqli_query($conecta, "SELECT * FROM `rmsg` WHERE idpert = '$i2' ORDER BY id DESC;");
					while($escrever5=mysqli_fetch_array($res5)){
						$csql5 = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever5[deid]'");
						$rsql5 = mysqli_fetch_array($csql5);
						?>
						<li class="media"> 
							<div class="media-left">
								<a href="#"> 
									<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsql5['foto']; ?>" data-holder-rendered="true"> 
								</a> 
							</div> 
							<div class="media-body"> 
							 	<div class="media-heading">
							 		<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql5['id']; ?>','us');">
										<?php echo $rsql5['nome']; ?> <?php echo $rsql5['sobrenome']; ?>
									</a> - <?php retorna_horario($escrever5['data']); ?>
							 	</div>
							 	<p><?php echo $escrever5['msg']; ?></p> 
							</div> 
						</li> 

						<?php
						
					}
					?>
					<li class="media"> 
						<div class="media-left">
							<a href="#"> 
								<img class="img-circle" style="width: 64px; height: 64px;" src="fotos/min/<?php echo $rsql['foto']; ?>" data-holder-rendered="true"> 
							</a> 
						</div> 
						<div class="media-body"> 
						 	<div class="media-heading">
						 		<a href="#" data-toggle="modal" data-target="#myModal" onclick="CarregaDadosJanela('<?php echo $rsql['id']; ?>','us');">
									<?php echo $rsql['nome']; ?> <?php echo $rsql['sobrenome']; ?>
								</a> - <?php retorna_horario($rsql2['data']); ?>
						 	</div>
						 	<p><?php echo $rsql2['msg']; ?></p> 
						</div> 
					</li>

				</ul> 
			</div>
		</div>
		<?php
	}

}





















if ($i1 == 3){
$csql3 = mysqli_query($conecta, "SELECT * FROM msg WHERE id='$i2'");
$rsql3 = mysqli_fetch_array($csql3);
if($rsql3['deid'] == $id || $rsql3['paraid'] == $id){
echo "<div id=\"cj\"><span class=\"titulo\">Apagar?</span></div>";
echo "<div id =\"fj\"><span class=\"texto\">Tem certeza que deseja apagar a mensagem " . $rsql3['titulo'] . " ? <a href=index.php?msg&i1=4&i2=" . $rsql3['id'] . " class=\"botao\">SIM</a> - <a href=index.php?msg&i1=1 class=\"botao\">NAO</a></div>";
}
}














if ($i1 == 4){
$csql2 = mysqli_query($conecta, "SELECT * FROM msg WHERE id='$i2'");
$rsql2 = mysqli_fetch_array($csql2);
if($rsql2['deid'] == $id || $rsql2['paraid'] == $id){
$csql4 = mysqli_query($conecta, "DELETE FROM msg WHERE id='$i2'");
if($csql4) {
$msg_erro = "<script>alert('Mensagem apagada com sucesso!');window.location='index.php?msg&i1=1';</script>";
}
else {
$msg_erro = "<script>alert('Houve um erro!');window.location='index.php?msg&i1=1';</script>";
}
echo "<div id=cont>" . $msg_erro . "</div>";
}
}



















if ($i1 == 5){
$mensagem_erro = "";
if(isset($_POST["ok"])) { 
	if(!empty($_POST["msg"])) { 
		$titulo = $class->antisql($_POST["titulo"]);
		$msg = $class->antisql($_POST["msg"]);
    if($id == $i2){ echo "<script>alert('voce nao pode mandar mensagem para voce mesmo!');window.location='index.php?msg&i1=1';</script>"; }else{

		
			
			$insert = mysqli_query($conecta, "insert into msg (deid, paraid, titulo, msg, data, nw, nwus) values('$row[id]', '$i2', '$titulo', '$msg', '$config_horario', '1', '$row[id]');") or die(mysqli_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<script>alert('Mensagem Enviada!');window.location='index.php?msg&i1=1';</script>";
			}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?msg&i1=1';</script>";
		
	}		
}
?>
<h1 class="page-header">Enviar mensagem:</h1>
<form method="post" action="">
	<div class="form-group">
		<label>Nome: </label>
		<input type="text" class="form-control" name="titulo">
	</div>
	<div class="form-group">
		<label>Mensagem: </label>
		<textarea type="text" class="form-control" rows="5" name="msg"></textarea>
	</div>
	<div class="form-group">
		<div align="right">
			<button class="btn btn-primary" type="submit" name="ok">Enviar</button>
		</div>
	</div>
</form>
<?php

/*echo "<div id=\"cj\" style=\"margin-top: 4px;\"><span class=\"titulo\">Postar:</span></div>
<div id=\"fj\"><div id=\"ctj\"><span class=\"ttexto\">
<form method=\"post\" action=\"\">
<table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
  <tr>
    <td>" . $mensagem_erro . "</td>
  </tr>
  <tr>
    <td><table width=\"550\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"></td></tr>
	      <tr>
        <td>Titulo:</td>
        <td><label>
          <input id=\"cordoinput\" type=\"text\" name=\"titulo\">
		</label></td>
      </tr>
      <tr>
        <td>Mensagem:</td>
        <td><label>
          <textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"10\" cols=\"50\"></textarea>
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input id=\"cordoinput\" type=\"submit\" name=\"ok\" value=\"POSTAR\" />
        </label></td>
      </tr>
    </table>
  
</table>
</form>
<br>
</span></div></div>";*/


}
?>