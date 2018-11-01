<?php

require_once( '../Model/quiz_model.php' );

class Quiz_controller extends Quiz_model {

	protected $model;

	function __construct(){

		$this->model = new Quiz_model();
	}

	function register( $username, $password ){

		$status = $this->model->get_register( $username, $password );

		if( $status == true ){

			$status = "Your Successfully Registerated With Account";
		}
		else{
			$status = "Error has been encountered";
		}
		return $status;
	}

	function login( $username, $password ){

		$status = $this->model->get_login( $username, $password );

		if( $status == true ){

			header( 'Location:home.php' );
			exit();
		}
		else{
			$status = "Invalid Username or Password";
		}
		return $status;

	}
 
}