<?php session_start()?>
<?php
$Total = null;
#<?php session_destroy() DESTROI A SESSÃO USA ISSO DPS
	if (isset($_SESSION['venda'])) {
	}else{
		$_SESSION['venda'] = array();
	}
	
	if (isset($_GET['par'])) {
		$Produto = $_GET['par'];
		$_SESSION['venda'][$Produto] = 1; #esse 1 aq é a quantidade		
		}

		if (isset($_GET['del'])) {
			$Del = $_GET['del'];
			unset($_SESSION['venda'][$Del]);
			
		}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>LANCHES</title>
	<meta charset="utf-8">
</head>

<body>

	<ul>
		<?php
			$Sql = mysqli_query($conect,"SELECT * FROM produtos");
			while ($res = mysqli_fetch_array($Sql)) {
				
			
		?>
		<li>
				<span><?php echo $res['tipo']?>;</span>
				<span><?php echo $res['descricao']?>;</span>
				<strong><a href="lanches.php?par=<?php echo $res['id']?>">.....R$ <?php echo number_format($res['preco'],2,",",".");?></a></strong>
		</li>

		<?php
			}
		?>

	</ul>

<table width="700" border="1">
	<tr>
		<td>Lanche</td>
		<td>Valor</td>
		<td>Quantidade</td>
		<td>Ações</td>
	</tr>

	<?php

		foreach ($_SESSION['venda'] as $Prod => $Quantidade):
			$SqlCarrinho = mysqli_query($conect,"SELECT * FROM produtos WHERE id = '$Prod'");
			$resAssoc = mysqli_fetch_assoc($SqlCarrinho);

			echo '<tr>';
				echo '<td>'.$resAssoc['descricao'].'</td>';
				echo '<td>R$'.number_format($resAssoc['preco'],2,",",".").'</td>';
				echo '<td>'.$Quantidade.'</td>';
				echo '<td><a href="lanches.php?del='.$resAssoc['id'].'">Delete</a></td>';
				$Total += $resAssoc['preco'] * $Quantidade;
			echo '</tr>';
		endforeach;	
		echo "<tr>";
			echo '<td colspan="4" align="right">R$'.number_format($Total,2,",",".").'</td>';
		echo "</tr>";

	?>

	<?php
		if (isset($_POST['enviar'])) {
			$SqlInserirVenda = mysqli_query($conect,"INSERT INTO venda(valor) VALUES('$Total')");
			$IdVenda = mysqli_insert_id($conect);

			foreach ($_SESSION['venda'] as $ProdInsert => $Qtd):
				$SqlInserirItems = mysqli_query($conect,"INSERT INTO venda_detalhes(idvenda, idprod, quantidade) VALUES ('$IdVenda','$ProdInsert','$Qtd')");
			endforeach;
			echo "<script>alert('Venda registrada')</script>";
			
		}
	?>

	<?php
	if (isset($_POST['add'])) {
		$Quantidade+=1;
	}
	?>

</table>

<form action="" enctype="multipart/form-data" method="post">
	<input type="submit" name="enviar" value="Finalizar Pedido">
	<input type="submit" name="add" value="add">	
</form>

</body>
</html>