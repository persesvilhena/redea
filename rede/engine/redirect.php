<?php
//$server = $_SERVER['SERVER_NAME'];

$endereco = $_SERVER ['REQUEST_URI'];

//echo "<br>server:<br>"  . $server . "<br>end:<br>" . $endereco . "<br><div style=\"clear: both;\"></div>";

if(isset($_GET["index"]) || $endereco == "/" || $endereco == "/index.php" || (count($_GET) == 0)) {
$pagina = "index.php?index&p4=" . $p4;
include "include/index/index.php";
$titulopag = "Rede - Home";	
}


if(isset($_GET["mural"])) {
$pagina = "index.php?mural";
include "include/index/index.php";
$titulopag = "Rede - Mural";	
}


if(isset($_GET["perfil"])) {
$pagina = "index.php?perfil";
include "include/perfil/index.php";
$titulopag = "Rede - Perfil";	
}


if(isset($_GET["perfilalterar"])) {
include "include/perfil/alterar.php";
$titulopag = "Rede - Perfil";	
}


if(isset($_GET["perfilalterar2"])) {
include "include/perfil/alterar2.php";
$titulopag = "Rede - Perfil";	
}


if(isset($_GET["msg"])) {
include "include/correio/index.php";
$titulopag = "Rede - Mensagens";	
}


if(isset($_GET["contatos"])) {
$pagina = "contatos";
include "include/contatos/index.php";
$titulopag = "Rede - Contatos";	
}


if(isset($_GET["user"])) {
$pagina = "index.php?user&i1=1&i2=" . $i2;
include "include/user/index.php";
$titulopag = "Rede - User";	
}


if(isset($_GET["allusers"])) {
include "include/user/all.php";
$titulopag = "Rede - Users";	
}


if(isset($_GET["links"])) {
include "include/links/index.php";
$titulopag = "Rede - Links";	
}


if(isset($_GET["config"])) {
include "include/index/config.php";
$titulopag = "Rede - Configuração";	
}


if(isset($_GET["rank"])) {
$pagina = "index.php?rank";
include "include/rank/index.php";
$titulopag = "Rede - Rank";	
}



if(isset($_GET["buscar"])) {
$pagina = "index.php?buscar";
include "include/buscar/index.php";
$titulopag = "Rede - Buscar";	
}



if(isset($_GET["relatorio"])) {
$pagina = "index.php?relatorio";
include "include/index/relatorio.php";
$titulopag = "Rede - Relatórios";	
}



if(isset($_GET["admin"])) {
$pagina = "index.php?admin";
include "include/index/admin.php";
$titulopag = "Administração";	
}



if(isset($_GET["sobre"])) {
$pagina = "index.php?sobre";
include "include/index/sobre.php";
$titulopag = "Rede - Sobre o Jogo";	
}



if(isset($_GET["videos"])) {
$pagina = "index.php?videos&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/videos/index.php";
$titulopag = "Rede - Videos";	
}



if(isset($_GET["artalbum"])) {
$pagina = "index.php?artalbum&i1=" . $i1 . "&i2=" . $i2 ."&i3=" . $i3;
include "include/artista/fotos.php";
$titulopag = "Rede - Album";	
}



if(isset($_GET["editart"])) {
$pagina = "index.php?editart&i1=" . $i1 . "&i2=" . $i2;
include "include/artista/editar.php";
$titulopag = "Rede - Artista";	
}



if(isset($_GET["album"])) {
$pagina = "index.php?album&i1=" . $i1 . "&i2=" . $i2;
include "include/fotos/index.php";
$titulopag = "Rede - Albuns";	
}



if(isset($_GET["fotos"])) {
$pagina = "index.php?fotos&i1=" . $i1 . "&i2=" . $i2;
include "include/fotos/fotos.php";
$titulopag = "Rede - Fotos";	
}



if(isset($_GET["musicas"])) {
$pagina = "index.php?musicas&i1=" . $i1 . "&i2=" . $i2;
include "include/midia/musicas/index.php";
$titulopag = "Rede - Musicas";	
}



if(isset($_GET["perses"])) {
	$user->epp = 98;
	echo $user->epp;
	$user->update($id);
echo "

<a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"setDetails('\"var1=teste&var2=var2&var3=var3\"');centraliza('pfdialog');\">botao</a></div>

<div id=\"testedeajax\"></div>


<br>" . $user->login . "
 ";
}

if(isset($_GET["perses1"])) {
/*	$socket = fsockopen('udp://a.st1.ntp.br', 123, $err_no, $err_str, 1);
	if ($socket)
	{
	    if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
	    {
	        stream_set_timeout($socket, 1);
	        $unpack0 = unpack("N12", fread($socket, 48));
	        echo date('Y-m-d H:i:s', $unpack0[7]);
	    }

	    fclose($socket);
	}
*/

$timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
echo $timestamp;
$dataAtual = gmdate("d-m-Y-H-i-s", $timestamp);
echo"teste<br>";
echo returnData(555);
$dataFuturo = returnData(86399);
$datteste = $dataFuturo - $timestamp;
echo "<br>" . $datteste . "<br>";
echo gmdate("H:i:s", $datteste);


//$dat = explode("-", $dataFuturo);
//$dat1 = explode("-", $dataAtual);

//echo"<br>" . (($dat[0]) - ($dat1[0])) . "/" . (($dat[1]) - ($dat1[1])) . "/" . (($dat[2]) - ($dat1[2])) . " " . (($dat[3]) - ($dat1[3])) . ":" . (($dat[4]) - ($dat1[4])) . ":" . (($dat[5]) - ($dat1[5])) . "<br>";


}




?>
