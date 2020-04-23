 <?php include "includes/cabeca.dll"; ?>
<title>Ver Noticia - <?php echo "$namesite"; ?></title>
<?php
session_start();

if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	
	if(!empty($_POST["msg"]) && !empty($_POST["uid"])) { // Verifico se os campos foram preenchidos
		
		$msg = $class->antisql($_POST["msg"]); // Filtro os dados de login name originados do formulário
		$uid = $class->antisql($_POST["uid"]); // Filtro os dados de login name originados do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		
		$repeat_user = mysql_query("SELECT * FROM del WHERE us1='$msg'") or die($mensagem_erro = "<b>Houve um erro:</b><br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		
		if(mysql_num_rows($repeat_user) > 0) { // Verifico se a consulta retorna algum resultado. Nesse caso, se retornar, define uma mensagem de erro.
			
			$mensagem_erro = "<b>Já existe um usuário com este login name!</b>";
		}
		else {
			
			$insert = mysql_query("INSERT INTO com_news VALUES(null, '$id_gen', '$login', '$msg', '$uid')") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Usuário cadastrado com sucesso!</b>";
			}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Nenhum caractere encontrado</b>";
		
	}		
}
?>



<?php
$uid=$_GET["uid"];
$servidor = "localhost";
$usuario = "root";
$senha = "369875";
$banco = "perses";
$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$querysql = mysql_query("SELECT * FROM news WHERE id='$uid'");
$data = mysql_fetch_array($querysql);
$querysql1 = mysql_query("SELECT * FROM com_news WHERE uid='$uid'");
$data1 = mysql_fetch_array($querysql1);
?>
<title>WILLY PETE - <?php echo $data["nome"]; ?></title>

<?php include "includes/cabeca.dll"; ?>

<?php include("includes/selecthome.dll"); ?><br><div align="left">

		<?php include "includes/cb.dll" ?>
		<span class="texto"><?php include "includes/ct.dll" ?><strong><?php echo $data["nome"]; ?></strong><?php include "includes/ft.dll" ?></span>
		<strong><span class="texto">Autor: </span></strong><?php echo $data["autor"]; ?><br><br><strong><span class="texto">Mensagem:</span></strong><br><?php echo $data["msg"]; ?>
		<?php include "includes/fb.dll" ?><br></div>
<?php include "includes/cb.dll" ?>

<?php

$servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = "369875"; /*senha do banco de dados MySql*/
 $banco = "perses"; /*seleciona o banco a ser usado*/

$conexao = mysql_connect($servidor,$usuario,$senha);  /*Conecta no bando de dados MySql*/

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$res = mysql_query("SELECT * FROM `com_news` where newsid=$uid ORDER BY id DESC LIMIT 0,100;"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table><tr><td width=100><strong><h3>Nome</h3></strong></td><td width=682><strong><h3>Mensagem</h3></strong></td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
 while($escrever=mysql_fetch_array($res)){


/*Escreve cada linha da tabela*/
 echo "<tr><td><strong><a href=user.php?uid=" . $escrever['us'] . " class=link>" . $escrever['usn'] . "</a></strong> diz:</td><td>" . $escrever['msg'] . "</td></tr>";


}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

mysql_close(conexao);

?>
<?php include "includes/fb.dll" ?><br>

<?php include("includes/cb.dll"); ?>
<div align="left"><span class="texto">Comentario:</span>

<form method="post" action="<?php $PHP_SELF; ?>">
<textarea type="text" style="width:782;height:150;" name="msg"></textarea>
<input id="cordoinput" type="hidden" name="uid" value="<?php echo "$uid"; ?>" />
<input id="cordoinput" type="submit" name="cadastrar" value="Enviar" />
</form></div>
<?php include "includes/fb.dll" ?>
