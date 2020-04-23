<link rel="stylesheet" href="css/style.css" type="text/css">
<?php include("includes/cabecaf.dll"); ?>
<title>Welcome</title>
<style type="text/css">
body {
  margin:0;
  padding:0;
  background:#cccccc;
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
<?php
session_start();
$mensagem_erro = "<b>Cadastre-se gratuitamente!</b>";

if(!empty($_COOKIE["nome"]) && !empty($_COOKIE["senha"]) && !empty($_COOKIE["id"])) { // Verifico se já existem os cookies de login. Caso existam, redirecionam o user para a página restrita

	header("Location: index.php?index");
	exit();
	
	
}
if(isset($_POST["logar"])) { // Verifico se o botão de login foi acionado
	
	if(!empty($_POST["login"]) && !empty($_POST["senha"])) { // Verifico se os campos foram preenchidos
		
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro a senha originada do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta ao SQL
		
		$valida_user = mysql_query("SELECT * FROM $tabela WHERE nome='$login' AND senha='$senha'") or die(mysql_error()); // Faço a consulta ao SQL para buscar o usuário com os dados informados pelo form
		
		if(mysql_num_rows($valida_user) > 0) { // Verifico se a consulta retorna alguma linha
			
			$lembrar = $_POST["lembrar"]; // Pego o valor do checkbox 'Lembrar' do formulário
			$info = mysql_fetch_array($valida_user); // Defino a var responsável por trazer as informações do BD
			
			$nome = $info["nome"]; // Recupero o campo nome do BD
			$pass = $info["senha"]; // Recupero o campo senha do BD
			$id_generico = $info["id"]; // Recupero o campo id do BD
			
			$id = base64_encode($id_generico); // Codifico o id para obter mais segurança
			
			if($lembrar == "1") { // Se o checkbox foi marcado, gravo cookies de 1 ano
				
				// Gravo os cookies responsáveis pelo login
				setcookie("nome", $nome, time()+31536000); // setcookie(nome_cookie, valor_cookie, tempo_expiracao)
				setcookie("senha", $pass, time()+31536000); // Nesses casos, usei o tempo como anual
				setcookie("id", $id, time()+31536000); // Assim: time()[agora]+[mais]3153600[60*60*24*365]{segs.*min.= 1 hora em segs => 1 hr em segs * 24 hrs = 1 dia => 1 dia * 365 dias = 1 ano}
				
			}
			else { // Caso contrário, gravo cookies que expirarão assim q o browser fechar
				
				// Gravo os cookies responsáveis pelo login
				setcookie("nome", $nome, 0); // Aqui os cookies expiram assim q o browser fechar
				setcookie("senha", $pass, 0);
				setcookie("id", $id, 0);
			}
			
			// Redireciono para a página restrita
			header("Location: index.php?pag=index");
			exit();
		}
		else { // Se não retornar, define mensagem de erro
			
			$mensagem_erro = "<b>Dados Incorretos!</b>";
		}
	}
	else { // Caso tenha algum campo em branco, define mensagem de erro
		
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
	}
}
?>


<body>
<div id="tudo">
<div id="conteudo">
<span class="titulo"><div align="center">Bem-Vindo ao You Share</div></span>
<img src="imgs/style.png" width="1015" height="25">
<div align="center">
<form method="post" action="<?php $PHP_SELF; ?>">
<span class="texto"> Login : </span><input type="text" name="login" id="input1"><br>
<span class="texto">Senha: </span><input type="password" name="senha" id="input1"><br>
<input type="checkbox" name="lembrar" id="input1"><span class="texto">Manter-me conectado</span>
<button type="submit" name="logar" value="Logar" id="input1">Logar</button>
</div>
</form>
<img src="imgs/style.png" width="1015" height="25">
<br>
<div align="center"><span class="titulo">Cadastre-se Gratuitamente</span></div>
<img src="imgs/style.png" width="1015" height="25">
<?php


if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	
	if(!empty($_POST["login"]) && !empty($_POST["senha"]) && !empty($_POST["email"])) { // Verifico se os campos foram preenchidos
		
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro a senha originada do formulário
		$email = $class->antisql($_POST["email"]); // Filtro o e-mail originado do formulário
		$nome1 = $class->antisql($_POST["nome1"]); // Filtro o e-mail originado do formulário
		$nome2 = $class->antisql($_POST["nome2"]); // Filtro o e-mail originado do formulário
		$descricao1 = $class->antisql($_POST["descricao1"]); // Filtro o e-mail originado do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		
		$repeat_user = mysql_query("SELECT * FROM $tabela WHERE nome='$login'") or die($mensagem_erro = "<b>Houve um erro:</b><br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		
		if(mysql_num_rows($repeat_user) > 0) { // Verifico se a consulta retorna algum resultado. Nesse caso, se retornar, define uma mensagem de erro.
			
			$mensagem_erro = "<b>Já existe um usuário com este login name!</b>";
		}
		else {
			
			$insert = mysql_query("INSERT INTO $tabela(nome, senha, email, nome1, descricao1, nome2, foto) VALUES('$login', '$senha', '$email', '$nome1', '$descricao1', '$nome2', 'anon/anon.jpg')") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Usuário cadastrado com sucesso!</b>";
			}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}
}
?>
<?php
if(isset($_POST["cadastrar"])) { 
$testesql = mysql_query("SELECT * FROM $tabela WHERE nome='$login';");
$testesql2 = mysql_fetch_array($testesql);
$apagando = mysql_query("INSERT INTO foto VALUES (null, '$testesql2[id]', 'semfoto.jpeg')");
}

?>
<?php
if(isset($_POST["cadastrar"])) { 
$testesql1 = mysql_query("SELECT * FROM $tabela WHERE nome='$login';");
$sqldata = mysql_fetch_array($testesql1);
$apagando1 = mysql_query("INSERT INTO amigos VALUES (null, '$sqldata[id]', '$sqldata[id]', '$sqldata[nome]', '$sqldata[nome]')");
}
?>
<form method="post" action="<?php $PHP_SELF; ?>">
<div align="center">
<table width="220" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><span class="texto"><?php echo $mensagem_erro; ?></span></td>
  </tr>
  <tr>
    <td><table width="220" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="60"><span class="texto">Login:</span></td>
        <td width="160"><label>
          <input id="input1" type="text" name="login" />
        </label></td>
      </tr>
      <tr>
        <td><span class="texto">Senha:</span></td>
        <td><label>
          <input id="input1" type="password" name="senha" />
        </label></td>
      </tr>
      <tr>
        <td><span class="texto">E-mail:</span></td>
        <td><label>
          <input id="input1" type="text" name="email" />
		</label></td>
      </tr>
      <tr>
        <td><span class="texto">Nome:</span></td>
        <td><label>
          <input id="input1" type="text" name="nome1" />
		</label></td>
      </tr>
      <tr>
        <td><span class="texto">Sobrenome:</span></td>
        <td><label>
          <input id="input1" type="text" name="nome2" />
		</label></td>
      </tr>
      <tr>
        <td><span class="texto">Descricao:</span></td>
        <td><label>
          <input id="input1" type="text" name="descricao1" />
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <button id="input1" type="submit" name="cadastrar" value="Cadastrar">Cadastrar</button>
        </label></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<img src="imgs/style.png" width="1015" height="25">
<div align="center"><span class="subtitulo">You Share © 2012 - 2013 Perses De Vilhena</span></div>