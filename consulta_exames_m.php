<?php
	include ('connection.php');
	//include ('/public/site/wp-content/themes/medics/page-template/get_nm_user.php');	
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultados de exames</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="reset.css">
</head>
<body>
	<div class="container-centralizado">
		<h1 class="titulo">Resultados de exames</h1>
	</div>
		
		<?php
			// Passando os parâmetros para consulta e exibicao do resultado //
			//$nome_medico 				= $_SESSION['medico_info'];
			$nome_medico 				= "Dr. Rodrigo Azevedo";
			$url 					 			= "http://clinicabragalha.com.br/exames/";
					
			$consulta = $conn->query("SELECT nome_paciente,especialidade_exame,dt_exame,file_name
      FROM resultado_exames WHERE medico_exame = '$nome_medico' order by dt_exame desc;");

    while($linha = $consulta->fetch_array()){
      
      echo '<body>'; 

      echo '<ul class="container-lista">';
			echo '<li>
					<p class="titulo-lista">Nome do paciente:</p>
					<p class="resultado-lista">'.$linha["nome_paciente"].'</p>
				</li>';

			echo '<li>
					<p class="titulo-lista">Tipo de Exame:</p>
					<p class="resultado-lista">'.$linha["especialidade_exame"].'</p>
				</li>';
			echo '<li>
					<p class="titulo-lista">Data do Exame:</p>
					<p class="resultado-lista">'.$linha["dt_exame"].'</p>
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