<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Clinica Bragalha - Cadastro</title>
		<link rel="stylesheet" href="estilo.css">
		<link rel="stylesheet" href="reset.css">
	</head>
	<body>
		<div class="boxform">
			
			<div class="boxform-cadastro">
				<div class="logo">
					<img src="http://side3.com.br/aprovacao/bragalha/wordpress/images/header/logo.png" alt="">
				</div>
				<h1 class="titulo">Novo cadastro</h1>
				<form action="grava-paciente.php" method="post" enctype="multipart/form-data">
					<div class="inputs-duplo">
						<input type="text" id="nome-cliente" name="nome-cliente" placeholder="Nome completo:" required>
						<input type="email" id="email-cliente" name="email-cliente" placeholder="E-mail:" required>
					</div>
					<div class="inputs-duplo">
						<input type="text" class="cpf" id="cpf-cliente" name="cpf-cliente" placeholder="CPF:" required>
						<input type="tel" class="tel_ddd" id="telefone-cliente" name="telefone-cliente" placeholder="Telefone:" required>
					</div>
					<input type="submit" value="cadastrar">
				</form>
			</div>
			
		</div>

		<!-- SCRIPTS -->
		<script src="js/mascara.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>	
	</body>
</html>


<!-- 

<form action="grava-paciente.php" method="post" enctype="multipart/form-data">
	<input type="text" id="nome-cliente" name="nome-cliente" placeholder="Nome completo">
	<input type="email" id="email-cliente" name="email-cliente" placeholder="E-mail">
	
	
</form>
 -->