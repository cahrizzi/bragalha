<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sistema_bragalha');

//define('DB_SERVER', 'sistema_client.mysql.dbaas.com.br');
//define('DB_USER', 'sistema_client');
//define('DB_PASSWORD', 'side316@pro');
//define('DB_NAME', 'sistema_client');


if (isset($_GET['term'])){
	$return_arr = array();

	try {
			$conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	    $stmt = $conn->prepare('SELECT nome_cliente,email_cliente, cpf_cliente FROM cliente WHERE nome_cliente LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));			
	    
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['nome_cliente'];				
	    }
		
			
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
		
}

?>