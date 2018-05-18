<?php
// Consulta Exame Paciente
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultados de Exames</title>
</head>
<body>
	<h1><?php ?></h1>

		<?php
			// Passando os parâmetros para consulta
			$url 					 = "http://clinicabragalha.com.br/exames/";
			$nome_paciente = $_SESSION['nome'];
		
			$consulta = $conn->query("SELECT 
      dt_exame,
			especialidade_exame,
			medico_exame,
			file_name,
      file_uploaded
      FROM resultado_exames WHERE nome_paciente ='$nome_paciente';");

			//echo '<p> <strong>E-mail:</strong> '.$nome_paciente.'</p>';
			// while($registro=mysql_fetch_array($consulta)) {
			// extract($registro);
			// echo "$colunatal";
			// } 
		
    while($linha = $consulta->fetch_array()){
      
      echo '<body>'; 

      echo '<ul class="container-lista">';
			echo '<li>
					<p class="titulo-lista">Data do exame:</p>
					<p class="resultado-lista">'.$linha["dt_exame"].'</p>
				</li>';

			echo '<li>
					<p class="titulo-lista">Especialidade:</p>
					<p class="resultado-lista">'.$linha["especialidade_exame"].'</p>
				</li>';
			echo '<li>
					<p class="titulo-lista">Nome do médico:</p>
					<p class="resultado-lista">'.$linha["medico_exame"].'</p>
				</li>';
			echo '<li>
					<a href="'.$url.$linha["file_name"].'" target=_blank >
						<div class="icone-download">
							<img src="http://side3.com.br/aprovacao/bragalha/public/images/icon-down.png" alt="">
						</div>
					</a>
				</li>';
		echo '</ul>';
      }    
      echo '</body>';  
      ?>
</body>
</html>
