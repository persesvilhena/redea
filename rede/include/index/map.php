<?php











if($i1 == null || $i1 == 1){
	echo "
	<div style=\"border: 0px solid #000000; position: absolute; left: 0px; top: -6px;\">
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<form action=\"\" method=\"post\">
				<span class=\"titulo\">Entre com as coordenadas da sua aldeia:</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
				<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px; width: 230px; float: left;\">
					<center><span class=\"titulo\">X</span></center><hr size=\"1\" width=\"100%\" color=\"#cccccc\"><br>
					<span class=\"titulo\"><center><input type=\"text\" name=\"x\"></center></span>
				</div>
				<div id=\"item\" style=\"margin-top: 6px; margin-left: 6px; background: #ffffff; padding: 10px; width: 230px; float: left;\">
					<center><span class=\"titulo\">Y</span></center><hr size=\"1\" width=\"100%\" color=\"#cccccc\"><br>
					<span class=\"titulo\"><center><input type=\"text\" name=\"y\"></center></span>
				</div>
				<div id=\"item\" style=\"margin-top: 6px; margin-left: 6px; background: #ffffff; padding: 10px; width: 230px; float: left;\">
					<span class=\"texto\">
					<input type=\"checkbox\" name=\"sem_ally\" value=\"1\">Apenas sem ally<br>
					<input type=\"checkbox\" name=\"natars\" value=\"1\">Apenas natars<br>
					<input type=\"checkbox\" name=\"natars\" value=\"2\">Apenas nao-natars<br>
					<input type=\"checkbox\" name=\"pop\" value=\"1\">Apenas com pop abaixo de: <input type=\"text\" name=\"valor_pop\"><br>
					</span>
				</div>
				<div style=\"clear: both;\"></div>
				<input type=\"hidden\" name=\"l1\" value=\"0\">
				<input type=\"hidden\" name=\"l2\" value=\"100\">
				<input type=\"submit\" name=\"map\" style=\"float: right; margin-top: 10px;\" value=\"Buscar\">
				<div style=\"clear: both;\"></div>
			</form>
		</div>
	</div>
	<div style=\"clear: both;\"></div><br>
	";






	if(isset($_POST["map"])) {
		if(isset($_POST["x"]) && isset($_POST["y"])) {
			$x = $class->antisql($_POST["x"]);
			$y = $class->antisql($_POST["y"]);
			$l1 = $class->antisql($_POST["l1"]);
			$l2 = $class->antisql($_POST["l2"]);
if(isset($_POST['contador'])){ $contador = $class->antisql($_POST["contador"]); } else { $contador = 0; }
			if(isset($_POST['sem_ally'])){ $sem_ally = $class->antisql($_POST["sem_ally"]); } else { $sem_ally = 0; }
			if(isset($_POST['natars'])){ $natars = $class->antisql($_POST["natars"]); } else { $natars = 0; }
			if(isset($_POST['pop'])){ $pop = $class->antisql($_POST["pop"]); } else { $pop = 0; }
			if(isset($_POST['valor_pop'])){ $valor_pop = $class->antisql($_POST["valor_pop"]); } else { $valor_pop = -1; }
			/*$sem_ally = $class->antisql($_POST["sem_ally"]);
			$natars = $class->antisql($_POST["natars"]);
			$pop = $class->antisql($_POST["pop"]);
			$valor_pop = $class->antisql($_POST["valor_pop"]);
			if($sem_ally == NULL){ $sem_ally = 0; }
			if($natars == NULL){ $natars = 0; }
			if($pop == NULL){ $pop = 0; }*/
			if($pop == 1 && $valor_pop == -1){ echo "<script>alert('Nao informou a pop!');</script>"; $pop = 0; }
			//$complemento = "";

			if($pop == 0 && $sem_ally == 0 && $natars == 0){ $complemento = ""; }
			if($pop == 0 && $sem_ally == 0 && $natars == 1){ $complemento = "WHERE tribo = '5' "; }
			if($pop == 0 && $sem_ally == 0 && $natars == 2){ $complemento = "WHERE tribo != '5' "; }
			if($pop == 0 && $sem_ally == 1 && $natars == 0){ $complemento = "WHERE id_ally = '0' "; }
			if($pop == 0 && $sem_ally == 1 && $natars == 1){ $complemento = "WHERE id_ally = '0' and tribo = '5' "; }
			if($pop == 0 && $sem_ally == 1 && $natars == 2){ $complemento = "WHERE id_ally = '0' and tribo != '5' "; }
			if($pop == 1 && $sem_ally == 0 && $natars == 0){ $complemento = "WHERE pop <= '" . $valor_pop . "' "; }
			if($pop == 1 && $sem_ally == 0 && $natars == 1){ $complemento = "WHERE pop <= '" . $valor_pop . "' and tribo = '5' "; }
			if($pop == 1 && $sem_ally == 0 && $natars == 2){ $complemento = "WHERE pop <= '" . $valor_pop . "' and tribo != '5' "; }
			if($pop == 1 && $sem_ally == 1 && $natars == 0){ $complemento = "WHERE pop <= '" . $valor_pop . "' id_ally = '0' "; }
			if($pop == 1 && $sem_ally == 1 && $natars == 1){ $complemento = "WHERE pop <= '" . $valor_pop . "' id_ally = '0' and tribo = '5' "; }
			if($pop == 1 && $sem_ally == 1 && $natars == 2){ $complemento = "WHERE pop <= '" . $valor_pop . "' id_ally = '0' and tribo != '5' "; }

			$csql = mysql_query("SELECT * FROM `x_world` $complemento order by (SQRT(((x - ($x))*(x - ($x))) + ((y - ($y))*(y - ($y))))) LIMIT $l1,$l2;");
			if(mysql_num_rows($csql) > 0){
				echo "
				<div id=\"item\" style=\"position: relative; margin-top: 216px; background: #ffffff; padding: 10px;\">
					<span class=\"titulo\">Resultado: </span>
				<div class=\"tabela1\">
					<table>
						<tr>
							<td></td>
							<td>Nome:</td>
							<td>Coor.:</td>
							<td>Distancia:</td>
							<td>Tribo</td>
							<td>Player</td>
							<td>Ally</td>
							<td>Pop</td>
						</tr>";
				while($rsql=mysql_fetch_array($csql)){
					$contador++;
					$dis = (sqrt((($rsql['x'] - $x) * ($rsql['x'] - $x)) + (($rsql['y'] - $y) * ($rsql['y'] - $y))));
					if($rsql['tribo'] == 1){ $tribo = "Romanos"; }
					if($rsql['tribo'] == 2){ $tribo = "Teutões"; }
					if($rsql['tribo'] == 3){ $tribo = "Gauleses"; }
					if($rsql['tribo'] == 5){ $tribo = "Natarianos"; }
					echo "
						<tr>
							<td>" . $contador . "</td>
							<td><a href=\"http://ts3.travian.com.br/position_details.php?x=" . $rsql['x'] . "&y=" . $rsql['y'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a></td>
							<td>" . $rsql['x'] . " | " . $rsql['y'] . "</td>
							<td>" . $dis . "</td>
							<td>" . $tribo . "</td>
							<td><a href=\"http://ts3.travian.com.br/spieler.php?uid=" . $rsql['id_player'] . "\" class=\"linkus\">" . $rsql['nome_player'] . "</a></td>
							<td><a href=\"http://ts3.travian.com.br/allianz.php?aid=" . $rsql['id_ally'] . "\" class=\"linkus\">" . $rsql['nome_ally'] . "</a></td>
							<td>" . $rsql['pop'] . "</td>
						</tr>

					"; 
				}
				echo "
					</table>
				</div></div>
				<br>
				<form action=\"\" method=\"post\">
					<input type=\"hidden\" name=\"x\" value=\"" . $x . "\">
					<input type=\"hidden\" name=\"y\" value=\"" . $y . "\">
					<input type=\"hidden\" name=\"sem_ally\" value=\"" . $sem_ally . "\">
					<input type=\"hidden\" name=\"natars\" value=\"" . $natars . "\">
					<input type=\"hidden\" name=\"pop\" value=\"" . $pop . "\">
					<input type=\"hidden\" name=\"valor_pop\" value=\"" . $valor_pop . "\">
					<input type=\"hidden\" name=\"l1\" value=\"" . ($l1 + 100) . "\">
<input type=\"hidden\" name=\"contador\" value=\"" . $contador . "\">
					<input type=\"hidden\" name=\"l2\" value=\"" . $l2 . "\">
					<input type=\"submit\" name=\"map\" style=\"float: right; margin-top: 10px;\" value=\"Proxima pagina\">
					<div style=\"clear: both;\"></div>
				</form>
				<form action=\"\" method=\"post\">
					<input type=\"hidden\" name=\"x\" value=\"" . $x . "\">
					<input type=\"hidden\" name=\"y\" value=\"" . $y . "\">
					<input type=\"hidden\" name=\"sem_ally\" value=\"" . $sem_ally . "\">
					<input type=\"hidden\" name=\"natars\" value=\"" . $natars . "\">
					<input type=\"hidden\" name=\"pop\" value=\"" . $pop . "\">
					<input type=\"hidden\" name=\"valor_pop\" value=\"" . $valor_pop . "\">
					<input type=\"hidden\" name=\"l1\" value=\"" . ($l1 - 100) . "\">
<input type=\"hidden\" name=\"contador\" value=\"" . ($contador - 200) . "\">
					<input type=\"hidden\" name=\"l2\" value=\"" . $l2 . "\">
					<input type=\"submit\" name=\"map\" style=\"float: left; margin-top: 10px;\" value=\"Pagina anterior\">
					<div style=\"clear: both;\"></div>
				</form>
				";
			}else{
				$csql = mysql_query("SELECT * FROM `x_world`;");
				if(mysql_num_rows($csql) > 0){
					echo "<script>alert('Houve um problema ao fazer a busca!');window.location='index.php?map'</script>";
				}else{
					echo "<script>alert('Estamos atualizando o banco de dados. Por favor aguarde!');window.location='index.php?map'</script>";
				}
			}
		}
		else { 
			echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?map'</script>";
		}

	}






}



