<?php
include ('connection.php');
// MUDAR PARA E-MAIL DA EMPRESA
$emailsender='mail@mail.com';
$assunto 	= '[Clínica Bragalha - Cadastro]';


if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

// DADOS DO FORM
$nome 				= $_POST['nome-cliente'];
$email 				= $_POST['email-cliente'];
$cpf 				= $_POST['email-cliente'];
$telefone 		    = $_POST['telefone-cliente'];

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<meta charset="UTF-8">
<p>Obrigado por fazer o seu cadastro na Clínica Bragalha.</p><br>
<p>Com o nome e e-mail cadastrado você pode acessar o resultado de seus exames.</p><br>

<hr>';



if ($nome == "" || $nome == " " || $email == "" || $email == " " || $telefone == "" || $telefone == " "|| $cpf == "" || $cpf == " "){
	echo('Todos os campos são obrigatórios. Preencha corretamente');
}

//$sql_query = "INSERT INTO cliente (email_cliente, nome_cliente, telefone_cliente) values ('{$email}','{$nome}','{$telefone}');";

$sql = "INSERT INTO cliente (cpf_cliente, email_cliente, nome_cliente, telefone_cliente)
VALUES ('{$cpf}','{$email}', '{$nome}','{$telefone}')";

if ($conn->query($sql) === TRUE) {
	echo "Cadastro realizado com sucesso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/* Enviando e-mail */
//mail($email, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
// Se não houver um valor, o item não deverá ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;

//mail($email, $assunto, $mensagemHTML, $headers, "-r", $emailsender);

mail($email, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

/* Mostrando na tela as informações enviadas por e-mail */
print
header("Location: index.php");

$conn->close();


?>