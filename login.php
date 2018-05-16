<?php
include ('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Clinica Bragalha - Login</title>
		<link rel="stylesheet" href="estilo.css">
		<link rel="stylesheet" href="reset.css">
	</head>
	<body>
		<div class="boxform">
			
			<div class="boxform-cadastro">
				<div class="logo">
					<img src="http://side3.com.br/aprovacao/bragalha/wordpress/images/header/logo.png" alt="">
				</div>
				<h1 class="titulo">Login</h1>
				<form action="autenticausuario.php" method="post" enctype="multipart/form-data">
					<div class="inputs-duplo">
						<input type="text" id="nome-cliente" name="nome-cliente" placeholder="CPF:"/>
						<input type="text" id="email-cliente" name="email-cliente" placeholder="E-mail:"/>
					</div>
					<input type="submit" value="Fazer login">
				</form>
			</div>
			
		</div>

		<!-- SCRIPTS -->
		<script src="js/mascara.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>	
	</body>
</html>

<!-- 

	
	
	<input type="submit" value="enviar"/>
</form>



 -->