<?php include "includes/cabeca.dll"; ?>
<title>Apagar? - <?php echo "$namesite"; ?></title>
<?php include("includes/selecthome.dll"); ?><br>
<div id="corpo">
	<div id="publicidade" style="position: relative; left: 0px; top: 3px; width: 200px; height: 10px;">
		<?php include "includes/ct.dll" ?><center><span class="titulo">Painel</span></center><?php include "includes/ft.dll" ?></span>
		<?php include "includes/cb.dll" ?>
		<?php include "painel/painel.dll" ?>
		<?php include "includes/fb.dll" ?>
	</div>
	<div id="news" style="position: relative; left: 205px; top: -7px; width: 795px;">

<?php include("includes/ct.dll"); ?><span class="titulo">Mensagem:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<?php
$idcod=$_POST["id"];
$num1=258456258456;
$num2=$idcod;
$resnum = $num2-$num1;
$id = $resnum;
?><div align="left">
Deseja realmente apagar a mensagem?<br>
<form method="post" action="apaga.php"><input type="hidden" name="id" value="<?php echo("$id"); ?>"><input id="cordoinput" type="submit" value="SIM"></form>
<form method="post" action="msgs.php"><input id="cordoinput" type="submit" value="NAO"></form>
</div>
<?php include "includes/fb.dll"; ?>
</div></div>
<?php include "includes/fimcabeca.dll" ?>
