<?php include "includes/cabeca.dll"; ?>
<title>Perfil do usuario - <?php echo "$namesite"; ?></title>

<?php include("includes/ct.dll"); ?><span class="titulo">Perfil do usuario:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<div align="left">
<?php
$uid=$_GET["uid"];

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("select * from users1 where id = '$uid';"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
$row0 = mysql_fetch_array($res);
$res1 = mysql_query("SELECT * FROM `foto` where nome='$row0[id]';");
$row1 = mysql_fetch_array($res1);
$res2 = mysql_query("SELECT * FROM users1;");
$row2 = mysql_fetch_array($res2);
?>


<img width="250" align="left" src="fotos/<?php echo $row1[foto]; ?>">
<span class="titulo"><?php echo $row0[nome]; ?></span>

</div>
<?php include("includes/fb.dll"); ?><br><br><?php include("includes/anuncio2.dll"); ?><br.<br><br><br><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<?php echo "$row2"; ?>
