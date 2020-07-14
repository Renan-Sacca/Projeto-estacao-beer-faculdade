<?php
$conect = mysqli_connect('localhost', 'root', '') or die ("Erro de conexão");
$banco = mysqli_select_db($conect, "banco") or die ("Erro de conexao");
#$conexao = mysqli_connect('localhost','root','') or die("Erro de conexão");
#$banco = mysqli_select_db($conexao,'estacaobeer') or die("Erro ao selecionar o banco de dados");
?>