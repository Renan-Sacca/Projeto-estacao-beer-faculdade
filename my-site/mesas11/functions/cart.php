<?php 

if(!isset($_SESSION['carrinho11'])) {
	$_SESSION['carrinho11'] = array();
}

function addCart($id, $quantity) {
	if(!isset($_SESSION['carrinho11'][$id])){ 
		$_SESSION['carrinho11'][$id] = $quantity; 
	}
}

function deleteCart($id) {
	if(isset($_SESSION['carrinho11'][$id])){ 
		unset($_SESSION['carrinho11'][$id]); 
	} 
}

function updateCart($id, $quantity) {
	if(isset($_SESSION['carrinho11'][$id])){ 
		if($quantity > 0) {
			$_SESSION['carrinho11'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho11']) {
		
		$cart = $_SESSION['carrinho11'];
		$products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'id' => $product['id'],
							  'name' => $product['nome'],
							  'price' => $product['preco'],
							  'quantity' => $cart[$product['id']],
							  'subtotal' => $cart[$product['id']] * $product['preco'],
						);
		}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	} 
	return $total;
}