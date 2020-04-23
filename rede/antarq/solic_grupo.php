<?php include "includes/cabeca.dll"; ?>
<title>Enviar Solicitação de Grupo - <?php echo "$namesite"; ?></title>

<?php
session_start();
$para=$_GET["paraid"];

if(isset($_POST["cadastrar"])) {
	
	if(!empty($_POST["paraid"]) && !empty($_POST["nome"])) {
		
		$paraid = $class->antisql($_POST["paraid"]);
		$nome = $class->antisql($_POST["nome"]);
		
		$repeat_user = mysql_query("SELECT * FROM us_grupo WHERE us='$id_gen'") or die($mensagem_erro = "<b>Houve um erro:</b><br />".mysql_error());
		
		if(mysql_num_rows($repeat_user) > 0) {
			
			$mensagem_erro = "<b>Voce ja possui um grupo!</b>";
		}
		else {
			
			$insert = mysql_query("INSERT INTO solic_grupo values(null, '$id_gen', '$paraid', '$login')") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Solicitação enviada com sucesso!</b>";
			}
		}
		
	}
	else {
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
<html>
<head>
<title>Enviar Mensagem</title>
<style>
body {
	
	font-family: Arial;
	font-size: 12px;
}
b {
	font-size: 11px;
}
table {
	font-size:  13px;
}
p{
	font-size: 11px;
}
</style>
</head>
<body><br>
<?php include("includes/cb.dll"); ?>
<form method="post" action="<?php $PHP_SELF; ?>">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php echo $mensagem_erro; ?></td>
  </tr>
  <tr>
    <td><table width="550" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="paraid" value="<?php echo "$para"; ?>">
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><label>
          <input type="hidden" name="nome" value="<?php echo $row["nome"]; ?>">
		</label></td>
      </tr>
      <tr>
        <td>Deseja enviar uma solicitacao para este grupo?</td>
        <td><label>
          <input type="submit" name="cadastrar" value="Enviar" />
        </label></td>
      </tr>
    </table></td>
  </tr>
</table>
</form><div align="left">
<a href="grupos.php">Voltar</a>
</div>
</body>
<?php include("includes/fb.dll"); ?>
</html>
