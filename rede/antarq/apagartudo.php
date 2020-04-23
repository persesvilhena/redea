<?php include "includes/cabeca.dll"; ?>
<title>Apagar todas as mensagens? - <?php echo "$namesite"; ?></title>
<?php include "includes/cb.dll"; ?>
<?php
$id=$_POST["id"];
?><div align="left">
Deseja realmente apagar todas as mensagens?<br>
<form method="post" action="apagatudo.php"><input type="hidden" name="id" value="<?php echo("$id_gen"); ?>"><input id="cordoinput" type="submit" value="SIM"></form>
<form method="post" action="msgs.php"><input id="cordoinput" type="submit" value="NAO"></form>
</div>
<?php include "includes/fb.dll"; ?>
