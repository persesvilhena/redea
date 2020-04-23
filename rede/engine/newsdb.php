<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "rede"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("SELECT * FROM `news` ORDER BY id DESC LIMIT 0 , 30"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){

/*Escreve cada linha da tabela*/
 echo "<tr><td><a href=ver_news.php?uid=" . $escrever['id'] . " class=notice>" . $escrever['nome'] . "</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close($conexao);

?>