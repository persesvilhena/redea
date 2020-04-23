<?php

$res2 = mysqli_query($conecta, "SELECT * FROM `contato` where deid = '$id'");
$contatos = $id;
while($escrever2=mysqli_fetch_array($res2)){
	$contatos = $contatos . "," . $escrever2['cotid'];
}

post_campo();
include ("engine/post/postagem.php");

?>