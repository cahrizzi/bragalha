<?php
session_start();
include ('connection.php');

$msgerr							=			"Não logado";
$_SESSION['nome']	 	=			$_POST['nome-cliente'];
$_SESSION['email']	=			$_POST['email-cliente'];
$url 								=			'area-restrita.php';


$sql_auth = $conn->query("SELECT * FROM cliente WHERE nome_cliente ='".$_SESSION['nome']."' AND email_cliente = '".$_SESSION['email']."';");

$rows =	mysqli_num_rows($sql_auth);

//echo $rows;

if ($rows > 0){
	
	header ("Location: consulta_exames_p.php");
}else{
	header ("Location: index.php");
}

?>