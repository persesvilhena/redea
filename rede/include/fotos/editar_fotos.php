<?php
if($i1 == null){$i1 = 1;}
if($i1 == 1){

?>
<span class="titulo">Suas Fotos:</span>

<hr size=1 color=#cccccc>
<?php
$res = mysql_query("SELECT * FROM `album` where us='$id_gen';");
 while($escrever=mysql_fetch_array($res)){
 echo "<div id=\"cordoinput\" style=\"position: relative; width: 143px; float: left; margin: 2px; padding: 5px; text-align: justify;\">";
 echo "<a href=index.php?album&i1=2&i2=" . $escrever['id'] . "><img src=album/" . $escrever['nome'] . " style=\"width: 143px; height: 120px;\"></a><br>
<center style=\"margin-top: 2px;\"><span class=\"texto\">
<a href=\"index.php?editalbum&i1=2&i2=" . $escrever['id'] . "\" class=\"classe1\">Editar</a> - 
<a href=\"index.php?editalbum&i1=3&i2=" . $escrever['id'] . "\" class=\"classe1\">Excluir</a>
</span></center>
 ";
 echo "</div>";
}


}
if($i1 == 2){
$qfoto = mysql_query("select * from album where id = '$i2';");
$rfoto = mysql_fetch_array($qfoto);
if ($rfoto['us'] == $id){ echo "<a href=\"index.php?user&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }else
{ echo "<a href=\"index.php?user&i1=4&i2=" . $rfoto['us'] . "\" class=\"botao\">Voltar</a><hr size=\"1\" color=\"#cccccc\">"; }

echo "<center><img src=\"album/" . $rfoto['nome'] . "\" style=\"max-width: 798px; max-height: 1500px;\"></center><hr size=\"1\" color=\"#cccccc\">";
echo "<span class=\"titulo\">Descricao: </span><span class=\"texto\">" . $rfoto['descricao'] . "<br>";
echo "<br> ";



}


?>