<html>
<head><title>Menu</title>
<base target="form"></head>
<body style="background-color: #fdc844">

<?php
$mesa = $_GET['mesa'];
?>

<font size=5>
<ul>
<a href=index.php?mesa=<?php echo $mesa?>><img src="botao/button_lanches.png"><p><p><p><p>
<a href=pizza.php?mesa=<?php echo $mesa?>><img src="botao/button_pizzas.png"><p><p><p><p>
<a href=bebidas.php?mesa=<?php echo $mesa?>><img src="botao/button_bebidas.png"><p><p><p><p>
<a href=porcoes.php?mesa=<?php echo $mesa?>><img src="botao/button_porcoes.png"><p><p><p><p>

<a href=registros.php><img src="botao/button_registros.png"><p><p><p><p><p><p>


<!-- MENSAGEM PARA O RENAN DO FUTURO: COPIA ISSO AQUI EM BAIXO VLW É NOIS -->
<a href=carrinho.php?mesa=<?php echo $mesa?>><img src="botao/button.png"><p><p><p><p><p>



<a href="../mesas.php" target="_parent"><img src="botao/button_voltar.png"> </a>


</ul>
</font>
</body>
</html>

