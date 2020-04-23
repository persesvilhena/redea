<?php include "includes/cabeca.dll"; ?>
<title>Criar Grupo - <?php echo "$namesite"; ?></title>

<?php
session_start();
include "conexao.php";
include "protege.php";

if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	
	if(!empty($_POST["nome"]) && !empty($_POST["descricao"]) && !empty($_POST["autor"])) { // Verifico se os campos foram preenchidos
		
		$nome = $class->antisql($_POST["nome"]); // Filtro os dados de login name originados do formulário
		$desc = $class->antisql($_POST["descricao"]); // Filtro a senha originada do formulário
		$autor = $class->antisql($_POST["autor"]); // Filtro o e-mail originado do formulário
		$autorn = $class->antisql($_POST["autorn"]);

		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		
		$repeat_user = mysql_query("SELECT * FROM us_grupo WHERE us='$id_gen';");
		$repeat_user1 = mysql_query("SELECT * FROM grupos WHERE nome='$nome';");

		if(mysql_num_rows($repeat_user) > 0) {
	
			$mensagem_erro = "<b>Voce ja possui um grupo!</b>";
		}
		else {
		if(mysql_num_rows($repeat_user1) > 0) {
	
			$mensagem_erro = "<b>Este nome de grupo ja existe!</b>";
		}
		else {
			
			$insert = mysql_query("INSERT INTO grupos VALUES(null, '$nome', '$desc', '$autor', '1', '$autorn')") or die(mysql_error());
			$idgrupo = mysql_query("select id from grupos where nome = '$nome';") or die(mysql_error());
			$row1 = mysql_fetch_array($idgrupo);
			$insert2 = mysql_query("update users1 set grupo = '$row1[id]', adm_grupo = '$row1[id]' where id = '$id_gen';") or die(mysql_error());
			$insert3 = mysql_query("insert into us_grupo values(null, '$row1[id]', '$id_gen', '$login', '$nome');") or die(mysql_error());
			
			if($insert3) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Grupo criado com sucesso!</b>";


			}}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
<?php include("includes/cb.dll"); ?>
<form method="post" action="<?php $PHP_SELF; ?>">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php echo $mensagem_erro; ?></td>
  </tr>
  <tr>
    <td><table width="550" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="53"></td>
        <td width="477"><label>
          <strong>Nome:</strong><input type="text" name="nome">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <strong>Descricao:</strong><input type="text" name="descricao">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
        <input type="hidden" name="autor" value="<?php echo "$id_gen"; ?>">
		</label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
        <input type="hidden" name="autorn" value="<?php echo "$login"; ?>">
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="cadastrar" value="Enviar" />
        </label></td>
      </tr>
    </table></td>
  </tr>
</table>
</form><div align="left">
<a href="cadastrados.php">Voltar</a>
</div>
</body>
<?php include("includes/fb.dll"); ?>
</html>
