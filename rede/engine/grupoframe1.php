<?php include("../includes/cabecaback.dll"); ?>
<?php
$selectgrupo = mysql_query("SELECT * FROM grupo WHERE id='$row[grupo]'");
$grupo=mysql_fetch_array($selectgrupo);
?>
<?php include("../includes/ct.dll"); ?><span class="titulo">Menu:</span><?php include("../includes/ft.dll"); ?>
<?php include("../includes/cb.dll"); ?>
<a href="../index.php?pag=editgrupos" target="_top"><span class="titulo">Opções</span></a> <a href="../index.php?pag=criargrupo" target="_top"><span class="titulo">Criar Grupo</span></a>
<?php include("../includes/fb.dll"); ?>
<br>
<?php include("../includes/ct.dll"); ?><span class="titulo"><?php echo "$grupo[nome]"; ?></span><?php include("../includes/ft.dll"); ?>
<?php include("../includes/cb.dll"); ?>
<?php
$desc1=$grupo[descricao];
$desc2=nl2br($desc1);
?>
<?php
$contamembros = mysql_query("select count(*) from users1 where grupo = '$grupo[id]'");
while($qtdmembros=mysql_fetch_assoc($contamembros)){
echo "<b>Membros: </b>" . $qtdmembros;
}
?>

<span class="texto">
<img src="../fotogrupo/<?php echo "$grupo[foto]"; ?>" width="300" align="left"></img>
<b>Descrição:</b>
<?php echo "$desc2"; ?>
<hr size="1" color="#cccccc">
<b>Autor:</b><a href="../index.php?pag=user&info1=<?php echo "$grupo[idautor]"; ?>" target="_top"><?php echo "$grupo[autor]"; ?></a><br>
<?php
$contamembros = mysql_query("select count(*) from users1 where grupo = '$grupo[id]'");
while($qtdmembros=mysql_fetch_array($contamembros)){
echo "<b>Membros: </b>" . $qtdmembros . "teste";
}
?>

</span>
<br>
<?php include("../includes/fb.dll"); ?>

<?php
echo "$row[grupo]";
?>