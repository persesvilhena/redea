<?php
include "../conexao.php";
include "../protege.php";
?>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<table border="0" bgcolor="#dfe9f7"><tr><td height="*">
<img width="188" src="../fotos/<?php echo "$row[foto]"; ?>"><br>
<body bgcolor="#dfe9f7">
<a href="../index.php?pag=perfil" class="painel" target="_top"><?php echo $row["nome1"]; ?> <?php echo $row["nome2"]; ?></a> - <a href="../sair.php" class="painel" target="_top">Sair</a><br>
<hr size="1" width="188" color="#cccccc">
<span class="titulo">Menu Principal</span><br>
<hr size="1" width="188" color="#cccccc">
<a href="../index.php?pag=index" class="painel" target="_top">Home</a><br>
<a href="../index.php?pag=album" class="painel" target="_top">Fotos</a><br>
<a href="../index.php?pag=postar" class="painel" target="_top">Postar</a><br>
<a href="../index.php?pag=post" class="painel" target="_top">Meus Posts</a><br>
<a href="../index.php?pag=amigos" class="painel" target="_top">Amigos</a><br>
<a href="../index.php?pag=grupos" class="painel" target="_top">Grupos</a><br>
<a href="../index.php?pag=msg" class="painel" target="_top">Mensagens</a><br>
<hr size="1" color="#cccccc"><div align="center"><span class="subtitulo">You Share V 0.5 Copyright 2011 - 2012</span></div>
</td></tr></table>