<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("SELECT * FROM `users1` ORDER BY id DESC;"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table><tr><td width=100>User</td><td width=150>Nome</td><td width=150>Sobrenome</td><td width=300>Descrição</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){

$res1 = mysql_query("SELECT * FROM `foto` where nome='$escrever[id]';"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
while($escrever1=mysql_fetch_array($res1)){

/*Escreve cada linha da tabela*/
 echo "<tr><td><a href=user.php?uid=" . $escrever['id'] . "><img src=fotos/" . $escrever1['foto'] . " width=100></a><hr size=1 width=100 color=#cccccc></td><td>" . $escrever['nome1'] . "</td><td>" . $escrever['nome2'] . "</td><td>" . $escrever['descricao1'] . "</td></tr>";

}}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close(conexao);

?>