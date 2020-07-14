<?php 

function getProducts($pdo){
	$sql = "SELECT *  FROM produtos WHERE (id <= 38) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPizza($pdo){
	$sql = "SELECT *  FROM produtos WHERE (id >= 39) and (id <= 47) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBebidas($pdo){
	$sql = "SELECT *  FROM produtos WHERE (id >= 48) and (id <= 98) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPorcoes($pdo){
	$sql = "SELECT *  FROM produtos WHERE (id >= 99) and  (id <= 120) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByIds($pdo, $ids) {
	$sql = "SELECT * FROM produtos WHERE id IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}