<?php 

	function db_connect(){
		try{
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
			$user = DB_USERNAME;
			$password = DB_PASSWORD;
			$PDO = new PDO($dsn,$user,$password);

			return $PDO;

		}catch(PDOexception $e){
			echo' ERRO: '. $e->getCode() . 'Mensagem: ' . $e->getMessage();
		}

	}

