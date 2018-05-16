<?php
	include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Painel Administrativo</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="reset.css">
</head>
<body>

<div class="boxform">
	<div class="boxform-cadastro">
		<div class="logo">
			<img src="http://side3.com.br/aprovacao/bragalha/wordpress/images/header/logo.png" alt="">
		</div>
		<h1 class="titulo">Painel administrativo</h1>
		<form action="upload-file.php" method="post" id="upload-exame" enctype="multipart/form-data">
			<div class="inputs-duplo">
				<input type="text" class="nome_paciente" id="paciente-autocomplete" name="nome_paciente" placeholder="Paciente:">
				<input type="text" name="medico" id="medico" class="display_name" placeholder="Médico:">
			</div>
			<div class="inputs-duplo">
				<input type="text" name="datepicker" id="datepicker" placeholder="Data do exame">
				<select name="especialidade" id="especialidade">
					<option value="">Escolhe uma especialidade</option>
					<option value="Endoscopia digestiva alta">Endoscopia digestiva alta</option>
					<option value="Colonoscopia">Colonoscopia</option>
					<option value="Laringoscopia">Laringoscopia</option>
					<option value="Broncoscopia">Broncoscopia</option>
					<option value="Manometria Esofágica">Manometria Esofágica</option>
					<option value="Manometria ano-retal">Manometria ano-retal</option>
					<option value="Ph-metria">Ph-metria</option>
					<option value="Retossigmoidoscopia">Retossigmoidoscopia</option>
					<option value="Troca de sonda">Troca de sonda</option>
					<option value="Balão intragástrico">Balão intragástrico</option>
					<option value="Colonoscopia/Endoscopia">Colonoscopia / Endoscopia</option>
					<option value="Ultrassom Endoscópico">Ultrassom Endoscópico</option>
					<option value="Elastografia Hepatica">Elastografia Hepatica</option>
				</select>
			</div>
			<label for="arquivo" class="label-pdf">Selecione o exame</label><br/>
			<input type="file" name="arquivo" placeholder="PDF do Exame">
			<input type="submit" name="submit_exame" value="Enviar exame">
		</form>
	</div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
	//autocomplete
	$(".nome_paciente").autocomplete({
		source: "busca_paciente.php",
		minLength: 1
	});	
	$(".display_name").autocomplete({
		source: "busca_medico.php",
		minLength: 1
	});
	
	$( "#datepicker" ).datepicker({
				dateFormat: "dd/mm/yy",
				changeMonth: true,
				changeYear: true
		});
});				
</script>
</body>
</html>