<?php include "includes/cabeca.dll"; ?>
<title>Recusar - <?php echo "$namesite"; ?></title>

<?php
session_start();

$de=$_POST["id"];
$denome=$_POST["nome"];

if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	
	if(!empty($_POST["us1"]) && !empty($_POST["us2"]) && !empty($_POST["us1name"])) { // Verifico se os campos foram preenchidos
		
		$us1 = $class->antisql($_POST["us1"]); // Filtro os dados de login name originados do formulário
		$us2 = $class->antisql($_POST["us2"]); // Filtro a senha originada do formulário
		$us1name = $class->antisql($_POST["us1name"]); // Filtro o e-mail originado do formulário
		$us2name = $class->antisql($_POST["us2name"]); // Filtro o e-mail originado do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		
		$repeat_user = mysql_query("SELECT * FROM amigos WHERE us1='$us1' AND us2='$us2';") or die($mensagem_erro = "<b>Houve um erro:</b><br />".mysql_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		
		if(mysql_num_rows($repeat_user) > 0) { // Verifico se a consulta retorna algum resultado. Nesse caso, se retornar, define uma mensagem de erro.
			
			$mensagem_erro = "<b>Ja há uma solicitação pendente para este usuario!</b>";
		}
		else {
			
			$insert = mysql_query("insert into del values (null,'$us1','$us2','$us1name','$us2name');") or die(mysql_error()); // Insiro os dados no BD
			$insert = mysql_query("delete from convite2 where deid='$us2' and paraid='$us1';") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<b>Mensagem enviada com sucesso!</b>";
			}
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
          <input type="hidden" name="us1" value="<?php echo $row["id"]; ?>">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="us2" value="<?php echo "$de"; ?>">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="us1name" value="<?php echo $row["nome"]; ?>">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="us2name" value="<?php echo "$denome"; ?>">
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
