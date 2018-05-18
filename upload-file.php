<?php
session_start();
// Configura o tempo limite para ilimitado
set_time_limit(0);

//include ('conection.php');

// Configura BD
	define('DB_SERVER', 'sistema_client.mysql.dbaas.com.br');
	define('DB_USER', 'sistema_client');
	define('DB_PASSWORD', 'side316@pro');
	define('DB_NAME', 'sistema_client');


// Funcao Insert ao enviar arquivo ao FPT
function enviado($nome_paciente,$nome_medico,$especialidade,$nome_arquivo,$destino,$data_exame){
	
    $servidor="localhost";
	$usuario="root";
	$senha="";
	$dbname="sistema_bragalha";
    
//	$servidor="sistema_client.mysql.dbaas.com.br";
//	$usuario="sistema_client";
//	$senha="side316@pro";
//	$dbname="sistema_client";
	$conn=mysqli_connect($servidor,$usuario, $senha, $dbname);
	
	$consulta = "select cpf_cliente from cliente where nome_cliente LIKE '%".$nome_paciente."%'";
	$result = $conn->query($consulta) or die ($conn->error);
	
	$result2 = $conn->query("select email_cliente from cliente where nome_cliente LIKE '%".$nome_paciente."%'") ->fetch_object()->email_cliente;
	
	if($result2->num_rows > 0){
    echo $result2->fetch_object()->email_cliente;
	}
    
//		echo "erro";
	
	
	while ($dado = $result -> fetch_array()) {		
		$sql = "INSERT INTO resultado_exames 
						(nome_paciente, 
						cpf_paciente, 
						medico_exame, 
						especialidade_exame, 
						dt_exame, 
						file_name, 
						file_uploaded, 
						dt_upload)
						VALUES						
						('{$nome_paciente}',
						'{$dado['cpf_cliente']}',
						'{$nome_medico}',
						'{$especialidade}',
						'{$data_exame}',
						'{$nome_arquivo}',
						'{$destino}', 
						NOW())";
	
			if ($conn->query($sql) === TRUE) {
//					
//					echo "Insert no banco realizado com sucesso!";
//					echo $dado['cpf_cliente'];
			} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
	
		}	
	}
	
	

/*-----------------------------------------------------------------------------*
 * Parte 1: Configurações do Envio de arquivos via FTP com PHP
/*----------------------------------------------------------------------------*/

// IP do Servidor FTP
$servidor_ftp = 'ftp.side3.com.br';

// Usuário e senha para o servidor FTP
$usuario_ftp = 'side3';
$senha_ftp   = 'solutions';

// Extensões de arquivos permitidas
$extensoes_autorizadas = array( '.pdf' );

// Caminho da pasta FTP
$caminho = 'Web/aprovacao/bragalha';

/* 
Se quiser limitar o tamanho dos arquivo, basta colocar o tamanho máximo 
em bytes. Zero é ilimitado
*/
$limitar_tamanho = 0;

/* 
Qualquer valor diferente de 0 (zero) ou false, permite que o arquivo seja 
sobrescrito
*/
$sobrescrever = false;

/*-----------------------------------------------------------------------------*
 * Parte 2: Configurações do arquivo
/*----------------------------------------------------------------------------*/

$nome_paciente 	= $_POST ['nome_paciente'];

$data_exame		 	= $_POST ['datepicker'];

$nome_medico 		= $_POST ['medico'];

$especialidade 	= $_POST ['especialidade'];

// Verifica se o arquivo não foi enviado. Se não; termina o script.
if ( ! isset( $_FILES['arquivo'] ) ) {
	exit('Nenhum arquivo enviado!');
}

// Aqui o arquivo foi enviado e vamos configurar suas variáveis
$arquivo = $_FILES['arquivo'];

// Nome do arquivo enviado
$nome_arquivo = $nome_paciente.'-'.$arquivo['name'];

// Tamanho do arquivo enviado
$tamanho_arquivo = $arquivo['size'];

// Nome do arquivo temporário
$arquivo_temp = $arquivo['tmp_name'];

// Extensão do arquivo enviado
$extensao_arquivo = strrchr( $nome_arquivo, '.' );

// O destino para qual o arquivo será enviado
$destino = $caminho . $nome_arquivo;

/*-----------------------------------------------------------------------------*
 *  Parte 3: Verificações do arquivo enviado
/*----------------------------------------------------------------------------*/

/* 
Se a variável $sobrescrever não estiver configurada, assumimos que não podemos 
sobrescrever o arquivo. Então verificamos se o arquivo existe. Se existir; 
terminamos aqui. 
*/

if ( !$sobrescrever && file_exists( $destino ) ) {
	exit('Arquivo já existe.');
}

// Se nao foi selecionado nenhum arquivo exibe tratamento correto //
//if ( $arquivo == "" || "" ) {
//	exit('Selecione o resultado de exame para upload!');
//}

/* 
Se a variável $limitar_tamanho tiver valor e o tamanho do arquivo enviado for
maior do que o tamanho limite, terminado aqui.
*/

if ( $limitar_tamanho && $limitar_tamanho < $tamanho_arquivo ) {
	exit('Arquivo muito grande.');
}

/* 
Se as $extensoes_autorizadas não estiverem vazias e a extensão do arquivo não 
estiver entre as extensões autorizadas, terminamos aqui.
*/

if ( ! empty( $extensoes_autorizadas ) && ! in_array( $extensao_arquivo, $extensoes_autorizadas ) ) {
	exit('Tipo de arquivo não permitido.');
}

/*-----------------------------------------------------------------------------*
 * Parte 4: Conexão FTP
/*----------------------------------------------------------------------------*/

// Realiza a conexão
$conexao_ftp = ftp_connect( $servidor_ftp );

// Tenta fazer login
$login_ftp = @ftp_login( $conexao_ftp, $usuario_ftp, $senha_ftp );

// Se não conseguir fazer login, termina aqui
if ( ! $login_ftp ) {
	exit('Usuário ou senha FTP incorretos.');
}

// Envia o arquivo
if ( @ftp_put( $conexao_ftp, $destino, $arquivo_temp, FTP_BINARY ) ) {	
	// Se for enviado, chama funcao
	//echo 'Arquivo enviado com sucesso!';	
	enviado($nome_paciente,$nome_medico,$especialidade,$nome_arquivo,$destino,$data_exame);	
	
} else {
	// Se não for enviado, mostra essa mensagem
	echo 'Erro ao enviar arquivo!';
}

// Fecha a conexão FTP
ftp_close( $conexao_ftp );

?>