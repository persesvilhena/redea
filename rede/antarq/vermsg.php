<?php include "includes/cabeca.dll"; ?>

<?php include("includes/ct.dll"); ?><span class="titulo">Mensagem:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?><div align="left">
<?php
$idcod=$_POST["uid"];
$num1=258456258456;
$num2=$idcod;
$resnum = $num2-$num1;
$idcod2 = $resnum;

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/


$res = mysql_query("select * from msg where id = '$idcod2';") or die(mysql_error());

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){

echo "$mensagem_erro";

/*Escreve cada linha da tabela*/
 echo "<strong>Assunto: </strong>" . $escrever['assunto'] . "<br><br><strong>Mensagem:</strong><br>" . $escrever['msg'] . "<br>";
 echo "<title>" . $escrever['assunto'] . " - " . $namesite . "</title>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close(conexao);

?>
</div>
<?php include("includes/fb.dll"); ?>
</div>
<?php include "includes/fimcabeca.dll" ?>
