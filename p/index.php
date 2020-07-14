<html>
<head>
 <title>Como Pegar Dados do Formulário via POST com PHP</title>
</head>
<body>
 <h1>Enviando dados via POST</h1>
 <form id="formulario" name="formulario" method="post" action="recebe_dados.php">
  cotação do dolar: <input name="cota" type="text" />
  <br />
  quantidade de dolares para conversão:: <input name="dolar" type="text" />
  <br />
  <input id="btnenviar" name="btnenviar" type="submit" value="Enviar Dados" />
 </form>
</body>
</html>








<!--
<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Exemplo</title>
   <meta charset = "UTF-8">
</head>
<body>
   <form action="" method="post" >

	
   		
		cotação do dolar: <input name="cota" type="text"><br>

		quantidade de dolares para conversão: <input name="dolar" type="text"><br>

		<input type="submit" value="Fazer calculo" name="botao"><br>
	   
   </form> 

<
	
	
   	
	if (isset($_POST["botao"]))
	{	
		$cota = $_POST['cota'];
		$dolar= $_POST['dolar'];
		echo nl2br($cota * $dolar);
	}

?>       
</body>
</html>
>

-->
		