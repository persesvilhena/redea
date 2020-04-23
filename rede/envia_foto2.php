<?php
// Conex�o com o banco de dados
include("conexao.php");
include("protege.php");
 
// Se o usu�rio clicou no bot�o cadastrar efetua as a��es
if ($_POST['cadastrar']) {
 
	// Recupera os dados dos campos
	$us = $_POST['us'];
	$usn = $_POST['usn'];
	$nomedafoto = $_POST['nomefoto'];
	$foto = $_FILES["foto"];
 
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		// Largura m�xima em pixels
		$largura = 5000;
		$larguramin = 500;
		// Altura m�xima em pixels
		$altura = 5000;
		// Tamanho m�ximo do arquivo em bytes
		$tamanho = 10000000;
 
    	// Verifica se o arquivo � uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso n�o � uma imagem.";
   	 	} 
 
		// Pega as dimens�es da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem � maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
		}
		
		if($dimensoes[0] < $larguramin) {
			$error[5] = "A largura da imagem n�o deve ser menor de ".$larguramin." pixels";
		}
 
		// Verifica se a altura da imagem � maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
		}
 
		// Verifica se o tamanho da imagem � maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
		}
 
		// Se n�o houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extens�o da imagem
			preg_match("/\.(pjpeg|jpeg|png|gif|bmp){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome �nico para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficar� a imagem
        	$caminho_imagem = "album/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO album VALUES (null, '$nomedafoto', '$us', '$usn', '$nome_imagem')");
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "imagem enviada com sucesso <a href=index.php?pag=album target=_top>Voltar</a>";
			}
		}
 
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
}
?>