<?php
$uid=$_GET["uid"];
?>
<?php include "includes/cabeca.dll"; ?>
<title>Ver Grupo - <?php echo "$namesite"; ?></title>

<div align="left">

<?php include("includes/cb.dll");
include("includes/ct.dll"); ?>
<?php
$servidor = "localhost"; /*maquina a qual o banco de dados está*/
$usuario = "root"; /*usuario do banco de dados MySql*/
$senha = "369875"; /*senha do banco de dados MySql*/
$banco = "perses"; /*seleciona o banco a ser usado*/
$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res1 = mysql_query("select * from grupos where id = '$uid';");
while($escrever1=mysql_fetch_array($res1)){
	echo "<div align=left>Perfil: <strong>" . $escrever1['nome'] . "</strong> - <a href=solic_grupo.php?paraid=$uid>Enviar solicitacao</a></div>Descrição: <br><strong>" . $escrever1['descricao'] . "</strong><br>Dono do grupo: <strong>" . $escrever1['autor'] . "</strong>";
}
echo "</table>";
mysql_close(conexao);
?><?php include("includes/ft.dll"); ?>


<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("select * from us_grupo where grupo = '$uid';"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */


echo "<table><tr><td><strong>Usuarios do grupo:</strong></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){

/*Escreve cada linha da tabela*/
 echo "<tr><td><a href=user.php?uid=" . $escrever['us'] . ">" . $escrever['nome'] . "</a></td><td><a href=msg.php?paraid=" . $escrever['us'] . "&deid=$id_gen>enviar mensagem</a></td><td><a href=solic.php?paraid=" . $escrever['us'] . "&deid=$id_gen>Enviar solicitação de amizade</a></td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close(conexao);
?>
<?php include("includes/fb.dll"); ?>

<?php
session_start();

if(isset($_POST["ver"])) { // Verifico se o botão cadastrar foi acionado
	
		
		$repeat_user = mysql_query("SELECT * FROM us_grupo WHERE us='$id_gen' AND grupo='$uid';");
		
		if(mysql_num_rows($repeat_user) > 0) {
			
			$mensagem_erro = "<b>seu grupo</b>";
		}
		else {
					
			$mensagem_erro = "<b>voce nao é deste grupo</b><br><a href=solic_grupo.php?paraid=$uid>Enviar solicitacao</a>";
			
		}
		
	}
	

?>

<h3>
<?php echo $mensagem_erro; ?></h3>
<?php echo "$row[grupo]"; ?><br>
