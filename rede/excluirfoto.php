<?php
include("includes/cabeca.dll");
$uid=$_GET['uid'];


$testesql = mysql_query("SELECT * FROM album WHERE id='$uid';");
$testesql2 = mysql_fetch_array($testesql);

if ($_POST['deleta']) {

$apagando = mysql_query("DELETE FROM album WHERE id='$uid';");
unlink("album/$testesql2[nome]");
echo('Imagem excluida com sucesso! <a href=index.php?pag=editalbum target=_top>Voltar</a><br>');
 
}
?>
<span class="titulo">Deseja realmente apagar esta imagem?</span>
<hr size="1" color="#cccccc">
<div align=center><img src="album/<?php echo "$testesql2[nome]"; ?>" width="500"></div>
<form method="post" action="<?php $PHP_SELF; ?>">
<input id="cordoinput" type="submit" name="deleta" value="Sim">
</form>
<form method="post" action="index.php?editalbum">
<input id="cordoinput" type="submit" name="perses" value="Não">
</form>
</div>
<?php include("includes/fimcabeca.dll"); ?>