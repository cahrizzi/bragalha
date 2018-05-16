<?php
session_start();
//$servidor="sistema_client.mysql.dbaas.com.br";
//$usuario="sistema_client";
//$senha="side316@pro";
//$dbname="sistema_client";

$servidor="localhost";
$usuario="root";
$senha="";
$dbname="sistema_bragalha";

$conn=mysqli_connect($servidor,$usuario, $senha, $dbname);

if (!$conn){
	die("falha na conexão:".mysqli_connect_error);
}
//
//else{
//	echo("conexao ok!");
//}

?>