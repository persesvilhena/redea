<?php
$info1 = $_GET['info1'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01
Transitional//EN">
<html>
<head>
<?php include "includes/cabeca.dll"; ?>
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1">
<style type="text/css">
body {
  margin:0;
  padding:0;
  background:#ebebeb;
  text-align:center;
}
#tudo {
  width: 1015px;
  margin:0 auto;
  padding: 0px;
  text-align:left;
}
#conteudo {
  padding: 5px;
  
}
</style>
</head>
<body>
<div id="tudo">
<div id="conteudo">
<div style="position: relative; left: 0px; top: 2px; width: 200px; text-align: justify;" align="left">
<?php include "include/painel/painel.dll"; ?>
<div style="position: relative; left: 205px; top: 2px; width: 800px; text-align: justify;" align="left">
<?php include "engine/redirect"; ?>
</div>
<title><?php echo "$titulopag"; ?></title>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><div id="conteudo1"><span class="titulo"><br>           Teste de borda<br>  </span>