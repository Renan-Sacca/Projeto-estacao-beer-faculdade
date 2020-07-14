<?php 
$mesa = $_GET['mesa'];
	session_start();
	require_once "functions/product.php";
	require_once "functions/cart.php";
	require_once "config.php";


	


	if (isset($_SESSION['venda'])) {
	}else{
		$_SESSION['venda'] = array();
	}



	$pdoConnection = require_once "connection.php";

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
		#header("location: carrinho.php");
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

</head>


<body style="background-color: #fdc844">
	<div class="container">
		<!--<div class="card mt-5">
			 <div class="card-body">
	    		<h4 class="card-title">Carrinho</h4>-->
	    		<!--<a href="index.php">Lista de Produtos</a>-->
	    	</div>
		</div>

		<?php if($resultsCarts) : ?>
			<form action="carrinho.php?mesa=<?php echo $mesa?>&acao=up" method="post">
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
				  <?php foreach($resultsCarts as $result) : ?>
					<tr>
						
						<td><?php echo $result['name']?></td>
						<td>
							<input type="text" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($result['price'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
						<td><a href="carrinho.php?mesa=<?php echo $mesa?>&acao=del&id=<?php echo $result['id']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
				 	<td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>

			
			<button class="btn btn-primary" type="submit">Atualizar Carrinho</button>
			<input class= "btn btn-primary" type="submit" name="enviar" value="Finalizar Pedido">
			</form>
	<?php endif?>

	<?php
		if (isset($_POST['enviar'])) {
			$data = date('d/m/y');
			$SqlInserirVenda = mysqli_query($conect,"INSERT INTO vendas(valor,mesa,data) VALUES('$totalCarts','$mesa','$data')");
			$IdVenda = mysqli_insert_id($conect);
			#$SqlInserirVenda = mysqli_query($conect, "INSERT INTO vendas_detalhes(id_venda,id_prod,quantidade)VALUES ('$result[price]','$result[id]','$result[quantity]')");

			echo "<script>alert('Venda registrada')</script>";

			session_destroy();
			
		}
	?>
</body>
</html>