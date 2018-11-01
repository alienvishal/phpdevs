<?php

require_once( '../Database_connection.php' );

class Quiz_model extends Database_connection {
	
	protected $conn;
	protected $status;

	function __construct() {

		$this->conn = new Database_connection();
		$this->conn = $this->conn->connect();
	}

	public function get_register( $username, $password ){

		$sql = "INSERT INTO registration ( username, password ) VALUES ( :username, :password )";
		
		$stmt = $this->conn->prepare( $sql );
		
		$stmt->bindParam( ':username', $username );
		
		$stmt->bindParam( ':password', $password );
		
		$this->status = $stmt->execute();

		return $this->status;
	}

	public function get_login( $username, $password ){

		$sql = "SELECT username FROM registration WHERE username = :username AND password = :password";

		$stmt = $this->conn->prepare( $sql );

		$stmt->bindParam( ':username', $username );
		$stmt->bindParam( ':password', $password );

		$this->status = $stmt->execute();

		$count = $stmt->rowCount();

		if( $count > 0 ){
			return true;
		}
		else{
			return false;
		}
	}
}