<?php include "includes/cabeca.dll"; ?>
<title>Enviar Solicitação - <?php echo "$namesite"; ?></title>

<?php include("includes/ct.dll"); ?><span class="titulo">Solic:</span><?php include("includes/ft.dll"); ?>
<?php include("includes/cb.dll"); ?>

<?php
session_start();
$de=$_GET["deid"];
$para=$_GET["paraid"];

if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	
	if(!empty($_POST["paraid"]) && !empty($_POST["deid"]) && !empty($_POST["nome"])) { // Verifico se os campos foram preenchidos
		
		$deid = $class->antisql($_POST["deid"]); // Filtro os dados de login name originados do formulário
		$paraid = $class->antisql($_POST["paraid"]); // Filtro a senha originada do formulário
		$desc = $class->antisql($_POST["desc"]); // Filtro o e-mail originado do formulário
		$nome = $class->antisql($_POST["nome"]); // Filtro o e-mail originado do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		
		$repeat_user = mysql_query("SELECT * FROM convite2 WHERE deid='$deid' AND paraid='$paraid';") or die($mensagem_erro = "<b>Houve um erro:</b><br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		
		if(mysql_num_rows($repeat_user) > 0) { // Verifico se a consulta retorna algum resultado. Nesse caso, se retornar, define uma mensagem de erro.
			
			$mensagem_erro = "<b>Ja há uma solicitação pendente para este usuario!</b>";
		}
		else {
			
			$insert = mysql_query("insert into convite2 values (null,'$deid','$paraid','$desc','$nome','$nome');") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Solicitação enviada com sucesso!</b>";
			}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
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
          <input type="hidden" name="deid" value="<?php echo $row["id"]; ?>">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="paraid" value="<?php echo "$para"; ?>">
        </label></td>
      </tr>
      <tr>
        <td>Solicitação de amizade:</td>
        <td><label>
          <input type="hidden" name="descricao" value="Solicitação de amizade">
		</label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="nome" value="<?php echo $row["nome"]; ?>">
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="cadastrar" value="OK" />
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
