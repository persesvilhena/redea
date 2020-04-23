<?php
// Conexão com o banco de dados
include("conexao.php");
include("protege.php");
 
// Se o usuário clicou no botão cadastrar efetua as ações
if ($_POST['cadastrar']) {
 
	// Recupera os dados dos campos
	$us = $_POST['us'];
	$usn = $_POST['usn'];
	$nomedafoto = $_POST['nomefoto'];
	$foto = $_FILES["foto"];
 
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 1500;
		// Altura máxima em pixels
		$altura = 2000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 500000000;
 
    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^file\/(arj|au|avi|bak|bat|bin|bmp|c|cab|cdi|cdr|cfg|class|com|cpp|dat|dtd|dll|doc|dot|dpr|dxf|eps|exe|fla|html|ico|inf|ini|iso|jar|java|js|log|lnk|max|mdb|mid|mp3|mpg|mpeg|mov|nrg|obj|odf|odp|ods|odt|ogg|ole|oxt|pas|pcx|pdb|pdf|pho|prc|pic|pif|pps|ppt|psd|qxd|rar|reg|rm|rmi|rtf|scr|swf|sxw|sxc|sxi|sxd|sys|tif|tmp|ttf|txt|url|vob|vqf|xls|wab|wav|wks|wmf|wmv|wpd|wpg|wri|xpi|zip)$", $foto["type"])){
     	   $error[1] = "Formato não suportado! informe o admin";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(arj|au|avi|bak|bat|bin|bmp|c|cab|cdi|cdr|cfg|class|com|cpp|dat|dtd|dll|doc|dot|dpr|dxf|eps|exe|fla|html|ico|inf|ini|iso|jar|java|js|log|lnk|max|mdb|mid|mp3|mpg|mpeg|mov|nrg|obj|odf|odp|ods|odt|ogg|ole|oxt|pas|pcx|pdb|pdf|pho|prc|pic|pif|pps|ppt|psd|qxd|rar|reg|rm|rmi|rtf|scr|swf|sxw|sxc|sxi|sxd|sys|tif|tmp|ttf|txt|url|vob|vqf|xls|wab|wav|wks|wmf|wmv|wpd|wpg|wri|xpi|zip){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "album/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO album VALUES (null, '$nomedafoto', '$us', '$usn', '$nome_imagem')");
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "imagem enviada com sucesso <a href=index.php?album>Voltar</a>";
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