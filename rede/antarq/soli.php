<?php include "includes/cabeca.dll"; ?>
<title>Solicitaçoes - <?php echo "$namesite"; ?></title>

<?php include("includes/ct.dll"); ?><span class="titulo">Solicitaçoes:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<div align="left">

<?php
$servidor = "localhost";
 $usuario = "root";
 $senha = "369875";
 $banco = "perses";
$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("select * from convite2 where paraid = '$id_gen';");
echo "<table><tr><td><strong>Remetente:</strong></td><td><strong>Tipo de solicitação:</strong></td><td><strong>Opção:</strong></td></tr>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['descricao'] . "</td><td><form method=post action=aceitaf.php><input type=hidden name=id value=" . $escrever['deid'] . "><input type=hidden name=nome value=" . $escrever['nome'] . "><input id=cordoinput type=submit value=aceitar></form></td><td><form method=post action=recusaf.php><input type=hidden name=nome value=" . $escrever['nome'] . "><input type=hidden name=id value=" . $escrever['deid'] . "><input id=cordoinput type=submit value=recusar></form></td></tr>";
}
$res1 = mysql_query("select * from solic_grupo where paraid = '$row[grupo]';");
 while($escrever1=mysql_fetch_array($res1)){
 echo "<tr><td>" . $escrever1['nome'] . "</td><td>" . $escrever1['descricao'] . "</td><td><form method=post action=aceitag.php><input type=hidden name=id value=" . $escrever1['deid'] . "><input type=hidden name=nome value=" . $escrever1['nome'] . "><input id=cordoinput type=submit value=aceitar></form></td><td><form method=post action=recusag.php><input type=hidden name=nome value=" . $escrever1['nome'] . "><input type=hidden name=id value=" . $escrever1['deid'] . "><input id=cordoinput type=submit value=recusar></form></td></tr>";
}
echo "</table>";
mysql_close(conexao);
?>


</div>
<?php include("includes/fb.dll"); ?><br><br><?php include("includes/anuncio2.dll"); ?>
