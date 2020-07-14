<!DOCTYPE html>
<html>
<head>
	<title>REGISTROS</title>
</head>
<?php
	include_once("config.php");
?>
<body>
	<?php
			$Sql = mysqli_query($conect,"SELECT * FROM vendas");
			while ($res = mysqli_fetch_array($Sql)) {
	?>

	<table width="700" border="1">
	<tr>
		<td>id da venda</td>
		<td>Data</td>
		<td>Mesa</td>
		<td>Valor Total</td>
		<!--<td>Ações</td>-->
	</tr>

	
		<td><?php echo $res['id']?>;</td>
		<td><?php echo $res['data']?>;</td>
		<td><?php echo $res['mesa']?>;</td>
		<td>R$<?php echo number_format($res['valor'],2,",",".")?>;</td>
		<!--<td><strong><a href="detalhes.php"</strong>DETALHES</a></td>-->
		

	</li>
	<?php
			}
		?>

</body>
</html>