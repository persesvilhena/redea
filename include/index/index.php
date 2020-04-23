<?php
$res2 = mysqli_query($conecta, "SELECT * FROM `contato` where deid = '$id'");
$contatos = $id;
while($escrever2=mysqli_fetch_array($res2)){
	$contatos = $contatos . "," . $escrever2['cotid'];
}

echo "
<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"texto\">
		<form method=\"post\" action=\"\">
			<textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"50\"></textarea>
			<input id=\"cordoinput\" type=\"submit\" name=\"post\" value=\"Postar\">
		</form>
		</span>
	</div>
";
include ("engine/postagem.php");
echo "
</div>

<div id=\"publicidade\" style=\" width: 198px; position: absolute; left: 594px; top: 0px;\">
	propaganda<br>
</div>
";
?>