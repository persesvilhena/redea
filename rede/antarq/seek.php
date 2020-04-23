<?php
$seek=$_POST["seek"];
?>
<?php include "includes/cabeca.dll"; ?>
<title><?php echo "$namesite"; ?> - BUSCA = <?php echo $seek ?></title>
</div>
<?php include("includes/selectcad.dll"); ?>
<?php include("includes/anuncio1.dll"); ?>
<?php include("includes/cb.dll"); ?>
<?php include("includes/ct.dll"); ?><div align="left">Procura por <font size="3"><strong><?php echo $seek ?> </strong> </font>:</div><?php include("includes/ft.dll"); ?>
<div align="left">
<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("SELECT * FROM `users1` where nome1 like '%$seek%';"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
$res = mysql_query("SELECT * FROM `users1` where nome2 like '%$seek%';");
$res = mysql_query("SELECT * FROM `users1` where nome like '%$seek%';");

echo "<table><tr><td>User</td><td>Nome</td><td>Descrição</td></tr>";


 while($escrever=mysql_fetch_array($res)){
 echo "<tr><td><a href=user.php?uid=" . $escrever['id'] . ">" . $escrever['nome'] . "</a></td><td>" . $escrever['nome1'] . "</td><td>" . $escrever['descricao1'] . "</td></tr>";
}


echo "</table>";

mysql_close(conexao);

?>
</div>
<?php include("includes/fb.dll"); ?><br><br><?php include("includes/anuncio2.dll"); ?>
