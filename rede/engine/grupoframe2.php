<?php include("../includes/cabecaback.dll"); ?>
<?php
$selectgrupo = mysql_query("SELECT * FROM grupo WHERE id='$row[grupo]'");
$grupo=mysql_fetch_array($selectgrupo);
if($id_gen == $grupo[idautor]) { 

include "../include/grupos/adm.dll";
}
?>