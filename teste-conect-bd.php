<?php
include ('connection.php');
include ('upload-file.php');

$consulta = "select cpf_cliente from cliente where nome_cliente LIKE '%".$nome_paciente."%'";
$result = $conn->query($consulta) or die ($conn->error);

?>

<html>
	<head>
		<title>exibeeeee</title>
	</head>
	<body>
		<table>		
			<tr>
				<td>CPF: </td>
			</tr>
			<?php while($dado = $result -> fetch_array()){?>
			<tr>
				<td><?php echo $dado ["cpf_cliente"]; ?></td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>