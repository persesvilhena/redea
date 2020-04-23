<?php include "includes/cabeca.dll"; ?>
<?php
if(isset($_POST["cadastrar"])) {
if(!empty($_POST["msg"]) && !empty($_POST["uid"])) {
$msg = $class->antisql($_POST["msg"]);
$uid1 = $class->antisql($_POST["uid"]);
$insert = mysql_query("INSERT INTO com_post VALUES(null, '$uid1', '$id_gen', '$row[nome]', '$msg')") or die(mysql_error());
if($insert) 
$mensagem_erro = "<b>Comentario feito com sucesso!</b>";
}}
else {
$mensagem_erro = "<b>Nenhum caractere encontrado</b>";
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
$querysql = mysql_query("SELECT * FROM post WHERE id='$uid'");
$data = mysql_fetch_array($querysql);
?>
<title><?php echo "$data[assunto]"; ?> - <?php echo "$namesite"; ?></title>

<?php include("includes/ct.dll"); ?>
<span class="titulo"><?php echo "$data[assunto]"; ?></span>
<?php include("includes/ft.dll"); ?>
<?php include "includes/cb.dll"; ?>
<b>Autor:</b> <a href="user.php?uid=<?php echo "$data[us]"; ?>" class=link><?php echo "$data[usn]"; ?></a>
<br>
<b>Assunto: </b><?php echo "$data[assunto]"; ?><br>
<b>Mensagem: </b><?php echo "$data[msg]"; ?>
<?php include "includes/fb.dll"; ?>
<br>
<?php include("includes/ct.dll"); ?>
<span class="titulo">Comentarios:</span>
<?php include("includes/ft.dll"); ?>
<?php include "includes/cb.dll"; ?>
<?php
$res = mysql_query("SELECT * FROM `com_post` where id=$uid ORDER BY id DESC LIMIT 0,100;"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "<table><tr><td width=100><strong><h3>Nome</h3></strong></td><td width=682><strong><h3>Mensagem</h3></strong></td></tr>";
while($escrever=mysql_fetch_array($res)){


 echo "<tr><td><a href=user.php?uid=" . $escrever[us] . " class=link>" . $escrever['usn'] . "</a></strong> diz:</td><td>" . $escrever['com'] . "</td></tr>";


}

echo "</table>";
?>

<?php include "includes/fb.dll"; ?><br>
<?php include("includes/ct.dll"); ?>
<span class="titulo">Envie seu comentario:</span>
<?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<form method="post" action="<?php $PHP_SELF; ?>">
<textarea id="cordoinput" type="text" style="width:782;height:150;" name="msg"></textarea>
<input id="cordoinput" type="hidden" name="uid" value="<?php echo "$uid"; ?>" />
<input id="cordoinput" type="submit" name="cadastrar" value="Enviar" />
</form>
<?php include "includes/fb.dll"; ?></div><?php include "includes/fimcabeca.dll"; ?>
