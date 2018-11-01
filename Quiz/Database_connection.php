<?php

class Database_connection {

	protected $conn;
	private $username;
	private $password;
	private $database;
	private $servername;

	function __construct(){

		$this->conn = false;
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "root";
		$this->database = "Quiz";
	}

	function __destruct(){

		$this->disconnect();
	}

	function connect(){

		if( ! $this->conn ){

			try{
				
				$this->conn = new PDO( "mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password );
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch( PDOException $e ){

				 echo "Connection failed: " . $e->getMessage();
			}

		}

		return $this->conn;
	}

	function disconnect(){

		$this->conn = null;
	}
}

?>