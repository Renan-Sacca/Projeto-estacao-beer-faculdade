<?php 

if(!isset($_SESSION['carrinho8'])) {
	$_SESSION['carrinho8'] = array();
}

function addCart($id, $quantity) {
	if(!isset($_SESSION['carrinho8'][$id])){ 
		$_SESSION['carrinho8'][$id] = $quantity; 
	}
}

function deleteCart($id) {
	if(isset($_SESSION['carrinho8'][$id])){ 
		unset($_SESSION['carrinho8'][$id]); 
	} 
}

function updateCart($id, $quantity) {
	if(isset($_SESSION['carrinho8'][$id])){ 
		if($quantity > 0) {
			$_SESSION['carrinho8'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho8']) {
		
		$cart = $_SESSION['carrinho8'];
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