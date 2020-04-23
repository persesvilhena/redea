<?php include "includes/cabeca.dll"; ?>

<?php include("includes/ct.dll"); ?><span class="titulo">Lasted News:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>
<script language="javascript">
function WinOpen(pagina,janela,opcoes) { 
  window.open(pagina,janela,opcoes);
  }
  </script>

<?php
$id=$_GET["id"];
include("include/topics/$id.txt");
echo "$titulo";
?>
<title><?php echo "$titulo"; ?> - <?php echo "$namesite"; ?></title>
</strong><br><br>
<strong>Descriçaõ:</strong>
<?php echo"$msg";  ?><br>
<strong>Autor:</strong><?php echo"$nome";  ?><br>
<strong>Data:</strong><?php echo"$data";  ?><br>
<a href="javascript:WinOpen('include/news/alterar.php?id=<?php echo"$id"; ?>','Popup','width=500,height=450,top=100,left=250');">adm</a>
<?php include("includes/fb.dll"); ?>
<br>

<?php
$mensagem = $_POST['mensagem'];
$banco = "include/com/$id.txt";
if($_POST['acao'] == "Enviar")
{
if(empty($login)){echo"<script>window.location='index.php';alert('Campo De em branco!');</script>";}
elseif(empty($senha)){echo"<script>window.location='index.php';alert('Campo Para em branco!');</script>";}
else
{
$data = date("d/m/Y - H:i:s");
$arquivo = fopen("$banco","r");
$while = fread($arquivo,filesize($banco));
fclose($arquivo);
$abrir = fopen("$banco","w");
if($while == "0"){$salvar = "$data <br><strong>$login</strong>:<br><font size=3>$mensagem</font><hr size=1 color=#ffffff>";}else{$salvar = "$data <br><strong>$login</strong>:<br><font size=3>$mensagem</font><hr size=1 color=#ffffff>$while";}
fwrite($abrir,"$salvar");
fclose($abrir);
echo"<script>window.location='topic.php?id=$id';</script>";
}}
?>
<center>
<?php include "includes/ct.dll"; ?><div align="left"><span class="titulo">Comentarios:</div></span><?php include "includes/ft.dll"; ?>
<?php include("includes/cb.dll"); ?>
<table border="0" cellpadding="0" cellspacing="2" align="center">
<script>
function emoticon(string){
document.form.mensagem.value = document.form.mensagem.value +" "+string +" ";
document.form.mensagem.focus();
}
</script>
<form name="form" method="post">
  <tr> 
    <td valign="top">
<font face="verdana" size="1">Recado:</font><br>
<textarea type="text" style="width:490;height:50;" name="mensagem"></textarea>
<div style="margin-top: 3px;">
<a href="javascript:emoticon('[1]')"><img src="imgs/img/emo_1.gif" border="0"></a>
<a href="javascript:emoticon('[2]')"><img src="imgs/img/emo_2.gif" border="0"></a>
<a href="javascript:emoticon('[3]')"><img src="imgs/img/emo_3.gif" border="0"></a>
<a href="javascript:emoticon('[4]')"><img src="imgs/img/emo_4.gif" border="0"></a>
<a href="javascript:emoticon('[5]')"><img src="imgs/img/emo_5.gif" border="0"></a>
<a href="javascript:emoticon('[6]')"><img src="imgs/img/emo_6.gif" border="0"></a>
<a href="javascript:emoticon('[7]')"><img src="imgs/img/emo_7.gif" border="0"></a>
<a href="javascript:emoticon('[8]')"><img src="imgs/img/emo_8.gif" border="0"></a>
<a href="javascript:emoticon('[9]')"><img src="imgs/img/emo_9.gif" border="0"></a>
<a href="javascript:emoticon('[10]')"><img src="imgs/img/emo_10.gif" border="0"></a>
<a href="javascript:emoticon('[11]')"><img src="imgs/img/emo_11.gif" border="0"></a>
<a href="javascript:emoticon('[12]')"><img src="imgs/img/emo_12.gif" border="0"></a>
<a href="javascript:emoticon('[13]')"><img src="imgs/img/emo_13.gif" border="0"></a>
<a href="javascript:emoticon('[14]')"><img src="imgs/img/emo_14.gif" border="0"></a>
<a href="javascript:emoticon('[15]')"><img src="imgs/img/emo_15.gif" border="0"></a>
<a href="javascript:emoticon('[16]')"><img src="imgs/img/emo_16.gif" border="0"></a>
</div>
    </td>
    <td valign="top">
    <font face="verdana" size="1" color="#00FF00">&nbsp;</font><br>
    <div style="margin-left: 3px;"><input type="submit" value="Enviar" name="acao" style="width:80;height:51;"></div>
    </td>
  </tr>
</form>
</table>
<?php include "includes/fb.dll"; ?><br>
<center>
<?php include "includes/cb2.dll"; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td>
<?php
$arquivo = fopen($banco,"r");
$while = fread($arquivo,filesize($banco));
$while = str_replace("[1]","<img src=imgs/img/emo_1.gif border=0>",$while);
$while = str_replace("[2]","<img src=imgs/img/emo_2.gif border=0>",$while);
$while = str_replace("[3]","<img src=imgs/img/emo_3.gif border=0>",$while);
$while = str_replace("[4]","<img src=imgs/img/emo_4.gif border=0>",$while);
$while = str_replace("[5]","<img src=imgs/img/emo_5.gif border=0>",$while);
$while = str_replace("[6]","<img src=imgs/img/emo_6.gif border=0>",$while);
$while = str_replace("[7]","<img src=imgs/img/emo_7.gif border=0>",$while);
$while = str_replace("[8]","<img src=imgs/img/emo_8.gif border=0>",$while);
$while = str_replace("[9]","<img src=imgs/img/emo_9.gif border=0>",$while);
$while = str_replace("[10]","<img src=imgs/img/emo_10.gif border=0>",$while);
$while = str_replace("[11]","<img src=imgs/img/emo_11.gif border=0>",$while);
$while = str_replace("[12]","<img src=imgs/img/emo_12.gif border=0>",$while);
$while = str_replace("[13]","<img src=imgs/img/emo_13.gif border=0>",$while);
$while = str_replace("[14]","<img src=imgs/img/emo_14.gif border=0>",$while);
$while = str_replace("[15]","<img src=imgs/img/emo_15.gif border=0>",$while);
$while = str_replace("[16]","<img src=imgs/img/emo_16.gif border=0>",$while);
if($while == "0"){echo"<br><br><br><br><center><font face=verdana size=1>Nenhum recado inserido!</font></center><br><br><br><br>";}else{echo"<font face=verdana size=1>$while</font>";}
fclose($arquivo);
?>
    </td>
  </tr>
</table>
<?php include "includes/fb.dll"; ?>
</center>
</div>
<?php include "includes/fimcabeca.dll" ?>
