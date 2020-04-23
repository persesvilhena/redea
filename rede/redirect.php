<link rel="stylesheet" href="css/style.css" type="text/css">
<?php
include "conexao.php";
include "protege.php";
?>
<?php
$info1 = $_GET['info1'];
?>
<?php
if(isset($_GET["perfil"])) {
include "include/perfil/index.dll";	
}
?>
<?php
if(isset($_GET["perfilalterar"])) {
include "include/perfil/alterar.dll";	
}
?>
<?php
if(isset($_GET["album"])) {
include "include/index/fotos.dll";	
}
?>
<?php
if(isset($_GET["editalbum"])) {
include "include/index/editalbum.dll";	
}
?>
<?php
if(isset($_GET["postar"])) {
include "include/posts/index.dll";	
}
?>
<?php
if(isset($_GET["index"])) {
include "include/index/index.dll";	
}
?>
<?php
if(isset($_GET["post"])) {
include "include/posts/meusposts.dll";	
}
?>
<?php
if(isset($_GET["user"])) {
include "include/users/perfil.dll";	
}
?>
<?php
if(isset($_GET["amigos"])) {
include "include/index/amigos.dll";	
}
?>
<?php
if(isset($_GET["editamigos"])) {
include "include/index/editamigos.dll";	
}
?>
<?php
if(isset($_GET["editgrupos"])) {
include "include/grupos/editar.dll";
}
?>
<?php
if(isset($_GET["grupos"])) {
include "include/grupos/index.dll";
}
?>
<?php
if(isset($_GET["criargrupo"])) {
include "include/grupos/criar.dll";
}
?>
<?php
if(isset($_GET["indexframe1"])) {
include "include/index/indexframe1.dll";
}
?>
<title><?php echo "$titulopag"; ?></title>