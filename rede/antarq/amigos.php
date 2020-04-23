<?php include "includes/cabeca.dll"; ?>
<title>Amigos - <?php echo "$namesite"; ?></title>

<div id="corpo">
	<div id="publicidade" style="position: relative; left: 0px; top: 3px; width: 200px; height: 10px;">
		<?php include "includes/ct.dll" ?><center><span class="titulo">Painel</span></center><?php include "includes/ft.dll" ?></span>
		<?php include "includes/cb.dll" ?>
		<?php include "painel/painel.dll" ?>
		<?php include "includes/fb.dll" ?>
	</div>
	<div id="news" style="position: relative; left: 205px; top: -7px; width: 795px;">

<?php include("includes/ct.dll"); ?><span class="titulo">Amigos:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<div align="left">
<?php
$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/
$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/
mysql_select_db($banco);
$res = mysql_query("select * from amigos where us1='$id_gen';");
echo "<table><tr><td>amigos:</td></tr>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr><td><a href=user.php?uid=" . $escrever['us2'] . ">" . $escrever['us2name'] . "</a></td></tr>";
}
echo "</table>";
mysql_close(conexao);
?>
</div>
<?php include("includes/fb.dll"); ?>
</div>
<?php include "includes/fimcabeca.dll" ?>
