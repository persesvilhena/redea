<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("SELECT * FROM `msg` WHERE `paraid` LIKE '$id_gen' ORDER BY id DESC;"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table><tr><td><strong>Assunto:</strong></td><td><strong>Remetente:</strong></td><td><strong>Apagar?</strong></td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){

$num1=258456258456;
$num2=$escrever[id];
$resnum = $num1+$num2;
$idcod = $resnum;

/*Escreve cada linha da tabela*/
 echo "<tr><td><form method=post action=vermsg.php><input type=hidden name=uid value=" . $idcod . "><input id=cordoinput type=submit value=" . $escrever['assunto'] . "></form></td><td>" . $escrever['nome'] . "</td><td><form method=post action=apagar.php><input type=hidden name=id value=" . $idcod . "><input id=cordoinput type=submit value=apagar></form></td></tr>";

}/*Fim do while*/


echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close(conexao);

?>