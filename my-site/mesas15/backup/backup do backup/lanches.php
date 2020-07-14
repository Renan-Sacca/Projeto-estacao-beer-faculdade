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

if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
		
		if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			addCart($_GET['id'], 1);			
		}

		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			deleteCart($_GET['id']);
		}

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id => $qtd){
						updateCart($id, $qtd);
				}
			}
		} 
		header('location: lanches.php');
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>LANCHES</title>
	<meta charset="utf-8">
</head>
<?php
	include_once("config.php");
	include_once("cart.php")
?>
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



	<form action="carrinho.php?acao=up" method="post">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
				  <?php foreach($resultsCarts as $res) : ?>
					<tr>
						
						<td><?php echo $res['name']?></td>
						<td>
							<input type="text" name="prod[<?php echo $res['id']?>]" value="<?php echo $res['Quantidade']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($res['preco'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['preco'], 2, ',', '.')?></td>
						<td><a href="lanches.php?acao=del&id=<?php echo $res['id']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
				 	<td>R$<?php echo number_format($Total, 2, ',', '.')?></td>
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>

			<a class="btn btn-info" href="lanches.php">Continuar Comprando</a>
			<button class="btn btn-primary" type="submit">Atualizar Carrinho</button>

			</form>
	<?php endif?>




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

</table>

<form action="" enctype="multipart/form-data" method="post">
	<input type="submit" name="enviar" value="Finalizar Pedido">
	
</form>

</body>
</html>