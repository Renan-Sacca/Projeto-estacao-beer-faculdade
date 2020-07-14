 <?php 

if(isset($_GET['nome'],$_GET['senha'])){
	if($_GET['nome']=='admin' && $_GET['senha']=='123'){
		header('Location: mesas.php');

	}
}


?>

<html>
	<head>
		<title>Estação Beer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">




	</head>
	<body class="is-preload">
	


    <!-- Main -->
	<div id="main">
			<section id="contact" class="four" style="background-color:rgb(255,186,38) ">
				<div class="container">

					<header>
						<h2>Usuário</h2 >
					</header>

					<form method="get" action="">
						<div class="row">
                            
							<div class="col-6 col-12-mobile">
                                <input type="text" name="nome"	placeholder="Nome" value="" /></div>
							
							<div class="col-6 col-12-mobile">
                                <input type="password" name="senha" placeholder="Senha" value="" /></div>
							
							<div class="col-12">
								<input type="submit" value="Login" />
							</div>
						</div>
					</form>
				</div>
			</section>
            <section style="background-color:rgb(88,43,2) ">
            <a href="index.php" class="button">Voltar</a>
            </section>
	</div>

		
        
        <!-- Header -->
			<div id="header">

				<div class="top" >

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/logo.jpg" alt="" /></span>
							<h1 id="title">Estação Beer</h1>
							<p>Bar retrô</p>
						</div>